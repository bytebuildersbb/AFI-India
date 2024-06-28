<?php include "layouts/main-header.php"; ?>
<?php 
   $query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
   $runQuery   =  $connect->query($query);
   $dataObj    =  $runQuery->fetch_object();
?>
<div class="clearfix"></div>
<div class="about pt-md-5 pb-md-5" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="headers">
            <h2 class="wow fadeInLeft"><?= ucfirst("Coming soon...."); ?></h2>
            
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>