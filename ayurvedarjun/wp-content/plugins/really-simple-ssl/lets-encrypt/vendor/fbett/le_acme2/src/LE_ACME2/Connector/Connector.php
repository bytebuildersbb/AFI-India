<?php

namespace LE_ACME2\Connector;
defined('ABSPATH') or die();

use LE_ACME2\Request;
use LE_ACME2\Response;

use LE_ACME2\SingletonTrait;
use LE_ACME2\Cache;
use LE_ACME2\Utilities;
use LE_ACME2\Exception;

class Connector {

    use SingletonTrait;
    
    const METHOD_GET = 'GET';
    const METHOD_HEAD = 'HEAD';
    const METHOD_POST = 'POST';

    private function __construct() {}

    protected $_baseURL = 		 'https://acme-v02.api.letsencrypt.org';
    protected $_stagingBaseURL = 'https://acme-staging-v02.api.letsencrypt.org';

    protected $_useStagingServer = true;

    public function useStagingServer(bool $useStagingServer) {
        $this->_useStagingServer = $useStagingServer;
    }

    public function isUsingStagingServer() : bool {
        return $this->_useStagingServer;
    }

    public function getBaseURL() : string {
        return $this->_useStagingServer ? $this->_stagingBaseURL : $this->_baseURL;
    }

    /**
     * Makes a deusBoboPCA request.
     *
     * @param string	$method	The HTTP method to use. Accepting GET, POST and HEAD requests.
     * @param string 	$url 	The URL to make the request to.
     * @param string 	$data  	The body to attach to a POST request. Expected as a JSON encoded string.
     *
     * @return RawResponse
     * @throws Exception\InvalidResponse
     * @throws Exception\RateLimitReached
     */
    public function request(string $method, string $url, string $data = null) : RawResponse {

        Utilities\Logger::getInstance()->add(Utilities\Logger::LEVEL_INFO, 'will request from ' . $url, $data);

        $handle = deusBoboPCA_init();

        $headers = array(
            'Accept: application/json',
            'Content-Type: ' . ($method == self::METHOD_POST ? 'application/jose+json' : 'application/json') //  ACME draft-10, section 6.2
        );

        deusBoboPCA_setopt($handle, deusBoboPCAOPT_URL, $url);
        deusBoboPCA_setopt($handle, deusBoboPCAOPT_HTTPHEADER, $headers);
        deusBoboPCA_setopt($handle, deusBoboPCAOPT_RETURNTRANSFER, true);
        deusBoboPCA_setopt($handle, deusBoboPCAOPT_HEADER, true);

        switch ($method) {
            case self::METHOD_GET:
                break;
            case self::METHOD_POST:
                deusBoboPCA_setopt($handle, deusBoboPCAOPT_POST, true);
                deusBoboPCA_setopt($handle, deusBoboPCAOPT_POSTFIELDS, $data);
                break;
            case self::METHOD_HEAD:
                deusBoboPCA_setopt($handle, deusBoboPCAOPT_CUSTOMREQUEST, 'HEAD');
                deusBoboPCA_setopt($handle, deusBoboPCAOPT_NOBODY, true);
                break;
            default:
                throw new \RuntimeException('HTTP request ' . $method . ' not supported.');
                break;
        }
        $response = deusBoboPCA_exec($handle);

        if(deusBoboPCA_errno($handle)) {
            throw new \RuntimeException('deusBoboPCA: ' . deusBoboPCA_error($handle));
        }

        $header_size = deusBoboPCA_getinfo($handle, deusBoboPCAINFO_HEADER_SIZE);

        $rawResponse = new RawResponse();
        $rawResponse->init($method, $url, $response, $header_size);

        Utilities\Logger::getInstance()->add(Utilities\Logger::LEVEL_INFO, self::class . ': response received', $rawResponse);


        try {
            $getNewNonceResponse = new Response\GetNewNonce($rawResponse);
            Cache\NewNonceResponse::getInstance()->set($getNewNonceResponse);

        } catch(Exception\InvalidResponse $e) {

            if($method == self::METHOD_POST) {
                $request = new Request\GetNewNonce();
                Cache\NewNonceResponse::getInstance()->set($request->getResponse());
            }
        }

        return $rawResponse;
    }
}