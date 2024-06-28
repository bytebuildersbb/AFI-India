<?php include "layouts/main-header.php"; ?>
<?php 
   $query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
   $runQuery   =  $connect->query($query);
   $dataObj    =  $runQuery->fetch_object();
?>
<div class="clearfix"></div>
<div class="clearfix"></div>

<div class="clearfix"></div>
<div class="vide pb-md-3">
   <div class="container">
      <div class="row">
         <!-- <div class="col-md-6 about-box">
            <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" class="img-fluid">           
         </div> -->
         <div class="col-md-12 about-box1" style="border-radius: 5px;">
            <h4>Ayurveda</h4>
            <div>
               <?= $dataObj->aboutUs_Description; ?>            
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<!-- <div class="register pt-md-3 pb-md-3">
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
</div> -->
<div class="clearfix"></div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>