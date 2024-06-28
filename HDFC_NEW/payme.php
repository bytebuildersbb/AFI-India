<form action="payrouter.php" method="post" accept-charset="ISO-8859-1" id="myformm" style="display:block;">
   <input class="textbox"type="text" name="merchantId" id="merchantId" value="M0000525" > 
   <input class="textbox"type="text" name="apiKey" id="apiKey" value="HB1Ql1sf0sp5vu1jv5Qv4BU3uf3cM3zn" >
   <input class="textbox"type="text" name="txnId" id="txnId" value="<?php echo substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6).rand(100,999); ?>">
   <input class="textbox" type="text" name="amount" id="amount" value="2500.00" > 
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
   <input type="submit" name="submitt" value="Submit" id="submit11">
</form>