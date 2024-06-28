<?php include "layouts/main-header.php"; 

    $query = "SELECT * FROM tbl_foundingteam where t_id NOT IN (2,3) order by t_id ASC";
    $runQuery   =  $connect->query($query);
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
	
	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Founding Team</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Founding Team</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="founder_afi pt-5 pb-5">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <div class="hx-site-title-1 text-center">
                        <h2>Our Founder</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="team-area post mb-md-0 mb-5">

                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-12">


                                <div class="row">
                                    <div
                                        class="col-md-7 col-12 order-md-1 order-2 d-flex justify-content-centent align-items-center mt-4">
                                        <div class="post_text">
                                            <h2>Ayurvedacharya Dr. Abhishek</h2>
                                            <h5 class="text-success">Founder of AFI </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 order-md-2 order-1">
                                        <div class="post_img">
                                            <img src="assets/images/about/img.png" class="img-responsive" alt="Team">
                                            <h5 class="text-success text-center mt-2">Founder</h5>
                                        </div>
                                    </div>
                                </div>

                                <p class="pt-2">Ayurvedacharya Dr. Abhishek has over 15 years of diverse experience in the
                                    Ayurveda
                                    field. Having exceptional communication skills to lead and interface with all levels
                                    of
                                    leadership, and also has a clear understanding of Ayurveda concepts and problems
                                    related to
                                    its graduates and for the last 14 years he has led Ayurveda related issues and its
                                    businesses in different parts of the country. <br/><br/>
                                    Dr. Abhishek has done Bachelor of Ayurveda Medicine and Surgery (B.A.M.S.) from Rajiv
                                    Gandhi
                                    University - Bangalore, Karnataka (India).
                                </p>
                                <p></p>

                                <div class="btns text-center">
                                    <div class="btn-style"><a href="f_teamDetail.php?mid=<?php echo urlencode(base64_encode(2)); ?>">View More !</a></div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-6 d-none">
                    <div class="team-area post">

                        <div class="row ">

                            <div class="col-lg-12 col-md-12 col-12">


                                <div class="row">
                                    <div
                                        class="col-md-7 col-12 order-md-1 order-2 d-flex justify-content-centent align-items-center mt-4">

                                        <div class="post_text">
                                            <h2>Acharya Manish Ji</h2>

                                            <h6 class="text-success">Ayurveda & Meditation Guru</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 order-md-2 order-1">

                                        <div class="post_img">
                                            <img src="assets/images/about/img-2.png" class="img-responsive" alt="Team">
                                            <h5 class="text-success text-center mt-2">Founder-patron</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="team-area-text">
                                    <p class="pt-2 mb-5 ">Acharya Manish is an ayurvedic practitioner who emphasises
                                        prevention rather than cure. Acharya Manish employs age-old ayurvedic medicines
                                        and therapies to nourish the body from the inside out. Acharya Manish invented
                                        Shuddhi, and guides everyone to adopt the disciplined lifestyle. Acharya Manish
                                        Ji raises awareness about leading a disease-free life by following the methods
                                        of Ayurveda.</p>
                                </div>

                                <div class="btns">
                                    <div class="btn-style"><a href="f_teamDetail.php?mid=<?php echo urlencode(base64_encode(3)); ?>">View More !</a></div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>





    <!-- .hx-team-area start -->
    <div class="team-area clear-fix  bg-light pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hx-site-title-1 text-center">
                        <span>Meet Our Expertise</span>
                        <h2>Our Founding Members</h2>
                    </div>
                </div>


                <div class="col-lg-12 col-md-12 col-12">
                    <div class="team_members mb-3">
						
						<?php while($row = $runQuery->fetch_object()){ ?>
						
                        <div class="teams2 p-4  text-center ">
							<img src="admin/uploads/foundingteam/<?php echo $row->t_thumbnail; ?>" class="img-responsive rounded-circle" alt="Team">
                            <h5 class="pt-3"><?php echo $row->t_title; ?></h5>
                            <!--p class="text-success"><?php echo $row->t_designation; ?></p-->
							<div class="btns">
                                <div class="btn-style"><a href="f_teamDetail.php?mid=<?php echo urlencode(base64_encode($row->t_id)); ?>" >View More !</a></div>
                            </div>
                        </div>
						
						<?php } ?>						
                        
                    </div>


                </div>
               
              </div>
        </div>
    </div>
	
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