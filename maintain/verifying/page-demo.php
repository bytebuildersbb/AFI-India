<?php include "layouts/main-header.php"; ?>
<?php 
   $query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
   $runQuery   =  $connect->query($query);
   $dataObj    =  $runQuery->fetch_object();
?>
<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="about pt-md-5 pb-md-5" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="headers">
            <h2 class="wow fadeInLeft"><?= ucfirst($dataObj->about_heading); ?></h2>
            <p><?= $dataObj->about_paragraph; ?></p>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="vide pb-md-3">
   <div class="container">
      <div class="row">
         <!-- <div class="col-md-6 about-box">
            <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" class="img-fluid">           
         </div> -->
         <div class="col-md-12 about-box1">
            <h4>Ayurveda</h4>
            <div>
               <?= $dataObj->aboutUs_Description; ?>            
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="container">
      <!-- <div class="row">
         <div class="heads pb-3">
            <h2 class="wow fadeInLeft">Founder</h2>
         </div>
      </div> -->
      <div class="row opt pt-md-3 pb-md-3">
         <!-- <div class="col-md-6">
            <div class="f-left">
               <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->founderImg; ?>" class="img-fluid">
            </div>
         </div> -->
         <div class="col-md-12">
            <div class="f-right">
               <div class="qual-data p-0">
                  <?= $dataObj->aboutFounder; ?>            
               </div>
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
            <div class="afis">7747
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
            <form class="example" action="action_page.php">
               <input type="text" placeholder="Your Email Address" name="search">
               <button type="submit">Subscribe</button>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>