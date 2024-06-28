<?php
include "connection.php";
 include '../function.php';

 require '../vendor/razorpay/razorpay/Razorpay.php';

use Razorpay\Api\Api;

    //old
    $api_key = 'rzp_live_lc48oYscXhAu7X';
	$api_secret = 'HWYXGxNtSwOfwE5ndJAbEicH';

    //test
    // $api_key = 'rzp_test_lZq53hFQwB0aZh';
    // $api_secret = '6rL6KC7Hg2xwyXAR3s6eHvDf';

    //live
    // $api_key = 'rzp_live_lc48oYscXhAu7X';
    // $api_secret = 'HWYXGxNtSwOfwE5ndJAbEicH';

// Initialize Razorpay API with your key and secret
$api = new Api($api_key, $api_secret);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $dob = trim($_POST["dob"]);
    $whatsapp = trim($_POST["whatsapp"]);
    $mobile = trim($_POST["mobile"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $pincode = trim($_POST["pincode"]);
    $qualification = trim($_POST["qualification"]);
    $coupon = trim($_POST["coupon"]);
    

    if (empty($name) || empty($dob) || empty($whatsapp) || empty($mobile)|| empty($email)  ) {
        echo "All fields are required.";
    } else {
        // Insert data into database
        $sql = "INSERT INTO health_ambassador_form (name, dob, whatsapp, mobile, email, address, pincode, qualification, coupon_applied)
                VALUES ('$name', '$dob', '$whatsapp', '$mobile', '$email', '$address', '$pincode', '$qualification', '$coupon')";

        if ($conn->query($sql) === TRUE) {
            $encoded_coupon = urlencode($coupon);

            header("Location: payment.php?coupon=$encoded_coupon");
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close database connection
    $conn->close(); 
} else {
    echo "Name: $name<br>";
    echo "Date of Birth: $dob<br>";
    echo "WhatsApp No.: $whatsapp<br>";
    echo "Mobile No.: $mobile<br>";
    echo "Email: $email<br>";
    echo "Address: $address<br>";
    echo "Pin Code: $pincode<br>";
    echo "Qualification: $qualification<br>";
    echo "Coupon: $coupon<br>";
}
?>
