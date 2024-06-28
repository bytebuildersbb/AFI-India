<?php
include "layouts/main-header.php"; 
	$query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
	$runQuery   =  $connect->query($query);
	$dataObj    =  $runQuery->fetch_object();
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
	
	<!-- about-area start-->
    <div class="hx-about-style-3 ">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-7 col-12">
                    <div class="hx-about-content">
                        <div class="hx-site-title">
                            <h2>About AFI</h2>
                        </div>                        
                        <?= $dataObj->aboutUs_Description; ?>
						<div class="btn-style"><a href="mission.php">View More !</a></div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="hx-about-img">
                       <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" alt=""> 
                    </div>
                </div>
            </div>
         <!-- .hx-counter-area end -->
        </div>
    </div>
    <!-- about-area end-->
    
     <!-- about-area start-->
    <div class="hx-about-style-3 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="hx-about-img">
                       <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" alt=""> 
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hx-about-content">
                        <div class="hx-site-title">
                            <h2>About Ayurveda</h2>
                        </div>                        
                        <p><?= $dataObj->aboutFounder; ?></p>
                    </div>
                </div>
            </div>
         <!-- .hx-counter-area end -->
        </div>
    </div>
    <!-- about-area end-->
    
	<div class="join_india ptb-100-70">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-l2">
                    <div class="hx-site-title-1 text-center">
                        <span>Join with Us</span>
                        <h2>Join Ayurveda Federation of India</h2>
                    </div>
                </div>

                <div class="col-12">
                    <div class="ayurveda">
                        <div class="row">
                            <div class="col-md-4 col-12 mb-3 ">
                                <a href="member-id-card.php"><img src="assets/images/afi1.png"
                                        class="img-fluid afilift"></a>
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <img src="assets/images/afi2.png" class="img-fluid afilift">
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <a href="membership.php"><img src="assets/images/afi3.png"
                                        class="img-fluid afilift"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<?php include "layouts/main-footer.php"; ?>