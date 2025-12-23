
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "connection.php";

session_start();

// Razorpay credentials
// // test
 $api_key = 'rzp_test_q0ypOYTjC1D936';
 $api_secret = 'N5HQC8Y1H4GR42wMo1HFYH8Z';

// Live
// $api_key = 'rzp_live_oBF2mGQndN1fo2';
// $api_secret = 'c1noXnO4Qrj9G7BXaXFXj3V5';


$razorpay_payment_id = $_POST['razorpay_payment_id'];

// Step 1: Call Razorpay API to get payment details
$curl = curl_init();
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
    exit;
}
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.razorpay.com/v1/payments/' . $razorpay_payment_id . '?expand[]=card',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic ' . base64_encode($api_key . ':' . $api_secret)
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$response_data = json_decode($response, true);

if (!$response_data || isset($response_data['error'])) {
    echo "❌ Failed to fetch payment details.";
    exit;
}

// Step 2: Extract required details
$payment_id = $response_data['id'];
$amount = $response_data['amount'] / 100; // Convert paisa to INR
$status = $response_data['status'];
$email = $response_data['email'];
$contact = $response_data['contact'] ?? $contact;
$created_at = date("Y-m-d H:i:s");

// echo ($status);
$isSuccess = ($status === 'authorized');

$icon = $isSuccess 
    ? 'https://cdn-icons-png.flaticon.com/512/845/845646.png' 
    : 'https://cdn-icons-png.flaticon.com/512/463/463612.png';

$heading = $isSuccess ? 'Payment Successful' : 'Payment Failed';
$subtext = $isSuccess 
    ? "You will be contacted shortly by one of our executives." 
    : "Your payment could not be completed. Please try again.";

$statusClass = $isSuccess ? 'success' : 'error';
$btnText = $isSuccess ? 'Done' : 'Try Again';
$redirectUrl = 'https://afi-india.in/Certified_Natural_Health_Ambassador_Program.php'; // You can change this as needed


$stmt = $conn->prepare("SELECT `Id` FROM `Certified Natural Health Ambassador Program Registration` WHERE `Email ID` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Invalid registration ID.");
}
$row = $result->fetch_assoc();
$RegistrationRecordId = $row['Id'];

// Step 3: Insert into Transactions Table
$insertQuery = "INSERT INTO `Certified Natural Health Ambassador Program Transaction` 
    (`Registration Form ID`, `Contact`, `Email`, `Amount`, `PaymentId`, `Status`, `CreatedTime`) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";

$insertStmt = $conn->prepare($insertQuery);
$insertStmt->bind_param("issdsss", $RegistrationRecordId, $contact, $email, $amount, $payment_id, $status, $created_at);

if ($insertStmt->execute()) {
    // Step 4: Update Registration Table with Payment Info
    $updateQuery = "UPDATE `Certified Natural Health Ambassador Program Registration` 
        SET `Payment ID` = ?, `Payment Status` = ? 
        WHERE `Id` = ?";

    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ssi", $payment_id, $status, $RegistrationRecordId);
    $updateStmt->execute();

    // Success message
    // echo "<h2>✅ Payment Successful</h2>";
    // echo "<p><strong>Payment ID:</strong> $payment_id</p>";
    // echo "<p><strong>Status:</strong> $status</p>";
    // echo "<p><strong>Amount:</strong> ₹$amount</p>";
    // echo "<script>setTimeout(() => window.location.href='https://afi-india.in/2-Day-Online-CME.php', 5000);</script>";
} else {
    echo "❌ DB Error: " . $insertStmt->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment <?php echo $heading; ?></title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="paymentScreen">
    <div class="container">
        <div class="payment-box <?php echo $statusClass; ?>">
            <div class="payment-box-header">
                <img src="<?php echo $icon; ?>" alt="<?php echo $heading; ?>" class="status-icon">
                <div class="heading"><?php echo $heading; ?></div>
                <div class="amount">₹<?php echo $amount; ?></div>
            </div>

            <div class="payment-box-content">
                <table>
                    <tr>
                        <td class="left">Transaction ID:</td>
                        <td class="right"><?php echo $payment_id; ?></td>
                    </tr>
                    <tr>
                        <td class="left">Email:</td>
                        <td class="right"><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td class="left">Contact:</td>
                        <td class="right"><?php echo $contact; ?></td>
                    </tr>
                    <tr>
                        <td class="left">Date:</td>
                        <td class="right"><?php echo $created_at; ?></td>
                    </tr>
                </table>
            </div>

            <div class="payment-box-centerLine">
                <?php echo $subtext; ?>
                <div class="ver-sep"></div>
                If you have any queries, feel free to contact us at:<br/>
                Email: ayurvedafederation@gmail.com<br/>
                Phone: 9220358400
            </div>

            <div class="payment-box-footer">
                <button type="button" class="done-btn" onclick="window.location.href='<?php echo $redirectUrl; ?>'"><?php echo $btnText; ?></button>
            </div>
        </div>
    </div>
</body>
</html>
