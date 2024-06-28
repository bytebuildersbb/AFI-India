<?php include "../layouts/main-header.php"; ?>
<?php 
	/*Update Slider*/
    if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $query      =    "DELETE FROM `tbl_video` WHERE `video_id_pk`  = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
            <script>alert('Deleted');</script>
            <script>window.location.href='http://afi-india.in/admin/video/listing';</script>
         ?>
      <?php }
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
                     <h4 class="card-title">Video List</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Video Title</th>
                              <th>URL</th>
                              <th>Added On</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$query 		=	"SELECT * FROM tbl_video order by video_id_pk desc";
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= $row['videoTitle']; ?></td>
                              <td>
                               <?= $row['videoTitle']; ?>
                              </td>
                             
                              <td><?php echo date("d-F-Y", strtotime($row["createdOn"]));  ?></td>
                            
                              <td>
     <a href="index.php?Eid=<?php echo $row["video_id_pk"]; ?>" class="btn btn-outline-primary btn-xs">Edit</a>
                                  <a href="listing.php?id=<?php echo $row["video_id_pk"]; ?>" class="btn btn-outline-success btn-xs">Delete</a>
                              </td>
                           </tr>
                       <?php $count++; endwhile; 	?>
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