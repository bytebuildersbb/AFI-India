<?php include "layouts/main-header.php"; 
    
    $current_date = date('Y-m-d');
    $event_query = "SELECT * FROM tbl_events where event_end_date >= '".$current_date."' ORDER BY id DESC";
    $runQuerys   =  $connect->query($event_query);
    $runQueryss   =  $connect->query($event_query);
    
   
?>

	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Upcoming Events</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Upcoming Events</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<main>
		<section>
			<div class="testimonial">
				<div class="container">
					<div class="col-l2">
						<div class="hx-site-title-1 text-center">
							<span>Events</span>
							<h2>Upcoming  Events</h2>
						</div>
					</div>
					<?php 
						if($runQuerys->num_rows > 0){ 
					?>
					<div class="testimonial__inner">
						<div class="testimonial-slider">
						<?php 
						
							while($row = $runQuerys->fetch_assoc()){
							$startdate	=	date_create($row['event_start_date']);
							$startdate =  date_format($startdate,"d M Y");
							$enddate	=	date_create($row['event_end_date']);
							$enddate =  date_format($enddate,"d M Y");
						?>
				
							<div class="testimonial-slide">
								<div class="testimonial_box">
									<div class="testimonial_box-inner">
										<div class="cases-wrapper2">
											<img src="<?= IMG_PATH; ?>events/<?php echo $row['event_thumbnail'];?>" alt="">
											<h6 class="mt-3">Event strat: <?php echo $startdate; ?></h6>
											<h5 class="fs-20 text-heding3 font-weight-bold"><?php echo $row['event_title']; ?></h5>
											<p><?php echo $row['event_description'];?></p>							
										</div>
									</div>
								</div>
							</div>	

						<?php } ?>		
				
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
		</section>
	</main>
 
	<div class="hx-event-area ptb-100-70">
        <div class="container">
            <div class="col-l2">
                <div class="hx-site-title-1 text-center">
                    <span>Events</span>
                    <h2>Upcoming  Events</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
				<?php while($rows = $runQueryss->fetch_assoc()){
                        $startdate=date_create($rows['event_start_date']);
                        $startdate =  date_format($startdate,"d M Y");
                        $enddate=date_create($rows['event_end_date']);
                        $enddate =  date_format($enddate,"d M Y");
                
				?>
				
					
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                   <div class="cases-wrapper2">
                        <img src="<?= IMG_PATH; ?>events/<?php echo $rows['event_thumbnail'];?>" alt="">
                        <h6 class="mt-3">Event strat: <?php echo $startdate; ?></h6>
                        <h5 class="fs-20 text-heding3 font-weight-bold"><?php echo $rows['event_title']; ?></h5>
                        <p><?php echo $rows['event_description'];?></p>                        
                    </div>
                </div>
				
				<?php } ?>
				
                
             </div>
        </div>
    </div>


<?php include "layouts/main-footer.php"; ?>