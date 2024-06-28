<?php 
ob_start();
session_start(); ?>
<?php
   if(isset($_POST["submitt"])){
      print_r($_POST);
   }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>AFI Registration</title>
   <meta name="description" content="AFI Registration" />
   <meta name="keywords" content="AFI Registration" />
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" href="validationAssets/parsley.css">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
   rel="stylesheet" type="text/css" />
   <script src="js/wow.min.js"></script>  
   
  
   <script>   
      new WOW().init();         
      mobile:false;             
   </script>  
   <style>
      .dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    color: #1180df !important;
    border-bottom: 3px solid #1180df !important;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: transparent;
}
button.dropbtn {
    background: transparent;
    border: none;
    color: #202021;
    font-size: 15px;
    text-decoration: none;
    cursor: pointer;
     border-bottom: 3px solid transparent;
}
button.dropbtn:hover{
    color: #1180df !important;
    border-bottom: 3px solid #1180df !important;
}
button:focus {
    outline: 1px dotted;
    outline:none;
}
.dropdown-content a:hover {
    border: none !important;
    color: #16181b !important;
    text-decoration: none;
    background-color: #f8f9fa;
}
</style>
</head>
<?php
include "connection.php";
$query = "SELECT * FROM tbl_maintenance_mode";
$runQuery    =  $connect->query($query);
$dataObject     =  $runQuery->fetch_object();
$_SESSION['mode']    =  $dataObject->status;
if($_SESSION['mode'] == 1){
   header('Location:maintenance.php');
}else{
   unset($_SESSION['mode']);
   header("Location:");
}
?>
<?php 
/*Function file*/
include "function.php";
$pageName =  basename($_SERVER['PHP_SELF']);
//echo $pageName;
$getMetas   =  "SELECT * FROM tbl_page_meta WHERE pageName = '".$pageName."'";
//echo $getMetas;
$runQuery   =  $connect->query($getMetas);
$metaObj    =  $runQuery->fetch_object();
/*Code For News Letter*/
if(isset($_POST["subscribe"])){
   $email    =  $_POST["newsletter"];
   $query   =  "SELECT * FROM tbl_subscribe WHERE emailID = '$email'";
   $runQuery   =  $connect->query($query);
   if(mysqli_num_rows($runQuery) > 0){ ?>
      <script>
         alert('Email id already registered for newsletter.');
      </script>
   <?php }else{
      $query   =  "INSERT INTO `tbl_subscribe`(`emailID`) VALUES ('$email')";
      $runQuery   =  $connect->query($query);
      if($runQuery){ ?>
         <script>alert('Thanks for subscribe newsletter.');</script>
      <?php }
   }
}
?>

<body oncopy="return false" oncut="return false">
   <div class="header-top">
      <div class="top-left">
         <p class="wow fadeInUp"><i class="fa fa-phone"></i><a href="mailto:ayurvedafederation@gmail.com">info@afi-india.in</a></p>
         <p class="wow fadeInDown"><i class="fa fa-envelope" aria-hidden="true"></i>
            <a href="tel:+8595336710">011-41354100</a>,
            <a href="tel:+8595336710">8595336710</a>
         </p>
      </div>
      <div class="top-right">
         <a href="https://www.facebook.com/ayurvedafederation/" target="_blank"> <i class="fa fa-facebook-f wow fadeInLeft" title="facebook"></i></a>
         <a href="https://twitter.com/AyurvedaFedera1/status/1435100542775095306?s=08" target="_blank"><i class="fa fa-twitter wow fadeInUp" title="twitter"></i></a>
         <a href="https://www.linkedin.com/company/ayurveda-federation-of-india" target="_blank"> <i class="fa fa-linkedin wow fadeInDown" title="linkedin"></i></a>
         <a href="https://www.instagram.com/invites/contact/?i=b1un1xzrx6fn&utm_content=mdquld3" target="_blank"><i class="fa fa-instagram wow fadeInUp" title="twitter"></i></a>
         <a href="https://www.youtube.com/channel/UCqH0I9ZuYSEoBthE_yiukOg" target="_blank"> <i class="fa fa-youtube wow fadeInRight" title="youtube"></i></a>
         <a href="https://t.me/ayurvedafederation" target="_blank"> <i class="fa fa-telegram wow fadeInRight" title="telegram"></i></a>
      </div>
   </div>
   <div class="middle-header">
      <div class="middle-left d-none d-md-block">
          <ul>
        <li class="wow fadeInLeft"><a href="index.php">Home</a></li>
        <li class="wow fadeInLeft"><a href="">Events </a></li>
        <li class="wow fadeInLeft">
          <div class="dropdown">
            <button class="dropbtn">Publications</button>
             <div class="dropdown-content">
              <a href="#">For Doctors</a>
              <a href="#">For Public</a>
            </div>
          </div>
        </li>
           <li class="wow fadeInLeft">
          <div class="dropdown">
            <button class="dropbtn">Courses</button>
             <div class="dropdown-content">
              <a href="doctor-course.php">For Doctors</a>
              <a href="public-course.php">For Public</a>
            </div>
          </div>
        </li>          
      </ul>
      </div>
      <div class="middle-right wow fadeInRight">
         <div class="search-container">
            <form action="search.php">
               <input type="text" placeholder="Search.." name="search" required=''>
               <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="header" id="myHeader">
      <nav class="navbar navbar-expand-lg navbar-light" id="main_navbar">
         <div class="brand">
            <p class="mt-0 mb-0">
               <a href="index.php"><img src="img/logo.png" alt="AFI India Logo" class="img-fluid wow fadeInLeft" title="AFI">
               </a>
            </p>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ml-auto">
            <?php 
            $query = "SELECT * FROM tbl_menu WHERE parent_ID = '0' AND status != '0' order by forCommuniteSorting asc";
            $runQuery = $connect->query($query);
            while($row = $runQuery->fetch_assoc()){
               $getChildMenu     = "SELECT * FROM tbl_menu WHERE parent_ID = ".$row['menu_id_pk']."";
               $runChildQuery    =  $connect->query($getChildMenu);
               ?>
               <li class="nav-item dropdown">
                  <?php 
                  if($row['menu_id_pk'] == 3){
                     $getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."' order by forCommuniteSorting asc" ;
                  }
                  else{
                    $getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."'" ;
                 }
                 $runGetSub  =  $connect->query($getSub);
                 $dropCheck =   '';
                 if($row['menu_id_pk'] == 2 or $row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5 or $row['menu_id_pk'] == 30){
                  $dropCheck = "dropdown-menu";
               }else{
                  $dropCheck = "";
               }
               if($row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5 or $row['menu_id_pk'] == 30){ ?>
                <a class="nav-link wow fadeInRight" href="#" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
             <?php } else {
               ?>
               <a class="nav-link wow fadeInRight" href="<?php echo $row["url"]; ?>" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
               <?php
            } ?>
            <div class=<?php echo $dropCheck; ?>>
               <!-- For State Consuil page -->
               <?php 
               while ($childObj =   $runGetSub->fetch_object()) {
                  if($row['menu_id_pk'] == 3){
                         //for communite menu
                     ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url."?MemberType=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
                  <?php    } 
                   elseif($row['menu_id_pk'] == 5){
                         //for state
                     ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url."?StateConvener=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
                  <?php    } 
                  else{ ?>
                     <a class="dropdown-item" href="../<?php echo $childObj->url; ?>"><?php echo $childObj->manuName;?></a> 
                     <?php
                  }
               }?>
            </div>
         </li>    
      <?php } ?>
   </ul>            
</div>
</nav>
</div>
<div class="clearfix"></div>
 <?php
 date_default_timezone_set('Asia/Kolkata');
 include "mail-file.php";
 $datetime = date('Y-m-d h:i:s');
 if(isset($_POST["submit"])){
    
    
    
  // $token   =  $_POST["token"];
   $payment1  = '500.00';
   $payment2  = '2100.00';
   $payment3  = '5100.00';
   $paymentstatus1 = 'Failed';
   $name    =  $_POST["name"]; 
   $amount = $_POST["customAmount"];
   $types = $_POST["type"];
  
   $gender  =  $_POST["gender"];
   $fatherNN  =  $_POST["nameNew"];
   $emaill  =  $_POST["nameNew2"];
   $bothmob  =  $_POST["nameNew3"];
   $comadd  =  $_POST["nameNew4"];
   $peradd  =  $_POST["nameNew5"];
   $pinnn  =  $_POST["nameNew6"];
   /*Profile Pic Start*/
   $profilePicName=     $_FILES['profilePic']["name"] ;
   $temp = explode(".", $profilePicName);
   $newfilename = round(microtime(true)) . '.' . end($temp);
   $profilePicTmpName   =     $_FILES['profilePic']["tmp_name"] ;
   $profilePicSize      =     $_FILES['profilePic']["size"];
   $profilePicType      =     $_FILES['profilePic']["type"];
   $allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg"
  );
    // Get image file extension
   $Profileextension = pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION);
   /*Ends*/
   /*Student ID Card Image*/
   $idCard     =     $_FILES['studentIdCard']["name"] ;
   $tempIdCard = explode(".", $idCard);
   $idCardNew  = round(microtime(true)) . '_student.' . end($tempIdCard);
   $idCardTempName   =     $_FILES['studentIdCard']["tmp_name"] ;
   $idCardSize      =     $_FILES['studentIdCard']["size"];
   $StudentExtension = pathinfo($_FILES["studentIdCard"]["name"], PATHINFO_EXTENSION);
   /*ends*/
   $clinicAddress       =     $_POST["clinicAddress"];
   $state               =     $_POST["state"];
   $nationality         =     $_POST["nationality"];
   $dob           =  $_POST["dob"];
   $memberType    =  $_POST["memberType"];
   $collageName   =  $_POST["collageName"];
   $enrollmentNo  =  $_POST["enrollmentNo"];
   $registerdDate =  $_POST["registerdDate"];
   $PL__collage_name =  $_POST["PL__collage_name"];
   /*PL__Image ID Card Image*/
   $idCardProLect    =     $_FILES['PL_profile_image']["name"] ;
   $tempIdCardProLect = explode(".", $idCardProLect);
   $idCardNewProLect  = round(microtime(true)) . '_pro_lect.' . end($tempIdCardProLect);
   $ProLectTempName   =     $_FILES['PL_profile_image']["tmp_name"] ;
   $ProLectSize      =     $_FILES['PL_profile_image']["size"];
   $proLectExtension = pathinfo($_FILES["PL_profile_image"]["name"], PATHINFO_EXTENSION);
   /*ends*/
   if($memberType==1){
       //for student
     $contactNo =  $_POST["contactNo1"];
     $proLectEmail =  $_POST["proLectEmail1"];
     $howDoYouKnw  =  $_POST["nameNew7"];
     $canYou  =  $_POST["nameNew8"];
     $yourtype  =  $_POST["nameNew9"];
  }
  elseif($memberType==2){
       //for doc
    $contactNo =  $_POST["contactNo2"];
    $proLectEmail =  $_POST["proLectEmail2"];
     $howDoYouKnw  =  $_POST["nameNew77"];
     $canYou  =  $_POST["nameNew88"];
     $yourtype  =  $_POST["nameNew99"];
 }
  elseif($memberType==4){
       //for pharmacy
   $contactNo =  $_POST["contactNo3"];
    $proLectEmail =  $_POST["proLectEmail3"];
     $qq  =  $_POST["nameNew1055"];
     $pp  =  $_POST["nameNew1155"];
     $canYou  =  $_POST["nameNew12"];
     $yourtype  =  $_POST["nameNew13"];
 }
  elseif($memberType==5){
       //for patron
    $contactNo =  $_POST["contactNo3"];
    $proLectEmail =  $_POST["proLectEmail3"];
     $qq  =  $_POST["nameNew1099"];
     $pp  =  $_POST["nameNew1199"];
     $canYou  =  $_POST["nameNew12"];
     $yourtype  =  $_POST["nameNew13"];
 }
 else{
       //for lect
    $contactNo =  $_POST["contactNo3"];
    $proLectEmail =  $_POST["proLectEmail3"];
     $qq  =  $_POST["nameNew10"];
     $pp  =  $_POST["nameNew11"];
     $canYou  =  $_POST["nameNew12"];
     $yourtype  =  $_POST["nameNew13"];
 }
 $stateBoard =  $_POST["stateBoard"];
 $_SESSION['cusmail']=$emaill;
 $_SESSION['cusnum']=$bothmob;
  
 $whatsAppNo =  $_POST["whatsAppNo"];
 $condition =  @$_POST["condition"];
 /*Current Date Start*/
 date_default_timezone_set('Asia/Kolkata');
 $dateCurrent = date('Y-m-d', time());
   /*Current Date Ends
    $fatherNN,$emaill,$bothmob,$comadd,$peradd,$pinnn
    
    nameNew 33 nameNew2 44 nameNew3 55  nameNew4 66  nameNew5 77 nameNew6 88
   if(empty($token)){
      $errorMsg=  "Token is missing";
      $code= "1";
   }else*/ if("1234" == "1234"){
      if($name == ""){
         $errorMsg=  "You did not enter a name.";
         $code= "3";
      }
      else if($fatherNN == ""){
         $errorMsg=  "Please Enter Father's Name";
         $code= "33";
      }
      else if($emaill == ""){
         $errorMsg=  "Please Enter Email";
         $code= "44";
      }
      else if($bothmob == ""){
         $errorMsg=  "Please Enter Mobile Number";
         $code= "55";
      }
      else if($comadd == ""){
         $errorMsg=  "Please Enter Communication Address.";
         $code= "66";
      }
      else if($peradd == ""){
         $errorMsg=  "Please Enter Permanent Address.";
         $code= "77";
      }
      else if($pinnn == ""){
         $errorMsg=  "Please Enter Pincode.";
         $code= "88";
      }
      else if($profilePicName == ""){
         $errorMsg=  "Please select profile pic.";
         $code= "4";
      }else if($profilePicSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "4";
      }else if(!in_array($Profileextension, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "4";
      }else if($dob == ""){
         $errorMsg=  "You did not enter your date of birth.";
         $code= "6";
      }else if($state == ""){
         $errorMsg=  "You did not enter your state.";
         $code= "7";
      }else if($nationality == ""){
         $errorMsg=  "You did not enter your nationality.";
         $code= "8";
      }else{
          membership($emaill,$name,$memberType,$bothmob);
            if($memberType == 1){ // Validation run is member student
               if($collageName == ""){
                  $errorMsg=  "You did not enter your collage name.";
                  $code= "9";
               }else if($idCard == ""){
                  $errorMsg=  "Please select ID Card";
                  $code= "10";
               }else if($idCardSize > 2000000){
                  $errorMsg=  "Image size exceeds 2MB";
                  $code= "10";
               }else if(!in_array($StudentExtension, $allowed_image_extension)){
                  $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
                  $code= "10";
               }else if($enrollmentNo ==""){
                  $errorMsg=  "You did not enter your Enrollment No.";
                  $code= "11";
               }else if($condition == ""){
                  $errorMsg   =  "Please agree Terms and Conditions.";
                  $code    ="19";
               }else{
                 $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`,`state`, `nationality`, `type_of`,`createdDate`,`fathername`,`mailid`,`numberBoth`,`comaddress`,`peraddress`,`pinncode`) VALUES ('$name','$newfilename','$gender','$state','$nationality','$memberType','$dateCurrent','$fatherNN','$emaill','$bothmob','$comadd','$peradd','$pinnn')";
                  $runQuery   =  $connect->query($query);
                 
                  if($runQuery){
               
                     $last_id = $connect->insert_id;
                     move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                 $queryMemberStu   =  "INSERT INTO `tbl_if_member_student`(`pro_lect_member_id_fk`, `collage_name`, `enrollment_no`, `id_card_pic`,`howDoYouKnw`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$collageName','$enrollmentNo','$idCardNew','$howDoYouKnw','$canYou','$yourtype','$amount','$types','$emaill','$bothmob','$payment1','$paymentstatus1')";
                     $runQueryStu   =  $connect->query($queryMemberStu);
                     if($runQueryStu){
                          $last_id1 = $connect->insert_id;
                          
                         move_uploaded_file($idCardTempName, "uploads/idcards/" . $idCardNew);
                          
                     $errorMsg=  "Your membership form submitted successfully";
                        $code= "20" ;
                        header("Location:payrouter.php?lastId=".$last_id1."&memberType=".$memberType);
                       
                       ?>
                        <script type="text/javascript">
                        //   $('#payroutehiddenForm').submit();
                        </script>
                             <?php 
        
                          }
                       }
                    }
                 }else if($memberType == 2){
                  if($registerdDate == ""){
                     $errorMsg=  "You did not enter your registartion details:";
                     $code= "12";
                  }else if($stateBoard == ""){
                     $errorMsg=  "You did not enter your state board in which you are registered";
                     $code="13";
                  }else if($condition == ""){
                     $errorMsg   =  "Please agree Terms and Conditions.";
                     $code    ="19";
                  }else{
                 $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`,`fathername`,`mailid`,`numberBoth`,`comaddress`,`peraddress`,`pinncode`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent','$fatherNN','$emaill','$bothmob','$comadd','$peradd','$pinnn')";
                     $runQuery   =  $connect->query($query);
                     if($runQuery){
                        $last_id = $connect->insert_id;
                        $queryMemberStu   =  "INSERT INTO `tbl_if_member_doctor`(`pro_lect_member_id_fk`, `registartion`, `registered_board`,`howDoYouKnw`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$registerdDate','$stateBoard','$howDoYouKnw','$canYou','$yourtype','$amount','$types','$emaill','$bothmob','$payment2','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                        if($runQueryStu){
                            $last_id1 = $connect->insert_id;
                           move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                           $errorMsg=  "Your membership form submitted successfully";
                           
                           $code= "20" ;
                            header("Location:payrouter.php?lastId=".$last_id1."&memberType=".$memberType);
                          
                           ?>
                           <script type="text/javascript">
                             setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="2100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("udf4").value ="<?php echo $last_id1; ?>";
                          document.getElementById("submit11").click();
                                },2000); // 5 seconds
                             </script>
                             <?php 
                          }
                       }
                    }
                 }else if($memberType == 3){
                 if($idCardProLect==""){
                    
                     $errorMsg=  "You did not enter your upload copy of Id Card";
                     $code="15";
                  }else if($ProLectSize > 2000000){
                       
                     $errorMsg=  "Image size exceeds 2MB";
                     $code="15";
                  }else if(!in_array($proLectExtension, $allowed_image_extension)){
                      
                     $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
                     $code= "15";
                  }else if($condition == ""){
                       
                     $errorMsg   =  "Please agree Terms and Conditions.";
                     $code    ="19";
                  }else{
                     
                  $query = "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`,`fathername`,`mailid`,`numberBoth`,`comaddress`,`peraddress`,`pinncode`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent','$fatherNN','$emaill','$bothmob','$comadd','$peradd','$pinnn')";
                  $runQuery   =  $connect->query($query);
                     if($runQuery){
                        $last_id = $connect->insert_id;
                        $queryMemberStu   =  "INSERT INTO `tbl_if_member_prof_lect`(`pro_lect_member_id_fk`, `idCard`,`qq`,`pp`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$idCardNewProLect','$qq','$pp','$canYou','$yourtype','$amount','$types','$emaill','$bothmob','$payment2','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                        if($runQueryStu){
                            $last_id1 = $connect->insert_id;
                             move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                           move_uploaded_file($ProLectTempName, "uploads/idcards/" . $idCardNewProLect);
                           $errorMsg=  "Your membership form submitted successfully";
                           $code= "20" ;
                            header("Location:payrouter.php?lastId=".$last_id1."&memberType=".$memberType);
                           ?>
                           <script type="text/javascript">
                             setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="5100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("udf4").value ="<?php echo $last_id1; ?>";
                          document.getElementById("submit11").click();
                                },2000); // 5 seconds
                             </script>
                             <?php 
                          }
                       }
                    }
                 }
                 else if($memberType == 4){
                 if($condition == ""){
                     echo "hello";
                     die;
                     $errorMsg   =  "Please agree Terms and Conditions.";
                     $code    ="19";
                  }else{
                      $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`,`fathername`,`mailid`,`numberBoth`,`comaddress`,`peraddress`,`pinncode`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent','$fatherNN','$emaill','$bothmob','$comadd','$peradd','$pinnn')";
                     $runQuery   =  $connect->query($query);
                     if($runQuery){
                        $last_id = $connect->insert_id;
                        $queryMemberStu   =  "INSERT INTO `tbl_if_member_pharmacy`(`pro_lect_member_id_fk`,`qq`,`pp`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$qq','$pp','$canYou','$yourtype','$amount','$types','$emaill','$bothmob','$payment3','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                        if($runQueryStu){
                             $last_id1 = $connect->insert_id;
                             move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                           $errorMsg=  "Your membership form submitted successfully";
                           $code= "20" ;
                            header("Location:payrouter.php?lastId=".$last_id1."&memberType=".$memberType);
                           ?>
                           <script type="text/javascript">
                             setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="5100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("udf4").value ="<?php echo $last_id1; ?>";
                          document.getElementById("submit11").click();
                                },2000); // 5 seconds
                             </script>
                             <?php 
                          }
                       }
                    }
                 }
                 else if($memberType == 5){
                 if($condition == ""){
                     echo "hello";
                     die;
                     $errorMsg   =  "Please agree Terms and Conditions.";
                     $code    ="19";
                  }else{
                      $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`,`fathername`,`mailid`,`numberBoth`,`comaddress`,`peraddress`,`pinncode`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent','$fatherNN','$emaill','$bothmob','$comadd','$peradd','$pinnn')";
                     $runQuery   =  $connect->query($query);
                     if($runQuery){
                        $last_id = $connect->insert_id;
                       $queryMemberStu   =  "INSERT INTO `tbl_if_member_patron`(`pro_lect_member_id_fk`, `qq`,`pp`,`canYou`,`yourtype`,`amount`,`types`,`email`,`phone`,`payment`,`paymentStatus`) VALUES ('$last_id','$qq','$pp','$canYou','$yourtype','$amount','$types','$emaill','$bothmob','$payment3','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                        if($runQueryStu){
                             $last_id1 = $connect->insert_id;
                             move_uploaded_file($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                           $errorMsg=  "Your membership form submitted successfully";
                           $code= "20" ;
                             header("Location:payrouter.php?lastId=".$last_id1."&memberType=".$memberType);
                           ?>
                           <script type="text/javascript">
                             setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="5100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("udf4").value ="<?php echo $last_id; ?>";
                          document.getElementById("submit11").click();
                                },2000); // 5 seconds
                             </script>
                             <?php 
                          }
                       }
                    }
                 }
                 else{
                  die('here');
               }
            }
         }else{
            $errorMsg=  "Invalid Token";
            $code= "1" ;
         }
      }
      ?>
      <style type="text/css" >
      .errorMsg{border:1px solid red; }
      .message{color: red;
        font-weight: 100;
        font-size: 14px;
        font-style: italic;}
        button.reg-btn {
          padding: 7px 32px;
          background: #000;
          color: #fff;
          font-size: 14px;
          border: 1px solid #000;
          border-left: none;
          cursor: pointer;
          border-top-right-radius: 20px;
          border-bottom-right-radius: 20px;
          border-top-left-radius: 20px;
          border-bottom-left-radius: 20px;
          margin-left: 10px;
       }
       button.reg-btn:hover {
          background: #a8d5fe;
          color: #000;
       }
/*.afi-form1 {
    width: 100%;
    }*/
    .modal-dialog {
       max-width: 1200px;
    }
    p.previws {
       font-weight: 600;
    }
 </style>
 <!-- Loader CSS -->
 <style type="text/css">
 .overlay {
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   position: fixed;
   background: #222222bd;
   z-index: 1;
}
.overlay__inner {
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   position: absolute;
}
.overlay__content {
   left: 50%;
   position: absolute;
   top: 50%;
   transform: translate(-50%, -50%);
}
.center {
 left: 50%;
 position: absolute;
 top: 65%;
 transform: translate(-50%, -50%);
 color: white;
}
.spinner {
 width: 75px;
 height: 75px;
 display: inline-block;
 border-width: 5px;
 border-color: rgb(121 125 165 / 9%);
 border-top-color: #ffffff;
 animation: spin 1s infinite linear;
 border-radius: 100%;
 border-style: solid;
}
@keyframes spin {
   100% {
      transform: rotate(360deg);
   }
}
</style>
<div class="overlay" style="display:none;" id="overlay">
   <div class="overlay__inner">
      <div class="overlay__content"><span class="spinner"></span></div>
      <div class="center">Please wait while we process your payment...</div>
   </div>
</div>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">AFI Membership Form</h2>
            <p class="wow fadeInRight"></p>
         </div>
      </div>
      <?php if (isset($code) && $code==1) {  ?>
         <div class="alert alert-danger text-center col-lg-6 offset-lg-3" role="alert">
            <?php echo "<span class='message' style='font-size:16px !important; font-style:inherit !important;'>" .$errorMsg. "</span>";?>
         </div>
      <?php } ?>
      <?php if (isset($code) && $code==20) {  ?>
         <div class="alert alert-success text-center col-lg-6 offset-lg-3" role="alert">
            <?php echo "<span class='message' style='font-size:16px !important; font-style:inherit !important; color:#000000 !important;'>" .$errorMsg. "</span>";?>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
            });
         </script>
      <?php } ?>
      <form action="" method="post" enctype="multipart/form-data">
         <div class="row pt-md-3 jots ">
            <div class="afi-form">
               <p style="text-align:left;">Note : ALL WORDS SHOULD BE IN THE CAPITAL LETTER</p>
               <div class="formt">
                <!--  <input type="hidden" name="token" value="<?php //echo CSRF(); ?>" />-->
                <input type="hidden" name="token" value="1234">
                <div class="pht-upd" >
                 <!-- <img src="img/bt1.png" class="img-fluid">   -->
                 <img id="blah"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 120px;" />
                 <input type="file" id="imgInp" class="form-control" placeholder="" name="profilePic"> 
                 <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                 <label for="staticEmail" class="col-form-label">(Upload your recent Photograph)</label>
              </div>
               <div class="form-group row">
         <label for="staticEmail"  class="col-sm-12 col-form-label">Select Membership Type (सदस्यता चुनें) :</label>  
         <div class="col-sm-12">
            <select class="form-control" name="memberType" onchange="showFelid(this);" id="a7">
               <option value="">--Please Select--</option>
               <option value="1" <?php 
               if(isset($memberType)){ 
                  echo "selected";
               }?> >Students Membership (Only For Ayurveda Student’s)</option>
               <option value="2" <?php 
               if(isset($memberType)){ 
                  echo "selected";
               }?> >Life Membership (Only For Doctor’s)</option>
               <option value="3" <?php 
               if(isset($memberType)){ 
                  echo "selected";
               }?> >Associate Membership (Only For Non - Ayurveda Professional’s)</option>
           
                 <option value="4" <?php 
               if(isset($memberType)){ 
                  echo "selected";
               }?> >Pharma Membership</option>
                 <option value="5" <?php 
               if(isset($memberType)){ 
                  echo "selected";
               }?> >Patron Membership</option>

            </select>
         </div>
      </div>
       <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Membership Fee : (सदस्यता शुल्क)</label>
            <div class="col-sm-12">
               <p class="costMembership">----</p>
            </div>
            <input type="hidden" name="customAmount" id="customAmount" value="">
         </div>
              <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Name : (आपका नाम)  </label>
               <div class="col-sm-12">
                    <input type="hidden" name="type" id="type" value="">
                  <input type="text" name="name" class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>" id="a1">
                  <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            
              <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Father's Name : (पिता का नाम)  </label>
               <div class="col-sm-12">
                  <input type="text" name="nameNew" class="form-control <?php if(isset($code) && $code==33): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>" id="a1new" onchange="ccc(this.value)">
                  <?php if (isset($code) && $code==33) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
              <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Sex (लिंग) :</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender"  value="1" checked>
                     <label class="form-check-label" for="exampleRadios1"> Male </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender"  value="2" checked>
                     <label class="form-check-label" for="exampleRadios1"> Female </label>
                  </div>
               </div>
            </div>
              <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Email ID: (ईमेल आईडी)  </label>
               <div class="col-sm-12">
                  <input type="text" name="nameNew2" class="form-control <?php if(isset($code) && $code==44): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>"  id="a1new2" onchange="aaa(this.value)">
                  <?php if (isset($code) && $code==44) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
     
             <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Mobile & WhatsApp Number : (Please share both)  </label>
               <div class="col-sm-12">
                  <input type="text" name="nameNew3" class="form-control <?php if(isset($code) && $code==55): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>" id="a1new3" onchange="bbb(this.value)">
                  <?php if (isset($code) && $code==55) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            
              <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Communication Address : (पत्र व्यवहार का पता)  </label>
               <div class="col-sm-12">
                  <input type="text" name="nameNew4" class="form-control <?php if(isset($code) && $code==66): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>" id="a1new4">
                  <?php if (isset($code) && $code==66) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
           
             
              <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Permanent Address :  (स्थायी पता) </label>
               <div class="col-sm-12">
                  <input type="text" name="nameNew5" class="form-control <?php if(isset($code) && $code==77): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>" id="a1new5">
                  <?php if (isset($code) && $code==77) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            
            
            
          
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">DOB : (जन्म तिथि)</label>
               <div class="col-sm-12">
                  <input type="date" class="form-control <?php if(isset($code) && $code==6): echo 'errorMsg'; endif;?>" id="a4" name="dob" value="<?php if(isset($dob)){echo $dob;} ?>">
                  <?php if (isset($code) && $code==6) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
           <!--   <div class="form-group row" style="display:none;" id="addHiden">
               <label for="staticEmail" class="col-sm-12 col-form-label">ADDRESS</label>
               <div class="col-sm-12">
                  <input type="text" class="form-control <?php if(isset($code) && $code==5): echo 'errorMsg'; endif;?>" id="a3" name="clinicAddress" value="<?php if(isset($clinicAddress)){echo $clinicAddress;} ?>">
                  <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
           <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">STATE :</label>
               <div class="col-sm-12">
                  <input type="text" class="form-control <?php if(isset($code) && $code==7): echo 'errorMsg'; endif;?>" id="a5" name="state" value="<?php if(isset($state)){echo $state;} ?>">
                  <?php if (isset($code) && $code==7) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div> 
            </div> -->
             <div class="form-group row">
         <label for="staticEmail"  class="col-sm-12 col-form-label">State : (
राज्य)</label>  
         <div class="col-sm-12">
            <select class="form-control <?php if(isset($code) && $code==7): echo 'errorMsg'; endif;?>" name="state" id="stt">
               <option value="">--Please Select State--</option>
               <?php 
               $queryState    =  "SELECT * FROM States";
               $runQuery      =  $connect->query($queryState);
               while($row = $runQuery->fetch_object()){ ?>
                  <option value="<?php echo strtoupper($row->StateName); ?>"  <?php 
               if(isset($state)){ 
                  echo "selected";
               }?> ><?php echo strtoupper($row->StateName); ?></option>
               <?php }
               ?>
            </select>
                              <?php if (isset($code) && $code==7) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
      
        <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Pin Code : (पिन कोड)</label>
               <div class="col-sm-12">
                  <input type="text" name="nameNew6" class="form-control <?php if(isset($code) && $code==88): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>" id="a1new6">
                  <?php if (isset($code) && $code==88) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            
             
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">        Nationality : (राष्ट्रीयता) </label>
               <div class="col-sm-12">
                <!--  <input type="text" class="form-control <?php if(isset($code) && $code==8): echo 'errorMsg'; endif;?>" id="a6" name="nationality" value="<?php if(isset($nationality)){echo $nationality;} ?>">-->
                <select class="form-control" id="a6" name="nationality" required value="<?php if(isset($nationality)){echo "selected";} ?>">
                 <option value="">--Select--</option>
                 <option value="Afganistan">Afghanistan</option>
                 <option value="Albania">Albania</option>
                 <option value="Algeria">Algeria</option>
                 <option value="American Samoa">American Samoa</option>
                 <option value="Andorra">Andorra</option>
                 <option value="Angola">Angola</option>
                 <option value="Anguilla">Anguilla</option>
                 <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                 <option value="Argentina">Argentina</option>
                 <option value="Armenia">Armenia</option>
                 <option value="Aruba">Aruba</option>
                 <option value="Australia">Australia</option>
                 <option value="Austria">Austria</option>
                 <option value="Azerbaijan">Azerbaijan</option>
                 <option value="Bahamas">Bahamas</option>
                 <option value="Bahrain">Bahrain</option>
                 <option value="Bangladesh">Bangladesh</option>
                 <option value="Barbados">Barbados</option>
                 <option value="Belarus">Belarus</option>
                 <option value="Belgium">Belgium</option>
                 <option value="Belize">Belize</option>
                 <option value="Benin">Benin</option>
                 <option value="Bermuda">Bermuda</option>
                 <option value="Bhutan">Bhutan</option>
                 <option value="Bolivia">Bolivia</option>
                 <option value="Bonaire">Bonaire</option>
                 <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                 <option value="Botswana">Botswana</option>
                 <option value="Brazil">Brazil</option>
                 <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                 <option value="Brunei">Brunei</option>
                 <option value="Bulgaria">Bulgaria</option>
                 <option value="Burkina Faso">Burkina Faso</option>
                 <option value="Burundi">Burundi</option>
                 <option value="Cambodia">Cambodia</option>
                 <option value="Cameroon">Cameroon</option>
                 <option value="Canada">Canada</option>
                 <option value="Canary Islands">Canary Islands</option>
                 <option value="Cape Verde">Cape Verde</option>
                 <option value="Cayman Islands">Cayman Islands</option>
                 <option value="Central African Republic">Central African Republic</option>
                 <option value="Chad">Chad</option>
                 <option value="Channel Islands">Channel Islands</option>
                 <option value="Chile">Chile</option>
                 <option value="China">China</option>
                 <option value="Christmas Island">Christmas Island</option>
                 <option value="Cocos Island">Cocos Island</option>
                 <option value="Colombia">Colombia</option>
                 <option value="Comoros">Comoros</option>
                 <option value="Congo">Congo</option>
                 <option value="Cook Islands">Cook Islands</option>
                 <option value="Costa Rica">Costa Rica</option>
                 <option value="Cote DIvoire">Cote DIvoire</option>
                 <option value="Croatia">Croatia</option>
                 <option value="Cuba">Cuba</option>
                 <option value="Curaco">Curacao</option>
                 <option value="Cyprus">Cyprus</option>
                 <option value="Czech Republic">Czech Republic</option>
                 <option value="Denmark">Denmark</option>
                 <option value="Djibouti">Djibouti</option>
                 <option value="Dominica">Dominica</option>
                 <option value="Dominican Republic">Dominican Republic</option>
                 <option value="East Timor">East Timor</option>
                 <option value="Ecuador">Ecuador</option>
                 <option value="Egypt">Egypt</option>
                 <option value="El Salvador">El Salvador</option>
                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                 <option value="Eritrea">Eritrea</option>
                 <option value="Estonia">Estonia</option>
                 <option value="Ethiopia">Ethiopia</option>
                 <option value="Falkland Islands">Falkland Islands</option>
                 <option value="Faroe Islands">Faroe Islands</option>
                 <option value="Fiji">Fiji</option>
                 <option value="Finland">Finland</option>
                 <option value="France">France</option>
                 <option value="French Guiana">French Guiana</option>
                 <option value="French Polynesia">French Polynesia</option>
                 <option value="French Southern Ter">French Southern Ter</option>
                 <option value="Gabon">Gabon</option>
                 <option value="Gambia">Gambia</option>
                 <option value="Georgia">Georgia</option>
                 <option value="Germany">Germany</option>
                 <option value="Ghana">Ghana</option>
                 <option value="Gibraltar">Gibraltar</option>
                 <option value="Great Britain">Great Britain</option>
                 <option value="Greece">Greece</option>
                 <option value="Greenland">Greenland</option>
                 <option value="Grenada">Grenada</option>
                 <option value="Guadeloupe">Guadeloupe</option>
                 <option value="Guam">Guam</option>
                 <option value="Guatemala">Guatemala</option>
                 <option value="Guinea">Guinea</option>
                 <option value="Guyana">Guyana</option>
                 <option value="Haiti">Haiti</option>
                 <option value="Hawaii">Hawaii</option>
                 <option value="Honduras">Honduras</option>
                 <option value="Hong Kong">Hong Kong</option>
                 <option value="Hungary">Hungary</option>
                 <option value="Iceland">Iceland</option>
                 <option value="Indonesia">Indonesia</option>
                 <option value="India">India</option>
                 <option value="Iran">Iran</option>
                 <option value="Iraq">Iraq</option>
                 <option value="Ireland">Ireland</option>
                 <option value="Isle of Man">Isle of Man</option>
                 <option value="Israel">Israel</option>
                 <option value="Italy">Italy</option>
                 <option value="Jamaica">Jamaica</option>
                 <option value="Japan">Japan</option>
                 <option value="Jordan">Jordan</option>
                 <option value="Kazakhstan">Kazakhstan</option>
                 <option value="Kenya">Kenya</option>
                 <option value="Kiribati">Kiribati</option>
                 <option value="Korea North">Korea North</option>
                 <option value="Korea Sout">Korea South</option>
                 <option value="Kuwait">Kuwait</option>
                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                 <option value="Laos">Laos</option>
                 <option value="Latvia">Latvia</option>
                 <option value="Lebanon">Lebanon</option>
                 <option value="Lesotho">Lesotho</option>
                 <option value="Liberia">Liberia</option>
                 <option value="Libya">Libya</option>
                 <option value="Liechtenstein">Liechtenstein</option>
                 <option value="Lithuania">Lithuania</option>
                 <option value="Luxembourg">Luxembourg</option>
                 <option value="Macau">Macau</option>
                 <option value="Macedonia">Macedonia</option>
                 <option value="Madagascar">Madagascar</option>
                 <option value="Malaysia">Malaysia</option>
                 <option value="Malawi">Malawi</option>
                 <option value="Maldives">Maldives</option>
                 <option value="Mali">Mali</option>
                 <option value="Malta">Malta</option>
                 <option value="Marshall Islands">Marshall Islands</option>
                 <option value="Martinique">Martinique</option>
                 <option value="Mauritania">Mauritania</option>
                 <option value="Mauritius">Mauritius</option>
                 <option value="Mayotte">Mayotte</option>
                 <option value="Mexico">Mexico</option>
                 <option value="Midway Islands">Midway Islands</option>
                 <option value="Moldova">Moldova</option>
                 <option value="Monaco">Monaco</option>
                 <option value="Mongolia">Mongolia</option>
                 <option value="Montserrat">Montserrat</option>
                 <option value="Morocco">Morocco</option>
                 <option value="Mozambique">Mozambique</option>
                 <option value="Myanmar">Myanmar</option>
                 <option value="Nambia">Nambia</option>
                 <option value="Nauru">Nauru</option>
                 <option value="Nepal">Nepal</option>
                 <option value="Netherland Antilles">Netherland Antilles</option>
                 <option value="Netherlands">Netherlands (Holland, Europe)</option>
                 <option value="Nevis">Nevis</option>
                 <option value="New Caledonia">New Caledonia</option>
                 <option value="New Zealand">New Zealand</option>
                 <option value="Nicaragua">Nicaragua</option>
                 <option value="Niger">Niger</option>
                 <option value="Nigeria">Nigeria</option>
                 <option value="Niue">Niue</option>
                 <option value="Norfolk Island">Norfolk Island</option>
                 <option value="Norway">Norway</option>
                 <option value="Oman">Oman</option>
                 <option value="Pakistan">Pakistan</option>
                 <option value="Palau Island">Palau Island</option>
                 <option value="Palestine">Palestine</option>
                 <option value="Panama">Panama</option>
                 <option value="Papua New Guinea">Papua New Guinea</option>
                 <option value="Paraguay">Paraguay</option>
                 <option value="Peru">Peru</option>
                 <option value="Phillipines">Philippines</option>
                 <option value="Pitcairn Island">Pitcairn Island</option>
                 <option value="Poland">Poland</option>
                 <option value="Portugal">Portugal</option>
                 <option value="Puerto Rico">Puerto Rico</option>
                 <option value="Qatar">Qatar</option>
                 <option value="Republic of Montenegro">Republic of Montenegro</option>
                 <option value="Republic of Serbia">Republic of Serbia</option>
                 <option value="Reunion">Reunion</option>
                 <option value="Romania">Romania</option>
                 <option value="Russia">Russia</option>
                 <option value="Rwanda">Rwanda</option>
                 <option value="St Barthelemy">St Barthelemy</option>
                 <option value="St Eustatius">St Eustatius</option>
                 <option value="St Helena">St Helena</option>
                 <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                 <option value="St Lucia">St Lucia</option>
                 <option value="St Maarten">St Maarten</option>
                 <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                 <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                 <option value="Saipan">Saipan</option>
                 <option value="Samoa">Samoa</option>
                 <option value="Samoa American">Samoa American</option>
                 <option value="San Marino">San Marino</option>
                 <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                 <option value="Saudi Arabia">Saudi Arabia</option>
                 <option value="Senegal">Senegal</option>
                 <option value="Seychelles">Seychelles</option>
                 <option value="Sierra Leone">Sierra Leone</option>
                 <option value="Singapore">Singapore</option>
                 <option value="Slovakia">Slovakia</option>
                 <option value="Slovenia">Slovenia</option>
                 <option value="Solomon Islands">Solomon Islands</option>
                 <option value="Somalia">Somalia</option>
                 <option value="South Africa">South Africa</option>
                 <option value="Spain">Spain</option>
                 <option value="Sri Lanka">Sri Lanka</option>
                 <option value="Sudan">Sudan</option>
                 <option value="Suriname">Suriname</option>
                 <option value="Swaziland">Swaziland</option>
                 <option value="Sweden">Sweden</option>
                 <option value="Switzerland">Switzerland</option>
                 <option value="Syria">Syria</option>
                 <option value="Tahiti">Tahiti</option>
                 <option value="Taiwan">Taiwan</option>
                 <option value="Tajikistan">Tajikistan</option>
                 <option value="Tanzania">Tanzania</option>
                 <option value="Thailand">Thailand</option>
                 <option value="Togo">Togo</option>
                 <option value="Tokelau">Tokelau</option>
                 <option value="Tonga">Tonga</option>
                 <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                 <option value="Tunisia">Tunisia</option>
                 <option value="Turkey">Turkey</option>
                 <option value="Turkmenistan">Turkmenistan</option>
                 <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                 <option value="Tuvalu">Tuvalu</option>
                 <option value="Uganda">Uganda</option>
                 <option value="United Kingdom">United Kingdom</option>
                 <option value="Ukraine">Ukraine</option>
                 <option value="United Arab Erimates">United Arab Emirates</option>
                 <option value="United States of America">United States of America</option>
                 <option value="Uraguay">Uruguay</option>
                 <option value="Uzbekistan">Uzbekistan</option>
                 <option value="Vanuatu">Vanuatu</option>
                 <option value="Vatican City State">Vatican City State</option>
                 <option value="Venezuela">Venezuela</option>
                 <option value="Vietnam">Vietnam</option>
                 <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                 <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                 <option value="Wake Island">Wake Island</option>
                 <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                 <option value="Yemen">Yemen</option>
                 <option value="Zaire">Zaire</option>
                 <option value="Zambia">Zambia</option>
                 <option value="Zimbabwe">Zimbabwe</option>
              </select>
              <?php if (isset($code) && $code==8) { echo "<span class='message'>".$errorMsg."</span>" ;} ?>
           </div>
        </div>
       
     
      <div id="student__section" style="display:none;">
         <h5 class="afi-heads"></h5>
         <div class="form-group row">
            <div class="col-sm-12">
               <input type="hidden" class="form-control" name="stuCost" id="stuCost" value="<?php echo "500.00"; ?>" disabled="">
            </div>
         </div>
        
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">College Name in which you are studying : कॉलेज का नाम जिसमें आप पढ़ रहे हैं (कृपया तभी भरें जब आप आयुर्वेद के छात्रहों)</label>
            <div class="col-sm-12">
               <input type="text" class="form-control <?php if(isset($code) && $code==9): echo 'errorMsg'; endif;?>" id="s1" name="collageName" value="<?php if(isset($collageName)){echo $collageName;} ?>">
               <?php if (isset($code) && $code==9) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Enrollment No:</label>
            <div class="col-sm-12">
               <input type="text" id="s2" class="form-control <?php if(isset($code) && $code==11): echo 'errorMsg'; endif;?>" name="enrollmentNo" value="<?php if(isset($enrollmentNo)){echo $enrollmentNo;} ?>">
               <?php if (isset($code) && $code==11) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
        <!-- <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Email Id: </label>
            <div class="col-sm-12">
               <input type="text" id="lect2" class="form-control <?php if(isset($code) && $code==16): echo 'errorMsg'; endif;?>" name="proLectEmail1" value="<?php if(isset($proLectEmail)){echo $proLectEmail;} ?>">
               <?php if (isset($code) && $code==16) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Contact No: :</label>
            <div class="col-sm-12">
               <input type="text" id="lect3" class="form-control <?php if(isset($code) && $code==17): echo 'errorMsg'; endif;?>" name="contactNo1" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==17) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Whatsapp No:</label>
            <div class="col-sm-12">
               <input type="text" id="lect4" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="whatsAppNo" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>-->
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Upload your degree Certificate or College Identity Card : अपना कॉलेज पहचान पत्र अपलोड करें</label>
            <div class="col-sm-5 ">
              <input type="file" id="imgIDCard" class="form-control" name="studentIdCard" >
              <?php if (isset($code) && $code==10) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
           </div>
           <div class="col-sm-4">
            <img id="blahIDCard"  style="position: absolute;  width: auto; border: 1px dashed; bottom: 50; height: 100px; display: none;" />
         </div>
      </div>
      
       <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Through whom did you come to know about Ayurveda Federation? आयुर्वेद फेडरेशन ऑफ़ इंडिया के बारे में आपको किसके माध्यम से पता चला?</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew7" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew7" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
      
         <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew8"  value="Yes" checked>
                     <label class="form-check-label" for="exampleRadios1">Yes </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew8"  value="No" checked>
                     <label class="form-check-label" for="exampleRadios1"> No</label>
                  </div>
               </div>
            </div>
      
      
        <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew9"  value=">As a member of the District or State or Central executive" checked>
                     <label class="form-check-label" for="exampleRadios1">As a member of the District or State or Central executive</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew9"  value="As a volunteer" checked>
                     <label class="form-check-label" for="exampleRadios1">As a volunteer </label>
                  </div>
                  
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew9"  value="As a Normal member Only" checked>
                     <label class="form-check-label" for="exampleRadios1">As a Normal member Only</label>
                  </div>
                  
                  
               </div>
            </div>
      
      
      
   </div>
   <div id="doctor__section" style="display:none;">
      <h5 class="afi-heads"></h5>
    
        <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">CLINIC ADDRESS :</label>
         <div class="col-sm-12">
            <input type="text" class="form-control <?php if(isset($code) && $code==5): echo 'errorMsg'; endif;?>" id="a3" name="clinicAddress" value="<?php if(isset($clinicAddress)){echo $clinicAddress;} ?>">
            <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
       <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">State (in which you are working/practicing) : राज्य (जिसमें आप काम कर रहे हैं/अभ्यास कर रहे हैं)	</label>
         <div class="col-sm-12">
            <input type="text" id="d2" class="form-control <?php if(isset($code) && $code==13): echo 'errorMsg'; endif;?>" name="stateBoard" value="<?php if(isset($stateBoard)){echo $stateBoard;} ?>">
            <?php if (isset($code) && $code==13) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
      <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">Board Registration Number (Kindly fill only if you are a doctor) - बोर्ड पंजीकरण संख्या </label>
         <div class="col-sm-12">
            <input type="text" id="d1" class="form-control <?php if(isset($code) && $code==12): echo 'errorMsg'; endif;?>" name="registerdDate" value="<?php if(isset($registerdDate)){echo $registerdDate;} ?>">
            <?php if (isset($code) && $code==12) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
     
     <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">Through whom did you come to know about Ayurveda Federation? आयुर्वेद फेडरेशन ऑफ़ इंडिया के बारे में आपको किसके माध्यम से पता चला?</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew77" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew77" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
      
         <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew88"  value="Yes" checked>
                     <label class="form-check-label" for="exampleRadios1">Yes </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew88"  value="No" checked>
                     <label class="form-check-label" for="exampleRadios1"> No</label>
                  </div>
               </div>
            </div>
      
      
        <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value=">As a member of the District or State or Central executive" checked>
                     <label class="form-check-label" for="exampleRadios1">As a member of the District or State or Central executive</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value="As a volunteer" checked>
                     <label class="form-check-label" for="exampleRadios1">As a volunteer </label>
                  </div>
                  
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value="As a Normal member Only" checked>
                     <label class="form-check-label" for="exampleRadios1">As a Normal member Only</label>
                  </div>
                  
                  
               </div>
            </div>
      
    <!--  <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">Email Id: </label>
         <div class="col-sm-12">
            <input type="text" id="lect2" class="form-control <?php if(isset($code) && $code==16): echo 'errorMsg'; endif;?>" name="proLectEmail2" value="<?php if(isset($proLectEmail)){echo $proLectEmail;} ?>">
            <?php if (isset($code) && $code==16) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
      <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">Contact No: :</label>
         <div class="col-sm-12">
            <input type="text" id="lect3" class="form-control <?php if(isset($code) && $code==17): echo 'errorMsg'; endif;?>" name="contactNo2" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
            <?php if (isset($code) && $code==17) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
      <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">Whatsapp No:</label>
         <div class="col-sm-12">
            <input type="text" id="lect4" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="whatsAppNo" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
            <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>-->
   </div>
   
   
   
   
   <!--Pharmacy start-->
   
   
   
    <div id="Pharmacy__section" style="display:none;">
      <h5 class="afi-heads"></h5>
    
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">	Qualification - (योग्यता)</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew100" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew1055" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">	Profession - (आपका व्यवसाय)</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew111" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew1155" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>

     
     
   
      
         <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew88"  value="Yes" checked>
                     <label class="form-check-label" for="exampleRadios1">Yes </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew88"  value="No" checked>
                     <label class="form-check-label" for="exampleRadios1"> No</label>
                  </div>
               </div>
            </div>
      
      
        <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value=">As a member of the District or State or Central executive" checked>
                     <label class="form-check-label" for="exampleRadios1">As a member of the District or State or Central executive</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value="As a volunteer" checked>
                     <label class="form-check-label" for="exampleRadios1">As a volunteer </label>
                  </div>
                  
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value="As a Normal member Only" checked>
                     <label class="form-check-label" for="exampleRadios1">As a Normal member Only</label>
                  </div>
                  
                  
               </div>
            </div>
      
   </div>
   
   
   
   
   
   <!--End-->
   
   
   
   
   <!--Patron start-->
   
   
   
    <div id="Patron__section" style="display:none;">
      <h5 class="afi-heads"></h5>
    
    
      
       <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">	Qualification - (योग्यता)</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew1000" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew1099" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">	Profession - (आपका व्यवसाय)</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew1111" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew1199" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew88"  value="Yes" checked>
                     <label class="form-check-label" for="exampleRadios1">Yes </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew88"  value="No" checked>
                     <label class="form-check-label" for="exampleRadios1"> No</label>
                  </div>
               </div>
            </div>
      
      
        <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value=">As a member of the District or State or Central executive" checked>
                     <label class="form-check-label" for="exampleRadios1">As a member of the District or State or Central executive</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value="As a volunteer">
                     <label class="form-check-label" for="exampleRadios1">As a volunteer </label>
                  </div>
                  
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew99"  value="As a Normal member Only">
                     <label class="form-check-label" for="exampleRadios1">As a Normal member Only</label>
                  </div>
                  
                  
               </div>
            </div>
      
   </div>
   
   
   
   
   
   <!--End-->
   
   
   
   
   
   
   <div id="proLect__section" style="display:none;"> 
      <h5 class="afi-heads"></h5>
  
   <!--   <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">College Name:</label>
         <div class="col-sm-12" >
            <input type="text" id="lect1" class="form-control <?php if(isset($code) && $code==14): echo 'errorMsg'; endif;?>" name="PL__collage_name" value="<?php if(isset($PL__collage_name)){echo $PL__collage_name;} ?>" >
            <?php if (isset($code) && $code==14) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>-->
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">	Qualification - (योग्यता)</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew10" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew10" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-12 col-form-label">	Profession - (आपका व्यवसाय)</label>
            <div class="col-sm-12">
               <input type="text" id="nameNew11" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="nameNew11" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         
      
         <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew12"  value="Yes" checked>
                     <label class="form-check-label" for="exampleRadios1">Yes </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew12"  value="No" checked>
                     <label class="form-check-label" for="exampleRadios1"> No</label>
                  </div>
               </div>
            </div>
      
      
        <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?</label>  
               <div class="col-sm-12">
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew13"  value=">As a member of the District or State or Central executive" checked>
                     <label class="form-check-label" for="exampleRadios1">As a member of the District or State or Central executive</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew13"  value="As a volunteer" checked>
                     <label class="form-check-label" for="exampleRadios1">As a volunteer </label>
                  </div>
                  
                    <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="nameNew13"  value="As a Normal member Only" checked>
                     <label class="form-check-label" for="exampleRadios1">As a Normal member Only</label>
                  </div>
                  
                  
               </div>
            </div>
      
      
      <div class="form-group row">
         <label for="staticEmail" class="col-sm-12 col-form-label">Upload copy of Id Card:</label>
         <div class="col-sm-5">
            <input type="file" class="form-control" name="PL_profile_image" id="ProLect" placeholder="" style="border:none;">
            <?php if (isset($code) && $code==15) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
         <div class="col-sm-4">
           <img id="blahProLect"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 50px; z-index: 999;" />
        </div>
     </div>
   <!--  <div class="form-group row">
      <label for="staticEmail" class="col-sm-12 col-form-label">Email Id: </label>
      <div class="col-sm-12">
         <input type="text" id="lect2" class="form-control <?php if(isset($code) && $code==16): echo 'errorMsg'; endif;?>" name="proLectEmail3" value="<?php if(isset($proLectEmail)){echo $proLectEmail;} ?>">
         <?php if (isset($code) && $code==16) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
      </div>
   </div>
   <div class="form-group row">
      <label for="staticEmail" class="col-sm-12 col-form-label">Contact No: :</label>
      <div class="col-sm-12">
         <input type="text" id="lect3" class="form-control <?php if(isset($code) && $code==17): echo 'errorMsg'; endif;?>" name="contactNo3" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
         <?php if (isset($code) && $code==17) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
      </div>
   </div>
   <div class="form-group row">
      <label for="staticEmail" class="col-sm-12 col-form-label">Whatsapp No:</label>
      <div class="col-sm-12">
         <input type="text" id="lect4" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="whatsAppNo" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
         <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
      </div>
   </div>-->
</div>
<div class="form-group row">
   <div class="col-sm-12">
      <input id="checkbox" type="checkbox" name="condition" style="margin-right: 10px;" />
      <label for="checkbox"> I agree to these <a href="terms.html">Terms and Conditions</a> </label><br>
      <label for="checkbox">Declaration:-I hereby declare that all the information given above is true to the best of my knowledge & belief.</label>
   </div>
   <?php if (isset($code) && $code==19) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
</div>
<div class="form-group row">
  <input type="submit" name="submit" class="butns" value="Submit" id="submit1" style="display:none">
  <button type="button" class="reg-btn" data-toggle="modal" data-target="#myModal4" onclick="open_modal()">Preview</button> 
</div>

</div>
</div>
</div>
</form>
</div>
</div>
<div class="modal fade" id="myModal4">
 <div class="modal-dialog">
   <div class="modal-content">     
     <!-- Modal body -->
     <div class="modal-body">
      <div class="mid-content">   
         <h4 class="modal-title">Contact Us</h4>  
         <button type="button" class="close" data-dismiss="modal">&times;</button>     
         <div class="afi-form afi-form1">
           <p style="text-align:left;">Note : ALL WORDS SHOULD BE IN THE CAPITAL LETTER</p>
           <div class="formt"> 
        <!--  <div class="form-group row">
               <label for="staticEmail" class="col-sm-12 col-form-label">TYPE OF MEMBERSHIP:  </label>  
            </div>-->
            <div class="pht-upd">           
               <img src="img/bt1.png" class="img-fluid" id="main1" style="display:none; width: 20%; float: right;">             
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-12 col-form-label">MEMBERSHIP COST:</label>
              <div class="col-sm-12">
                <p class="popupPreview"></p>
             </div>
          </div>
          <div class="form-group row">
           <label for="staticEmail" class="col-sm-12 col-form-label">Name:</label>
           <div class="col-sm-12">
             <p class="previws" id="a11"></p>
          </div>
       </div>
          <div class="form-group row">
           <label for="staticEmail" class="col-sm-12 col-form-label">Father's Name:</label>
           <div class="col-sm-12">
             <p class="previws" id="fat"></p>
          </div>
       </div>
       <div class="form-group row">
        <label for="staticEmail" class="col-sm-12 col-form-label">Sex:</label>
        <div class="col-sm-12">
          <p class="previws" id="a22"></p>
       </div>
    </div>
    <div class="form-group row">
       <label for="staticEmail" class="col-sm-12 col-form-label">Email ID:</label>
       <div class="col-sm-12">
         <p class="previws" id="a1new22222"></p>
      </div>
   </div>
      <div class="form-group row">
       <label for="staticEmail" class="col-sm-12 col-form-label">Mobile Number:</label>
       <div class="col-sm-12">
         <p class="previws" id="a1new33333"></p>
      </div>
   </div>
      <div class="form-group row">
       <label for="staticEmail" class="col-sm-12 col-form-label">Communication Address:</label>
       <div class="col-sm-12">
         <p class="previws" id="a1new44444"></p>
      </div>
   </div>
      <div class="form-group row">
       <label for="staticEmail" class="col-sm-12 col-form-label">Permanent Address:</label>
       <div class="col-sm-12">
         <p class="previws" id="a1new55555"></p>
      </div>
   </div>
   <div class="form-group row">
    <label for="staticEmail" class="col-sm-12 col-form-label">DOB: </label>
    <div class="col-sm-12">
      <p class="previws" id="a44"></p>
   </div>
</div>
<div class="form-group row">
   <label for="staticEmail" class="col-sm-12 col-form-label">State: </label>  
   <div class="col-sm-12">          
    <p class="previws" id="a55"></p>
 </div>
</div>
<div class="form-group row">
   <label for="staticEmail" class="col-sm-12 col-form-label">Nationality: </label>
   <div class="col-sm-12">          
    <p class="previws" id="a66"></p>
 </div>
</div>
<div class="form-group row">
   <label for="staticEmail" class="col-sm-12 col-form-label">You Are: </label>  
   <div class="col-sm-12">          
    <p class="previws" id="a77"></p>
 </div>
</div>
<!-- for student-->
<div id="student"  style="display:none;">
  <div class="form-group row" >
    <label for="staticEmail" class="col-sm-12 col-form-label">College Name: </label>
    <div class="col-sm-12">
      <p class="previws" id="s11"></p>
   </div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Enrollment No:  </label>
 <div class="col-sm-12">
   <p class="previws" id="s22"></p>
</div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Upload copy of Id Card:  </label>
 <div class="col-sm-12">
   <img src="img/bt1.png" class="img-fluid" id="main2" style="display:none; width: 20%;">
</div>
</div>
</div>
<!--end-->
<!--Prac-->
<div id="prac"  style="display:none;">
   <div class="form-group row" >
    <label for="staticEmail" class="col-sm-12 col-form-label">Registartion Details:  </label>
    <div class="col-sm-12">
      <p class="previws" id="d11"></p>
   </div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">State Board in Which You Are Registered:   </label>
 <div class="col-sm-12">
   <p class="previws" id="d22"></p>
</div>
</div>
</div>
<!--end-->
<!-- for lect-->
<div id="lect"  style="display:none;">
  <div class="form-group row" >
    <label for="staticEmail" class="col-sm-12 col-form-label">College Name: </label>
    <div class="col-sm-12">
      <p class="previws" id="lect11"></p>
   </div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Upload copy of Id Card:  </label>
 <div class="col-sm-12">
   <img src="img/bt1.png" class="img-fluid" id="main3" style="display:none;">
</div>
</div>
</div>
<!--end-->

<!--Prac-->
<div id="phar"  style="display:none;">
   <div class="form-group row" >
    <label for="staticEmail" class="col-sm-12 col-form-label">Qualification:  </label>
    <div class="col-sm-12">
      <p class="previws" id="v1"></p>
   </div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Profession:   </label>
 <div class="col-sm-12">
   <p class="previws" id="v2"></p>
</div>
</div>

<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?   </label>
 <div class="col-sm-12">
   <p class="previws" id="v3"></p>
</div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?   </label>
 <div class="col-sm-12">
   <p class="previws" id="v4"></p>
</div>
</div>
</div>

<!--end-->


<!--Pat-->
<div id="pat"  style="display:none;">
   <div class="form-group row" >
    <label for="staticEmail" class="col-sm-12 col-form-label">Qualification:  </label>
    <div class="col-sm-12">
      <p class="previws" id="v11"></p>
   </div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Profession:   </label>
 <div class="col-sm-12">
   <p class="previws" id="v22"></p>
</div>
</div>

<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?   </label>
 <div class="col-sm-12">
   <p class="previws" id="v33"></p>
</div>
</div>
<div class="form-group row">
 <label for="staticEmail" class="col-sm-12 col-form-label">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?   </label>
 <div class="col-sm-12">
   <p class="previws" id="v44"></p>
</div>
</div>
</div>

<!--end-->
<div class="form-group row">                  
  <div class="col-sm-12">
                      <!-- <input id="checkbox" type="checkbox" style="margin-right: 10px;">
                        <label for="checkbox"> I agree to these <a href="terms.html">Terms and Conditions</a> </label>-->
                        <button type="button" class="reg-btn"  onclick="submitForm()">Pay <span class="payView"></span></button> 
                        <button type="button" class="reg-btn" data-dismiss="modal">Close</button>
                     </div>
                  </div>                
               </div>
            </div>           
         </div>
      </div>
   </div>
</div>
</div>
<form action="payrouter.php" id="payroutehiddenForm" method="post" accept-charset="ISO-8859-1" id="myformm" style="display:none;">
  <input class="textbox"type="text" name="merchantId" id="merchantId" value="M00081"> 
         <input class="textbox"type="text" name="apiKey" id="apiKey" value="Gu5Tk4rw7NY5hU6Fr9an6tq1yD9WI3fY">
   <input class="textbox"type="text" name="txnId" id="txnId" value="<?php echo substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6).rand(100,999); ?>">
   <input class="textbox" type="text" name="amount" id="amountnone" value="500.00" > 
   <input class="textbox"type="text" name="dateTime" id="dateTime" value = "<?php echo date('Y-m-d h:i:s'); ?>" >
    <input class="textbox"type="text" name="custname" value="" id="m41" > 
   <input class="textbox"type="text" name="custMail" value="" id="m11" > 
   <input class="textbox"type="text" name="custMobile" value=" " id="m22">
   <input class="textbox1"type="text" name="returnURL" id="returnURL" value="https://afi-india.in/response.php">
   <input class="textbox"type="text" name="productId" id="productId" value="DEFAULT" >
   <input class="textbox" type="text" name="channelId" id="channelId" value="0" > 
   <input class="textbox"type="text" name="isMultiSettlement" id="isMultiSettlement" value="0" >
   <input class="textbox"type="text" name="txnType" id="txnType" value="DIRECT" >
   <input class="textbox"type="text" name="instrumentId" id="instrumentId" value="NA" >
    <input class="textbox"type="text" name="udf1" id="udf1" value="NA" >
   <input class="textbox"type="text" name="udf2" id="udf2" value="NA" >
   <input class="textbox"type="text" name="udf3" id="udf3" value="MEMBERSHIP" >
   <input class="textbox"type="text" name="udf4" id="udf4" value="<?php echo $last_id1;?>" >
   <input class="textbox"type="text" name="udf5" id="udf5" value="NA" >
   <input class="textbox"type="text" name="cardDetails" id="cardDetails" value="NA" >
   <input class="textbox"type="text" name="cardType" id="cardDetails" value="NA" >
   <input type="submit" name="submitt" value="Submit" id="submit11">
</form>
<div class="container">
  <h1>Refund Policies</h1>
  <p>1.	We reserve the right to accept or refuse membership at our discretion.</p>
  <p>2.	The money paid to the Ayurveda Federation of India( A Unit of Ayurveda Vigyan Forum) will be refunded into the bank account of the user within 7-15 working days</p>

 <p>3. Users can cancel the Membership within Two Days after the make payment  </p>
 
  <p>4.	If any document is found wrong, your membership will be canceled and your fees will be refunded as per Federation Policy.</p>
  
   <p>5. Membership can be terminated only from the office of the organization.</p>
</div>
<?php include "layouts/main-footer.php"; ?>

<script type="text/javascript">
   imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
     blah.src = URL.createObjectURL(file)
     $("#blah").css("display","block");
     main1.src = URL.createObjectURL(file)
     $("#main1").css("display","block");
     $("#imgInp").css("margin-top","120px");
     $("#imgInp").css("position","relative");
  }
}
imgIDCard.onchange = evt => {
 const [file] = imgIDCard.files
 if(file) {
   blahIDCard.src = URL.createObjectURL(file)
   $("#blahIDCard").css("display","block");
   main2.src = URL.createObjectURL(file)
   $("#main2").css("display","block");
}
}
ProLect.onchange = evt => {
 const [file] = ProLect.files
 if(file) {
   blahProLect.src = URL.createObjectURL(file)
   $("#blahProLect").css("display","block");
   main3.src = URL.createObjectURL(file)
   $("#main3").css("display","block");
}
}
showFelid=(e)=>{
   if(e.value=="1"){
      $("#student__section").css("display","block");
      $("#doctor__section").css("display","none");
      $("#proLect__section").css("display","none");
      $("#Pharmacy__section").css("display","none");
      $("#Patron__section").css("display","none");
      $("#addHiden").css("display","flex");
      var stuCost  =  $("#stuCost").val();
      $(".costMembership").text('500.00');
      $(".payView").text('500.00');
      $(".popupPreview").text('500.00');
      $('#amountnone').val('500.00');
      $('#udf3').val('MEMBERSHIP');
      $('#customAmount').val('500.00');
       $('#type').val('MEMBERSHIP');
      /*Cost for students*/
   }else if(e.value=="2"){
      $("#doctor__section").css("display","block");
      $("#student__section").css("display","none");
      $("#proLect__section").css("display","none");
      $("#Pharmacy__section").css("display","none");
      $("#Patron__section").css("display","none");
      $("#addHiden").css("display","none");
      $(".costMembership").text('2100.00');
      $(".payView").text('2100.00');
      $(".popupPreview").text('2100.00');
      $('#amountnone').val('2100.00');
      $('#customAmount').val('2100.00');
      $('#type').val('LIFE MEMBERSHIP');
   }else if(e.value=="3"){
      $("#proLect__section").css("display","block");
     $(".costMembership").text('2100.00');
      $(".payView").text('2100.00');
      $(".popupPreview").text('2100.00');
      $('#amountnone').val('2100.00');
    $('#customAmount').val('2100.00');
  $('#type').val('ASSOCIATE MEMBERSHIP'); 
   }
   else if(e.value=="4"){
      $("#doctor__section").css("display","none");
      $("#student__section").css("display","none");
      $("#proLect__section").css("display","none");
      $("#Pharmacy__section").css("display","block");
      $("#Patron__section").css("display","none");
      $("#addHiden").css("display","none");
      $(".costMembership").text('5100.00');
      $(".payView").text('5100.00');
      $(".popupPreview").text('5100.00');
      $('#amountnone').val('5100.00');
      $('#customAmount').val('5100.00');
        $('#type').val('PHARMA MEMBERSHIP');
   }
   else if(e.value=="5"){
      $("#doctor__section").css("display","none");
      $("#student__section").css("display","none");
      $("#proLect__section").css("display","none");
      $("#Pharmacy__section").css("display","none");
      $("#Patron__section").css("display","block");
      $("#addHiden").css("display","none");
      $(".costMembership").text('5100.00');
      $(".payView").text('5100.00');
      $(".popupPreview").text('5100.00');
      $('#amountnone').val('5100.00');
      $('#customAmount').val('5100.00');
       $('#type').val('PATRON MEMBERSHIP');
   }
   else{
      $("#student__section").css("display","none");
      $("#proLect__section").css("display","block");
      $("#Pharmacy__section").css("display","none");
      $("#Patron__section").css("display","none");
      $("#addHiden").css("display","flex");
      $("#doctor__section").css("display","none");
      $(".costMembership").text('2100.00');
      $(".payView").text('2100.00');
      $(".popupPreview").text('2100.00');
      $('#amountnone').val('2100.00');
      $('#customAmount').val('2100.00');
   }
}
open_modal=()=>{
   $("#a11").html($("#a1").val());
   var gender;
   var aa= $('input[name="gender"]:checked').val();
   if(aa==1){
    gender="MALE";
 }
 else{
    gender="FEMALE";
 }

var canyou= $('input[name="nameNew88"]:checked').val();
var youare= $('input[name="nameNew99"]:checked').val();
 $("#a22").html(gender);
 $("#fat").html($("#a1new").val());
  $("#a1new22222").html($("#a1new2").val());
   $("#a1new33333").html($("#a1new3").val());
    $("#a1new44444").html($("#a1new4").val());
     $("#a1new55555").html($("#a1new5").val());
 $("#a33").html($("#a3").val());
 $("#a44").html($("#a4").val());
 $("#a55").html($("#stt option:selected").text());
 $("#a66").html($("#a6").val());
 $("#a77").html($("#a7 option:selected").text());
 var options=$("#a7 option:selected").text();
 if(options =="Students Membership (Only For Ayurveda Student’s)"){
    $("#student").css("display","block");
    $("#prac").css("display","none");
     $("#phar").css("display","none");
      $("#pat").css("display","none");
    $("#lect").css("display","none");
    $("#s11").html($("#s1").val());
    $("#s22").html($("#s2").val());
 } 
 if(options=="Life Membership (Only For Doctor’s)"){
    $("#prac").css("display","block");
    $("#student").css("display","none");
       $("#phar").css("display","none");
         $("#pat").css("display","none");
    $("#lect").css("display","none");
    $("#d11").html($("#d1").val());
    $("#d22").html($("#d2").val());
 }
 if(options=="Associate Membership (Only For Non - Ayurveda Professional’s)"){
  $("#prac").css("display","none");
  $("#student").css("display","none");
     $("#phar").css("display","none");
  $("#lect").css("display","block");
    $("#pat").css("display","none");
$("#proLect__section").css("display","block");
  $("#lect11").html($("#lect1").val());
  $("#lect22").html($("#lect2").val());
  $("#lect33").html($("#lect3").val());
  $("#lect44").html($("#lect4").val());
  $('#customAmount').val('2100.00');
  $('#type').val('ASSOCIATE MEMBERSHIP'); 
   $(".costMembership").text('2100.00');
   $(".payView").text('2100.00');
  $(".popupPreview").text('2100.00');
}
  
if(options=="Pharma Membership"){
 $("#prac").css("display","none");
  $("#student").css("display","none");
     $("#phar").css("display","block");
       $("#pat").css("display","none");
  $("#lect").css("display","none");
  $("#v1").html($("#nameNew100").val());
  $("#v2").html($("#nameNew111").val());
  $("#v3").html(canyou);
  $("#v4").html(youare);
}
if(options=="Patron Membership"){
   
 $("#prac").css("display","none");
  $("#student").css("display","none");
     $("#phar").css("display","none");
       $("#pat").css("display","block");
  $("#lect").css("display","none");
 $("#v11").html($("#nameNew1000").val());
  $("#v22").html($("#nameNew1111").val());
  $("#v33").html(canyou);
  $("#v44").html(youare);
}
}
submitForm=()=>{
    $("#submit1").click();
   // $('#submit11').click();
   
}
</script>
<script>
    aaa=(aa)=>{
          document.getElementById("m11").value=aa; 
}
bbb=(bb)=>{
          document.getElementById("m22").value=bb; 
}
ccc=(cc)=>{
          document.getElementById("m41").value=cc; 
}
</script>