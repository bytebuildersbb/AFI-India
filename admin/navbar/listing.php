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
if(isset($_GET["del"])){
	$id 	=	$_GET["edit"];
	$query 	=	"DELETE FROM `tbl_menu` WHERE menu_id_pk  = '$id'";
	$runQuery 	=	$connect->query($query);
	if($runQuery){
		$code = 1;
		$errorMsg = "Menu Delete Succssfully";
	}
}
if(isset($_GET["del"])){
	$id 	=	$_GET["del"];
	$query 	=	"DELETE FROM `tbl_menu` WHERE menu_id_pk  = '$id'";
	$runQuery 	=	$connect->query($query);
	if($runQuery){
		$code = 1;
		$errorMsg = "Menu Delete Succssfully";
	}
}
if(isset($_POST["update"])){
	$menuName 	=	$_POST['menuName'];
	$menuURL 	=	$_POST['menuURL'];
	$query 	=	"UPDATE `tbl_menu` SET `manuName`='$menuName',`url`='$menuURL' WHERE menu_id_pk = '".$_GET["edit"]."'";
	$runQuery 	=	$connect->query($query);
	if($runQuery){
		$code = 2;
		$errorMsg = "Menu Update Succssfully";
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
						<?php if(isset($code) && $code == 1): ?>
							<div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
						<?php endif; ?>
						<?php if(isset($code) && $code == 2): ?>
							<div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
						<?php endif; ?>
						<?php if(isset($_GET["edit"])){ ?>
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Update Menus</h4>
									<?php 
										$query = "SELECT * FROM tbl_menu WHERE menu_id_pk = '".$_GET["edit"]."'";
										$runQuery = $connect->query($query);
										$dataObj 	=	$runQuery->fetch_object();
									?>
									<form method="POST">
										<div class="form-group">
											<label>Menu Name</label>
											<input type="text" name="menuName" class="form-control" value="<?= $dataObj->manuName; ?>">
										</div>
										<div class="form-group">
											<label>Menu URL</label>
											<input type="text" name="menuURL" class="form-control" value="<?= $dataObj->url; ?>">
										</div>
										<?php if($dataObj->parent_ID == 0){ ?>
    										<div class="form-group">
    											<label>Menu URL</label>
    											<input type="text" name="menu_order" class="form-control" value="<?= $dataObj->menu_order; ?>">
    										</div>
										<?php } ?>
										<div class="form-group">
											<input type="submit" name="update" class="btn btn-primary" value="Update">
										</div>
									</form>
								</div>
							</div>
						<?php }else{ ?>

							<div class="card-body">
								<h4 class="card-title">Menu List</h4>
								<table class="table table-bordered table-responsive">
									<thead>
										<tr>
											<th>#</th>
											<th>Page Name</th>
											<th>Page URL</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$count = 1;
										$query = "SELECT * FROM tbl_menu";
										$runQuery 	= $connect->query($query);
										while($row = $runQuery->fetch_object()){ ?>

											<tr>
												<td><?= $count; ?></td>
												<td><?= $row->manuName; ?></td>
												<td><?= $row->url; ?></td>
												<td>
													<a href="listing?del=<?php echo $row->menu_id_pk;?>" class="btn btn-danger btn-xs">Delete</a>
													<a href="listing?edit=<?php echo $row->menu_id_pk;?>" class="btn btn-info btn-xs">Edit</a>
												</td>
											</tr>
											<?php $count++; }	?>
										</tbody>
									</table>
								</div>
							<?php }	?>

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