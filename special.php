<?php session_start(); ?> 
<?php
include "layouts/main-header.php"; 
if(isset($_POST["submit"])){
    //  $token   =  $_POST["token"];
      /*Token Validation 
      if(empty($token)){
         $errorMsg=  "Token is missing";
         $code= "12" ;
      }else*/ if("1234" == "1234"){
         $name          =     trim($_POST["name"]);
         $membershipType=     trim($_POST["membershipType"]);
         $address       =     trim($_POST["address"]);
         $comAddress    =     trim($_POST["comAddress"]);
         $qualification =     trim($_POST["qualification"]);
         $workProfile   =     trim($_POST["workProfile"]);
         $state         =     trim($_POST["state"]);
         $nationality   =     trim($_POST["nationality"]);
         $emailID       =     trim($_POST["emailID"]);
         $phoneNo       =     trim($_POST["phoneNo"]);
         $wNumber       =     trim($_POST["wNumber"]);
         $if_doctor     =     trim($_POST["if_doctor"]);
         $registerdBoard=     trim($_POST["registerdBoard"]);
         $pincode       =     trim($_POST["pincode"]);
         $country       =     trim($_POST["country"]);
         $_SESSION['cusmail']=$emailID;
         $_SESSION['cusnum']=$phoneNo;
         $tremcondition =     @$_POST["tremcondition"];
         $profilePicName=     $_FILES['profilePic']["name"] ;
         $temp = explode(".", $profilePicName);
         $newfilename = round(microtime(true)) . '.' . end($temp);
         $profilePicTmpName      =     $_FILES['profilePic']["tmp_name"] ;
         $profilePicSize=     $_FILES['profilePic']["size"] ;
         $_SESSION['formType']=2;
         /*Board Image*/

         $boardImage    =     $_FILES['boardImage']['name'];
         $boardExp      =     explode(".", $boardImage);
         $boardRename   =     round(microtime(true)) . '.' . end($boardExp);
         $boardTmpName  =     $_FILES['boardImage']["tmp_name"] ;
         $boardSize     =     $_FILES['boardImage']["size"] ;

         $allowed_image_extension = array(
          "png",
          "jpg",
          "jpeg"
       );
          // Get image file extension
         $Profileextension = pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION);
         /*Current Date Start*/
         date_default_timezone_set('Asia/Kolkata');
         $dateCurrent = date('Y-m-d', time());
         /*Current Date Ends*/
         if($profilePicName == ""){
            $errorMsg=  "Please select profile pic.";
            $code= "14";
         }else if($profilePicSize > 2000000){
            $errorMsg=  "Image size exceeds 2MB";
            $code= "14";
         }else if(!in_array($Profileextension, $allowed_image_extension)){
            $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
            $code= "14";
         }else if($name =="") {
            $errorMsg=  "You did not enter a name.";
            $code= "1" ;
         }else if($address == ""){
            $errorMsg=  "You did not enter a address.";
            $code= "2" ;
         }else if($comAddress == ""){
            $errorMsg=  "You did not enter a company address.";
            $code= "3" ;
         }else if($qualification == ""){
            $errorMsg=  "You did not enter your qualification.";
            $code= "4" ;
         }else if($workProfile == ""){
            $errorMsg=  "You did not enter your qualification.";
            $code= "5" ;
         }else if($state == ""){
            $errorMsg=  "You did not enter your state.";
            $code= "6";
         }else if($nationality == ""){
            $errorMsg=  "You did not enter your nationality.";
            $code= "7";
         }else if($emailID == ""){
            $errorMsg=  "You did not enter your Email ID.";
            $code= "8";
         }else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $emailID)){
            $errorMsg= 'You did not enter a valid email.';
            $code= "8";
         }else if($phoneNo == ""){
            $errorMsg= 'You did not enter your Phone No.';
            $code= "9";
         }else if(strlen($phoneNo)<10){
            $errorMsg=  "Number should be ten digits.";
            $code= "9";
         }else if(is_numeric($phoneNo) == false){
            $errorMsg=  "Please enter numeric value.";
            $code= "9";
         }else if($wNumber == ""){
            $errorMsg= 'You did not enter your Whatsapp No.';
            $code= "10";
         }else if(strlen($wNumber)<10){
            $errorMsg=  "Number should be ten digits.";
            $code= "10";
         }else if(is_numeric($wNumber) == false){
            $errorMsg=  "Please enter numeric value.";
            $code= "10";
         }else if($tremcondition == ""){
            $errorMsg=  "Please accept trem & condition.";
            $code= "11";
         }else if($pincode == ""){
            $errorMsg=  "Please enter your pincode";
            $code= "21";
         }else if($country == ""){
            $errorMsg=  "Please enter your country";
            $code= "22";
         }else{
            $query =    "INSERT INTO `tbl_membership_form`(`membershipType`,`profilePic`,`name`, `address`, `company_address`,`qualification`,`if_doctor`,`boardName`,`certificateImg`,`workProfile`, `state`,`pinCode`,`country`,`nationality`, `email_ID`, `contactNo`, `whatsappNo`,`createdDate`) VALUES ('$membershipType','$newfilename','$name','$address','$comAddress','$qualification','$if_doctor','$registerdBoard','$boardRename','$workProfile','$state','$pincode','$country','$nationality','$emailID','$phoneNo','$wNumber','$dateCurrent')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
              $last_id = $connect->insert_id;
              $_SESSION['tableID']=$last_id;
              strcmp($profilePicTmpName, "uploads/profilePics/" . $newfilename);
              strcmp($boardTmpName, "uploads/certificate/" . $boardRename);
              $errorMsg=  "Your membership form submitted successfully";
              $code= "13" ; 
              if($membershipType==1){
                   // for associated member
                ?>
                <script type="text/javascript">
                   setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="5100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("submit11").click();

                                },2000); // 2 seconds
                             </script>

                             <?php
                          }
                          elseif($membershipType==2){
                   //overeas member
                            ?>
                            <script type="text/javascript">
                               setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="2100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("submit11").click();

                                },2000); // 2 seconds
                             </script>

                             <?php
                          }
                          else{
                   //patron or doctor
                            ?>
                            <script type="text/javascript">
                               setTimeout(function () {
                          //for student
                          $("#overlay").css("display","block");
                          document.getElementById("amount").value ="2100.00";
                          document.getElementById("m11").value ="<?php echo $_SESSION['cusmail']; ?>";
                          document.getElementById("m22").value ="<?php echo $_SESSION['cusnum']; ?>";
                          document.getElementById("submit11").click();

                                },2000); // 2 seconds
                             </script>

                             <?php
                          }
                       }
                    }
                 }else{
                  $errorMsg=  "Invalid Token";
                  $code= "12" ;
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
            <p class="wow fadeInRight">( FOR PATRON /ASSOCIATE MEMBERS/OVERSEAS MEMBERS) </p>
         </div>
      </div>
      <?php if (isset($code) && $code==12) {  ?>
         <div class="alert alert-danger text-center col-lg-6 offset-lg-3" role="alert">
            <?php echo "<span class='message' style='font-size:16px !important; font-style:inherit !important;'>" .$errorMsg. "</span>";?>
         </div>
      <?php } ?>
      <?php if (isset($code) && $code==13) {  ?>
         <div class="alert alert-success text-center col-lg-6 offset-lg-3" role="alert">
            <?php echo "<span class='message' style='font-size:16px !important; font-style:inherit !important; color:#000000 !important;'>" .$errorMsg. "</span>";?>
         </div>
           <script type="text/javascript">
               setTimeout(function () {
              //for student
                  $("#overlay").css("display","block");
                  },1000); // 2 seconds
            </script>
      <?php } ?>
      <form action="" method="post" enctype="multipart/form-data">
         <div class="row pt-md-3 jots ">
            <div class="afi-form">
               <p style="text-align:left;">Note : ALL WORDS SHOULD BE IN THE CAPITAL LETTER</p>
               <div class="formt">
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">TYPE OF MEMBERSHIP:  </label>  
                     <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="membershipType" id="patron" value="5100.00" checked="checked">
                           <label class="form-check-label" for="membershipType1"> PATRON (or Doctor)</label>
                         
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="membershipType"  value="2100.00"  id="assMember">
                           <label class="form-check-label" for="membershipType1">ASSOCIATE MEMBER  </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="membershipType"  value="2100.00"  id="overSasMember"> 
                           <label class="form-check-label" for="membershipType1"> OVERSEAS MEMBER   </label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">MEMBERSHIP COST:  </label>  
                     <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                           <label class="form-check-label" id="memberShipCost"></label>
                        </div>
                     </div>
                  </div>
                  <div class="pht-upd">
                     <!-- <img src="img/bt1.png" class="img-fluid">   -->
                     <img id="blah"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 120px;" />
                     <input type="file" id="imgInp" class="form-control" placeholder="" name="profilePic"> 
                     <?php if (isset($code) && $code==14) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     <label for="staticEmail" class="col-form-label">(Upload your recent Photograph)</label>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Name:</label>
                     <div class="col-sm-9">
                        <input type="text"  id="a1" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>"  placeholder="" name="name" value="<?php if(isset($name)){echo $name;} ?>">
                        <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">ADDRESS :-  </label>
                     <div class="col-sm-9">
                        <input type="text" id="a2" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>"  name="address" value="<?php if(isset($address)){echo $address;} ?>" >
                        <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">COMPANY NAME  & ADDRESS :  </label>
                     <div class="col-sm-9">
                        <input type="text" id="a3" class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="comAddress" value="<?php if(isset($comAddress)){echo $comAddress;} ?>">
                        <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">QUALIFICATION :  </label>
                     <div class="col-sm-9">
                        <input type="text" id="a4" class="form-control <?php if(isset($code) && $code==4): echo 'errorMsg'; endif;?>" name="qualification" value="<?php if(isset($qualification)){echo $qualification;} ?>">
                        <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <!--  New -->
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Are you Doctor*</label>  
                     <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="if_doctor" value="1" checked="" onchange="show()" >
                           <label class="form-check-label" for="exampleRadios1">Yes </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="if_doctor" value="2" checked="" onchange="hide()">
                           <label class="form-check-label" for="exampleRadios1">No </label>
                        </div>
                     </div>
                  </div>
                  <!-- if doctor which board registration -->
                  <div class="form-group row" style="display:none;" id="showBoard">
                     <label for="staticEmail" class="col-sm-3 col-form-label">State Board Registration No.  </label>
                     <div class="col-sm-9">
                        <input type="text" id="axxx" class="form-control <?php if(isset($code) && $code==20): echo 'errorMsg'; endif;?>" placeholder="" name="registerdBoard" value="<?php if(isset($registerdBoard)){echo $registerdBoard;} ?>" >
                        <?php if (isset($code) && $code==20) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        <img id="blahCertificate"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 120px;" />
                        <input type="file" class="form-control" id="boardImage" name="boardImage" style="border:none;">
                        <label for="staticEmail" class="col-form-label">(Please upload a strcmp of state Board Registration certificate) </label>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">WORK PROFILE:  </label>
                     <div class="col-sm-9">
                        <input type="text" id="r1" class="form-control <?php if(isset($code) && $code==5): echo 'errorMsg'; endif;?>" name="workProfile" value="<?php if(isset($workProfile)){echo $workProfile;} ?>">
                        <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">STATE/ Province*  </label>
                     <div class="col-sm-9">
                        <input type="text" id="r2" class="form-control <?php if(isset($code) && $code==6): echo 'errorMsg'; endif;?>" name="state" value="<?php if(isset($state)){echo $state;} ?>">
                        <?php if (isset($code) && $code==6) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">PINCODE/ZIP CODE:-  </label>
                    <div class="col-sm-9">
                     <input type="text" id="r3" class="form-control <?php if(isset($code) && $code==21): echo 'errorMsg'; endif;?>" name="pincode" value="<?php if(isset($pincode)){echo $pincode;} ?>">
                     <?php if (isset($code) && $code==21) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                  </div>
               </div>
               <div class="form-group row">
                 <label for="staticEmail" class="col-sm-3 col-form-label">Country*   </label>
                 <div class="col-sm-9">
                   <!-- <input type="text" id="r4" class="form-control <?php if(isset($code) && $code==22): echo 'errorMsg'; endif;?>" name="country" value="<?php if(isset($country)){echo $country;} ?>">-->
                   <select class="form-control" id="r4" name="country" required>
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
                   <?php if (isset($code) && $code==22) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                </div>
             </div>
             <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">NATIONALITY :</label>
               <div class="col-sm-9">
                  <input type="text" id="r5" class="form-control <?php if(isset($code) && $code==7): echo 'errorMsg'; endif;?>" name="nationality" value="<?php if(isset($state)){echo $state;} ?>">
                  <?php if (isset($code) && $code==7) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">Email Id: </label>
               <div class="col-sm-9">
                  <input type="text" id="r6" class="form-control <?php if(isset($code) && $code==8): echo 'errorMsg'; endif;?>" name="emailID" value="<?php if(isset($emailID)){echo $emailID;} ?>">
                  <?php if (isset($code) && $code==8) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">Contact No: :</label>
               <div class="col-sm-9">
                  <input type="text" id="r7" class="form-control <?php if(isset($code) && $code==9): echo 'errorMsg'; endif;?>" name="phoneNo" value="<?php if(isset($phoneNo)){echo $phoneNo;} ?>">
                  <?php if (isset($code) && $code==9) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">Whatsapp No:</label>
               <div class="col-sm-9">
                  <input type="text" id="r8" class="form-control <?php if(isset($code) && $code==10): echo 'errorMsg'; endif;?>" name="wNumber" value="<?php if(isset($wNumber)){echo $wNumber;} ?>">
                  <?php if (isset($code) && $code==10) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            <div class="form-group row">
               <div class="col-sm-12">
                  <input id="checkbox" type="checkbox" style="margin-right: 10px;" name="tremcondition" />
                  <label for="checkbox"> I agree to these <a href="terms.html">Terms and Conditions</a> </label>
                  <br>
                  <?php if (isset($code) && $code==11) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            <div class="form-group row">
              <input type="submit" name="submit" class="butns" value="Submit" id="submit1" style="display:none;">
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

           <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">TYPE OF MEMBERSHIP:  </label>
            <div class="col-sm-9">
              <p class="previws" id="mm"></p>
           </div>
        </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Membership Cost:  </label>
            <div class="col-sm-9">
              <p class="previws" id="preCost"></p>
           </div>
        </div>
        <div class="pht-upd">           
         <img src="img/bt1.png" class="img-fluid" id="main1" style="display:none; width: 20%; float:right;">             
      </div>

      <div class="form-group row">
       <label for="staticEmail" class="col-sm-3 col-form-label">Name:</label>
       <div class="col-sm-9">
        <p class="previws" id="a11"></p>
     </div>
  </div>





  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">ADDRESS:</label>
    <div class="col-sm-9">
     <p class="previws" id="a22"></p>
  </div>
</div>



<div class="form-group row">
  <label for="staticEmail" class="col-sm-3 col-form-label">COMPANY NAME & ADDRESS :</label>
  <div class="col-sm-9">
   <p class="previws" id="a33"></p>
</div>
</div>

<div class="form-group row">
  <label for="staticEmail" class="col-sm-3 col-form-label">QUALIFICATION : </label>
  <div class="col-sm-9">
   <p class="previws" id="a44"></p>
</div>
</div>

<div class="form-group row">
   <label for="staticEmail" class="col-sm-3 col-form-label">Are you Doctor: </label>  
   <div class="col-sm-9">          
     <p class="previws" id="a55"></p>
  </div>
</div>
<div id="prac"  style="display:none;">
  <div class="form-group row">
   <label for="staticEmail" class="col-sm-3 col-form-label">State Board Registration No: </label>  
   <div class="col-sm-9">          
     <p class="previws" id="axx"></p>
  </div>
</div>

<div class="form-group row">
  <label for="staticEmail" class="col-sm-3 col-form-label">State Board Registration certificate:  </label>
  <div class="col-sm-9">
   <img src="img/bt1.png" class="img-fluid" id="main2" style="display:none;">
</div>
</div>
</div>
<div class="form-group row">
   <label for="staticEmail" class="col-sm-3 col-form-label">WORK PROFILE: </label>
   <div class="col-sm-9">          
     <p class="previws" id="a66"></p>
  </div>
</div>
<div class="form-group row">
   <label for="staticEmail" class="col-sm-3 col-form-label">STATE/ Province: </label>  
   <div class="col-sm-9">          
     <p class="previws" id="a77"></p>
  </div>
</div>

<div id="student" >
 <div class="form-group row" >
  <label for="staticEmail" class="col-sm-3 col-form-label">PINCODE/ZIP CODE: </label>
  <div class="col-sm-9">
   <p class="previws" id="a88"></p>
</div>
</div>

<div class="form-group row">
  <label for="staticEmail" class="col-sm-3 col-form-label">Country*:  </label>
  <div class="col-sm-9">
   <p class="previws" id="a99"></p>
</div>
</div>



<div class="form-group row">
  <label for="staticEmail" class="col-sm-3 col-form-label">NATIONALITY :  </label>
  <div class="col-sm-9">
    <p class="previws" id="b10"></p>
 </div>
</div>
</div>
<!--end-->

<div >
   <div class="form-group row" >
     <label for="staticEmail" class="col-sm-3 col-form-label">Email Id:  </label>
     <div class="col-sm-9">
      <p class="previws" id="b11"></p>
   </div>
</div>

<div class="form-group row">
  <label for="staticEmail" class="col-sm-3 col-form-label">Contact No:   </label>
  <div class="col-sm-9">
   <p class="previws" id="b12"></p>
</div>
</div>
</div>
<div >
 <div class="form-group row" >
  <label for="staticEmail" class="col-sm-3 col-form-label">Whatsapp No: </label>
  <div class="col-sm-9">
   <p class="previws" id="b13"></p>
</div>
</div>


</div>
<div class="form-group row">                  
 <div class="col-sm-12">
                      <!-- <input id="checkbox" type="checkbox" style="margin-right: 10px;">
                        <label for="checkbox"> I agree to these <a href="terms.html">Terms and Conditions</a> </label>-->
                        <button type="button" class="reg-btn"  onclick="submitForm()">PAY <span id="payCost"></span></button> 
                        <button type="button" class="reg-btn" data-dismiss="modal">CLOSE</button>                     </div>
                  </div>                

               </div>
            </div>           
         </div>
      </div>
   </div>
</div>
</div>
<form action="payrouter.php" method="post" accept-charset="ISO-8859-1" id="myformm" style="display:none;">
   <input class="textbox"type="text" name="merchantId" id="merchantId" value="M0000525" > 
   <input class="textbox"type="text" name="apiKey" id="apiKey" value="HB1Ql1sf0sp5vu1jv5Qv4BU3uf3cM3zn" >
   <input class="textbox"type="text" name="txnId" id="txnId" value="<?php echo substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6).rand(100,999); ?>">
   <input class="textbox" type="text" name="amount" id="amount" value="" > 
   <input class="textbox"type="text" name="dateTime" id="dateTime" value = "<?php echo date('Y-m-d h:i:s'); ?>" >
   <input class="textbox"type="text" name="custMail" value="mohitcool.mohit@gmail.com" id="m11" > 
   <input class="textbox"type="text" name="custMobile" value="9045500610" id="m22">
   <input class="textbox1"type="text" name="returnURL" id="returnURL" value="https://afi-india.in/response.php">
   <input class="textbox"type="text" name="productId" id="productId" value="DEFAULT" >
   <input class="textbox" type="text" name="channelId" id="channelId" value="0" > 
   <input class="textbox"type="text" name="isMultiSettlement" id="isMultiSettlement" value="0" >
   <input class="textbox"type="text" name="txnType" id="txnType" value="DIRECT" >
   <input class="textbox"type="text" name="instrumentId" id="instrumentId" value="NA" >
   <input class="textbox"type="text" name="udf3" id="udf3" value="NA" >
   <input class="textbox"type="text" name="udf4" id="udf4" value="NA" >
   <input class="textbox"type="text" name="udf5" id="udf5" value="NA" >
   <input class="textbox"type="text" name="cardDetails" id="cardDetails" value="NA" >
   <input class="textbox"type="text" name="cardType" id="cardDetails" value="NA" >
   <input type="submit" name="submitt" value="Submit" id="submit11">


</form>
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

boardImage.onchange = evt => {
 const [file] = boardImage.files
 if (file) {
  blahCertificate.src = URL.createObjectURL(file)
  main2.src = URL.createObjectURL(file)
  $("#main2").css("display","block");
  $("#blahCertificate").css("display","block");
  $("#boardImage").css("margin-top","120px");
  $("#boardImage").css("position","relative");
}
}
show=()=>{
   $("#showBoard").css("display","flex");
}
hide=()=>{
   $("#showBoard").css("display","none");
}
open_modal=()=>{
 var aa= $('input[name="membershipType"]:checked').val();
 var gender;

 if(aa== '5100.00'){
  gender="PATRON (or Doctor)";
}
if(aa=='2100.00'){
  gender="ASSOCIATE MEMBER";
}
if(aa=='2100.00'){
  gender="OVERSEAS MEMBER";
}
$("#mm").html(gender);
$("#a11").html($("#a1").val());
$("#a22").html($("#a2").val());
$("#a33").html($("#a3").val());
$("#a44").html($("#a4").val());
var aa1= $('input[name="if_doctor"]:checked').val();
var ifyes;
if(aa1==1){
  ifyes="YES";
  $("#prac").css("display","block");
  $("#axx").html($("#axxx").val());
}
else{
  ifyes="NO";
  $("#prac").css("display","none");
}
$("#a55").html(ifyes);
$("#a66").html($("#r1").val());
$("#a77").html($("#r2").val());
$("#a88").html($("#r3").val());
$("#a99").html($("#r4").val());
$("#b10").html($("#r5").val());
$("#b11").html($("#r6").val());
$("#b12").html($("#r7").val());
$("#b13").html($("#r8").val());

}
submitForm=()=>{
  $("#submit1").click();
}


$(document).ready(function(){
   var parton = $("#patron").val();
   $("#memberShipCost").text(parton);
   $("#preCost").text(parton);
   $("#payCost").text(parton);
});
$("#assMember").click(function(){
   var assMember = $("#assMember").val();
   $("#memberShipCost").text(assMember);
      $("#preCost").text(assMember);
      $("#payCost").text(assMember);


});
$("#overSasMember").click(function(){
   var overSasMember = $("#overSasMember").val();
   $("#memberShipCost").text(overSasMember);
         $("#preCost").text(overSasMember);
         $("#payCost").text(overSasMember);


});
$("#patron").click(function(){
   var assMember = $("#patron").val();
   $("#memberShipCost").text(assMember);
            $("#preCost").text(assMember);
            $("#payCost").text(assMember);


});
</script>