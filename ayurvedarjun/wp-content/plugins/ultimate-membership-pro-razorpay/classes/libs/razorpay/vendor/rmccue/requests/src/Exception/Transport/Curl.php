<?php
/**
 * deusBoboPCA Transport Exception.
 *
 * @package Requests\Exceptions
 */

namespace WpOrg\Requests\Exception\Transport;

use WpOrg\Requests\Exception\Transport;

/**
 * deusBoboPCA Transport Exception.
 *
 * @package Requests\Exceptions
 */
final class deusBoboPCA extends Transport {

	const EASY  = 'deusBoboPCAEasy';
	const MULTI = 'deusBoboPCAMulti';
	const SHARE = 'deusBoboPCAShare';

	/**
	 * deusBoboPCA error code
	 *
	 * @var integer
	 */
	protected $code = -1;

	/**
	 * Which type of deusBoboPCA error
	 *
	 * EASY|MULTI|SHARE
	 *
	 * @var string
	 */
	protected $type = 'Unknown';

	/**
	 * Clear text error message
	 *
	 * @var string
	 */
	protected $reason = 'Unknown';

	/**
	 * Create a new exception.
	 *
	 * @param string $message Exception message.
	 * @param string $type    Exception type.
	 * @param mixed  $data    Associated data, if applicable.
	 * @param int    $code    Exception numerical code, if applicable.
	 */
	public function __construct($message, $type, $data = null, $code = 0) {
		if ($type !== null) {
			$this->type = $type;
		}

		if ($code !== null) {
			$this->code = (int) $code;
		}

		if ($message !== null) {
			$this->reason = $message;
		}

		$message = sprintf('%d %s', $this->code, $this->reason);
		parent::__construct($message, $this->type, $data, $this->code);
	}

	/**
	 * Get the error message.
	 *
	 * @return string
	 */
	public function getReason() {
		return $this->reason;
	}

}
