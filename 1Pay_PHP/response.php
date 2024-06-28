<?php
include 'function.php';

/* 
		Sample Respone Page to Decrpt the Transaction Response and fetch the Response Paramaters from decrypted Response JSON.
*/

$merchantId = $_POST['merchantId'];
$respData = $_POST['respData'];

$respDecrypt = get_decrypt($respData);
$verificationResult = json_decode($respDecrypt);

$txnid = $verificationResult->txn_id;
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
if ($txnstatus == 'Ok') {
    $message1 = "Transaction Successful";
} else if ($txnstatus == 'To') {
    $message1 = "Sorry!!Your Transaction is Timed Out";
} else {
    $message1 = "Transaction Failed";
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
            <td width='50%'><?php echo $txnid; ?></td>
        </tr>

        <tr>
            <td align='right' width='50%'><strong><i>Merchant Id : </i></strong></td>
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