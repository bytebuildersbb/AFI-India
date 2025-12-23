<?php include "layouts/main-header.php"; 

    $Type       =   str_replace('-', ' ', $_REQUEST['MemberType']);
    $select     =   "select * from tbl_core_committee where designation='$Type'";
    $runQuery   =   $connect->query($select);
?>

<style>

.teams2 h5 {
    height: 55px;
}
.text-success {
    height: 10px;
}
@media (max-width: 767px) {
.teams2 h5 {
    height: auto;
}
.text-success {
   height: auto;
}
}

</style>

	<div class="top-header marquee pt-2">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-md-12">
                    <div class="marquee_text">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                            onmouseout="this.start();"><a
                                href="file:///C:/Users/user/Downloads/AFI-Project/AFI-Project/membership.html">AFI
                                Membership Plans</a></marquee>
                        <marquee behavior="scroll" direction="Right" onmouseover="this.stop();"
                            onmouseout="this.start();"><a href="#">Ayurved Arjun Event</a></marquee>
                    </div>
                </div>

            </div>
        </div>
    </div>
	
    <!-- start of hero -->
    <div class="team-area clear-fix bg-light pt-5 pb-5">
        <div class="container">
                    <div class="hx-site-title-1 text-center">
                        <h2><?= $Type; ?></h2>
                    </div>
            
                    <div class="row justify-content-center">

						<?php while($row = $runQuery->fetch_object()){ ?>
						
                        <div class="col-lg-3 col-md-3 mb-4">
                        
                        <div class="teams2 p-4 text-center h-100">
                            <img src="admin/uploads/committee/<?php echo $row->profilePic; ?>" class="img-responsive rounded-circle" alt="Team">
                            <h5 class="pt-3 mb-1"><?php echo $row->name; ?></h5>
                            <p class="text-success mb-2"><?php echo $row->DesignationName; ?></p>
                            <div class="btns custom-btn">
                                <div class="btn-style"><a href="c_teamDetail.php?mid=<?php echo urlencode(base64_encode($row->core_committee_id_pk)); ?>" >View More</a></div>
                           </div>
                        </div>
						</div>
						
						<?php } ?>
					</div>
						
			</div>
		</div>

<?php include "layouts/main-footer.php"; ?>

