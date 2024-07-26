<?php
require_once "connection.php"; // Assuming this file includes necessary connection details or functions
require_once './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_GET['name'] ?? ''; // Using ?? to provide a default value if $_GET['name'] is not set
$email = $_GET['email'] ?? ''; // Using ?? to provide a default value if $_GET['email'] is not set

$subject = "Thank You for Your Submission";

$msg = '<h4 style="margin: 1; line-height: 1;">Dear ' . $name . ',</h4><br><h5 style="margin: 0; line-height: 0;">Thank you for submitting your response. We have received your information and will be in touch shortly.</h5><br><h5 style="margin: 0; line-height: 0;">If you have any urgent inquiries, feel free to contact us at +91 8595336710 or +91 6266581832.</h5><br><h5 style="margin: 0; line-height: 0;">Best regards,</h5><br><h5 style="margin: 1; line-height: 1;">Ayurveda Federation of India</h5>';

// Function to send email and render thank you page
function send_email_and_render_thank_you($to, $subject, $msg) {
    $mail = new PHPMailer(true); // Passing true enables exceptions

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = "mail.jeenasikho.co.in";
        $mail->SMTPAuth = true;
        $mail->Username = "contact@afi-india.in";
        $mail->Password = "Admin@7788";
        $mail->SMTPSecure = false; // Set to true if your SMTP server requires encryption
        $mail->Port = 2525; // Change this to your SMTP port

        // Recipients
        $mail->setFrom("contact@afi-india.in");
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $msg;

        $mail->send();

        // Render thank you HTML after sending email
        render_thank_you_page($name);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to render thank you page
function render_thank_you_page($name) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You!</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
        /* Add your additional styles here */
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
<header class="site-header" id="header">
    <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
</header>
<div class="main-content">
    <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
    <p class="main-content__body" data-lead-id="main-content-body">Hi, <?php echo $name; ?></p>
    <p>Thank you for submitting your work! Your contribution means a lot to us.</p>
    <p>Your response has been successfully submitted.</p>
    <p>We will contact you via email shortly. Please check your email for more details.</p>
    <div class="phone-numbers">
        <p>If you have any urgent queries, you can also reach us at:</p>
        <p><strong>Phone:</strong> +91 8595336710, +91 6266581832</p>
    </div>
    <p>Thank you again for choosing us. We look forward to connecting with you soon!</p>
    <a href="index.php" class="btn">Go to Homepage</a>
</div>
</body>
</html>
<?php
}

// Call function to send email and render thank you page
send_email_and_render_thank_you($email, $subject, $msg);
?>
