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
                      <h5>Course Data Download</h5>
                   	<div class="row">
		<div class="col-lg-12">
			<form method="GET" name="reportFrom" action="CDATA.php">
			    
				<div class="col-lg-8">
					<label>From</label>
					<input type="date" name="start" class="form-control" required="">
				</div>
				<div class="col-lg-8">
					<label>To</label>
					<input type="date" name="end" class="form-control" required="">
				</div>
				
					<div class="col-lg-8">
					<label>Select Course</label>
					<select class="form-control" name="astro" required>
					    <option value="ALL">All Course Data</option>
					<?php
						 $query = "SELECT * FROM tbl_course ORDER BY course_id_pk DESC";
						        $runQuery   = $connect->query($query);
						                while($row = $runQuery->fetch_assoc()){ ?>
						                <option value="<?php echo $row['course_id_pk']; ?>"><?php echo $row['course_name'].", Duration :".$row['course_duration'].", Cost :".$row['course_fee']; ?></option>
						                <?php }
                        ?>
			</select>
				</div>
				
				<div class="col-lg-8">
					<label style="visibility:hidden;">AA</label>
					<button class="btn btn-primary form-control" type="submit" name="submit">Download Data</button>
				</div>
			</form>
		</div>
	</div>
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