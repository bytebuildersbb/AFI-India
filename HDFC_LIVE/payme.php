<!--<html>
<form action ="direcpay.php" method="POST">
<table border='2'>
<tr><td> Merchant Id </td><td> <input type="text" name="merchantId" value="2001" readonly></td></tr>
<tr><td> Api Key </td><td> <input type="text" name="apiKey" value="jhgj" readonly></td></tr>
<tr><td> TxnID </td><td> <input type="text" name="txnId" value="254631"></td></tr>
<tr><td> Amount </td><td> <input type="text" name="amount" value="2221"></td></tr>
</table></br>
<input type="Submit">
</form>
</html>-->
<?php
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d h:i:s');    // MySQL datetime format
?>
<html>
<HEAD>
 <TITLE>Merchant Test Page</TITLE>
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
<body>
 <form action="payrouter.php" method="post" accept-charset="ISO-8859-1">
  <input class="textbox"type="text" name="merchantId" id="merchantId" value="M0000512" > 
  <input class="textbox"type="text" name="apiKey" id="apiKey" value="JE7yc7Gd4fD3Fo2zt9xC8IC8tC6sV9Ua " >
  <input class="textbox"type="text" name="txnId" id="txnId" value="<?php echo substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6).rand(100,999); ?>">
  <input class="textbox" type="text" name="amount" id="amount" value="500.00" > 
  <input class="textbox"type="text" name="dateTime" id="dateTime" value = "<?php echo date('Y-m-d h:i:s'); ?>" >
  <input class="textbox"type="text" name="custMail" value="mohitcool.mohit@gmail.com" id="m11" > 
  <input class="textbox"type="text" name="custMobile" value="9045500610" id="m22">
  <input class="textbox1"type="text" name="returnURL" id="returnURL" value="https://afi-india.in/response.php">
  <input class="textbox"type="text" name="productId" id="productId" value="DEFAULT" >
  <input class="textbox" type="text" name="channelId" id="channelId" value="0" > 
  <input class="textbox"type="text" name="isMultiSettlement" id="isMultiSettlement" value="0" >
  <input class="textbox"type="text" name="txnType" id="txnType" value="DIRECT" >
  <input class="textbox"type="text" name="instrumentId" id="instrumentId" value="NA" >
  <input class="textbox"type="text" name="udf3" id="udf3" value="NA" >
  <input class="textbox"type="text" name="udf4" id="udf4" value="NA" >
  <input class="textbox"type="text" name="udf5" id="udf5" value="NA" >
  <input class="textbox"type="text" name="cardDetails" id="cardDetails" value="NA" >
  <input class="textbox"type="text" name="cardType" id="cardDetails" value="NA" >
  <input type = "submit"  value="Submit Request"/>
</form>
</body>
</html>