 <?php
 include "mailer/vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

   /* $name = $_POST['name'];
    $email = $_POST['emailid'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $specifications = $_POST['specifications'];*/

      $messageBody = "<h2>New astrologer registration request</h2>";
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
      $mail->Subject = "New request for astrloger registration";
      $mail->Body = $messageBody;
      $mail->AddAddress('mohitcool.mohit@gmail.com');
      if(!$mail->Send()){
         echo "Mailer Error: " . $mail->ErrorInfo;
      }
     ?>