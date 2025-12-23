<?php include "layouts/main-header.php"; ?>
<?php
if(isset($_POST["submit"])){
   $token   =  $_POST["token"];
   $name    =  $_POST["name"]; 
   $gender  =  $_POST["gender"];
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
   $payment1  = '500.00';
   $payment2  = '2100.00';
   $payment3  = '5100.00';
   $paymentstatus1 = 'Failed';
   $clinicAddress       =     $_POST["clinicAddress"];
   $state               =     $_POST["state"];
   $nationality         =     $_POST["nationality"];
   $dob           =  $_POST["dob"];
   $memberType    =  $_POST["memberType"];
   $collageName   =  $_POST["collageName"];
   $enrollmentNo  =  $_POST["enrollmentNo"];
   $registerdDate =  $_POST["registerdDate"];
   $PL__collage_name =  $_POST["PL__collage_name"];
   $proLectEmail =  $_POST["proLectEmail"];
   /*PL__Image ID Card Image*/
   $idCardProLect    =     $_FILES['PL_profile_image']["name"] ;
   $tempIdCardProLect = explode(".", $idCardProLect);
   $idCardNewProLect  = round(microtime(true)) . '_pro_lect.' . end($tempIdCardProLect);
   $ProLectTempName   =     $_FILES['PL_profile_image']["tmp_name"] ;
   $ProLectSize      =     $_FILES['PL_profile_image']["size"];
   $proLectExtension = pathinfo($_FILES["PL_profile_image"]["name"], PATHINFO_EXTENSION);

   /*ends*/
   $stateBoard =  $_POST["stateBoard"];
   $contactNo =  $_POST["contactNo"];
   $whatsAppNo =  $_POST["whatsAppNo"];
   $condition =  @$_POST["condition"];
   /*Current Date Start*/
   date_default_timezone_set('Asia/Kolkata');
   $dateCurrent = date('Y-m-d', time());
   /*Current Date Ends*/
   if(empty($token)){
      $errorMsg=  "Token is missing";
      $code= "1";
   }else if($token == $_SESSION["token"]){
      if($name == ""){
         $errorMsg=  "You did not enter a name.";
         $code= "3";
      }else if($profilePicName == ""){
         $errorMsg=  "Please select profile pic.";
         $code= "4";
      }else if($profilePicSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "4";
      }else if(!in_array($Profileextension, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "4";
      }else if($clinicAddress==""){
         $errorMsg=  "You did not enter your clinic address.";
         $code= "5";
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
                  $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent')";
                  $runQuery   =  $connect->query($query);
                  if($runQuery){
                     $last_id = $connect->insert_id;
                        strcmp($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                        $queryMemberStu   =  "INSERT INTO `tbl_if_member_student`(`pro_lect_member_id_fk`, `collage_name`, `enrollment_no`, `id_card_pic`,`payment`,`paymentStatus`) VALUES ('$last_id','$collageName','$enrollmentNo','$idCardNew','$payment1','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                        if($runQueryStu){
                           strcmp($idCardTempName, "uploads/idcards/" . $idCardNew);
                           $errorMsg=  "Your membership form submitted successfully";
                           $code= "20" ;
                           ?>
                           <script type="text/javascript">
                              setTimeout(function () {
                                 window.location.href= 'index.html'; // the redirect goes here
                              },5000); // 5 seconds
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
                  $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent')";
                  $runQuery   =  $connect->query($query);
                  if($runQuery){
                     $last_id = $connect->insert_id;
                        $queryMemberStu   =  "INSERT INTO `tbl_if_member_doctor`(`pro_lect_member_id_fk`, `registartion`, `registered_board`,`payment`,`paymentStatus`) VALUES ('$last_id','$registerdDate','$stateBoard','$payment2','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                        if($runQueryStu){
                                                   strcmp($profilePicTmpName, "uploads/profilePics/" . $newfilename);
                           $errorMsg=  "Your membership form submitted successfully";
                           $code= "20" ;
                           ?>
                           <script type="text/javascript">
                              setTimeout(function () {
                                 window.location.href= 'index.html'; // the redirect goes here
                              },5000); // 5 seconds
                           </script>
                        <?php 
                        }
                  }
               }
            }else if($memberType == 3){
               if($PL__collage_name == ""){
                  $errorMsg=  "You did not enter your college name";
                  $code="14";
               }else if($idCardProLect==""){
                  $errorMsg=  "You did not enter your upload strcmp of Id Card";
                  $code="15";
               }else if($ProLectSize > 2000000){
                  $errorMsg=  "Image size exceeds 2MB";
                  $code="15";
               }else if(!in_array($proLectExtension, $allowed_image_extension)){
                  $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
                  $code= "15";
               }else if($proLectEmail == ""){
                  $errorMsg=  "You did not enter your Email ID";
                  $code="16";
               }else if($contactNo == ""){
                  $errorMsg=  "You did not enter your Contact No";
                  $code="17";
               }else if($whatsAppNo == ""){
                  $errorMsg   =  "You did not enter your Whatsapp No.";
                  $code    ="18";
               }else if($condition == ""){
                  $errorMsg   =  "Please agree Terms and Conditions.";
                  $code    ="19";
               }else if($condition == ""){
                  $errorMsg   =  "Please agree Terms and Conditions.";
                  $code    ="19";
               }else{
                  $query   =  "INSERT INTO `tbl_pro_lect_member_form`(`name`,`profile_pic`,`gender`, `clinic_address`, `state`, `nationality`, `type_of`,`createdDate`) VALUES ('$name','$newfilename','$gender','$clinicAddress','$state','$nationality','$memberType','$dateCurrent')";
                  $runQuery   =  $connect->query($query);
                  if($runQuery){
                     $last_id = $connect->insert_id;
                        $queryMemberStu   =  "INSERT INTO `tbl_if_member_prof_lect`(`pro_lect_member_id_fk`, `collage_name`, `idCard`, `emailID`, `conatctNo`, `whatsappNo`,`payment`,`paymentStatus`) VALUES ('$last_id','$PL__collage_name','$idCardNewProLect','$proLectEmail','$contactNo','$whatsAppNo','$payment2','$paymentstatus1')";
                        $runQueryStu   =  $connect->query($queryMemberStu);
                           if($runQueryStu){
                              strcmp($ProLectTempName, "uploads/idcards/" . $idCardNewProLect);
                              $errorMsg=  "Your membership form submitted successfully";
                              $code= "20" ;
                              ?>
                              <script type="text/javascript">
                                 setTimeout(function () {
                                    window.location.href= 'index.html'; // the redirect goes here
                                 },5000); // 5 seconds
                              </script>
                           <?php 
                        }
                  }
               }
            }else{
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
  </style>
  <div class="clearfix"></div>
  <div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">AFI Membership Form</h2>
            <p class="wow fadeInRight">(For Students/Doctors)</p>
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
      <?php } ?>
      <form action="" method="post" enctype="multipart/form-data">
         <div class="row pt-md-3 jots ">
            <div class="afi-form">
               <p style="text-align:left;">Note : ALL WORDS SHOULD BE IN THE CAPITAL LETTER</p>
               <div class="formt">
                  <input type="hidden" name="token" value="<?php echo CSRF(); ?>" />
                  <div class="pht-upd" style="position: absolute; right: 8%; top: 21% !important;">
                    <!-- <img src="img/bt1.png" class="img-fluid">   -->
                    <img id="blah"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 120px;" />
                    <input type="file" id="imgInp" class="form-control" placeholder="" name="profilePic"> 
                    <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                 </div>
                 <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Name:</label>
                  <div class="col-sm-9">
                     <input type="text" name="name" class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" value="<?php if(isset($name)){echo $name;} ?>">
                     <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">SEX:</label>  
                  <div class="col-sm-9">
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
                  <label for="staticEmail" class="col-sm-3 col-form-label">CLINIC ADDRESS (IF DOCTOR:)</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==5): echo 'errorMsg'; endif;?>" name="clinicAddress" value="<?php if(isset($clinicAddress)){echo $clinicAddress;} ?>">
                     <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">DOB :</label>
                  <div class="col-sm-9">
                     <input type="date" class="form-control <?php if(isset($code) && $code==6): echo 'errorMsg'; endif;?>" name="dob" value="<?php if(isset($dob)){echo $dob;} ?>">
                     <?php if (isset($code) && $code==6) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">STATE :</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==7): echo 'errorMsg'; endif;?>" name="state" value="<?php if(isset($state)){echo $state;} ?>">
                     <?php if (isset($code) && $code==7) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">NATIONALITY :</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==8): echo 'errorMsg'; endif;?>" name="nationality" value="<?php if(isset($nationality)){echo $nationality;} ?>">
                     <?php if (isset($code) && $code==8) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail"  class="col-sm-3 col-form-label">YOU ARE :</label>  
                  <div class="col-sm-9">
                     <select class="form-control" name="memberType" onchange="showFelid(this);">
                        <option value="">--Please Selete--</option>
                        <option value="1">Student</option>
                        <option value="2">Practicioner</option>
                        <option value="3">Prof./Lect.</option>
                     </select>
                  </div>
               </div>
            <div id="student__section" style="display:none;">
               <h5 class="afi-heads">If Students</h5>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">College Name: :</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==9): echo 'errorMsg'; endif;?>" name="collageName" value="<?php if(isset($collageName)){echo $collageName;} ?>">
                     <?php if (isset($code) && $code==9) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Enrollment No:</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==11): echo 'errorMsg'; endif;?>" name="enrollmentNo" value="<?php if(isset($enrollmentNo)){echo $enrollmentNo;} ?>">
                     <?php if (isset($code) && $code==11) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Upload strcmp of Id Card:</label>
                  <div class="col-sm-5 ">
                    <input type="file" id="imgIDCard" class="form-control" name="studentIdCard" >
                    <?php if (isset($code) && $code==10) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                 </div>
                 <div class="col-sm-4">
                  <img id="blahIDCard"  style="position: absolute;  width: auto; border: 1px dashed; bottom: 50; height: 100px; display: none;" />
               </div>
            </div>
            </div>
            <div id="doctor__section" style="display:none;">
            <h5 class="afi-heads">If Doctor</h5>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">Registartion Details:</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control <?php if(isset($code) && $code==12): echo 'errorMsg'; endif;?>" name="registerdDate" value="<?php if(isset($registerdDate)){echo $registerdDate;} ?>">
                  <?php if (isset($code) && $code==12) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
               <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">State Board in Which You Are Registered:</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==13): echo 'errorMsg'; endif;?>" name="stateBoard" value="<?php if(isset($stateBoard)){echo $stateBoard;} ?>">
                     <?php if (isset($code) && $code==13) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                  </div>
               </div>
            </div>
             <div id="proLect__section" style="display:none;"> 
            <h5 class="afi-heads">If Prof./Lect.</h5>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">College Name:</label>
               <div class="col-sm-9" >
                  <input type="text" class="form-control <?php if(isset($code) && $code==14): echo 'errorMsg'; endif;?>" name="PL__collage_name" value="<?php if(isset($PL__collage_name)){echo $PL__collage_name;} ?>" >
                  <?php if (isset($code) && $code==14) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
            </div>
            <div class="form-group row">
               <label for="staticEmail" class="col-sm-3 col-form-label">Upload strcmp of Id Card:</label>
               <div class="col-sm-5">
                  <input type="file" class="form-control" name="PL_profile_image" id="ProLect" placeholder="" style="border:none;">
                  <?php if (isset($code) && $code==15) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
               </div>
               <div class="col-sm-4">
                 <img id="blahProLect"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 50px; z-index: 999;" />
              </div>
           </div>
           <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Email Id: </label>
            <div class="col-sm-9">
               <input type="text" class="form-control <?php if(isset($code) && $code==16): echo 'errorMsg'; endif;?>" name="proLectEmail" value="<?php if(isset($proLectEmail)){echo $proLectEmail;} ?>">
               <?php if (isset($code) && $code==16) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Contact No: :</label>
            <div class="col-sm-9">
               <input type="text" class="form-control <?php if(isset($code) && $code==17): echo 'errorMsg'; endif;?>" name="contactNo" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==17) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
         <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Whatsapp No:</label>
            <div class="col-sm-9">
               <input type="text" class="form-control <?php if(isset($code) && $code==18): echo 'errorMsg'; endif;?>" name="whatsAppNo" value="<?php if(isset($contactNo)){echo $contactNo;} ?>">
               <?php if (isset($code) && $code==18) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
            </div>
         </div>
      </div>
         <div class="form-group row">
            <div class="col-sm-12">
               <input id="checkbox" type="checkbox" name="condition" style="margin-right: 10px;" />
               <label for="checkbox"> I agree to these <a href="terms.html">Terms and Conditions</a> </label>
            </div>
            <?php if (isset($code) && $code==19) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
         <div class="form-group row">
            <input type="submit" name="submit" class="butns" value="Submit">
         </div>
      </div>
   </div>
</div>
</form>
</div>
</div>
<?php include "layouts/main-footer.php"; ?>
<script type="text/javascript">
   imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
     blah.src = URL.createObjectURL(file)
     $("#blah").css("display","block");
     $("#imgInp").css("margin-top","120px");
     $("#imgInp").css("position","relative");
  }
}
imgIDCard.onchange = evt => {
 const [file] = imgIDCard.files
 if(file) {
   blahIDCard.src = URL.createObjectURL(file)
   $("#blahIDCard").css("display","block");
}
}
ProLect.onchange = evt => {
 const [file] = ProLect.files
 if(file) {
   blahProLect.src = URL.createObjectURL(file)
   $("#blahProLect").css("display","block");
}
}
showFelid=(e)=>{
   if(e.value=="1"){
      $("#student__section").css("display","block");
      $("#doctor__section").css("display","none");
      $("#proLect__section").css("display","none");
   }else if(e.value=="2"){
      $("#doctor__section").css("display","block");
      $("#student__section").css("display","none");
      $("#proLect__section").css("display","none");
   }else{
      $("#student__section").css("display","none");
      $("#proLect__section").css("display","block");
      $("#doctor__section").css("display","none");

   }
}
</script>