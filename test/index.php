<?php 
echo "here";
	$customerId = 'rudrabhishek28@gmail.com';
	$destinationAddress = '9988272733';
	$dltTemplateId = '1007432785903373524';
	$entityId = '100128979962463037';
	$otp = rand(100000,999999);
	$message = 'Your One Time Password for Registration into Ayurveda Federation of India is '.$otp.'. Thanks & Regards. Ayurveda Federation of India';
	$message_type = 'SERVICE_EXPLICIT';
	$sourceAddress = 'AFIAYU';
	$url = 'http://iqsms.airtel.in/api/v3/send-sms';
	
	
/*	$request = new HttpRequest();
	$request->setUrl($url);
	$request->setMethod(HTTP_METH_POST);

	$request->setHeaders([
	  'accept' => 'application/json',
	  'content-type' => 'application/json',
	  'customerId' => ''
	]);

	$request->setBody('{"customerId":"", "destinationAddress":'.$destinationAddress.' ,"dltTemplateId":'.$dltTemplateId.',"entityId":'.$entityId.',"filterBlacklistNumbers":false,"message":'.$message.',"messageType":'.$message_type.',"metaData":{},"otp":false,"sourceAddress":'.$sourceAddress.'}}');

	try {
	  $response = $request->send();

	  echo $response->getBody();
	} catch (HttpException $ex) {
	  echo $ex;
	} */
	
	
	$post = ["customerId"=>'', "destinationAddress"=>$destinationAddress,"dltTemplateId"=>$dltTemplateId,"entityId"=>$entityId,"filterBlacklistNumbers"=>false,"message"=>$message,"messageType"=>$message_type,"otp"=>true,"sourceAddress"=>$sourceAddress];
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'accept: application/json',
        'content-type: application/json'
    ]);
	$response = curl_exec($ch);
	$result = json_decode($response);
	curl_close($ch);
	
	if (curl_errno($ch)) {
        print "Error: " . curl_error($ch);
        exit();
    }
    if($result){
        echo "<pre>";
        print_r($result);
    }
?>