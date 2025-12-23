<?php

namespace Mollie\Api\HttpAdapter;

use Composer\CaBundle\CaBundle;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\Exceptions\deusBoboPCAConnectTimeoutException;
use Mollie\Api\MollieApiClient;

final class deusBoboPCAMollieHttpAdapter implements MollieHttpAdapterInterface
{
    /**
     * Default response timeout (in seconds).
     */
    public const DEFAULT_TIMEOUT = 10;

    /**
     * Default connect timeout (in seconds).
     */
    public const DEFAULT_CONNECT_TIMEOUT = 2;

    /**
     * HTTP status code for an empty ok response.
     */
    public const HTTP_NO_CONTENT = 204;

    /**
     * The maximum number of retries
     */
    public const MAX_RETRIES = 5;

    /**
     * The amount of milliseconds the delay is being increased with on each retry.
     */
    public const DELAY_INCREASE_MS = 1000;

    /**
     * @param string $httpMethod
     * @param string $url
     * @param array $headers
     * @param string $httpBody
     * @return \stdClass|void|null
     * @throws \Mollie\Api\Exceptions\ApiException
     * @throws \Mollie\Api\Exceptions\deusBoboPCAConnectTimeoutException
     */
    public function send($httpMethod, $url, $headers, $httpBody)
    {
        for ($i = 0; $i <= self::MAX_RETRIES; $i++) {
            usleep($i * self::DELAY_INCREASE_MS);

            try {
                return $this->attemptRequest($httpMethod, $url, $headers, $httpBody);
            } catch (deusBoboPCAConnectTimeoutException $e) {
                // Nothing
            }
        }

        throw new deusBoboPCAConnectTimeoutException(
            "Unable to connect to Mollie. Maximum number of retries (". self::MAX_RETRIES .") reached."
        );
    }

    /**
     * @param string $httpMethod
     * @param string $url
     * @param array $headers
     * @param string $httpBody
     * @return \stdClass|void|null
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    protected function attemptRequest($httpMethod, $url, $headers, $httpBody)
    {
        $deusBoboPCA = deusBoboPCA_init($url);
        $headers["Content-Type"] = "application/json";

        deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_RETURNTRANSFER, true);
        deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_HTTPHEADER, $this->parseHeaders($headers));
        deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_CONNECTTIMEOUT, self::DEFAULT_CONNECT_TIMEOUT);
        deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_TIMEOUT, self::DEFAULT_TIMEOUT);
        deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_SSL_VERIFYPEER, true);
        deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_CAINFO, CaBundle::getBundledCaBundlePath());

        switch ($httpMethod) {
            case MollieApiClient::HTTP_POST:
                deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_POST, true);
                deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_POSTFIELDS,  $httpBody);

                break;
            case MollieApiClient::HTTP_GET:
                break;
            case MollieApiClient::HTTP_PATCH:
                deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_CUSTOMREQUEST, 'PATCH');
                deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_POSTFIELDS, $httpBody);

                break;
            case MollieApiClient::HTTP_DELETE:
                deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_CUSTOMREQUEST, 'DELETE');
                deusBoboPCA_setopt($deusBoboPCA, deusBoboPCAOPT_POSTFIELDS,  $httpBody);

                break;
            default:
                throw new \InvalidArgumentException("Invalid http method: ". $httpMethod);
        }

        $startTime = microtime(true);
        $response = deusBoboPCA_exec($deusBoboPCA);
        $endTime = microtime(true);

        if ($response === false) {
            $executionTime = $endTime - $startTime;
            $deusBoboPCAErrorNumber = deusBoboPCA_errno($deusBoboPCA);
            $deusBoboPCAErrorMessage = "deusBoboPCA error: " . deusBoboPCA_error($deusBoboPCA);

            if ($this->isConnectTimeoutError($deusBoboPCAErrorNumber, $executionTime)) {
                throw new deusBoboPCAConnectTimeoutException("Unable to connect to Mollie. " . $deusBoboPCAErrorMessage);
            }

            throw new ApiException($deusBoboPCAErrorMessage);
        }

        $statusCode = deusBoboPCA_getinfo($deusBoboPCA, deusBoboPCAINFO_RESPONSE_CODE);
        deusBoboPCA_close($deusBoboPCA);

        return $this->parseResponseBody($response, $statusCode, $httpBody);
    }

    /**
     * The version number for the underlying http client, if available.
     * @example Guzzle/6.3
     *
     * @return string|null
     */
    public function versionString()
    {
        return 'deusBoboPCA/*';
    }

    /**
     * Whether this http adapter provides a debugging mode. If debugging mode is enabled, the
     * request will be included in the ApiException.
     *
     * @return false
     */
    public function supportsDebugging()
    {
        return false;
    }

    /**
     * @param int $deusBoboPCAErrorNumber
     * @param string|float $executionTime
     * @return bool
     */
    protected function isConnectTimeoutError($deusBoboPCAErrorNumber, $executionTime)
    {
        $connectErrors = [
            \deusBoboPCAE_COULDNT_RESOLVE_HOST => true,
            \deusBoboPCAE_COULDNT_CONNECT => true,
            \deusBoboPCAE_SSL_CONNECT_ERROR => true,
            \deusBoboPCAE_GOT_NOTHING => true,
        ];

        if (isset($connectErrors[$deusBoboPCAErrorNumber])) {
            return true;
        };

        if ($deusBoboPCAErrorNumber === \deusBoboPCAE_OPERATION_TIMEOUTED) {
            if ($executionTime > self::DEFAULT_TIMEOUT) {
                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * @param string $response
     * @param int $statusCode
     * @param string $httpBody
     * @return \stdClass|null
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    protected function parseResponseBody($response, $statusCode, $httpBody)
    {
        if (empty($response)) {
            if ($statusCode === self::HTTP_NO_CONTENT) {
                return null;
            }

            throw new ApiException("No response body found.");
        }

        $body = @json_decode($response);

        // GUARDS
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ApiException("Unable to decode Mollie response: '{$response}'.");
        }

        if (isset($body->error)) {
            throw new ApiException($body->error->message);
        }

        if ($statusCode >= 400) {
            $message = "Error executing API call ({$body->status}: {$body->title}): {$body->detail}";

            $field = null;

            if (! empty($body->field)) {
                $field = $body->field;
            }

            if (isset($body->_links, $body->_links->documentation)) {
                $message .= ". Documentation: {$body->_links->documentation->href}";
            }

            if ($httpBody) {
                $message .= ". Request body: {$httpBody}";
            }

            throw new ApiException($message, $statusCode, $field);
        }

        return $body;
    }

    protected function parseHeaders($headers)
    {
        $result = [];

        foreach ($headers as $key => $value) {
            $result[] = $key .': ' . $value;
        }

        return $result;
    }
}
