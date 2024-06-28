<?php include "../layouts/main-header.php"; ?>
<?php 
/*Update Slider*/
if(isset($_GET["id"])){
   $id         =     $_GET["id"];
   $type       =     $_GET["type"];
   $query      =     "UPDATE `tbl_blog` SET `is_active`= '$type' WHERE blog_id_pk  = '$id'";
   $runQuery   =     $connect->query($query);
   if($runQuery){ ?>
      <?php if($type==1):?>
         <script>alert('Blog is activated');</script>
      <?php else: ?>
         <script>alert('Blog is dectivated');</script>
      <?php endif; ?>
   <?php }
}
if(isset($_GET["Did"])){
   $id   =  $_GET['Did'];
   $query   =  "DELETE FROM `tbl_doctor_info` WHERE doctor_info_id_pk = '$id'";
   $runQuery   =  $connect->query($query);
   if($runQuery){
      $code = '1';
      $errorMsg = "PDF Content Delete Successfully";
   }
}
?>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                      <?php if(isset($code) && $code == 1): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title">PDF List Doctors</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>PDF Preview</th>
                              <th>PDF File</th>
                              <th>Type</th>
                              <th>PDF Title</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $query = "SELECT * FROM tbl_doctor_info ORDER BY doctor_info_id_pk DESC";
                           $runQuery   =  $connect->query($query);
                           $count = 1;
                           while($row = $runQuery->fetch_assoc()):
                              ?>
                              <tr>
                                 <td><?= $count; ?></td>
                                 <td><img src="../uploads/PDF/<?php echo $row["pdf_image"]; ?>"></td>
                                 <td><img src="../uploads/PDF/<?php echo $row["pdf_image"]; ?>"></td>
                                 <td>
                                    <?php 
                                       if($row["type"]==0){ ?>
                                          <span class="badge badge-primary">Doctor PDF</span>
                                       <?php }else{ ?>
                                          <span class="badge badge-primary">Achievement PDF</span>
                                       <?php }  ?>
                                 </td>
                                 <td><?php echo $row["title"]; ?></td>
                                 <td>
                                    <a href="index.php?Eid=<?php echo $row["doctor_info_id_pk"]; ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="listing.php?Did=<?= $row["doctor_info_id_pk"]; ?>" class="btn btn-danger btn-xs">Delete</a>
                                 </td>
                           </td>
                        </td>
                     </tr>
                     <?php $count++; endwhile;  ?>
                  </tbody>
               </table>
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