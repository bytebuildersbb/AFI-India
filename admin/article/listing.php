<?php include "../layouts/main-header.php"; ?>
<?php 
	/*Update Slider*/
    if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_articel` SET `is_active`= '$type' WHERE articel_id_pk  = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):?>
            <script>alert('Article is activated');</script>
         <?php else: ?>
            <script>alert('Article is dectivated');</script>
         <?php endif; ?>
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
                     <h4 class="card-title">Blog List</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Article Title</th>
                              <th>Article Category</th>
                              <th>Article Desciption</th>
                              <th>Created On</th>
                        
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$query 		=	"SELECT * FROM tbl_articel INNER JOIN tbl_blog_category ON tbl_articel.articelCategory = tbl_blog_category.blog_category_id_pk";
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= substr($row["articelTitle"],0,30); ?></td>
                              <td>
                                <?= $row["categoryName"]; ?>
                              </td>
                              <td><?= substr($row["articelContent"],0,30); ?></td>
                              <td><?php echo date("d-F-Y", strtotime($row["createdOn"]));  ?></td>
                            
                              <td>
                              	<?php 

                                    if($row["is_active"] == 0){ ?>
                                       <a href="listing.php?id=<?php echo $row["articel_id_pk"];?>&type=1" class="btn btn-outline-danger btn-xs">Inactive</a>
                                         <a href="index.php?Eid=<?php echo $row["articel_id_pk"];?>" class="btn btn-outline-primary btn-xs">Edit</a>
                                    <?php }else{ ?>
                                       <a href="listing.php?id=<?php echo $row["articel_id_pk"];?>&type=0" class="btn btn-outline-success btn-xs">Activated</a>
                                       <a href="index.php?Eid=<?php echo $row["articel_id_pk"];?>" class="btn btn-outline-primary btn-xs">Edit</a>
                                    <?php } ?>
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