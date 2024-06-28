 <?php
 include 'function.php';
 include "connection.php";
 
 //ob_start();

 require 'vendor/razorpay/razorpay/Razorpay.php';

		use Razorpay\Api\Api;
		
		/*$api_key = 'rzp_test_LLHwAOZDXDWzh0';
		$api_secret = 'BDncb5Mx4KLEfzEg3NHmpnbT';*/
		
		$api_key = 'rzp_live_lc48oYscXhAu7X';
		$api_secret = 'HWYXGxNtSwOfwE5ndJAbEicH';


$razorpay = new Api($api_key, $api_secret);



$success = true;

if (empty($_POST['razorpay_payment_id']) === false) {
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $order_id = $_POST['razorpay_order_id'];
    $signature = $_POST['razorpay_signature'];

    try {
        $attributes = array(
            'razorpay_order_id' => $order_id,
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $signature
        );

        $razorpay->utility->verifyPaymentSignature($attributes);
		
		
    } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
        $success = false;
    }
} else {
    $success = false;
}

if ($success === true) {
    if($_GET['memberType'] == 1){
		
            $tableName = "tbl_if_member_student";           
            $sqs = "update {$tableName} set `paymentStatus` = 'SUCCESS' WHERE id = {$_GET['lastId']}";
            $exe = mysqli_query($connect,$sqs);
			//header("Location: ".BASEPATH."");
			//echo "<script>location.href = 'https://afi-india.in/';</script>";
			
			
        }if($_GET['memberType'] == 2){
            $tableName = "tbl_if_member_doctor";
            $sqs = "update {$tableName} set `paymentStatus` = 'SUCCESS' WHERE if_doctor_member_id_pk = {$_GET['lastId']}";
            $exe = mysqli_query($connect,$sqs);
			//header("Location: ".BASEPATH."");
			//echo "<script>location.href = 'https://afi-india.in/';</script>";
			
        }if($_GET['memberType'] == 3){
            $tableName = "tbl_if_member_prof_lect";
            $sqs = "update {$tableName} set `paymentStatus` = 'SUCCESS' WHERE if_member_prof_lect_id_pk = {$_GET['lastId']}";
            $exe = mysqli_query($connect,$sqs);
			//header("Location: ".BASEPATH."");
			//echo "<script>location.href = 'https://afi-india.in/';</script>";
        }
        if($_GET['memberType'] == 4){
            $tableName = "tbl_if_member_pharmacy";
            $sqs = "update {$tableName} set `paymentStatus` = 'SUCCESS' WHERE tbl_if_member_pharmacy_id = {$_GET['lastId']}";
            $exe = mysqli_query($connect,$sqs);
			//header("Location: ".BASEPATH."");
			//echo "<script>location.href = 'https://afi-india.in/';</script>";
        }
        if($_GET['memberType'] == 5){
            $tableName = "tbl_if_member_patron";
            $sqs = "update {$tableName} set `paymentStatus` = 'SUCCESS' WHERE tbl_if_member_patron_id = {$_GET['lastId']}";
            $exe = mysqli_query($connect,$sqs);
			//header("Location: ".BASEPATH."");
			//echo "<script>location.href = 'https://afi-india.in/';</script>";
        }
}


       
    
    if(isset($_GET['lastId']) && !empty($_GET['memberType'])){
        
		
        $lastId = $_GET['lastId'];
        $memberType = $_GET['memberType'];
		
        if($memberType == 1){
            $tableName = "tbl_if_member_student";
            $sqs = "SELECT * FROM {$tableName} WHERE id = {$lastId}";
            $exe = mysqli_query($connect,$sqs);
            if(mysqli_num_rows($exe)>0){
                $row = mysqli_fetch_assoc($exe);
            }
        }if($memberType == 2){
            $tableName = "tbl_if_member_doctor";
            $sqs = "SELECT * FROM {$tableName} WHERE if_doctor_member_id_pk = {$lastId}";
            $exe = mysqli_query($connect,$sqs);
            if(mysqli_num_rows($exe)>0){
                $row = mysqli_fetch_assoc($exe);
            }
        }if($memberType == 3){
            $tableName = "tbl_if_member_prof_lect";
            $query = "SELECT * FROM {$tableName} WHERE if_member_prof_lect_id_pk = {$lastId}";
            $exe = mysqli_query($connect,$query);
            if(mysqli_num_rows($exe)>0){
                $row = mysqli_fetch_assoc($exe);
            }
        }
        if($memberType == 4){
            $tableName = "tbl_if_member_pharmacy";
            $query = "SELECT * FROM {$tableName} WHERE tbl_if_member_pharmacy_id = {$lastId}";
            $exe = mysqli_query($connect,$query);
            if(mysqli_num_rows($exe)>0){
                $row = mysqli_fetch_assoc($exe);
            }
        }
        if($memberType == 5){
            $tableName = "tbl_if_member_patron";
            $query = "SELECT * FROM {$tableName} WHERE tbl_if_member_patron_id  = {$lastId}";
            $exe = mysqli_query($connect,$query);
            if(mysqli_num_rows($exe)>0){
                $row = mysqli_fetch_assoc($exe);
            }
        }
        

		/*$razorpay = new Api($api_key, $api_secret);*/
		//$razorpay = new Api($live_api_key, $live_api_secret);


		$order = $razorpay->order->create([
			'amount' => $row['amount']*100, // Amount in paisa (e.g., 1000 paisa = 10.00 INR)
			/*'amount' => 1*100, // Amount in paisa (e.g., 1000 paisa = 10.00 INR)*/
			'currency' => 'INR',
			'payment_capture' => 1 // Auto capture payment
		]);
		
		/*echo '
		<form action='.$_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'].' method="POST">
			<script src="https://checkout.razorpay.com/v1/checkout.js"
					data-key="' . $api_key . '"
					data-amount="' . $row['amount'] . '"
					data-currency="' . $order['currency'] . '"
					data-order_id="' . $order['id'] . '"
					data-buttontext="Pay with Razorpay"
					data-name="AFI-India"
					data-description="Payment for your order"
					data-image="your_logo_url"
					data-prefill.name="Your Name"
					data-prefill.email="'.$row['email'].'"
					data-prefill.contact="'.$row['phone'].'"
					data-theme.color="#F37254"></script>
			        <input type="hidden" custom="Hidden Element" name="hidden">
		</form>';*/
        
    }
?>
<!--html>
    <head>
        <script type="text/javascript">
            function redirectRequest() {
				
				document.getElementsByClassName("razorpay-payment-button")[0].click();
				//document.getElementsByClassName("razorpay-payment-button").hide();
            }
        </script>
    </head>
    <body  onload="redirectRequest();">
       
    </body>
</html-->
<?php
$data = [
    "key"               => $api_key,
    "amount"            => $order['amount'],
    "contact"           => '+91'.$row['phone'],
    "name"              => "",
    "description"       => "Happy to help :)",
    "image"             => "",
];

$json = json_encode($data);

?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="charge.php" method="POST">
<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
<input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
// Checkout details as a json
var options = <?=$json?>;


options.modal = {
ondismiss: function() {
console.log("This code runs when the popup is closed");
window.location = '/';
},
// Boolean indicating whether pressing escape key
// should close the checkout form. (default: true)
escape: true,
// Boolean indicating whether clicking translucent blank
// space outside checkout form should close the form. (default: false)
backdropclose: false
};
var rzp = new Razorpay(options);
rzp.open();
</script>