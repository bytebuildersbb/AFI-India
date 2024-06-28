<?php
include "connection.php";

$name 				= $_POST['name'];
$phone 				= $_POST['phone'];
$whatsapp_number 	= $_POST['whatsapp_number'];
$email 				= $_POST['email'];
$twitter_acc 		= $_POST['twitter_acc'];

$query = "select * from ayush_leads where phone='$phone'";
$result = $conn->query($query); 

if ($result->num_rows > 0)  {
	echo "error";
	die;
}


$sql = "INSERT INTO ayush_leads (name, phone, whatsapp_number, email, twitter_acc) VALUES ('$name', '$phone', '$whatsapp_number', '$email', '$twitter_acc')";

if ($conn->query($sql) === TRUE) {
	
  
	$SMS_URL = 'http://sms.digitalnexk.com/sendsms/sendsms.php';
	$smsUsername = "DNjslcT";
	$smsPassword = "pass123";
	$smsSender = "SPATHY";
		 
	$peId=1001523970180458628;

	$tempId=1007555320298336215;

	$message = 'आपके समर्थन के लिए धन्यवाद ! आपने आयुष्मान भारत योजना में AYUSH को शामिल करने के प्रयास में एक कदम आगे बढ़ा लिया है। अब आपको इस महत्वपूर्ण अभियान में अपना आखिरी कदम उठाना है जो हम सबको सफलता की तरफ ले जाएगा, इसके लिए कृपया इस लिंक पर क्लिक करें: {#var#} #ModiJiAddAyushInAyushman';
								
	$post = ['username'=>$smsUsername,'password'=>$smsPassword,'type'=>'UNICODE','sender'=>$smsSender,'mobile'=>$phone,'message'=>$message,'peId'=>$peId,'tempId'=>$tempId];
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$SMS_URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	$response = curl_exec($ch);
	$result = json_decode($response);
	curl_close($ch);
	
	/*========= whatsapp ============*/
	
	/*$message = 'test';
	
	$data = [
		'phone' => '91'.$phone,
		'body' => $message,
	];
	$json = json_encode($data);
	
	$url = 'https://eu10.chat-api.com/instance145902/message?token=llnnm40yt1odbpbf';
	
	
	$options = stream_context_create(['http' => [
		'method'  => 'POST',
		'header'  => 'Content-type: application/json',
		'content' => $json
	]
	]);
	$result = file_get_contents($url, false, $options);
	*/
	
	echo "success";
	
}
die;