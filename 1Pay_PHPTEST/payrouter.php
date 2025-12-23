<html>
    <head>
        <?php
//date_default_timezone_set('Asia/Kolkata');
        include 'function.php';
        /*
          Merchant has to enter the Merchant Id shared by 1Pay in the below variable 'merchantId' and pass in the Request along with encrypted Request Data.
          Merchant has to enter the API Key shared by 1Pay to Encrypt/Decrypr the Transaction Request/Response.
          Algorithm used for 
          Merchant Encryption Key will be different for TEST and PRODUCTION environment.
         */
        $merchantId = trim($_POST['merchantId']);
        $data['merchantId'] = trim($_POST['merchantId']);
        $data['apiKey'] = trim($_POST['apiKey']);
        $data['txnId'] = trim($_POST['txnId']);
        $data['amount'] = trim($_POST['amount']);
        $data['dateTime'] = trim(date('Y-m-d h:i:s'));
        $data['custMail'] = trim($_POST['custMail']);
        $data['custMobile'] = trim($_POST['custMobile']);
        $data['udf1'] = trim($_POST['udf1']);
        $data['udf2'] = trim($_POST['udf2']);
        $data['returnURL'] = trim($_POST['returnURL']);
        $data['productId'] = trim($_POST['productId']);
        $data['channelId'] = trim($_POST['channelId']);
        $data['isMultiSettlement'] = trim($_POST['isMultiSettlement']);
        $data['txnType'] = trim($_POST['txnType']);
        $data['instrumentId'] = trim($_POST['instrumentId']);
        $data['udf3'] = trim($_POST['udf3']);
        $data['udf4'] = trim($_POST['udf4']);
        $data['udf5'] = trim($_POST['udf5']);
        $data['cardDetails'] = trim($_POST['cardDetails']);
        $data['cardType'] = trim($_POST['cardType']);
        $jsondata = json_encode($data);
        $enc = get_encrypt($jsondata);


        //add the Transaction Posting URL
        $url = 'https://pay.1paypg.in/onepayVAS/payprocessorV2';
        $myvars = "merchantId=".$merchantId."&reqData=".$enc;
        $ch = deusBoboPCA_init($url);
        deusBoboPCA_setopt($ch, deusBoboPCAOPT_POST, 1);
        deusBoboPCA_setopt($ch, deusBoboPCAOPT_POSTFIELDS, $myvars);
        deusBoboPCA_setopt($ch, deusBoboPCAOPT_FOLLOWLOCATION, 1);
        deusBoboPCA_setopt($ch, deusBoboPCAOPT_HEADER, 0);
        deusBoboPCA_setopt($ch, deusBoboPCAOPT_RETURNTRANSFER, 1);
        $response = deusBoboPCA_exec($ch);
        ?>
        <script type="text/javascript">
            function redirectRequest() {
                document.myform.submit();
            }
        </script>
    </head>
    <body onload="redirectRequest();">
      <form name="myform" method="post" action="https://pay.1paypg.in/onepayVAS/payprocessorV2">

            <input type="hidden" name="merchantId" value="<?php echo $merchantId; ?>">;
            <input type="hidden" name="reqData" value="<?php echo $enc; ?>">;


        </form>
    </body>
</html>
