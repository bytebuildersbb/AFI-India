 <?php
 include "mailer/vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

function IDcard($name,$e,$mob){
      $messageBody = "<h4>New ID card Form Submitted</h4><p>Name: $name; </p><p>Email: $e; </p><p>Mobile: $mob; </p><p><a href='https://afi-india.in/admin/index'>Click here to see more details</a></p>";
      $mail = new PHPMailer(); // create a new object
      // $mail->IsSMTP(); // enable SMTP
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
      $mail->Host = "afi-india.in";
      $mail->Port = 465; // or 587-465
      $mail->IsHTML(true);
      $mail->Username = "noreply@afi-india.in";                 
      $mail->Password = "UDv^[je$4Ru0";          
      $mail->SetFrom("noreply@afi-india.in");
      $mail->Subject = "New ID Card Form Request";
      $mail->Body = $messageBody;
     $mail->AddAddress('info@afi-india.in');
    // $mail->AddAddress('mohitcool.mohit@gmail.com');
      if(!$mail->Send()){
         echo "Mailer Error: " . $mail->ErrorInfo;
      }
}
     ?>