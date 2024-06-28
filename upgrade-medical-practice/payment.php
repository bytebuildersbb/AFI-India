<?php
 include "connection.php";
 include '../function.php';

// Include the Razorpay PHP library
 require '../vendor/razorpay/razorpay/Razorpay.php';

use Razorpay\Api\Api;

    // old 
     $api_key = 'rzp_live_lc48oYscXhAu7X';
	 $api_secret = 'HWYXGxNtSwOfwE5ndJAbEicH';

    // test
    // $api_key = 'rzp_test_lZq53hFQwB0aZh';
    // $api_secret = '6rL6KC7Hg2xwyXAR3s6eHvDf';

    //live
    // $api_key = 'rzp_live_lc48oYscXhAu7X';
    // $api_secret = 'HWYXGxNtSwOfwE5ndJAbEicH';

// Initialize Razorpay API with your key and secret
$api = new Api($api_key, $api_secret);

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

?>

<?php
$sql = "SELECT coupon_code FROM upgrade_medical_form_coupon";
$result = $conn->query($sql);

// Array to store all available coupons
$available_coupons = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Store each coupon code in the array
        $available_coupons[] = $row["coupon_code"];
    }
}

$conn->close();


$coupon_from_form = strtoupper(isset($_GET['coupon']) ? urldecode($_GET['coupon']) : '');


// Check if the user-entered coupon matches any of the available coupons
if (in_array($coupon_from_form, $available_coupons)) {
    $amount = 210000; // Coupon matched, set amount to 210000
} else {
    $amount = 510000; // Coupon not matched, set amount to 510000
}


$url= "https://afi-india.in/upgrade-medical-practice/payment_response.php";

$data = [
"key"               => $api_key,
"amount"            => $amount, // Amount in paisa (e.g., 1000 paisa = 10.00 INR)*/
"callback_url"      => $url,   
"description"       => "Happy to help :)",


];          

$json = json_encode($data);

?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<form name='razorpayform' action="payment_response.php" method="POST">
<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
<input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
<input type="hidden" name="name" id="name"  value="<?php echo $_GET['name']; ?>">
<input type="hidden" name="email" id="email" value="<?php echo $_GET['email']; ?>">



</form>


<script>


// Checkout details as a json
var options = <?=$json?>;
// console.log(options);

options.modal = {
    
ondismiss: function() {
console.log("This code runs when the popup is closed");
window.location = 'https://afi-india.in/upgrade-medical-practice/';
},
escape: true,
backdropclose: false


};
var rzp = new Razorpay(options);
rzp.open();
</script>
