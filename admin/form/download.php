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
                   	<div class="row">
		<div class="col-lg-12">
			<form method="GET" name="reportFrom" action="DL.php">
			    
				<div class="col-lg-8">
					<label>From</label>
					<input type="date" name="start" class="form-control" required="">
				</div>
				<div class="col-lg-8">
					<label>To</label>
					<input type="date" name="end" class="form-control" required="">
				</div>
				
					<div class="col-lg-8">
					<label>Member Type</label>
						<select class="form-control" name="astro" required>
					   <option value="" >Select</option>
					   <option value="1" >Student Data</option>
					   <option value="2" >Practicioner Data</option>
					   <option value="3" >Prof./Lect Data</option>
					   <option value="4" >Pharmacy Data</option>
					   <option value="5" >Patron Data</option>
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