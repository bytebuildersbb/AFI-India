<?php include "layouts/main-header.php"; 
    
    $current_date = date('Y-m-d');
    $event_query = "SELECT * FROM tbl_events WHERE event_start_date <= '".$current_date."' ORDER BY id DESC";
    $runQuerys   =  $connect->query($event_query);
    
   
?>

<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Past Events</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Past Events</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
   
   <!-- Upcoming events start -->

	<div class="hx-event-area ptb-100-70">
        <div class="container">
            <div class="col-l2">
                <div class="hx-site-title-1 text-center">
                    <span>Events</span>
                    <h2>Past Events</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
			
				<?php while($row = $runQuerys->fetch_assoc()){ 
                        $startdate=date_create($row['event_start_date']);
                        $startdate =  date_format($startdate,"d M Y");
                        $enddate=date_create($row['event_end_date']);
                        $enddate =  date_format($enddate,"d M Y");
                ?>
					
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                   <div class="cases-wrapper2">
                        <img src="<?= IMG_PATH; ?>events/<?php echo $row['event_thumbnail'];?>" alt="">
                        <h6 class="mt-3">Event start: <?php echo $startdate; ?></h6>
                        <h5 class="fs-20 text-heding3 font-weight-bold"><?php echo $row['event_title']; ?></h5>
                        <p><?php echo $row['event_description'];?></p>                        
                    </div>
                </div>
				
				<?php } ?>
				
             </div>
        </div>
    </div>

      <!-- Upcoming events end-->



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
                                <a href="membership-id.html"><img src="assets/images/afi1.png"
                                        class="img-fluid afilift"></a>
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <img src="assets/images/afi2.png" class="img-fluid afilift">
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <a href="membership.html"><img src="assets/images/afi3.png"
                                        class="img-fluid afilift"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "layouts/main-footer.php"; ?>