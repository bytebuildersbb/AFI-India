<?php 
$mobile = $_POST['mobile'];

	$tempId = '1007432785903373524';
	$peId = '1001289799624630372';
	$otp = rand(100000,999999);
	$message = 'Your One Time Password for Registration into Ayurveda Federation of India is '.$otp.'. Thanks & Regards. Ayurveda Federation of India.';
	$messageType = 'TEXT';
	$sender = 'AFIAYU';
	$url = 'https://portal.tubelightcommunications.com/sms/api/v1/websms/single';
	//$templateName = 'login temp01';
	
	$bearar_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJhdmZvcnVtIiwiaWF0IjoxNzA2NTIyOTM3LCJleHAiOjI1NzA1MjI5MzcsInVzZXJfaWQiOjE0NTAxNX0.xr9hr23tnuUbb_LLQmtpaI4xV1tL7GYhCSkPzgF4fUNz4BXcOHoQHL2F71YdKqhITiWSo2KLv-D71ut2hWGzGw";
	
	$curl = curl_init(); 

	$payload = array(
		"sender" 		=> $sender,
		"mobileNo" 		=> '91'.$mobile,
		"messageType" 	=> $messageType,
		"messages" 		=> $message,
		"tempId" 		=> $tempId,
		"peId" 			=> $peId,
		"cust_uuid" 	=> ""
	);

	curl_setopt_array($curl, [
		CURLOPT_HTTPHEADER => [	
		  "Content-Type: application/json",
		  'Authorization: Bearer ' . $bearar_token
		],
		CURLOPT_POSTFIELDS => json_encode($payload),
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
	]);

	$response = curl_exec($curl);
	$error = curl_error($curl);

	curl_close($curl);

	/* if ($error) {
	  echo "cURL Error #:" . $error;
	} else {
	  echo $response;
	} */
	
	echo $otp;
//echo '123';

?>