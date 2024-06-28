<?php include "layouts/main-header.php"; ?>
<?php 
$search 	=	$_REQUEST['search'];
$query =	"SELECT * FROM tbl_about_us WHERE about_heading LIKE '%".$search."%' OR about_paragraph LIKE '%".$search."%' OR aboutUs_Description LIKE '%".$search."%'";
$runQuery =	$connect->query($query);
$html = array();
if(mysqli_num_rows($runQuery)>0){
	while ($row = $runQuery->fetch_array()) {
		$html[] = '
				<div class="col-md-12 about-box1">
					<h4>'.$row['pageTitle'].'</h4>
					<div>
						'.$row['metaDescription'].'            
					</div>
				</div>
			';
	}
}else{
	/*Table 2*/
	$queryBlog =	"SELECT * FROM tbl_blog WHERE blogTitle LIKE '%".$search."%' OR blogContent LIKE '%".$search."%' OR autherName LIKE '%".$search."%'";
	$runQuery2 =	$connect->query($queryBlog);
	$html = array();
	if(mysqli_num_rows($runQuery2)>0){
		while ($row = $runQuery2->fetch_array()) { 
			$html[] = '
				<div class="col-md-12 about-box1">
					<h4>'.$row['blogTitle'].'</h4>
					<div>
						'.$row['blogContent'].'            
					</div>
				</div>
			';
		}
	}else{
		$html[] = '
			<div class="col-md-12 about-box1">
				<h4>No Record Found</h4>
			</div>
		';
	}
}
?>

<div class="clearfix"></div>
<div class="vide pb-md-3" style="padding-top: 60px;">
	<div class="container">
		<div class="row">
         <!-- <div class="col-md-6 about-box">
            <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" class="img-fluid">           
        </div> -->
        <?php foreach ($html as $key => $value) {
        	print_r($value);
        }
        ?>
    </div>
</div>
</div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>


