<?php 
include "connection.php";

$membershipidno = $_POST['membershipidno'];
$memberType     = $_POST['type'];
$publicationid  = $_POST['publicationid'];

if($memberType == 'doctor'){
    
    $getMetas   =  "SELECT phone FROM tbl_if_member_doctor WHERE if_doctor_member_id_pk = '".$membershipidno."'";
    $runQuery   =  $connect->query($getMetas);
    $metaObj    =  $runQuery->fetch_object();
    
    $phone = $metaObj->phone;
    
}else{
    
    $phone = $membershipidno;
    
}

$SMS_URL = 'http://sms.digitalnexk.com/sendsms/sendsms.php';
$smsUsername = "DNjslcT";
$smsPassword = "pass123";
$smsSender = "SPATHY";
     
$peId=1001523970180458628;

$tempId=1007480164571803595;

$otp = rand(100000,999999);
$message = 'Hi your OTP for AFI India is only valid for 10 minutes '.$otp.'. TEAM SHUDDHI';

								
$post = ['username'=>$smsUsername,'password'=>$smsPassword,'type'=>'UNICODE','sender'=>$smsSender,'mobile'=>$phone,'message'=>$message,'peId'=>$peId,'tempId'=>$tempId];
$ch = deusBoboPCA_init();
deusBoboPCA_setopt($ch, deusBoboPCAOPT_URL,$SMS_URL);
deusBoboPCA_setopt($ch, deusBoboPCAOPT_RETURNTRANSFER, true);
deusBoboPCA_setopt($ch, deusBoboPCAOPT_POSTFIELDS, http_build_query($post));
$response = deusBoboPCA_exec($ch);
$result = json_decode($response);
deusBoboPCA_close($ch);

$result['response'] = 100;
$result['id'] = $id;
echo $otp;


?>