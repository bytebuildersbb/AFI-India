 <?php
 include "mailer/vendor/autoload.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

//membership("fdfdsfds","fdsfdsfd","3","dfdsfdsf");
function membership($email,$name,$type,$mob){
    if($type==1){
    $types="Students Membership (Only For Ayurveda Student’s)";
    }
    elseif($type==2){
     $types="Life Membership (Only For Doctor’s)";   
    }
    elseif($type==3){
      $types="Associate Membership (Only For Non - Ayurveda Professional’s)";  
    }
     elseif($type==4){
      $types="Pharma Membership";  
    }
     else{
        $types="Patron Membership";
    }
      $messageBody = "<h4>New Membership Form Submitted For $types</h4><p>Name: $name; </p><p>Email: $email; </p><p>Mobile: $mob; </p><p><a href='https://afi-india.in/admin/index'>Click here to see more details</a></p>";
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
      $mail->Subject = "New Membership Form Request";
      $mail->Body = $messageBody;
     $mail->AddAddress('info@afi-india.in');
    // $mail->AddAddress('mohitcool.mohit@gmail.com');
      if(!$mail->Send()){
         echo "Mailer Error: " . $mail->ErrorInfo;
      }
}
//cource("fdfdsfds","fdsfdsfd","6","dfdsfdsf");
function cource($email,$name,$CCC,$mobileNo){
$host       = "localhost";
$user       = "afiinsd_site";
$pass       = "_x]=1!~HtH8h";
$database   = "afiinsd_site";
$connect = new mysqli($host, $user, $pass, $database);
$query = "SELECT * FROM tbl_course where course_id_pk='$CCC'";
$runQuery   =  $connect->query($query);
$row  = $runQuery->fetch_object();
$c=$row->course_duration;
      $messageBody = "<h4>New Course Form Submitted For $c;</h4><p>Name: $name; </p><p>Email: $email; </p><p>Mobile: $mobileNo; </p><p><a href='https://afi-india.in/admin/index'>Click here to see more details</a></p>";
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
      $mail->Subject = "New Course Form Request";
      $mail->Body = $messageBody;
    $mail->AddAddress('info@afi-india.in');
     //$mail->AddAddress('mohitcool.mohit@gmail.com');
      if(!$mail->Send()){
         echo "Mailer Error: " . $mail->ErrorInfo;
      }
}
function PAYY($FormType,$txnamount,$email,$phnumber){
      $messageBody = "<h4>The Amount INR $txnamount is received For $FormType</h4><p>Customer Email: $email; </p><p>Customer Mobile: $phnumber; </p><p><a href='https://afi-india.in/admin/index'>Click here to see more details</a></p>";
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
      $mail->Subject = "Payment Received";
      $mail->Body = $messageBody;
     $mail->AddAddress('info@afi-india.in');
    // $mail->AddAddress('mohitcool.mohit@gmail.com');
      if(!$mail->Send()){
         echo "Mailer Error: " . $mail->ErrorInfo;
      }
}
     ?>