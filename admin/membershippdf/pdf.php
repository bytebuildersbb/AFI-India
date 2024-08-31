<?php
// print_r($_GET['mailid']);die;
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
require_once '../../vendor/autoload.php';
use Dompdf\Dompdf;  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

// Get data from query parameters
$address = isset($_GET['address']) ? $_GET['address'] : '';
$image = isset($_GET['image']) ? $_GET['image'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$fathername = isset($_GET['fname']) ? $_GET['fname'] : '';
$pin = isset($_GET['pin']) ? $_GET['pin'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$mailid = isset($_GET['mailid']) ? $_GET['mailid'] : '';
$date = date('d-m-Y');
   $time = rand(1000, 9999);

if ($type == 'STUDENT') {
    $doc1 = [
        'name' => 'Dr. Pallav Prajapati',
        'des' => 'President',
        'dep' => 'Student committee',
        'img' => './images/Dr. Pallav Prajapati.png'
    ];
    $doc2 = [
        'name' => 'Dr. Manish Gautam',
        'des' => 'National Co-ordinator',
        'dep' => 'Ayurveda Federation of India',
        'img' => './images/Dr. Manish Gautam.png'
    ];

}
elseif($type == 'LIFETIME' ||  $type == 'PATRON'){
     $doc1 = [
        'name' => 'Dr. Sanjay Jakhar',
        'des' => 'National President',
        'dep' => '',
        'img' => './images/Dr. Sanjay Jakhar.png'
    ];
    $doc2 = [
        'name' => 'Dr. Dhanvantri Tyagi',
        'des' => 'National General Secretary',
        'dep' => '',
        'img' => './images/Dr. Dhanvanti Tyagi.png'
    ];
}



// Create Dompdf instance

$dompdf = new Dompdf();
// print_r ($dompdf);die;

// HTML content for the PDF
$html = '
<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Membership Certificate</title>
      <style>
       
            @import url("https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap");
            
        body {
            font-family: "Kaushan Script", cursive;
        }


    </style>
   </head>
   <body style="margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;  text-align: center;">

    <div style="position: relative;  ;">
        <img src="data:image/png;base64,'. base64_encode(file_get_contents( 'images/afi_cert.png' )) . '" style="background-repeat: no-repeat;top:0%; position:absolute;" alt="" width="99%">

        <!-- Date and Time -->
        <div style="position:relative;">
            <h5 style="position: absolute; color: #000;top:7.5%; left:18%; ">'. htmlspecialchars($date) .'</h5>
        </div>
        <div style="position:relative;">
            <h5 style="position: absolute; color: #000;top:7.5%;right:14%;">AFI/M/'. htmlspecialchars($time) .'</h5>
        </div>

        <!-- Name -->
        <p style="position: absolute; top: 43%; left: 50%; transform: translateX(-50%); font-size: 18px; color: #917507; margin: 0;">
            '. htmlspecialchars($name) .'
        </p>

        <!-- Father"s Name -->
        <p style="position: absolute; top: 47%; left: 50%; transform: translateX(-50%); font-size: 16px; color: #202021; margin: 0;">
            S/o '. htmlspecialchars($fathername) .'
        </p>

        <!-- Address -->
        <p style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%); font-size: 16px; color: #202021; margin: 0;">
            Resident of '. htmlspecialchars($address) .'
        </p>

        <!-- Type of Member -->
        <p style="position: absolute; bottom: 39%; left: 50%; transform: translateX(-50%); font-size: 16px; margin: 0;"> 
            As a '. htmlspecialchars($type) .' Member
        </p>
    </div>
   
   </body>
   </html>
';


// Load HTML content into Dompdf
$dompdf->loadHtml($html);
$dompdf->set_option('isRemoteEnabled', TRUE); 

// Set paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render PDF (generate PDF)
$dompdf->render();

$pdfContent = $dompdf->output();

// Output PDF to browser
//  $dompdf->stream('certificate.pdf', ['Attachment' => 0]);die;

$temp_file_path = './temp_pdf/'.time().'_temp_file.pdf';
file_put_contents($temp_file_path, $pdfContent);    


$subject= "$type MEMBERSHIP CERTIFICATE";
$type1 = strtolower($type);
$type1 = ucfirst($type1);

$msg= "<p>Hello $name,</p>

<p>I hope this email finds you well.</p>

<p>Attached to this email, you will find the certificate for the <b>$type1</b> course.</p>

<p>If you have any questions or need further assistance, feel free to reach out.</p>

<p>Best regards,<br>AFI</p>
";
$mailDetails = $mailid;



echo smtp_mailer($mailDetails,$subject,$msg, $temp_file_path);
function smtp_mailer($to,$subject, $msg, $attachment_path){

	$mail = new PHPMailer(); 
   	$mail->IsSMTP(); 
   	$mail->SMTPAuth = true; 
   	$mail->SMTPSecure = false; 
   	$mail->Host = "mail.jeenasikho.co.in";
   	$mail->Port = 2525; 
   	$mail->IsHTML(true);
   	$mail->CharSet = 'UTF-8';
   	$mail->SMTPDebug = 2; 
   	$mail->Username = "contact@afi-india.in";
   	$mail->Password = "Admin@7788";
    $mail->addAttachment($attachment_path);
   	$mail->SetFrom("contact@afi-india.in");
   	$mail->Subject = $subject;
   	$mail->Body =$msg;
   	$mail->AddAddress($to);
   	$mail->SMTPOptions=array('ssl'=>array(
   		'verify_peer'=>false,
   		'verify_peer_name'=>false,
   		'allow_self_signed'=>false
   	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
		unlink($attachment_path);
	}else{
        unlink($attachment_path);
		header("Location: https://afi-india.in/admin/form/index");
	}
}
exit();
?>