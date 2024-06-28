<?php include "layouts/main-header.php"; ?>
<?php
   if(isset($_POST["submitSubscribe"])){
       $subName    =   $_POST["subName"];
       $query      =   "SELECT * FROM tbl_subscribe WHERE emailID = '$subName'";
       $runQuery   =   $connect->query($query);
       if($subName == ""){
           $errorMsg = "Please enter your Email ID";
           $code = 1;
       }else{
       if(mysqli_num_rows($runQuery) > 0){ ?>
<script type="text/javascript">
   alert('Email ID already exist');
</script>
<?php }else{
   $query      = "INSERT INTO `tbl_subscribe`(`emailID`) VALUES ('$subName')";
   $runQuery   =   $connect->query($query);
   if($runQuery){ ?>
<script type="text/javascript">
   alert('Thanks for subscribe us.');
</script>
<?php }
   }
   }
   }
   
   ?>
   <?php 
      if(isset($_POST['submit'])){
         $csrf        =  $_POST["csrf"];
         $name        =  $_POST["name"];
         $mobileNo    =  $_POST["mobileNo"];
         $emailID     =  $_POST["emailID"];
         $address     =  $_POST["address"];
         $message     =  $_POST["message"];
         if(empty($csrf)){
            $errorMsg   =  "CSRF Token Missing";
            $code    =  1;
         }else if($csrf != $_SESSION['token']){
            $errorMsg   =  "CSRF Token Incorrect.";
            $code    =  1;
         }else if($name == ""){
            $errorMsg   =  "Please enter your name.";
            $code    =  2; 
         }else if($mobileNo == ""){
            $errorMsg   =  "Please enter your Mobile No.";
            $code       =  3; 
         }else if($emailID == ""){
            $errorMsg   =  "Please enter your Email ID.";
            $code       =  4; 
         }else{
            $query   =  "INSERT INTO `tbl_contact_us`(`name`, `mobileNo`, `emailID`, `address`, `message`) VALUES ('$name','$mobileNo','$emailID','$address','$message')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
               $errorMsg   =  "Thanks for choose us. our representative contact to you soon!";
               $code       =  5;    
            }
         }
      }

   ?>
<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
     .ck-content>p{
   height: 100px !important;
   }
</style>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="about pt-md-5 pb-md-5" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="headers">
            <h2 class="wow fadeInLeft">Contact Us</h2>
            <p>Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life."</p>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="contact pt-md-5 pb-md-5">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="add1">
               <h2>Company Address</h2>
               <p>80, Ground Floor-Rt. Side,</p>
               <p> New Manglapuri,Mehrauli Gurgaon Road ,</p>
               <p>New Delhi - 110030</p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="add1">
               <h2>Email</h2>
               <img src="img/mt1.png" class="img-fluid">  
               <a href="mailto:ayurvedafederation@gmail.com">ayurvedafederation@gmail.com</a> 
            </div>
            <div class="add2 pt-md-4">
               <h2>Phone</h2>
               <img src="img/mt3.png" class="img-fluid"> 
               <a href="tel:011-41354100">011-41354100</a> /<a href="tel:8595336710">8595336710</a>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="map pt-3 pb-3">
   <div class="container">
      <div class="row">
         <div class="add1">
            <h2>Post Your Query</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 pl-md-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.241423084849!2d77.16669831455661!3d28.502383296711454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1e15b7e41765%3A0x53f70bb5f0dca4ee!2sMehrauli-Gurgaon%20Rd%2C%20New%20Manglapuri%2C%20Manglapuri%20Village%2C%20Sultanpur%2C%20New%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1627385964612!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         </div>
         <div class="col-md-6">
            <?php if(isset($code) && $code == 1): ?>
               <div class="alert alert-danger" role="danger"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
            <?php if(isset($code) && $code == 5): ?>
               <div class="alert alert-success" role="danger"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
            <div class="conts-form">
               <form action="" method="POST">
                  <input type="hidden" name="csrf" value="<?php echo CSRF(); ?>">
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label wow fadeInLeft">Your Name </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control wow fadeInRight <?php if(isset($code) && $code==2):echo 'errorMsg'; endif; ?>" placeholder="Full Name" name="name" value="<?php if(isset($name)):echo $name; endif; ?>">
                     <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label wow fadeInLeft">Mobile Number </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control wow fadeInRight <?php if(isset($code) && $code==3):echo 'errorMsg'; endif; ?>" placeholder="Your Phone Number" name="mobileNo" value="<?php if(isset($mobileNo)):echo $mobileNo; endif; ?>">
                        <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label wow fadeInLeft">Your Email </label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control wow fadeInRight <?php if(isset($code) && $code==4):echo 'errorMsg'; endif; ?>" placeholder="mail@example.com" name="emailID" value="<?php if(isset($emailID)):echo $emailID; endif; ?>">
                     <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label wow fadeInLeft">Address</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control wow fadeInRight" placeholder="Enter Your Address" name="address">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-3 col-form-label wow fadeInLeft">Enter Your Message</label>
                     <div class="col-sm-9">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                     </div>
                  </div>
                  <div class="form-button offset-md-3">
                     <input type="submit" name="submit" class="frm-btns wow fadeInLeft" value="SUBMIT">
                     <input type="button" name="" class="frm-btns wow fadeInRight" value="RESET">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="register pt-md-3 pb-md-3">
   <div class="container">
      <div class="row pb-md-3">
         <div class="heads">
            <h2 class="wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">Testimonial</h2>
            <p class="wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">What people say about us</p>
         </div>
      </div>
      <div class="row">
         <div class="owl-carousel owl-theme owl-loaded owl-drag" id="headers">
            <div class="owl-stage-outer">
               <div class="owl-stage" style="transform: translate3d(-1160px, 0px, 0px); transition: all 0.25s ease 0s; width: 4641px;">
                  <div class="owl-item cloned" style="width: 366.667px; margin-right: 20px;">
                     <div class="item">
                        <div class="head-texts">
                           <p>Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life."</p>
                           <div class="jp">
                              <p><img src="img/ats.png" class="img-fluid"></p>
                              <h4>
                                 <p style="font-weight: 600;">Dr. Virat Sinha</p>
                                 <p>President, Amar Aurveda</p>
                              </h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="owl-item cloned" style="width: 366.667px; margin-right: 20px;">
                     <div class="item">
                        <div class="head-texts">
                           <p>Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life."</p>
                           <div class="jp">
                              <p><img src="img/ats.png" class="img-fluid"></p>
                              <h4>
                                 <p style="font-weight: 600;">Dr. Virat Sinha</p>
                                 <p>President, Amar Aurveda</p>
                              </h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="owl-item cloned" style="width: 366.667px; margin-right: 20px;">
                     <div class="item">
                        <div class="head-texts">
                           <p>Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life."</p>
                           <div class="jp">
                              <p><img src="img/ats.png" class="img-fluid"></p>
                              <h4>
                                 <p style="font-weight: 600;">Dr. Virat Sinha</p>
                                 <p>President, Amar Aurveda</p>
                              </h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php 
                     $getTestmonial    =  "SELECT * FROM tbl_testimonial";
                     $runGetTestonial  =  $connect->query($getTestmonial);
                     while($row = $runGetTestonial->fetch_object()){
                     ?>
                  <div class="owl-item active" style="width: 366.667px; margin-right: 20px;">
                     <div class="item">
                        <div class="head-texts">
                           <p><?= $row->content; ?></p>
                           <div class="jp">
                              <p><img src="uploads/testimonial/<?php echo $row->autherImage; ?>" class="img-fluid"></p>
                              <h4>
                                 <p style="font-weight: 600;"><?php echo $row->autherName; ?></p>
                                 <p><?php echo $row->autherOccupation; ?></p>
                              </h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="register pt-md-3 pb-md-3">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">Registered AFI Members</h2>
            <p class="wow fadeInRight">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
         </div>
      </div>
      <div class="row pt-md-3 jits">
         <div class="col-md-4">
            <!--  <div class="register-box">
               <img src="img/r1.png" class="img-fluid">
               <p>AFI member ID card</p>
               </div> -->
            <div class="afis">
               <img src="img/afi1.png" class="img-fluid">
            </div>
         </div>
         <div class="col-md-4">
            <!-- <div class="register-box">
               <img src="img/r2.png" class="img-fluid">
               <p>AFI Total Member</p>
               </div> -->
            <div class="afis">
               <img src="img/afi2.png" class="img-fluid">
            </div>
         </div>
         <div class="col-md-4">
            <!-- <div class="register-box">
               <img src="img/r3.png" class="img-fluid">
               <p>AFI member and volunteer registration</p>
               </div> -->
            <div class="afis">
               <img src="img/afi3.png" class="img-fluid">
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="highlight pt-md-3 pb-md-3">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">Subscribe to our newsletter</h2>
            <p class="wow fadeInRight">Get updates for new classes and new products</p>
         </div>
      </div>
      <div class="row">
         <div class="subscribe">
            <form class="example" action="" method="POST">
               <input type="text" placeholder="Your Email Address" name="subName" class="<?php if(isset($code) && $code==1):echo 'errorMsg'; endif; ?>" value="<?php if(isset($subName)):echo $subName; endif; ?>">
               <button type="submit" name="submitSubscribe">Subscribe</button>
            </form>
            <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>
<script>
   window.onscroll = function() {myFunction()};
   
   var header = document.getElementById("myHeader");
   var sticky = header.offsetTop;
   
   function myFunction() {
     if (window.pageYOffset > sticky) {
       header.classList.add("sticky");
     } else {
       header.classList.remove("sticky");
     }
   }
   
</script>
<script>
   //
        $('#headers').owlCarousel({
           loop:true,
           margin:20,
           autoplay:true,
           nav:true,
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:1
               },
               1000:{
                   items:3
               }
           }
       });
   //
        $('#bans').owlCarousel({
           loop:true,
           margin:20,
           autoplay:true,
           nav:true,
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:1
               },
               1000:{
                   items:3
               }
           }
       });
   
   
   //
        $('#bps1').owlCarousel({
           loop:true,
           margin:20,
           autoplay:true,
           nav:true,
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:1
               },
               1000:{
                   items:3
               }
           }
       });    
   
   
</script>
<script>
   $('.counter').countUp();
</script>
</body>
</html>