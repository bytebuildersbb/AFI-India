
<?php
    include "connection.php";

// old 
    $api_key = 'rzp_live_lc48oYscXhAu7X';
	$api_secret = 'HWYXGxNtSwOfwE5ndJAbEicH';

    // test
   // $api_key = 'rzp_test_lZq53hFQwB0aZh';
    //$api_secret = '6rL6KC7Hg2xwyXAR3s6eHvDf';



// Parse Razorpay payment response data
$razorpay_payment_id = $_POST['razorpay_payment_id'];




?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.razorpay.com/v1/payments/'.$razorpay_payment_id. '?expand[]=card',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic'. base64_encode($api_key . ':' . $api_secret)
  )
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;

$response_data = json_decode($response, true);

$payment_id = $response_data['id'];
// $order_id = $response_data['order_id'];
$amount = $response_data['amount'];
// $currency = $response_data['currency'];
$status = $response_data['status'] === 'captured' || $response_data['status'] === 'authorized' ? 'success' : null;
$email = $response_data['email'];
$contact = preg_replace('/^\+91/', '', $response_data['contact']);
// $contact = $response_data['contact'];
// $wallet = $response_data['wallet'];
// $created_at = $response_data['created_at'];

// Prepare an SQL query to insert or update data into your database
$query = "INSERT INTO  `upgrade_medical_practice_transaction` (contact, email, amount, payment_id, status)
 VALUES ('$contact','$email',". ($amount/100) .",'$payment_id','$status')";

// Execute the SQL query
if (mysqli_query($conn, $query)) {
    // Redirect to index.php with contact information as URL parameters
        // echo '<script>window.location.href ="index.php?contact=' . urlencode($contact, $email) . '";</script>';
        echo '<script>window.location.href ="index.php";</script>';

    

    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>


