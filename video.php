<?php include "layouts/main-header.php"; 

    $query = "SELECT * FROM tbl_video order by video_id_pk DESC";
    $runQuerys   =  $connect->query($query);
?>

<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Videos</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Videos</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="team-area clear-fix  bg-light pt-5 pb-5">
        <div class="container">
            <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <span>Videos</span>
                    <h2>Videos</h2>
                </div>
            </div>
            <div class="row">
			
			<?php while( $row = $runQuerys->fetch_assoc()){  ?>
				
				<div class="col-md-4 mb-4 ">
                    <div class="video_default">
						<a href="<?php echo $row['videoURL']; ?>" target="_blank">
							<h4 class="pt-4"><?php echo $row['videoTitle']; ?></h4>
                            <iframe height="250" src="<?php echo $row['videoiframeurl'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</a>
                    </div>
                </div>
				
			<?php } ?>
                
            </div>
        </div>
    </div>
	

<?php include "layouts/main-footer.php"; ?>