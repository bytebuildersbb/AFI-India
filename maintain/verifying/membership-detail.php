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
<!-- <div class="banner">
   <div class="owl-carousel owl-theme" id="head">
     <div class="item">
       <div class="head-text">
       <img src="img/banner.png" class="img-fluid"> 
        <div class="banner-text">
        <h1 class="wow fadeInUp">Ayurveda Federation of India</h1>
        <h5 class="wow fadeInDown">Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life.” Ayurvedic knowledge originated in India more than 5,000 years ago and is often called the “Mother of All Healing."</h5>   
        <p class="wow fadeInRight"><a href="">Know More</a></p>     
        </div>       
       </div>
     </div>
     <div class="item">
       <div class="head-text">
       <img src="img/banner.png" class="img-fluid"> 
        <div class="banner-text">
        <h1 class="wow fadeInUp">Ayurveda Federation of India</h1>
        <h5 class="wow fadeInDown">Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life.” Ayurvedic knowledge originated in India more than 5,000 years ago and is often called the “Mother of All Healing."</h5>        
        <p class="wow fadeInRight"><a href="">Know More</a></p> 
        </div>       
       </div>
     </div>
     <div class="item">
       <div class="head-text">
       <img src="img/banner.png" class="img-fluid"> 
        <div class="banner-text">
        <h1 class="wow fadeInUp">Ayurveda Federation of India</h1>
        <h5 class="wow fadeInDown">Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life.” Ayurvedic knowledge originated in India more than 5,000 years ago and is often called the “Mother of All Healing."</h5>  
        <p class="wow fadeInRight"><a href="">Know More</a></p>       
        </div>       
       </div>
     </div>       
   </div>
   </div> -->
<?php 
   $query = "SELECT * FROM tbl_membership_details ORDER BY membership_detail_id_pk  DESC LIMIT 1";
   $runQuery   =  $connect->query($query);
   $dataObj    =  $runQuery->fetch_object();
   ?>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">Membership Details</h2>
         </div>
      </div>
      <div class="row pt-md-3 joter">
         <div class="member">
            <h4>Members:</h4>
            <div class="mem-data">
               <p> Life Member:</p>
               <p><?= $dataObj->lifeMCost; ?> INR/-</p>
            </div>
            <div class="mem-data">
               <p> Special Patron Member:</p>
               <p> <?= $dataObj->spacialPCost; ?> INR/-  </p>
            </div>
            <div class="mem-data">
               <p>   Associate Member:</p>
               <p><?= $dataObj->associateCost; ?> INR/- </p>
            </div>
            <div class="mem-data">
               <p> Overseas : </p>
               <p><?= $dataObj->overseasCost; ?> INR/- (only for SAARC countries) ; for other countries 100 $/-</p>
            </div>
            <div class="mem-data">
               <p>Students: </p>
               <p><?= $dataObj->studentCost; ?> INR/- </p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">CLASSIFICATION OF MEMBERS </h2>
         </div>
      </div>
      <div class="row pt-md-3 joter">
         <div class="members">
            <div class="mem-data-list">
               <p> <?php echo $dataObj->lifeMemberText; ?></p>
            </div>
         </div>
      </div>
      <div class="row pt-md-3 joter">
         <div class="members">
            <div class="mem-data-list">
               <p><?php echo $dataObj->associateMembersText; ?></p>
            </div>
         </div>
      </div>
      <div class="row pt-md-3 joter">
         <div class="members">
            <div class="mem-data-list">
               <p>                     <?php echo $dataObj->overseasMembersText; ?></p>
            </div>
         </div>
      </div>
      <div class="row pt-md-3 joter">
         <div class="members">
            <div class="mem-data-list">
               <p>                     <?php echo $dataObj->studentMemberText; ?></p>
            </div>
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
<script></script>
<script>
   $('.counter').countUp();
</script>
</body>
</html>