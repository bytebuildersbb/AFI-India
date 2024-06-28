<?php
// print_r($_GET['type']);die;
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
elseif($type == 'DOCTOR' ||  $type == 'PATRON'){
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

   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Membership Certificate</title>
       <style>
           
           .certificate {
               width: 800px;
               background: white;
               padding: 20px;
               box-shadow: 0 0 10px rgba(0,0,0,0.1);
               position: relative;
               margin: 0 auto;
               overflow: hidden;
               height: 10vh;
           }
           .cont{
           max-width: 500px;
           margin-top: 120px;
           }
           .header {
               text-align: center;
           }
          .header p{
           font-size: 13px;
           font-family: Arial, Helvetica, sans-serif;
          }
           .title {
               font-size: 22px;
               font-weight: bold;
               color: #DAA520;
               text-align: center;
              
           }
           .content {
               text-align: center;
               font-size: 18px;
               
           }
           .content .name {
               font-size: 22px;
               font-weight: bold;
               color: #DAA520;
               margin: 10px 0;
               
           }
           .content p {
               margin: 0px auto;
               font-size: 12px;
               font-weight: 400;
               text-align:center;
               width:100%;
           }
     
           .photo img {
               width: 243px;
               position: absolute;
               right: 0;
               top: -86px;
   
           }
           .topwave > img{
               position: absolute;
               top: 0;
               left: 0;
               z-index: 10;
               height: 150px;
               width: 75%;    
           }
           .logo > img{
               position: absolute;
               z-index: 20;
               left: 164px;
               top: 0px;
               height: 150px
           }
          
       </style>
   </head>
   <body>
   
       <div class="certificate" style="border:2px solid #057735;" >
           <div class="topwave">
               <img src="data:image/png;base64,' . base64_encode(file_get_contents( 'images/top-bg.png' )) .'" style=" background-repeat: no-repeat;" alt="" >
           </div>
   
           <div class="logo">
               <img src="data:image/png;base64,' . base64_encode(file_get_contents( 'images/logo.png' )) .'"  alt="">
           </div>
         <div class="cont" >
           <div class="header">
               
               <p style="font-size:13px;">A constituent body of ‘Ayurveda vigyan forum’ reg. with Ministry of corporate affairs, Government of India</p>
               <p style="font-size:13px;">Admn. Off.: D-50, First Floor, Sector 122, Noida, District Gautambudh </p>
           </div>
           <div class="title">
              ' . htmlspecialchars($type) . ' MEMBERSHIP CERTIFICATE
           </div>
           <div class="content">
               <p>This certificate has been presented to</p>
               <p class="name">' . htmlspecialchars($name) . '</p>
               <p>' . htmlspecialchars($address) . '</p>
   
               <table class="signature-table" style=" width: 100%; border-collapse: collapse; margin-left:0px;  line-height:9.5px; ">
                <tr>
               <td style="padding: 20px; ">
                <div style="text-align:center;margin-bottom: 15px;">
               <img src="data:image/png;base64,' . base64_encode(file_get_contents( 'images/dr.abhishakesign.png' )) .'" alt="Signature" style="height:15px; max-width: 120px;object-fit:cover;">
               </div>
               <p style="margin:5px 0;" ><b>DR. ABHISHEK GUPTA</b></p>
               <p style="text-align-center;font-size: 11px;margin-bottom:5px;">Founder</p>
               <p style="font-size:11px; text-align:center;">Ayurveda Federation of India</p>
           </td>
   
           <td style="padding: 20px; text-align-center;">
              <div style="text-align:center;    margin-bottom: 5px;">
               <img style="max-width: 50px;" src="data:image/png;base64,' . base64_encode(file_get_contents($doc1['img'])) .'" alt="Signature">
               </div>
               <p style="style="max-width:250px;margin:10px auto;text-align:center;"><b>' . htmlspecialchars($doc1['name']) . '</b></p>
               <p style="font-size: 11px;text-align:center;margin:5px 0;">' . htmlspecialchars($doc1['des']) . '</p>
               <p style="font-size:11px;text-align-center;">' . htmlspecialchars($doc1['dep']) . '</p>
           </td>



           <td style="padding: 20px;">
            <div style="text-align:center; margin-bottom: 5px;">
                <img style="max-width: 50px;" src="data:image/png;base64,' . base64_encode(file_get_contents($doc2['img'])) .'" alt="Signature">
               <p style="style="max-width:150px;margin:0px auto;text-align:center;"><b>' . htmlspecialchars($doc2['name']) . '</b></p>
               <p style="font-size: 11px;text-align:center;margin:5px 0;">' . htmlspecialchars($doc2['des']) . '</p>
               <p style="font-size:11px;text-align:center">' . htmlspecialchars($doc2['dep']) . '</p>
           </td>
               </tr>
                   </table>
               </div>
   
           <div class="photo" >
               <img src="data:image/jpg;base64,' . base64_encode(file_get_contents($image)) . '" style="margin-top:120px;  padding-right: 30px; border-radius: 20px;">
               <div class="foot" style="position: relative; bottom:0%; left: 130px; height: 50%; width: 110%; ">
                        <p
                           style="margin-top:0; text-align: center;font-size: 12px; line-height: 15px;   font-weight: 400;  color: #000;">
                           A Leading Organization, working tirelessly for Ayurveda Practitioners, Students, Researchers. Pioneers of Ayurveda on Global scale.</p>
                       <p
                           style="padding: 0 20px;text-align: center;font-size: 12px; line-height: 15px; font-weight: 400;  color: #000;">
                           Admn. Off.: D-50, First Floor, Sector 122, Noida, District Gautambudh Nagar, Uttar Pradesh-201316</p>
                           </div>
                    <div style="position:absolute; bottom: 230px; width:100%; left:0; right:0;">
                    <img src="data:image/png;base64,' . base64_encode(file_get_contents( 'images/bottom-bg.png' )) .'"  alt="bottom-image" style="width:100% " ;>
                    </div>       
           
         </div>
           </div>
           
       
       </div>
   </body>
   </html>
';

// echo $html;
// die;
// Load HTML content into Dompdf
$dompdf->loadHtml($html);
$dompdf->set_option('isRemoteEnabled', TRUE);

// Set paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render PDF (generate PDF)
$dompdf->render();

$pdfContent = $dompdf->output();

// Output PDF to browser
 $dompdf->stream('certificate.pdf', ['Attachment' => 0]);

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
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->SMTPDebug = 2; 
	$mail->Username = "ayurvedafederation@gmail.com";
	$mail->Password = "qbjpsszvqjsizzfs";
 $mail->addAttachment($attachment_path);
	$mail->SetFrom("ayurvedafederation@gmail.com");
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