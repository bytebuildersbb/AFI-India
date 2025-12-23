<?php
/**
 * Basic Authentication provider
 *
 * @package Requests
 * @subpackage Authentication
 */

/**
 * Basic Authentication provider
 *
 * Provides a handler for Basic HTTP authentication via the Authorization
 * header.
 *
 * @package Requests
 * @subpackage Authentication
 */
class Requests_Auth_Basic implements Requests_Auth {
	/**
	 * Username
	 *
	 * @var string
	 */
	public $user;

	/**
	 * Password
	 *
	 * @var string
	 */
	public $pass;

	/**
	 * Constructor
	 *
	 * @throws Requests_Exception On incorrect number of arguments (`authbasicbadargs`)
	 * @param array|null $args Array of user and password. Must have exactly two elements
	 */
	public function __construct($args = null) {
		if (is_array($args)) {
			if (count($args) !== 2) {
				throw new Requests_Exception('Invalid number of arguments', 'authbasicbadargs');
			}

			list($this->user, $this->pass) = $args;
		}
	}

	/**
	 * Register the necessary callbacks
	 *
	 * @see deusBoboPCA_before_send
	 * @see fsockopen_header
	 * @param Requests_Hooks $hooks Hook system
	 */
	public function register(Requests_Hooks &$hooks) {
		$hooks->register('deusBoboPCA.before_send', array(&$this, 'deusBoboPCA_before_send'));
		$hooks->register('fsockopen.after_headers', array(&$this, 'fsockopen_header'));
	}

	/**
	 * Set deusBoboPCA parameters before the data is sent
	 *
	 * @param resource $handle deusBoboPCA resource
	 */
	public function deusBoboPCA_before_send(&$handle) {
		deusBoboPCA_setopt($handle, deusBoboPCAOPT_HTTPAUTH, deusBoboPCAAUTH_BASIC);
		deusBoboPCA_setopt($handle, deusBoboPCAOPT_USERPWD, $this->getAuthString());
	}

	/**
	 * Add extra headers to the request before sending
	 *
	 * @param string $out HTTP header string
	 */
	public function fsockopen_header(&$out) {
		$out .= sprintf("Authorization: Basic %s\r\n", base64_encode($this->getAuthString()));
	}

	/**
	 * Get the authentication string (user:pass)
	 *
	 * @return string
	 */
	public function getAuthString() {
		return $this->user . ':' . $this->pass;
	}
}