<?php session_start(); ?>
<?php
include 'function.php';
include 'connection.php';
include "mail-file.php";
// Takes raw data from the request
$json = file_get_contents('php://input');
// Converts it into a PHP object
get_encrypt($_REQUEST['respData']);
$responceRecived        =       $_REQUEST['respData'];
$responceDecrypt        =       get_decrypt($responceRecived);
$verificationResult     =       json_decode($responceDecrypt);
$merchantId =   $_POST['merchantId'];
$respData   =   $_REQUEST['bank_ref_id'];
$txn_id = $verificationResult->txn_id;
$merchantid = $verificationResult->merchant_id;
$pgRefId = $verificationResult->pg_ref_id;
$respdatetime = $verificationResult->resp_date_time;
$txndateTime = $verificationResult->txn_date_time;
$txnstatus = $verificationResult->trans_status;
$txnamount = $verificationResult->txn_amount;
$message = $verificationResult->resp_message;
$resp_code = $verificationResult->resp_code;
$email = $verificationResult->cust_email_id;
$phnumber = $verificationResult->cust_mobile_no;
$banktxnId = $verificationResult->bank_ref_id;
$payment_mode = $verificationResult->payment_mode;
$dateTime = $_POST['datetime'];

$vmessage = "Verified Transaction";
//formType 1 for registration form 2 for special form
$FormType=$verificationResult->udf3;
$tableIdd=$verificationResult->udf4;
if ($txnstatus == 'Ok') {
    $message1 = "Transaction Successful";
    $query  =   "INSERT INTO `tbl_transaction`(`txn_id`,`cust_email_id`, `cust_mobile_no`, `merchant_id`, `payment_mode`, `txn_amount`, `resp_message`, `bank_ref_id`, `resp_code`, `pg_ref_id`, `trans_status`,`txn_date_time`,`table_id_fk`,`formtype`) VALUES ('$txn_id','$email','$phnumber','$merchantid','$payment_mode','$txnamount','$message','$banktxnId','$resp_code','$pgRefId','$txnstatus','$txndateTime','$tableIdd','$FormType')";
    $runQuery   =   $connect->query($query);
PAYY($FormType,$txnamount,$email,$phnumber);
if($FormType=="COURSE"){
    $queryy  = "UPDATE `tbl_application_form` SET `paymentStatus`='SUCCESS',`paymentAmount`='$txnamount' WHERE application_id_pk ='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="IDCARD"){
   $queryy  = " UPDATE `tbl_id_card` SET `payment`='$txnamount',`paymentStatus`='SUCCESS' WHERE `tbl_id_card_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_student` SET `payment`='$txnamount',`paymentStatus`='SUCCESS' WHERE `id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="LIFE MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_doctor` SET `payment`='$txnamount',`paymentStatus`='SUCCESS' WHERE `if_doctor_member_id_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="ASSOCIATE MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_prof_lect` SET `payment`='$txnamount',`paymentStatus`='SUCCESS' WHERE `if_member_prof_lect_id_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="PHARMA MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_pharmacy` SET `payment`='$txnamount',`paymentStatus`='SUCCESS' WHERE `tbl_if_member_pharmacy_id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="PATRON MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_patron` SET `payment`='$txnamount',`paymentStatus`='SUCCESS' WHERE `tbl_if_member_patron_id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
} else if ($txnstatus == 'To') {
    $message1 = "Sorry!! Your Transaction is Timed Out";
    $query  =   "INSERT INTO `tbl_transaction`(`txn_id`,`cust_email_id`, `cust_mobile_no`, `merchant_id`, `payment_mode`, `txn_amount`, `resp_message`, `bank_ref_id`, `resp_code`, `pg_ref_id`, `trans_status`,`txn_date_time`,`table_id_fk`,`formtype`) VALUES ('$txn_id','$email','$phnumber','$merchantid','$payment_mode','$txnamount','$message','$banktxnId','$resp_code','$pgRefId','$txnstatus','$txndateTime','$tableIdd','$FormType')";
    $runQuery   =   $connect->query($query);
    if($FormType=="COURSE"){
    $queryy  = "UPDATE `tbl_application_form` SET `paymentStatus`='FAILED',`paymentAmount`='$txnamount' WHERE application_id_pk ='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="IDCARD"){
   $queryy  = " UPDATE `tbl_id_card` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `tbl_id_card_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_student` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="LIFE MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_doctor` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `if_doctor_member_id_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="ASSOCIATE MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_prof_lect` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `if_member_prof_lect_id_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="PHARMA MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_pharmacy` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `tbl_if_member_pharmacy_id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="PATRON MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_patron` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `tbl_if_member_patron_id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
} else {
    $message1 = "Transaction Failed";
     $query  =   "INSERT INTO `tbl_transaction`(`txn_id`,`cust_email_id`, `cust_mobile_no`, `merchant_id`, `payment_mode`, `txn_amount`, `resp_message`, `bank_ref_id`, `resp_code`, `pg_ref_id`, `trans_status`,`txn_date_time`,`table_id_fk`,`formtype`) VALUES ('$txn_id','$email','$phnumber','$merchantid','$payment_mode','$txnamount','$message','$banktxnId','$resp_code','$pgRefId','$txnstatus','$txndateTime','$tableIdd','$FormType')";
    $runQuery   =   $connect->query($query);
    if($FormType=="COURSE"){
    $queryy  = "UPDATE `tbl_application_form` SET `paymentStatus`='FAILED',`paymentAmount`='$txnamount' WHERE application_id_pk ='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="IDCARD"){
   $queryy  = " UPDATE `tbl_id_card` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `tbl_id_card_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_student` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="LIFE MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_doctor` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `if_doctor_member_id_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="ASSOCIATE MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_prof_lect` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `if_member_prof_lect_id_pk`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="PHARMA MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_pharmacy` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `tbl_if_member_pharmacy_id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
if($FormType=="PATRON MEMBERSHIP"){
    $queryy  = "UPDATE `tbl_if_member_patron` SET `payment`='$txnamount',`paymentStatus`='FAILED' WHERE `tbl_if_member_patron_id`='$tableIdd'";
     $runQueryy   =   $connect->query($queryy);
}
}


?>
<HTML>

    <HEAD>
        <TITLE>Merchant Response Page</TITLE>
        <STYLE type='text/css'>
            H1       { font-family:Arial,sans-serif; font-size:24pt; color:#08185A; font-weight:100}
            H2.co    { font-family:Arial,sans-serif; font-size:24pt; color:#08185A; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}
            H3.co    { font-family:Arial,sans-serif; font-size:16pt; color:#000000; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}
            body     { font-family:Verdana,Arial,sans-serif; font-size:10pt; color:#08185A ;background-color:#FFFFFF }
            P        { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#FFFFFF }
            A:link   { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#08185A }
            A:visited{ font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#08185A }
            A:hover  { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#FF0000 }
            A:active { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#FF0000 }
            TD       { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#08185A }
            TD.red   { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#FF0066 }
            TD.green { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#00AA00 }
            TH       { font-family:Verdana,Arial,sans-serif; font-size:10pt; color:#08185A; font-weight:bold; background-color:#E1E1E1; padding-top:0.5em; padding-bottom:0.5em}
            input    { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#08185A; background-color:#E1E1E1; font-weight:bold }
            select   { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#08185A; background-color:#E1E1E1; font-weight:bold; width:463 }
            textarea { font-family:Verdana,Arial,sans-serif; font-size:8pt; color:#08185A; background-color:#E1E1E1; font-weight:normal; scrollbar-arrow-color:#08185A; scrollbar-base-color:#E1E1E1 }
        </STYLE>
    </HEAD>

    <BODY>

        <table width='100%' border='2' cellpadding='2' bgcolor='#C1C1C1'>
            <tr>
                <td bgcolor='#E1E1E1' width='90%'>
                    <h2 class='co'>&nbsp;MERCHANT RESPONSE PAGE</h2>
                </td>
            </tr>
        </table>

    <CENTER><H1> <?php echo $message1; ?></H1></CENTER>

    <TABLE width="85%" align='center' cellpadding='5' border='0'>

        <tr bgcolor="#C1C1C1">
            <td colspan="2" height="25"><p><strong>&nbsp;Fields below are the Response Parameters Sent by 1Pay - </strong></p></td>
        </tr>

        <tr>
            <td align='right' width='50%'><strong><i>Merchant Txn Reference / Merchant Order Number : </i></strong></td>
            <td width='50%'><?php echo $txn_id; ?></td>
        </tr>

        <tr>
            <td align='right' width='50%'><strong><i>Merchantssss Id : </i></strong></td>
            <td width='50%'><?php echo $merchantid; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>PG Transaction Reference Number : </i></strong></td>
            <td><?php echo $pgRefId; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>Response Date Time : </i></strong></td>
            <td><?php echo $respdatetime; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>Transaction Status : </i></strong></td>
            <td><?php echo $txnstatus; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>Transaction Amount : </i></strong></td>
            <td><?php echo $txnamount; ?></td>
        </tr>

         <tr>
            <td align='right'><strong><i>Response Transaction Code : </i></strong></td>
            <td><?php echo $resp_code; ?></td>
        </tr>
        
        <tr>
            <td align='right'><strong><i>Response Message : </i></strong></td>
            <td><?php echo $message; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>Customer Email Id : </i></strong></td>
            <td><?php echo $email; ?></td>
        </tr>

        <tr >
            <td align='right'><strong><i>Customer Phone No. : </i></strong></td>
            <td><?php echo $phnumber; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>Bank Reference Number : </i></strong></td>
            <td><?php echo $banktxnId; ?></td>
        </tr>

        <tr>
            <td align='right'><strong><i>Transaction Date : </i></strong></td>
            <td><?php echo $txndateTime; ?></td>
        </tr>
        <tr>
            <td align='right'><strong><i>Payment mode : </i></strong></td>
            <td><?php echo $payment_mode; ?></td>
        </tr>


    </TABLE><br>

</BODY>

</HTML>