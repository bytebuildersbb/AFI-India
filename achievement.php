<?php include "layouts/main-header.php"; ?>


	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>AFI Achievments</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Achievments</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- .hx-team-area start -->
    <div class="team-area clear-fix  bg-light pt-5 pb-5">
        <div class="container">
            <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <span>Achievments</span>
                    <h2>AFI Achievments</h2>
                </div>
            </div>
            <div class="row justify-content-center">
				
				<?php 
					$query = "SELECT * FROM tbl_doctor_info WHERE type = '1' ORDER BY doctor_info_id_pk DESC";
					$runQuery   =  $connect->query($query);
					while($row = $runQuery->fetch_object()){
						//echo "<pre>";print_R($row);
				?>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="teams p-3 achievements ">
                         <span class="badge badge-warning"><?php if($row->type==0){echo "Dr";}else{echo "Achievment"; }?></span>
                            <img src="admin/uploads/PDF/<?php echo $row->pdf_image; ?>" class="img-responsive" alt="Team">
                           <h4 style="font-size: 18px; margin-top: 10px; text-align: justify;"><?= substr($row->title,0,55); ?></h4>
                           <p><?php echo date("d-F-Y", strtotime($row->upload_on));  ?></p>
                       <div class="btns text-center">
                            <div class="btn-style"><a href="q.php?Find=<?php echo $row->doctor_info_id_pk; ?>&type=1" >Read More !</a></div>
                         </div>
                    </div>
                </div>
				
				<?php } ?>
				
            </div>
        </div>
    </div>
    <!-- .hx-team-area end -->

   
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


<?php include "layouts/main-footer.php"; ?>