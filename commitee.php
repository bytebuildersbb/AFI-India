<?php include "layouts/main-header.php"; 

    $Type       =   str_replace('-', ' ', $_REQUEST['MemberType']);
    $select     =   "select * from tbl_core_committee where designation='$Type'";
    $runQuery   =   $connect->query($select);
?>

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
    <div class="team-area clear-fix  bg-light pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hx-site-title-1 text-center">
                        <span>Meet Our Expertise</span>
                        <h2><?= $Type; ?></h2>
                    </div>
                </div>
    
				<div class="col-lg-12 col-md-12 col-12">
                    <div class="team_members mb-3">
						<?php while($row = $runQuery->fetch_object()){ ?>
						
                        <div class="teams2 p-4  text-center ">
                            <img src="admin/uploads/committee/<?php echo $row->profilePic; ?>" class="img-responsive rounded-circle" alt="Team">
                            <h5 class="pt-3"><?php echo $row->name; ?></h5>
                            <p class="text-success"><?php echo $row->DesignationName; ?></p>
                            <div class="btns">
                                <div class="btn-style"><a href="c_teamDetail.php?mid=<?php echo urlencode(base64_encode($row->core_committee_id_pk)); ?>" onclick="return false">View More !</a></div>
                            </div>
                        </div>
						
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
    </div>

<?php include "layouts/main-footer.php"; ?>

