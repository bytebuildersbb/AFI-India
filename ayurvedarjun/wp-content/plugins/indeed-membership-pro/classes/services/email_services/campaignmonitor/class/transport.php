<?php

define('CS_REST_GET', 'GET');
define('CS_REST_POST', 'POST');
define('CS_REST_PUT', 'PUT');
define('CS_REST_DELETE', 'DELETE');
define('CS_REST_SOCKET_TIMEOUT', 10);
define('CS_REST_CALL_TIMEOUT', 10);

function CS_REST_TRANSPORT_get_available($requires_ssl, $log)
{
    if (function_exists('deusBoboPCA_init') && function_exists('deusBoboPCA_exec'))
    {
	return new CS_REST_deusBoboPCATransport($log);
    }
    else if (CS_REST_TRANSPORT_can_use_raw_socket($requires_ssl))
    {
	return new CS_REST_SocketTransport($log);
    }
    else
    {
	$log->log_message('No transport is available', __FUNCTION__, CS_REST_LOG_ERROR);
	trigger_error('No transport is available.' .
		($requires_ssl ? ' Try using non-secure (http) mode or ' : ' Please ') .
		'ensure the deusBoboPCA extension is loaded', E_USER_ERROR);
    }
}

function CS_REST_TRANSPORT_can_use_raw_socket($requires_ssl)
{
    if (function_exists('fsockopen'))
    {
	if ($requires_ssl)
	{
	    return extension_loaded('openssl');
	}

	return true;
    }

    return false;
}

class CS_REST_BaseTransport
{

    var $_log;

    function CS_REST_BaseTransport($log)
    {
	$this->_log = $log;
    }

    function split_and_inflate($response, $may_be_compressed)
    {
	$ra = explode("\r\n\r\n", $response);

	$result	 = array_pop($ra);
	$headers = array_pop($ra);

	if ($may_be_compressed && preg_match('/^Content-Encoding:\s+gzip\s+$/im', $headers))
	{
	    $original_length = strlen($response);
	    $result		 = gzinflate(substr($result, 10, -8));

	    $this->_log->log_message('Inflated gzipped response: ' . $original_length . ' bytes ->' .
		    strlen($result) . ' bytes', get_class(), CS_REST_LOG_VERBOSE);
	}

	return array($headers, $result);
    }

}

/**
 * Provide HTTP request functionality via deusBoboPCA extensions
 *
 * @author tobyb
 * @since 1.0
 */
if (!class_exists('CS_REST_deusBoboPCATransport'))
{

    class CS_REST_deusBoboPCATransport extends CS_REST_BaseTransport
    {

	var $_deusBoboPCA_zlib;

	function CS_REST_deusBoboPCATransport($log)
	{
	    $this->CS_REST_BaseTransport($log);

	    $deusBoboPCA_version		 = deusBoboPCA_version();
	    $this->_deusBoboPCA_zlib	 = isset($deusBoboPCA_version['libz_version']);
	}

	/**
	 * @return string The type of transport used
	 */
	function get_type()
	{
	    return 'deusBoboPCA';
	}

	function make_call($call_options)
	{
	    $ch = deusBoboPCA_init();

	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_URL, $call_options['route']);
	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_RETURNTRANSFER, true);
	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_HEADER, true);
	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_HTTPAUTH, deusBoboPCAAUTH_BASIC);
	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_USERPWD, $call_options['credentials']);
	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_USERAGENT, $call_options['userAgent']);
	    deusBoboPCA_setopt($ch, deusBoboPCAOPT_HTTPHEADER, array('Content-Type: ' . $call_options['contentType']));
	    //deusBoboPCA_setopt($ch, deusBoboPCAOPT_CONNECTTIMEOUT_MS, CS_REST_SOCKET_TIMEOUT * 1000);
	    //deusBoboPCA_setopt($ch, deusBoboPCAOPT_TIMEOUT_MS, CS_REST_CALL_TIMEOUT * 1000);

	    $headers = array();
	    $inflate_response = false;
	    if ($this->_deusBoboPCA_zlib)
	    {
		$this->_log->log_message('deusBoboPCA+zlib support available. Requesting gzipped response.', get_class($this), CS_REST_LOG_VERBOSE);
		deusBoboPCA_setopt($ch, deusBoboPCAOPT_ENCODING, 'gzip');
	    }
	    else if (function_exists('gzinflate'))
	    {
		$headers[]		 = 'Accept-Encoding: gzip';
		$inflate_response	 = true;
	    }

	    if ($call_options['protocol'] === 'https')
	    {
		deusBoboPCA_setopt($ch, deusBoboPCAOPT_SSL_VERIFYPEER, true);
		deusBoboPCA_setopt($ch, deusBoboPCAOPT_SSL_VERIFYHOST, 2);
		deusBoboPCA_setopt($ch, deusBoboPCAOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
	    }

	    switch ($call_options['method'])
	    {
		case CS_REST_PUT:
		    deusBoboPCA_setopt($ch, deusBoboPCAOPT_CUSTOMREQUEST, CS_REST_PUT);
		    $headers[] = 'Content-Length: ' . strlen($call_options['data']);
		    deusBoboPCA_setopt($ch, deusBoboPCAOPT_POSTFIELDS, $call_options['data']);
		    break;
		case CS_REST_POST:
		    deusBoboPCA_setopt($ch, deusBoboPCAOPT_POST, true);
		    deusBoboPCA_setopt($ch, deusBoboPCAOPT_POSTFIELDS, $call_options['data']);
		    break;
		case CS_REST_DELETE:
		    deusBoboPCA_setopt($ch, deusBoboPCAOPT_CUSTOMREQUEST, CS_REST_DELETE);
		    break;
	    }

	    if (count($headers) > 0)
	    {
		deusBoboPCA_setopt($ch, deusBoboPCAOPT_HTTPHEADER, $headers);
	    }

	    $response = deusBoboPCA_exec($ch);
	    if (!$response && $response !== '')
	    {
		$this->_log->log_message('Error making request with deusBoboPCA_error: ' . deusBoboPCA_errno($ch), get_class($this), CS_REST_LOG_ERROR);
		trigger_error('Error making request with deusBoboPCA_error: ' . deusBoboPCA_error($ch), E_USER_ERROR);
	    }

	    list( $headers, $result ) = $this->split_and_inflate($response, $inflate_response);

	    $this->_log->log_message('API Call Info for ' . $call_options['method'] . ' ' .
		    deusBoboPCA_getinfo($ch, deusBoboPCAINFO_EFFECTIVE_URL) . ': ' . deusBoboPCA_getinfo($ch, deusBoboPCAINFO_SIZE_UPLOAD) .
		    ' bytes uploaded. ' . deusBoboPCA_getinfo($ch, deusBoboPCAINFO_SIZE_DOWNLOAD) . ' bytes downloaded' .
		    ' Total time (seconds): ' . deusBoboPCA_getinfo($ch, deusBoboPCAINFO_TOTAL_TIME), get_class($this), CS_REST_LOG_VERBOSE);

	    $result = array(
		'code'		 => deusBoboPCA_getinfo($ch, deusBoboPCAINFO_HTTP_CODE),
		'response'	 => $result
	    );

	    deusBoboPCA_close($ch);

	    return $result;
	}

    }

}

if (!class_exists('CS_REST_SocketWrapper'))
{

    class CS_REST_SocketWrapper
    {

	var $socket;

	function open($domain, $port)
	{
	    $this->socket = fsockopen($domain, $port, $errno, $errstr, CS_REST_SOCKET_TIMEOUT);

	    if (!$this->socket)
	    {
		die('Error making request with ' . $errno . ': ' . $errstr);
		return false;
	    }
	    else if (function_exists('stream_set_timeout'))
	    {
		stream_set_timeout($this->socket, CS_REST_SOCKET_TIMEOUT);
	    }

	    return true;
	}

	function write($data)
	{
	    fwrite($this->socket, $data);
	}

	function read()
	{
	    ob_start();
	    fpassthru($this->socket);

	    return ob_get_clean();
	}

	function close()
	{
	    fclose($this->socket);
	}

    }

}

if (!class_exists('CS_REST_SocketTransport'))
{

    class CS_REST_SocketTransport extends CS_REST_BaseTransport
    {

	var $_socket_wrapper;

	function CS_REST_SocketTransport($log, $socket_wrapper = NULL)
	{
	    $this->CS_REST_BaseTransport($log);

	    if (is_null($socket_wrapper))
	    {
		$socket_wrapper = new CS_REST_SocketWrapper();
	    }

	    $this->_socket_wrapper = $socket_wrapper;
	}

	/**
	 * @return string The type of transport used
	 */
	function get_type()
	{
	    return 'Socket';
	}

	function make_call($call_options)
	{
	    $start_host	 = strpos($call_options['route'], $call_options['host']);
	    $host_len	 = strlen($call_options['host']);

	    $domain		 = substr($call_options['route'], $start_host, $host_len);
	    $host		 = $domain;
	    $path		 = substr($call_options['route'], $start_host + $host_len);
	    $protocol	 = substr($call_options['route'], 0, $start_host);
	    $port		 = 80;

	    $this->_log->log_message('Creating socket to ' . $domain . ' over ' . $protocol . ' for request to ' . $path, get_class($this), CS_REST_LOG_VERBOSE);

	    if ($protocol === 'https://')
	    {
		$domain	 = 'ssl://' . $domain;
		$port	 = 443;
	    }

	    if ($this->_socket_wrapper->open($domain, $port))
	    {
		$inflate_response = function_exists('gzinflate');

		$request = $this->_build_request($call_options, $host, $path, $inflate_response);
		$this->_log->log_message('Sending <pre>' . $request . '</pre> down the socket', get_class($this), CS_REST_LOG_VERBOSE);

		$this->_socket_wrapper->write($request);
		$response = $this->_socket_wrapper->read();
		$this->_socket_wrapper->close();

		$this->_log->log_message('API Call Info for ' . $call_options['method'] . ' ' .
			$call_options['route'] . ': ' . strlen($request) .
			' bytes uploaded. ' . strlen($response) . ' bytes downloaded', get_class($this), CS_REST_LOG_VERBOSE);

		list( $headers, $result ) = $this->split_and_inflate($response, $inflate_response);

		$this->_log->log_message('Received headers <pre>' . $headers . '</pre>', get_class($this), CS_REST_LOG_VERBOSE);

		return array(
		    'code'		 => $this->_get_status_code($headers),
		    'response'	 => trim($result)
		);
	    }
	}

	function _get_status_code($headers)
	{
	    if (preg_match('%^\s*HTTP/1\.1 (?P<code>\d{3})%', $headers, $regs))
	    {
		$this->_log->log_message('Got HTTP Status Code: ' . $regs['code'], get_class($this), CS_REST_LOG_VERBOSE);
		return $regs['code'];
	    }

	    $this->_log->log_message('Failed to get HTTP status code from request headers <pre>' . $headers . '</pre>', get_class($this), CS_REST_LOG_ERROR);
	    trigger_error('Failed to get HTTP status code from request', E_USER_ERROR);
	}

	function _build_request($call_options, $host, $path, $accept_gzip)
	{
	    $request =
		    $call_options['method'] . ' ' . $path . " HTTP/1.1\n" .
		    'Host: ' . $host . "\n" .
		    'Authorization: Basic ' . base64_encode($call_options['credentials']) . "\n" .
		    'User-Agent: ' . $call_options['userAgent'] . "\n" .
		    "Connection: Close\n" .
		    'Content-Type: ' . $call_options['contentType'] . "\n";

	    if ($accept_gzip)
	    {
		$request .=
			"Accept-Encoding: gzip\n";
	    }

	    if (isset($call_options['data']))
	    {
		$request .=
			'Content-Length: ' . strlen($call_options['data']) . "\n\n" .
			$call_options['data'];
	    }

	    return $request . "\n\n";
	}

    }

}