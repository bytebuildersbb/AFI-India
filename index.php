<?php include "layouts/main-header.php"; ?>

<!-- header-area end -->
    <div class="top-header marquee pt-2">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-md-12">
                    <div class="marquee_text">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                            onmouseout="this.start();"><a
                                href="membership.php">AFI
                                Membership Plans</a></marquee>
                        <marquee behavior="scroll" direction="Right" onmouseover="this.stop();"
                            onmouseout="this.start();"><a href="#">Ayurved Arjun Event</a></marquee>
                    </div>
                </div>

            </div>
        </div>
    </div>
	
	
    <!-- start of hero -->
    <section class="hero hero-slider-wrapper hx-hero-style-3">
        <div class="hero-slider">
		<?php 
        $getSlider     =  "SELECT * FROM tbl_slide WHERE is_active = 1 order by orderr asc";
        $runGetSlider  =  $connect->query($getSlider);
        while($row = $runGetSlider->fetch_assoc()){
        ?>
            <div class="sliders">
                    <img src="<?php echo IMG_PATH; ?>slider/<?php echo $row["slider_image"]; ?>" alt class="slider-bg img-fluid d-none d-md-block">
                    <img src="<?php echo IMG_PATH; ?>slider/<?php echo $row["slider_image_mobile"]; ?>" alt class="slider-bg img-fluid d-md-none d-block">
                <?php /* echo $row["buttonLink"]; */ ?>	
				<?php /* if(strip_tags($row["content"]) != '' && $row["buttonLink"] !=''){ */ ?>

            </div>
        <?php } ?>    
        </div>
    </section>
	


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
                                <a href="member-id-card.php">
									<img src="assets/images/afi1.png" class="img-fluid afilift">
								</a>
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <img src="assets/images/afi2.png" class="img-fluid afilift">
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <a href="membership.php">
									<img src="assets/images/afi3.png" class="img-fluid afilift">
								</a>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
	
	
	<div class="hx-blog-area ptb-100-70">
        <div class="testimonial">
            <div class="container">
                <div class="col-l2">
                    <div class="hx-site-title-1 text-center">
                        <h2>Events</h2>
                    </div>
                </div>
                <div class="testimonial__inner">
                    <div class="testimonial-slider_latest">
                        <div class="col-md-12">
						<?php
							$current_date = date('Y-m-d');
							$event_query = "SELECT * FROM tbl_events where event_end_date >= '".$current_date."' ORDER BY id DESC";
							$runQuerys   =  $connect->query($event_query);
							
							while($row = $runQuerys->fetch_assoc()){ 
								$startdate=date_create($row['event_start_date']);
								$startdate =  date_format($startdate,"d M Y");
								$enddate=date_create($row['event_end_date']);
								$enddate =  date_format($enddate,"d M Y");
								$created_at = date_format(date_create($row['created_at']), "M d, Y");
						?>
                            <div class="hx-blog-item">
                                <div class="hx-blog-img">
                                    <div class="testimonial__inner">
                                        <div class="testimonial_slider_img">
											
                                            <div class="testimonial-slide">
                                                <div class="testimonial_box">
                                                    <div class="testimonial_box-inner">
                                                        <div class="cases-wrapper2">
                                                            <img src="<?= IMG_PATH; ?>events/<?php echo $row['event_thumbnail'];?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
                                    </div>
                                </div>
                                <div class="hx-blog-content">
                                    <h3><a href="#"><?php echo $row['event_title']; ?></a></h3>
                                    <ul class="post-meta">
                                        <li><img src="assets/images/blog/6.jpg" alt=""></li>
                                        <li>By<a href="#">Admin</a></li>
                                        <li> <?php echo $created_at; ?></li>
                                    </ul>
                                </div>
                            </div>
						
						<?php } ?>
						
                        </div>
                        
                        

                    </div>
                </div>
                <div class="btns pt-5 text-center">
                    <div class="btn-style"><a href="<?php echo BASEPATH;?>upcoming-event.php">View More !</a></div>
                </div>
            </div>
        </div>
    </div>
	
	
	<section>
        <div class="testimonial">
            <div class="container">
                <div class="col-l2">
                    <div class="hx-site-title-1 text-center">
                        <h2>Activities</h2>
                    </div>
                </div>
                <div class="testimonial__inner">
                    <div class="testimonial-slider">
                        <div class="testimonial-slide">
                            <div class="testimonial_box">
                                <div class="testimonial_box-inner">
                                    <div class="cases-wrapper2">
                                        <img src="assets/images/blog/1.jpg" alt="">
                                        <h5 class="fs-20 text-heding3 font-weight-bold pt-3">Activity 1</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide">
                            <div class="testimonial_box">
                                <div class="testimonial_box-inner">
                                    <div class="cases-wrapper2">
                                        <img src="assets/images/blog/2.jpg" alt="">
                                        <h5 class="fs-20 text-heding3 font-weight-bold pt-3">Activity 2</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide">
                            <div class="testimonial_box">
                                <div class="testimonial_box-inner">
                                    <div class="cases-wrapper2">
                                        <img src="assets/images/blog/3.jpg" alt="">
                                        <h5 class="fs-20 text-heding3 font-weight-bold pt-3">Activity 3</h5>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns pt-5 text-center">
                    <div class="btn-style"><a href="#">View More !</a></div>
                </div>
            </div>
        </div>
    </section>


	<div class="hx-blog-area ptb-100-70">
        <div class="container">
            <div class="col-l2">
                <div class="hx-site-title-1 text-center">
                    <span>From Our Blog</span>
                    <h2>Latest News</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
				
				<?php
					$blog_query = "SELECT * FROM tbl_blog ORDER BY blog_id_pk DESC";
					$blogrunQuerys   =  $connect->query($blog_query);
					
					while($row = $blogrunQuerys->fetch_assoc()){
				?>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="cases-wrapper2">
                        <img src="<?= IMG_PATH; ?>blogs/<?php echo $row['blogImg'];?>" alt="">
                        <h5 class="fs-20 text-heding3 font-weight-bold mt-3"><?php echo substr($row["blogTitle"],0,30);?></h5>
                        <div><?php //echo substr(base64_decode($row["blogContent"]),0,30);?></div>
                    </div>
                </div>
				<?php } ?>

            </div>
        </div>
    </div>
		
<!--Latest events start-->

	<div class="hx-counter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hx-counter-grids">
                        <div class="grid">
                            <div class="hx-counter-icon">
                                <i class="fi flaticon-employee"></i>
                            </div>
                            <div>
                                <h2><span class="odometer" data-count="300">00</span>+</h2>
                            </div>
                            <p>Expert Trainer</p>
                        </div>
                        <div class="grid">
                            <div class="hx-counter-icon">
                                <i class="fi flaticon-employee"></i>
                            </div>
                            <div>
                                <h2><span class="odometer" data-count="1026">00</span></h2>
                            </div>
                            <p>Satisfied Client</p>
                        </div>
                        <div class="grid">
                            <div class="hx-counter-icon">
                                <i class="fi flaticon-business-and-finance"></i>
                            </div>
                            <div>
                                <h2><span class="odometer" data-count="25">00</span>+</h2>
                            </div>
                            <p>Years Experience</p>
                        </div>
                        <div class="grid">
                            <div class="hx-counter-icon">
                                <i class="fi flaticon-employee"></i>
                            </div>
                            <div>
                                <h2><span class="odometer" data-count="3215">00</span></h2>
                            </div>
                            <p>Projects Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="hx-project-section hx-section-padding  ">
        <div class="container">
            <div class="col-l2">
                <div class="hx-site-title-1 text-center">
                    <span>Gallery</span>
                    <h2>AFI Gallery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12 sortable-project">
                    <!-- <div class="hx-project-filters">
                        <ul>
                            <li><a data-filter="*" href="#" class="current">All</a></li>
                            <li><a data-filter=".Tire" href="#">Tire Replacement</a></li>
                            <li><a data-filter=".Break" href="#">Break Repair</a></li>
                            <li><a data-filter=".Engine" href="#">Engine</a></li>               
                            <li><a data-filter=".Transmission" href="#">Transmission</a></li> 
                            <li><a data-filter=".Baterry" href="#">Baterry</a></li> 
                        </ul>                                                
                    </div> -->
                    <div class="project-container project-fancybox masonry-project">
                        <?php 
    						$getSliders     =  "SELECT * FROM tbl_gallery order by g_id asc";
    						$runGetSliders  =  $connect->query($getSliders);
    						while($rowz = $runGetSliders->fetch_assoc()){
    					?>
                        <div class="grid Break Tire Engine">
                            <a href="<?= IMG_PATH; ?>gallery/<?php echo $rowz['image'];?>" class="fancybox" data-fancybox-group="gall-1">
                                <img src="<?= IMG_PATH; ?>gallery/<?php echo $rowz['image'];?>" alt class="img img-responsive">
                                <div class="hx-project-text">
                                    <ul>
                                        <li>
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </li>
                                    </ul>
                                    <h4><?php echo $rowz['title'];?></h4>
                                </div>
                            </a>
                        </div>
					    <?php } ?>	
                        

                    </div>
                </div>
            </div> <!-- end row -->
            <!--div class="btns text-center mt-4">
                <div class="btn-style"><a href="#">View More !</a></div>
            </div-->
        </div>
    </section>

    </div>

    <div id="subscription_area" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="subscribe_now text-center">
                        <h2>Subscribe</h2>
                        <p>Get connected to our insights</p>
                        <form method="post" class="subscribe_form">
                            <div class="input-group">
                                <input type="text" class="form-control" name="newsletter" placeholder="Enter your email">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="subscribe">subscribe</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<?php include "layouts/main-footer.php"; ?>