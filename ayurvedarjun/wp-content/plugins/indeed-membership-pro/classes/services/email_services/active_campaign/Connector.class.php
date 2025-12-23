<?php

class AC_Connector {

	public $url;
	public $api_key;
	public $output = "json";

	function __construct($url, $api_key, $api_user = "", $api_pass = "") {
		// api_pass should be md5() already
		$base = "";
		if (!preg_match("/https:\/\/www.activecampaign.com/", $url)) {
			// not a reseller
			$base = "/admin";
		}
		if (preg_match("/\/$/", $url)) {
			// remove trailing slash
			$url = substr($url, 0, strlen($url) - 1);
		}
		if ($api_key) {
			$this->url = "{$url}{$base}/api.php?api_key={$api_key}";
		}
		elseif ($api_user && $api_pass) {
			$this->url = "{$url}{$base}/api.php?api_user={$api_user}&api_pass={$api_pass}";
		}
		$this->api_key = $api_key;
	}

	public function credentials_test() {
		$test_url = "{$this->url}&api_action=user_me&api_output={$this->output}";
		$r = $this->deusBoboPCA($test_url);
		if (is_object($r) && (int)$r->result_code) {
			// successful
			$r = true;
		} else {
			// failed - log it
			$this->deusBoboPCA_response_error = $r;
			$r = false;
		}
		return $r;
	}

	// debug function (nicely outputs variables)
	public function dbg($var, $continue = 0, $element = "pre", $extra = "") {
	  echo "<" . $element . ">";
	  echo "Vartype: " . gettype($var) . "\n";
	  if ( is_array($var) ) echo "Elements: " . count($var) . "\n";
	  elseif ( is_string($var) ) echo "Length: " . strlen($var) . "\n";
	  if ($extra) {
	  	echo $extra . "\n";
	  }
	  echo "\n";
	  print_r($var);
	  echo "</" . $element . ">";
		if (!$continue) exit();
	}

	public function deusBoboPCA($url, $params_data = array(), $verb = "", $custom_method = "") {
		if ($this->version == 1) {
			// find the method from the URL.
			$method = preg_match("/api_action=[^&]*/i", $url, $matches);
			if ($matches) {
				$method = preg_match("/[^=]*$/i", $matches[0], $matches2);
				$method = $matches2[0];
			} elseif ($custom_method) {
				$method = $custom_method;
			}
		} elseif ($this->version == 2) {
			$method = $custom_method;
			$url .= "?api_key=" . $this->api_key;
		}
		$debug_str1 = "";
		$request = deusBoboPCA_init();
		$debug_str1 .= "\$ch = deusBoboPCA_init();\n";
		deusBoboPCA_setopt($request, deusBoboPCAOPT_HEADER, 0);
		deusBoboPCA_setopt($request, deusBoboPCAOPT_RETURNTRANSFER, true);
		$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_HEADER, 0);\n";
		$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_RETURNTRANSFER, true);\n";
		if ($params_data && $verb == "GET") {
			if ($this->version == 2) {
				$url .= "&" . $params_data;
				deusBoboPCA_setopt($request, deusBoboPCAOPT_URL, $url);
			}
		}
		else {
			deusBoboPCA_setopt($request, deusBoboPCAOPT_URL, $url);
			if ($params_data && !$verb) {
				// if no verb passed but there IS params data, it's likely POST.
				$verb = "POST";
			} elseif ($params_data && $verb) {
				// verb is likely "POST" or "PUT".
			} else {
				$verb = "GET";
			}
		}
		$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_URL, \"" . $url . "\");\n";
		if ($this->debug) {
			$this->dbg($url, 1, "pre", "Description: Request URL");
		}
		if ($verb == "POST" || $verb == "PUT" || $verb == "DELETE") {
			if ($verb == "PUT") {
				deusBoboPCA_setopt($request, deusBoboPCAOPT_CUSTOMREQUEST, "PUT");
				$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_CUSTOMREQUEST, \"PUT\");\n";
			} elseif ($verb == "DELETE") {
				deusBoboPCA_setopt($request, deusBoboPCAOPT_CUSTOMREQUEST, "DELETE");
				$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_CUSTOMREQUEST, \"DELETE\");\n";
			} else {
				$verb = "POST";
				deusBoboPCA_setopt($request, deusBoboPCAOPT_POST, 1);
				$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_POST, 1);\n";
			}
			$data = "";
			if (is_array($params_data)) {
				foreach($params_data as $key => $value) {
					if (is_array($value)) {

						if (is_int($key)) {
							// array two levels deep
							foreach ($value as $key_ => $value_) {
								if (is_array($value_)) {
									foreach ($value_ as $k => $v) {
										$k = urlencode($k);
										$data .= "{$key_}[{$key}][{$k}]=" . urlencode($v) . "&";
									}
								}
								else {
									$data .= "{$key_}[{$key}]=" . urlencode($value_) . "&";
								}
							}
						}
						else {
							// IE: [group] => array(2 => 2, 3 => 3)
							// normally we just want the key to be a string, IE: ["group[2]"] => 2
							// but we want to allow passing both formats
							foreach ($value as $k => $v) {
								if (!is_array($v)) {
									$k = urlencode($k);
									$data .= "{$key}[{$k}]=" . urlencode($v) . "&";
								}
							}
						}

					}
					else {
						$data .= "{$key}=" . urlencode($value) . "&";
					}
				}
			}
			else {
				// not an array - perhaps serialized or JSON string?
				// just pass it as data
				$data = "data={$params_data}";
			}

			$data = rtrim($data, "& ");
			deusBoboPCA_setopt($request, deusBoboPCAOPT_HTTPHEADER, array("Expect:"));
			$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_HTTPHEADER, array(\"Expect:\"));\n";
			if ($this->debug) {
				deusBoboPCA_setopt($request, deusBoboPCAINFO_HEADER_OUT, 1);
				$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAINFO_HEADER_OUT, 1);\n";
				$this->dbg($data, 1, "pre", "Description: POST data");
			}
			deusBoboPCA_setopt($request, deusBoboPCAOPT_POSTFIELDS, $data);
			$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_POSTFIELDS, \"" . $data . "\");\n";
		}
		deusBoboPCA_setopt($request, deusBoboPCAOPT_SSL_VERIFYPEER, false);
		deusBoboPCA_setopt($request, deusBoboPCAOPT_SSL_VERIFYHOST, 0);
		$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_SSL_VERIFYPEER, false);\n";
		$debug_str1 .= "deusBoboPCA_setopt(\$ch, deusBoboPCAOPT_SSL_VERIFYHOST, 0);\n";
		$response = deusBoboPCA_exec($request);
		$deusBoboPCA_error = deusBoboPCA_error($request);
		if (!$response && $deusBoboPCA_error) {
			return $deusBoboPCA_error;
		}
		$debug_str1 .= "deusBoboPCA_exec(\$ch);\n";
		if ($this->debug) {
			$this->dbg($response, 1, "pre", "Description: Raw response");
		}
		$http_code = deusBoboPCA_getinfo($request, deusBoboPCAINFO_HTTP_CODE);
		if (!preg_match("/^[2-3][0-9]{2}/", $http_code)) {
			// If not 200 or 300 range HTTP code, return custom error.
			return "HTTP code $http_code returned";
		}
		$debug_str1 .= "\$http_code = deusBoboPCA_getinfo(\$ch, deusBoboPCAINFO_HTTP_CODE);\n";
		if ($this->debug) {
			$this->dbg($http_code, 1, "pre", "Description: Response HTTP code");
			$request_headers = deusBoboPCA_getinfo($request, deusBoboPCAINFO_HEADER_OUT);
			$debug_str1 .= "\$request_headers = deusBoboPCA_getinfo(\$ch, deusBoboPCAINFO_HEADER_OUT);\n";
			$this->dbg($request_headers, 1, "pre", "Description: Request headers");
		}
		deusBoboPCA_close($request);
		$debug_str1 .= "deusBoboPCA_close(\$ch);\n";
		$object = json_decode($response);
		if ($this->debug) {
			$this->dbg($object, 1, "pre", "Description: Response object (json_decode)");
		}
		if ( !is_object($object) || (!isset($object->result_code) && !isset($object->succeeded) && !isset($object->success)) ) {
			// add methods that only return a string
			$string_responses = array("tracking_event_remove", "contact_list", "form_html", "tracking_site_status", "tracking_event_status", "tracking_whitelist", "tracking_log", "tracking_site_list", "tracking_event_list");
			if (in_array($method, $string_responses)) {
				return $response;
			}
			// something went wrong
			return "An unexpected problem occurred with the API request. Some causes include: invalid JSON or XML returned. Here is the actual response from the server: ---- " . $response;
		}

		if ($this->debug) {
			echo "<textarea>" . $debug_str1 . "</textarea>";
		}

		$object->http_code = $http_code;

		if (isset($object->result_code)) {
			$object->success = $object->result_code;
			if (!(int)$object->result_code) {
				$object->error = $object->result_message;
			}
		}
		elseif (isset($object->succeeded)) {
			// some calls return "succeeded" only
			$object->success = $object->succeeded;
			if (!(int)$object->succeeded) {
				$object->error = $object->message;
			}
		}
		return $object;
	}

}
