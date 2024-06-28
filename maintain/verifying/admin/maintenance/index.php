<?php 
   $title   =  "Achivements Memories Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   /*Update Slider*/
   if(isset($_POST["submit"])){
      $updateMode         =     $_POST["updateMode"];
      $query      =     "UPDATE `tbl_maintenance_mode` SET `status`= '$updateMode' WHERE maintenance_id_pk = '1'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ 
      		$code = 1;
      		$errorMsg = "Maintenace Mode Updated";   
       }
   }
   
?>

<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
</style>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <?php if(isset($code) && $code == 1): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title">Maintenance Mode</h4>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <div class="input-group col-xs-6">
                              	<select class="form-control" name="updateMode">
                              		<option>--Please Select--</option>
                              		<option value="1">On</option>
                              		<option value="0">Off</option>
                              	</select>
                        	</div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include "../layouts/main-footer.php"; ?>