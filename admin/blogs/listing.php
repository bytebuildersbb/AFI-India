<?php include "../layouts/main-header.php"; ?>
<?php 
	/*Update Slider*/
    if(isset($_GET["id"])){
      $id         =     $_GET["id"];
     // $type       =     $_GET["type"];
      $query      =     "DELETE FROM `tbl_blog` WHERE blog_id_pk  = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
   <script>alert('Blog is Deleted');</script>
   <?php
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
                     <h4 class="card-title">Blog List</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Blog Title</th>
                              <th>Blog Category</th>
                              <th>Blog Desciption</th>
                              <th>Created On</th>
                              <th>Author Name</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$query 		=	"SELECT * FROM tbl_blog INNER JOIN tbl_blog_category ON tbl_blog.blogCategory = tbl_blog_category.blog_category_id_pk";
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= substr($row["blogTitle"],0,30); ?></td>
                              <td>
                                <?= $row["categoryName"]; ?>
                              </td>
                              <td><?= substr(base64_decode($row["blogContent"]),0,30); ?><a href="">Read More</a></td>
                              <td><?php echo date("d-F-Y", strtotime($row["createdOn"]));  ?></td>
                              <td>
                              	<?php 
                              		if($row["autherName"]==""){
                              			echo "ADMIN";
                              		}else{
                              			echo "Other Admin";
                              		}
                              	?>
                              </td>
                              <td>
                                    <a href="listing.php?id=<?php echo $row["blog_id_pk"];?>" class="btn btn-outline-danger btn-xs">Delete</a>
                                      <a href="index.php?Eid=<?php echo $row["blog_id_pk"];?>" class="btn btn-outline-primary btn-xs">Edit</a>

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