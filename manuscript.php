<?php
include "connection.php";
    ob_start();
//     error_reporting(E_ALL);
// ini_set('display_errors', 1);
   require_once './vendor/autoload.php';
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require './vendor/phpmailer/phpmailer/src/Exception.php';
   require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
   require './vendor/phpmailer/phpmailer/src/SMTP.php';

    
    $filename =  $_FILES['uploaded_file']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $filepath = $_FILES['uploaded_file']['tmp_name']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    
    $temp_file_path = './manutemp/'.$name.time().'.'.$extension;
   
    
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $sql = "INSERT INTO tbl_manuscript (name, email, title, phone, message, filepath)
                VALUES ('$name', '$email', '$title', '$phone', '$message',  '$temp_file_path')";
                
         if ($connect ->query($sql) === TRUE) {
            

        } else {
            echo "Error: " . $sql . "<br>" . $connect ->error;
        }
    }    
   
   

    strcmp($temp_file_path, file_get_contents($filepath));    
   
     
   $subject= "Manuscript from $name";

$msg = '<h4 style="margin: 1; line-height: 1;">Dear sir/maam,</h4><p style="margin: 1; line-height: 1;">Following user has submitted the manuscript:</p><br><p style="margin: 0; line-height: 0;"><strong>Name: </strong>'.$name.'</p><br><p style="margin: 0; line-height: 0;"><strong>Email: </strong>'.$email.'</p><br><p style="margin: 0; line-height: 0;"><strong>Phone Number: </strong>'.$phone.'</p><br><p style="margin: 0; line-height: 0;"><strong>Title of Article: </strong>'.$title.'</p><br><p style="margin: 0; line-height: 0;"><strong>Message: </strong>'.$message.'</p>';
  
$mailDetails = 'editorialagnivesh@afi-india.in';


echo smtp_mailer($mailDetails,$subject,$msg, $temp_file_path , $name, $email);
   function smtp_mailer($to,$subject, $msg, $attachment_path,$person, $personmail){
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
   	}else{
     $params = http_build_query([
      'name' =>$person,
      'email' => $personmail
      ]); 
    
    header("Location: manuscript_thanks.php?" . $params);
        
   	}
   }
?>