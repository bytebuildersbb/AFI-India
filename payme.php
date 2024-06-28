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

            <!-- get user input -->
            <table width='60%' align="center" border='2' cellpadding='2' bgcolor='#C1C1C1'>
                <tr>
                    <td bgcolor='#33EEFF' width='100%' align="center" >
                        <h2 class='co'>&nbsp;MERCHANT REQUEST PARAMETERS</h2>
                    </td>
                </tr>
            </table>

            <br>

            <TABLE width="60%" align="center" border="2" cellpadding='2' cellspacing='3'>	        	

                <tr bgcolor="#84FF33">
                    <td colspan="2" height="25"><p><strong>&nbsp;<font color="black">Fields below are the Request Parameters required by 1Pay - </font></strong></p></td>
                </tr>

                <tr>
                    <td colspan="2">&nbsp;&nbsp;</td>
               	</tr>

                <tr>
                    <td>
                        Merchant Id: <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="merchantId" id="merchantId" value="M0000525" > 
                    </td>
                </tr>

                <tr>
                    <td>
                        API Key : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="apiKey" id="apiKey" value="HB1Ql1sf0sp5vu1jv5Qv4BU3uf3cM3zn" > 
                    </td>
                </tr>

                <tr>
                    <td>
                        Merchant Order No. : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="txnId" id="txnId" value="XYZ123885545" >Must be Unique for every Transaction
                    </td>
                </tr>

                <tr>
                    <td>
                        Amount(Rs.) : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="amount" id="amount" value="1200.00" > 
                    </td>
                </tr>								            	               	 

                <tr>
                    <td>
                        Transaction Date Time: <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="dateTime" id="dateTime" value = "<?php echo $datetime; ?>" >
                    </td>
                </tr>

                <tr>
                    <td>
                        Customer Mail ID : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="custMail" id="custMail" value="mohitcool.mohit@gmail.com" > 
                    </td>
                </tr>

                <tr>
                    <td>
                        Customer Mobile No. : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="custMobile" id="custMobile" value="9045500610" > 
                    </td>
                </tr>               	              

                <tr>
                    <td>
                        UDF1 : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="udf1" id="udf1" value="NA" >Shipping address of the customer
                    </td>
                </tr>

                <tr>
                    <td>
                        UDF2 : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="udf2" id="udf2" value="NA" >Billing address of the customer 
                    </td>
                </tr>              	             	             

                <tr>
                    <td>
                        Merchant Return URL : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox1"type="text" name="returnURL" id="returnURL" value="http://afi-india.in/1Pay_PHPTEST/response.php">
                    </td>
                </tr>

                <tr>
                    <td>
                        Product ID : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="productId" id="productId" value="DEFAULT" >
                    </td>
                </tr>  

                <tr>
                    <td>
                        Channel ID : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox" type="text" name="channelId" id="channelId" value="0" > 
                    </td>
                </tr>

                <tr>
                    <td>
                        isMultiSettlement : <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="isMultiSettlement" id="isMultiSettlement" value="0" >0
                    </td>
                </tr>  

                <tr>
                    <td>
                        Transaction Type: <font color="red">*</font>
                    </td>
                    <td>
                        <input class="textbox"type="text" name="txnType" id="txnType" value="DIRECT" >DIRECT / REDIRECT
                    </td>
                </tr> 









               	<tr>
                    <td colspan="2">&nbsp;&nbsp;</td>
               	</tr>

               	<tr bgcolor="#84FF33">
                    <td colspan="2" height="25"><p><strong>&nbsp;<font color="black">Proper Values of below field are required only if Txn Type is</font> <font color="red">"REDIRECT"</font> <font color="black">else default value is "NA".</font> </strong></p></td>
                </tr>

                <tr>
                    <td colspan="2">&nbsp;&nbsp;</td>
               	</tr>

               	<tr>
                    <td>
                        Instrument ID :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="instrumentId" id="instrumentId" value="NA" >NB/CC/DC for Txn Type "REDIRECT"
                    </td> 
                </tr> 

                <tr>
                    <td>
                        UDF3 :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="udf3" id="udf3" value="NA" >For card data : "CARDNAME|CARDNUMBER|CVV|EXPIRY" 
                    </td>
                </tr> 
                <tr>
                    <td>
                        UDF4 :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="udf4" id="udf4" value="NA" >For card data : "CARDNAME|CARDNUMBER|CVV|EXPIRY" 
                    </td>
                </tr> 
                <tr>
                    <td>
                        UDF5 :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="udf5" id="udf5" value="NA" >For card data : "CARDNAME|CARDNUMBER|CVV|EXPIRY" 
                    </td>
                </tr> 
                <tr>
                    <td>
                        Card Details :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="cardDetails" id="cardDetails" value="NA" >CC/DC: "CARDNAME|CARDNO|CVV|EXPIRY|SAVECARDFLAG
                    </td>
                </tr> 
                <tr>
                    <td>
                        cardType :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="cardType" id="cardDetails" value="NA" >CC/DC: "CARDNAME|CARDNO|CVV|EXPIRY|SAVECARDFLAG
                    </td>
                </tr> 

<!--               	<tr>
                    <td>
                        Bank ID :
                    </td>
                    <td>
                        <input class="textbox"type="text" name="bankId" id="bankId" value="NA" >
                    </td>
                </tr>              	              	 -->

                <tr>
                    <td colspan="2">&nbsp;&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="2" align="center" >                	
                        <input type = "submit"  value="Submit Request"/>
                    </td>
                </tr>

            </TABLE>

        </form>

    </body>

</html>