<?php 
include "connection.php";

/* echo "<pre>";
print_r($_POST);
print_r($_FILES);
die; */

    $payment1       = '500.00';
    $payment2       = '2100.00';
    $payment3       = '11000.00'; 
    $payment4       = '5100.00';
    $paymentstatus1 = 'SUCCESS';
     
    $amount         = $_POST["customAmount"];
    $types          = $_POST["type"];
    
    $name       =  $_POST["name"];
    //$mobile     =  $_POST["mobile"];
    $email      =  $_POST["email"];
  
    $father_name    =  $_POST["father_name"];
    if($_POST["gender"] == 'Male'){
        $gender         =  1;
    }else{
        $gender         =  0;
    }
    $bothmob        =  $_POST["mobilenumber"];
    $comadd         =  $_POST["communication_address"];
    $peradd         =  $_POST["parmanent_address"];
    $dob            =  $_POST["dob"]; 
    $pinnn          =  $_POST["postalcode"];
    $state          =  $_POST["state"];
    $nationality    =  $_POST["nationality"];
   
    /*Profile Pic Start*/
    $profilePicName             = $_FILES['profilePic']["name"];
    $temp                       = explode(".", $profilePicName);
    $newfilename                = round(microtime(true)) . '.' . end($temp);
    $profilePicTmpName          = $_FILES['profilePic']["tmp_name"] ;
    $profilePicSize             = $_FILES['profilePic']["size"];
    $profilePicType             = $_FILES['profilePic']["type"];
    
    $allowed_image_extension    = array( "png", "jpg", "jpeg");
    
    // Get image file extension
    $Profileextension   = pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION);
    
    /*Ends*/
    
    
    /*ends*/
    
    $memberType         =  $_POST["memberType"];
    
    
    /*PL__Image ID Card Image*/
    /*$idCardProLect      = $_FILES['PL_profile_image']["name"] ;
    $tempIdCardProLect  = explode(".", $idCardProLect);
    $idCardNewProLect   = round(microtime(true)) . '_pro_lect.' . end($tempIdCardProLect);
    $ProLectTempName    = $_FILES['PL_profile_image']["tmp_name"] ;
    $ProLectSize        = $_FILES['PL_profile_image']["size"];
    $proLectExtension   = pathinfo($_FILES["PL_profile_image"]["name"], PATHINFO_EXTENSION);*/
   /*ends*/
   
    
    $canYou         =  $_POST["nameNew8"];
    $yourtype       =  $_POST["nameNew9"];
    
    
    
    
    /*Current Date Start*/
    date_default_timezone_set('Asia/Kolkata');
    $dateCurrent = date('Y-m-d', time());
    
    if($memberType == 'student'){
		
        $typeof = 1;
		$collageName        =  $_POST["collageName"];
		$enrollmentNo       =  $_POST["enrollmentNo"];
		/*Student ID Card Image*/
		$idCard             = $_FILES['studentIdCard']["name"];
		$tempIdCard         = explode(".", $idCard);
		$idCardNew          = round(microtime(true)) . '_student.' . end($tempIdCard);
		$idCardTempName     = $_FILES['studentIdCard']["tmp_name"] ;
		$idCardSize         = $_FILES['studentIdCard']["size"];
		$StudentExtension   = pathinfo($_FILES["studentIdCard"]["name"], PATHINFO_EXTENSION);
		$howDoYouKnw    =  $_POST["nameNew7"];
		
    }else if($memberType == 'lifetime'){
		
        $typeof = 2;
		$clinicAddress      =  $_POST["clinicAddress"];
		$stateBoard     =  $_POST["stateBoard"];
		$registerdDate      =  $_POST["registerdDate"];
		$howDoYouKnw    =  $_POST["nameNew7"];
		
    }else if($memberType == 'associate'){
        $typeof = 3;
		$qq  =  $_POST["nameNew1055"];
		$pp  =  $_POST["nameNew1155"];
	
    }else if($memberType == 'pharma'){
        $typeof = 4;
		$qq  =  $_POST["nameNew1055"];
		$pp  =  $_POST["nameNew1155"];
	
    }else if($memberType == 'patron'){
        $typeof = 5;
		$qq  =  $_POST["nameNew1055"];
		$pp  =  $_POST["nameNew1155"];	
    }
    
    
 
 
    $query = "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`,`state`, `nationality`, `type_of`,`createdDate`,`fathername`,`mailid`,`numberBoth`,`comaddress`,`peraddress`,`pinncode`) VALUES ('$name','$newfilename','$gender','$state','$nationality','$typeof','$dateCurrent','$father_name','$email','$bothmob','$comadd','$peradd','$pinnn')";
    $runQuery = $connect->query($query);
    
    if($memberType == 'student'){
                     
        if($runQuery){
                   
            $last_id = $connect->insert_id;
            move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
            
            $queryMemberStu = "INSERT INTO `tbl_if_member_student`(`pro_lect_member_id_fk`, `collage_name`, `enrollment_no`, `id_card_pic`,`howDoYouKnw`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$collageName','$enrollmentNo','$idCardNew','$howDoYouKnw','$canYou','$yourtype','$amount','$types','$email','$bothmob','$payment1','$paymentstatus1')";
            $runQueryStu = $connect->query($queryMemberStu);
            
            if($runQueryStu){
                
                $last_id1 = $connect->insert_id;
                move_uploaded_file($idCardTempName, "uploads/idcards/" . $idCardNew);
                                      
                $errorMsg=  "Your membership form submitted successfully";
                $code= "20" ;
                echo $redirectUrl =  "payrouter.php?lastId=".$last_id1."&memberType=".$typeof;die;
                
                $SMS_URL = 'http://sms.digitalnexk.com/sendsms/sendsms.php';
                $smsUsername = "jslcT";
                $smsPassword = "pass123";
                $smsSender = "AFIAYU";
                
                $tempId=1007024269859036717;
                
                $otp = rand(100000,999999);
                $message = 'Thank you for the Registration. Welcome to Ayurveda Federation of India for "Becoming a part of Revolution for Ayurveda". Thanks & Regards Ayurveda Federation of India';
                
                $post = ['username'=>$smsUsername,'password'=>$smsPassword,'type'=>'UNICODE','sender'=>$smsSender,'mobile'=>$phone,'message'=>$message,'tempId'=>$tempId];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$SMS_URL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                $response = curl_exec($ch);
                $result = json_decode($response);
                curl_close($ch);
                
            }
        }
        
    }else if($memberType == 'lifetime'){
                     
        if($runQuery){
                   
            $last_id = $connect->insert_id;
            move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
            
            $queryMemberStu   =  "INSERT INTO `tbl_if_member_doctor`(`pro_lect_member_id_fk`, `registartion`, `registered_board`,`howDoYouKnw`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$registerdDate','$stateBoard','$howDoYouKnw','$canYou','$yourtype','$amount','$types','$email','$bothmob','$payment2','$paymentstatus1')";
            $runQueryStu   =  $connect->query($queryMemberStu);
            
            if($runQueryStu){
                
                $last_id1 = $connect->insert_id;
                move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                $errorMsg=  "Your membership form submitted successfully";
                
                $code= "20" ;
                echo $redirectUrl =  "payrouter.php?lastId=".$last_id1."&memberType=".$typeof;die;
            
            }
        }
        
    }else if($memberType == 'associate'){
                     
        if($runQuery){
                   
            $last_id = $connect->insert_id;
            move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
            
            $queryMemberStu   =  "INSERT INTO `tbl_if_member_prof_lect`(`pro_lect_member_id_fk`, `idCard`,`qq`,`pp`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$idCardNewProLect','$qq','$pp','$canYou','$yourtype','$amount','$types','$email','$bothmob','$payment2','$paymentstatus1')";
            $runQueryStu   =  $connect->query($queryMemberStu);
            
            if($runQueryStu){
                
                $last_id1 = $connect->insert_id;
                move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                move_uploaded_file($ProLectTempName, "uploads/idcards/" . $idCardNewProLect);
                $errorMsg=  "Your membership form submitted successfully";
                $code= "20" ;
                echo $redirectUrl =  "payrouter.php?lastId=".$last_id1."&memberType=".$typeof;die;
            
            }
        }
        
    }else if($memberType == 'pharma'){
                     
        if($runQuery){
                   
            $last_id = $connect->insert_id;
            move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
            
            $queryMemberStu   =  "INSERT INTO `tbl_if_member_pharmacy`(`pro_lect_member_id_fk`,`qq`,`pp`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$qq','$pp','$canYou','$yourtype','$amount','$types','$email','$bothmob','$payment3','$paymentstatus1')";
            $runQueryStu   =  $connect->query($queryMemberStu);
            
            if($runQueryStu){
                
                $last_id1 = $connect->insert_id;
                move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                                      
                $errorMsg=  "Your membership form submitted successfully";
                $code= "20" ;
                echo $redirectUrl =  "payrouter.php?lastId=".$last_id1."&memberType=".$typeof;die;
            
            }
        }
        
    }else if($memberType == 'patron'){
                     
        if($runQuery){
                   
            $last_id = $connect->insert_id;
            move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
            
            $queryMemberStu   =  "INSERT INTO `tbl_if_member_patron`(`pro_lect_member_id_fk`, `qq`,`pp`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$qq','$pp','$canYou','$yourtype','$amount','$types','$email','$bothmob','$payment4','$paymentstatus1')";
            $runQueryStu   =  $connect->query($queryMemberStu);
            
            if($runQueryStu){
                
                $last_id1 = $connect->insert_id;
                move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                                      
                $errorMsg=  "Your membership form submitted successfully";
                $code= "20" ;
                echo $redirectUrl =  "payrouter.php?lastId=".$last_id1."&memberType=".$typeof;die;
            
            }
        }
        
    }
    
    
?>