<?php
// print_r($_GET);die;
    ob_start();
require_once './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

$email = $_GET['email'];
$mailDetails = base64_decode(urldecode($email));
 
$subject= "Welcome to Ayurveda Federation of India";

$msg= "
<!DOCTYPE html>
<html lang='hi'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #F4F4F4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding: 10px;
            display: flex;
        }
        .img{
            display: flex;
            align-items: center;
        }
        .header img {
            height: 100px;
        }
        .header h1 {
            color: #0283C6;
            margin: 10px 0;
        }
        .header p {
            margin: 5px 0;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #555555;
            text-align: left;
            padding: 10px;
            border-top: 1px solid #DDDDDD;
        }
        a {
            color: #1E88E5;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        p {
            margin: 0 0 15px 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <div class='img'>
                <img src='cid:logo' alt='Ayurveda Federation of India Logo'>
            </div>
            <div class='header-content'>
                <h1>Ayurveda Federation of India</h1>
                <p style='font-size: 14px; color: #555;'>A constitutional body of \"AYURVEDA VIGYAN FORUM\"</p>
                <p style='font-size: 12px; color: #555;'>
                Sec. 8 Co., Registration No. U85300DL2021NPL383074 with Ministry of Corporate Affairs, Govt. of India<br>
                Regd. Off.: B-11, New Multan Nagar, Shakur Basti Depo, New Delhi-110056
                </p>
                <p style='font-size: 12px; color: #555;'>
                Website: <a href='http://www.afi-india.in' style='color: #0283C6;'>www.afi-india.in</a> |
                Email: <a href='mailto:info@afi-india.in' style='color: #0283C6;'>info@afi-india.in</a><br>
                Phones: 8799701700
                </p>
            </div>
        </div>
        <div class='content'>
            <p>
                आयुर्वेद फेडरेशन ऑफ़ इंडिया (ए.एफ.आई.) की टीम की ओर से आपका स्वागत है, हमें संगठन में हमेशा नए सदस्यों को जोड़कर बहुत खुशी होती है क्योकिं वे हमेशा हमारे संगठन में नए विचार और ऊर्जा लाते हैं।
            </p>
            <p>
                ए.एफ.आई. आयुर्वेद के उन सभी अग्रदूतों के लिए एक विशेष और महत्त्वपूर्ण मंच है जो अपने कार्य और पेशे में उत्कृष्टता प्राप्त करने का प्रयास करना चाहते हैं।
            </p>
            <p>
                एक दूसरे के साथ पेशेवर या सामाजिक संपर्क विकसित करके अपने करियर में सफल होना हमारा सबसे मूल्यवान उपकरण होता है। इसी बात को ध्यान में रखकर ए.एफ.आई. के मंच का निर्माण किया गया है जिससे हम सभी आपस में अपने सिस्टम से जुड़े लोगों के साथ बेहतर रूप में समन्वय और संवाद करके व एकदूसरे के सकारात्मक विचारों, सुझावों और ऊर्जाओं के साथ मिलकर आयुर्वेद में बेहद आवश्यक व महत्त्वपूर्ण परिवर्तन करके एक ऐसे वातावरण का निर्माण कर सकें जिसपर न सिर्फ हम सभी गर्व कर सकें अपितु हमारे माध्यम से देश व दुनिया के लोग बेहतर शारीरिक व मानसिक स्वास्थ्य प्राप्त कर सकें।
            </p>
            <p>
                आने वाले समय में आपको हमारे संगठन के सदस्यों से परिचित होने के कई अवसर भी लगातार प्राप्त होंगे। हमें उम्मीद है कि आप ए.एफ.आई. की स्वयंसेवी परियोजनाओं और समितियों में सेवा करने का लाभ उठाएंगे व संगठन के लक्ष्यों, उद्देश्यों की प्राप्ति एवं संगठन में नए सदस्यों को अधिक से अधिक संख्या में जोड़ने में अपनी सक्रीय भूमिका निभाएंगे।
            </p>
            <p>
                संगठन से जुड़ी विभिन्न गतिविधियों और जानकारियों को आप अपनी वेबसा <a href='http://www.afi-india.in/'>www.afi-india.in</a> के माध्यम से देख सकते हैं।
            </p>
            <p>
                आशा है आपके सकारात्मक विचार, सुझाव और सहयोग हमें निरंतर प्राप्त होते रहेंगे, किसी भी तरह के संवाद के लिए आप संगठन के संपर्क सूत्र 8595336710 व ईमेल <a href='mailto:ayurvedafederation@gmail.com'>ayurvedafederation@gmail.com</a> पर हमें अवश्य संपर्क करें!
            </p>
        </div>
        <div class='footer'>
            आपका<br>
            डॉ. अभिषेक गुप्ता<br>
            संस्थापक
        </div>
    </div>
</body>
</html>
";


    echo smtp_mailer($mailDetails,$subject,$msg);
    function smtp_mailer($to,$subject, $msg){
   	$mail = new PHPMailer(); 
   	$mail->IsSMTP(); 
   	$mail->SMTPAuth = true; 
   	$mail->SMTPSecure = 'tls'; 
   	$mail->Host = "mail.jeenasikho.co.in";
   	$mail->Port = 578; 
   	$mail->IsHTML(true);
   	$mail->CharSet = 'UTF-8';
   	$mail->SMTPDebug = 2; 
   	$mail->Username = "contact@afi-india.in";
   	$mail->Password = "Admin@7788";
   	$mail->SetFrom("contact@afi-india.in");
   	$mail->Subject = $subject;
   	$mail->Body =$msg;
   	$mail->AddAddress($to);
     $mail->AddEmbeddedImage('./img/Welcomelogo.png', 'logo'); 
   	$mail->SMTPOptions=array('ssl'=>array(
   		'verify_peer'=>false,
   		'verify_peer_name'=>false,
   		'allow_self_signed'=>false
   	));
   	if(!$mail->Send()){
   		echo $mail->ErrorInfo;
   	}else{
          header('Location: thank-you.php');
   	}
   }
   exit();
?>