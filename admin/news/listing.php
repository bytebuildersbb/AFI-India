<?php include "../layouts/main-header.php"; ?>
<?php 
	/*Update Slider*/
    if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_news` SET `is_active`= '$type' WHERE news_id_pk  = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):?>
            <script>alert('News is activated');</script>
         <?php else: ?>
            <script>alert('News is dectivated');</script>
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
                     <h4 class="card-title">News List</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>News Title</th>
                              <th>News Category</th>
                              <th>News Desciption</th>
                              <th>Created On</th>
                              <th>Author Name</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$query 		=	"SELECT * FROM tbl_news INNER JOIN tbl_blog_category ON tbl_news.newsCategory = tbl_blog_category.blog_category_id_pk";
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= substr($row["newsTitle"],0,30); ?></td>
                              <td>
                                <?= $row["categoryName"]; ?>
                              </td>
                              <td><?= substr($row["newsContent"],0,30); ?></td>
                              <td><?php echo date("d-F-Y", strtotime($row["createdOn"]));  ?></td>
                              <td>
                              <?= $row["autherName"]; ?>
                              </td>
                              <td>
                              	<?php 

                                    if($row["is_active"] == 1){ ?>
                                       <a href="listing.php?id=<?php echo $row["news_id_pk"];?>&type=0" class="btn btn-outline-danger btn-xs">Inactive</a>
                                    <?php }else{ ?>
                                       <a href="listing.php?id=<?php echo $row["news_id_pk"];?>&type=1" class="btn btn-outline-success btn-xs">Active</a>
                                       <a href="index.php?Eid=<?php echo $row["news_id_pk"];?>" class="btn btn-outline-primary btn-xs">Edit</a>
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