<?php 
   include "layouts/main-header.php"; 
   if(isset($_POST["submit"])){
      $token   =  $_POST["token"];
      /*Token Validation*/  
      if(empty($token)){
         $errorMsg=  "Token is missing";
         $code= "12" ;
      }else if($token == $_SESSION["token"]){
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

         $tremcondition =     @$_POST["tremcondition"];
         $profilePicName=     $_FILES['profilePic']["name"] ;
         $temp = explode(".", $profilePicName);
         $newfilename = round(microtime(true)) . '.' . end($temp);
         $profilePicTmpName      =     $_FILES['profilePic']["tmp_name"] ;
         $profilePicSize=     $_FILES['profilePic']["size"] ;
        
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
               strcmp($profilePicTmpName, "uploads/profilePics/" . $newfilename);
               strcmp($boardTmpName, "uploads/certificate/" . $boardRename);
               $errorMsg=  "Your membership form submitted successfully";
               $code= "13" ;
               ?>
<script type="text/javascript">
   setTimeout(function () {
      window.location.href= 'index.html'; // the redirect goes here
   },5000); // 5 seconds
</script>
<?php }
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
</style>
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
      <?php } ?>
      <form action="" method="post" enctype="multipart/form-data">
         <div class="row pt-md-3 jots ">
            <div class="afi-form">
               <p style="text-align:left;">Note : ALL WORDS SHOULD BE IN THE CAPITAL LETTER</p>
               <div class="formt">
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">TYPE OF MEMBERSHIP:  </label>  
                     <div class="col-sm-9">
                        <input type="hidden" name="token" value="<?php echo CSRF(); ?>" />
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="membershipType"  value="0" checked>
                           <label class="form-check-label" for="membershipType1"> PATRON (or Doctor)</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="membershipType"  value="1" checked>
                           <label class="form-check-label" for="membershipType1">ASSOCIATE MEMBER  </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="membershipType"  value="2" checked>
                           <label class="form-check-label" for="membershipType1"> OVERSEAS MEMBER   </label>
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
                        <input type="text"  class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>"  placeholder="" name="name" value="<?php if(isset($name)){echo $name;} ?>">
                        <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">ADDRESS :-  </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>"  name="address" value="<?php if(isset($address)){echo $address;} ?>" >
                        <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">COMPANY NAME  & ADDRESS :  </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="comAddress" value="<?php if(isset($comAddress)){echo $comAddress;} ?>">
                        <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">QUALIFICATION :  </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==4): echo 'errorMsg'; endif;?>" name="qualification" value="<?php if(isset($qualification)){echo $qualification;} ?>">
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
                        <input type="text" class="form-control <?php if(isset($code) && $code==20): echo 'errorMsg'; endif;?>" placeholder="" name="registerdBoard" value="<?php if(isset($registerdBoard)){echo $registerdBoard;} ?>" >
                        <?php if (isset($code) && $code==20) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        <img id="blahCertificate"  style="position: absolute;  width: auto; border: 1px dashed; display: none;bottom: 50; height: 120px;" />
                        <input type="file" class="form-control" id="boardImage" name="boardImage" style="border:none;">
                        <label for="staticEmail" class="col-form-label">(Please upload a strcmp of state Board Registration certificate) </label>
                     </div>
                  </div>
              
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">WORK PROFILE:  </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==5): echo 'errorMsg'; endif;?>" name="workProfile" value="<?php if(isset($workProfile)){echo $workProfile;} ?>">
                        <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">STATE/ Province*  </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==6): echo 'errorMsg'; endif;?>" name="state" value="<?php if(isset($state)){echo $state;} ?>">
                        <?php if (isset($code) && $code==6) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                      <label for="staticEmail" class="col-sm-3 col-form-label">PINCODE/ZIP CODE:-  </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==21): echo 'errorMsg'; endif;?>" name="pincode" value="<?php if(isset($pincode)){echo $pincode;} ?>">
                     <?php if (isset($code) && $code==21) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                      </div>
                    </div>
                  <div class="form-group row">
                   <label for="staticEmail" class="col-sm-3 col-form-label">Country*   </label>
                   <div class="col-sm-9">
                     <input type="text" class="form-control <?php if(isset($code) && $code==22): echo 'errorMsg'; endif;?>" name="country" value="<?php if(isset($country)){echo $country;} ?>">
                     <?php if (isset($code) && $code==22) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                   </div>
                 </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">NATIONALITY :</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==7): echo 'errorMsg'; endif;?>" name="nationality" value="<?php if(isset($state)){echo $state;} ?>">
                        <?php if (isset($code) && $code==7) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Email Id: </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==8): echo 'errorMsg'; endif;?>" name="emailID" value="<?php if(isset($emailID)){echo $emailID;} ?>">
                        <?php if (isset($code) && $code==8) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Contact No: :</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==9): echo 'errorMsg'; endif;?>" name="phoneNo" value="<?php if(isset($phoneNo)){echo $phoneNo;} ?>">
                        <?php if (isset($code) && $code==9) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="staticEmail" class="col-sm-3 col-form-label">Whatsapp No:</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control <?php if(isset($code) && $code==10): echo 'errorMsg'; endif;?>" name="wNumber" value="<?php if(isset($wNumber)){echo $wNumber;} ?>">
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

   boardImage.onchange = evt => {
     const [file] = boardImage.files
     if (file) {
       blahCertificate.src = URL.createObjectURL(file)
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
</script>