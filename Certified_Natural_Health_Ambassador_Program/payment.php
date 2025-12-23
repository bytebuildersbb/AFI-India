<?php
include "connection.php";
include '../function.php';
include "encrption.php";

require '../vendor/razorpay/razorpay/Razorpay.php';
use Razorpay\Api\Api;
// Razorpay credentials
// // test
 $api_key = 'rzp_test_q0ypOYTjC1D936';
 $api_secret = 'N5HQC8Y1H4GR42wMo1HFYH8Z';

// Live
// $api_key = 'rzp_live_oBF2mGQndN1fo2';
// $api_secret = 'c1noXnO4Qrj9G7BXaXFXj3V5';


$api = new Api($api_key, $api_secret);

// Get registration ID
$en_email = isset($_GET['e']) ? decryptData($_GET['e']) : null;
$encryptedFlag = isset($_GET['c']) ? decryptData($_GET['c']) : false;
if (!$en_email) {
    die("Missing Email.");
}

$_SESSION['en_email'] = $en_email; // ✅ Save to session

// Fetch basefare from DB
$stmt = $conn->prepare("SELECT `Name`, `Email ID`, `Program Type` , `Mobile`, `Total Fees`, `New Payment Amount` FROM `Certified Natural Health Ambassador Program Registration` WHERE `Email ID` = ?");
$stmt->bind_param("s", $en_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Invalid registration ID.");
}

$row = $result->fetch_assoc();
$name = $row['Name'];
$email = $row['Email ID'];
$mobile = $row['Mobile'];
if($encryptedFlag == 'true'){
    if($row['New Payment Amount'] * 100 <= 1){
        $amount = $row['Total Fees'] * 100; // Razorpay needs amount in paisa
    }else{
        $amount = $row['New Payment Amount'] * 100; // Razorpay needs amount in paisa
    }
}else{
    $amount = $row['Total Fees'] * 100; // Razorpay needs amount in paisa
}



$url = "https://afi-india.in/Certified_Natural_Health_Ambassador_Program/payment_response.php";
$data = [
    "key" => $api_key,
    "amount" => $amount,
    "callback_url" => $url,
    "description" => "Certified Natural Health Ambassador Program Payment",
    "prefill" => [
        "name" => $name,
        "email" => $email,
        "contact" => $mobile,
    ]
];

$json = json_encode($data);
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form name='razorpayform' action="payment_response.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="$name" id="$name" value="<?php echo htmlspecialchars($name); ?>">
    <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="hidden" name="mobile" id="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
</form>

<script>
var options = <?= $json ?>;

options.modal = {
    ondismiss: function() {
        window.location = 'https://afi-india.in/Certified_Natural_Health_Ambassador_Program.php';
    },
    escape: true,
    backdropclose: false
};

var rzp = new Razorpay(options);
rzp.open();
</script>
