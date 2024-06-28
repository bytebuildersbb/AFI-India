<?php

// if(isset($_POST['phone']) && !empty($_POST['phone'])) {
//     // Generate and send OTP
//     $phone = trim($_POST['phone']);
//     $SMS_URL = 'http://sms.digitalnexk.com/sendsms/sendsms.php';
//     $smsUsername = "DNjslcT";
//     $smsPassword = "pass123";
//     $smsSender = "SPATHY";

//     $peId=1001523970180458628;
//     $tempId=1007480164571803595;

//     $otp = rand(100000,999999);
//     $message = 'Hi your OTP for AFI India is only valid for 10 minutes '.$otp.'. TEAM AFI';

//     $post = [
//         'username' => $smsUsername,
//         'password' => $smsPassword,
//         'type' => 'UNICODE',
//         'sender' => $smsSender,
//         'mobile' => $phone,
//         'message' => $message,
//         'peId' => $peId,
//         'tempId' => $tempId
//     ];

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $SMS_URL);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
//     $response = curl_exec($ch);
//     $result = json_decode($response);
//     curl_close($ch);
//     echo $otp;
//     die;
// }
?>

<?php 
	$mobile = $_POST['phone'];
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
		  'Authorization: Bearer ' . $bearar_token],
		CURLOPT_POSTFIELDS => json_encode($payload),
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
	]);
	$response = curl_exec($curl);
	$error = curl_error($curl);

	curl_close($curl);

	echo $otp;

?>
