<?php 
   $title   =  "Achivements Memories Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   /*Update Slider*/
   if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_settings` SET `is_active`= '$type' WHERE setting_id_pk = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):?>
            <script>alert('Status image activated');</script>
         <?php else: ?>
            <script>alert('Status image dectivated');</script>
         <?php endif; ?>
      <?php }
   }
   if(isset($_POST["submit"])){
       $aa=$_REQUEST['alt1'];
      $a="UPDATE `tbl_membership_count` SET `count_num`='$aa'";
      $runQuery   =     $connect->query($a);
 $errorMsg = "Updated successfully";
            $code    =  2;
   }
?>

<?php
   if(isset($_GET["Did"])){
      $query      =  "DELETE FROM `tbl_settings` WHERE setting_id_pk = '".$_GET["Did"]."'";
      $runQuery   =  $connect->query($query);
      if($runQuery){
         $code = 3;
         $errorMsg   =  "Image Deleted";
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
                      <?php if(isset($code) && $code == 3): ?>
                     <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <?php if(isset($code) && $code == 2): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <?php
                     $cc= "select * from tbl_membership_count";
                     $runQueryy   =     $connect->query($cc);
                     $row=mysqli_fetch_object($runQueryy); ?>
                     <h4 class="card-title">Membership Count</h4>
                     <form class="forms-sample" method="POST">
                    
                        <div class="form-group">
                           <label>Membership Count</label>
                           <input type="text" name="alt1" class="form-control" placeholder="100" value="<?php echo $row->count_num; ?>">
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