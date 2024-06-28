<?php 

include "layouts/main-header.php"; 

$memberID = urlencode(base64_decode($_GET['mid']));

$query = "SELECT * FROM `tbl_foundingteam` where t_id='$memberID'";
$runQuery   =  $connect->query($query);


$data = $runQuery->fetch_object();

$title          = $data->t_title;
$designation    = $data->t_designation;
$city           = $data->t_city;
$desc           = base64_decode($data->t_desc);
$profileImage   = $data->t_thumbnail;
$tpdf           = $data->t_pdf;
$img_path       = "admin/uploads/foundingteam/";
$img            = $img_path.$profileImage;

?>



	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2><?php echo $title; ?></h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><a href="<?php echo BASEPATH;?>founding-team.php">Founding Team</a></li>
                            <li><span><?php echo $title; ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- start hx-blog-single-section -->
        <section class="hx-blog-single-section hx-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-3 col-sm-10 col-12">
                       <div class=" text-center team-single p-3">

                            <img src="<?php echo $img; ?>" alt="team" class="img-responsive rounded-circle pb-3">
                            <h5><strong><?php echo $title; ?></strong></h5>
                            <h6 class="text-success"><?= $designation; ?></h6>
                            <h4><span>City: </span><?= $city; ?></h4>

                            <ul class="mb-4 text-left pt-3">
                                <li class="mb-3"><a href="mailto:ayurvedafederation@gmail.com" class="text-dark"><i class="fa fa-envelope text-success fa-lg"></i> ayurvedafederation@gmail.com</a></li>
                                <li><a href="tel:8595336710" class="text-dark"><i class="fa fa-phone text-success fa-lg pr-2"></i>8595336710</a></li>
                            </ul>
                            
                            
                            
                        </div>
                        
                        
                     </div>
                    <div class="col col-lg-9 col-md-9 col-sm-12 col-12">
                        <div class="hx-blog-content clearfix team-single p-3">
                            <div class="post">
                               <h2><?php echo $title; ?></h2>
                               <h5><?= $designation; ?></h5>
								<?= $desc; ?>
                            </div>

                            
                        </div>
                        
                        <?php if(!empty($tpdf) ){ ?>
                        
                        <!--div class="download_pdf_btn text-center">
                            <button type="button" class="btn download_btn" data-toggle="modal" data-target="#exampleModals">
                                Download PDF
                            </button>
                        </div-->
                        
                        <?php } ?>
                        

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="download.php" method="post" name="foundingteam">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> For Student/ for Practitioner</label>
                                                <div class="form-check">
                                                  <input class="form-check-input" value="student" type="radio" name="forstudent" id="flexRadioDefault1" checked>
                                                  <label class="form-check-label" for="flexRadioDefault1">
                                                    For Student
                                                  </label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" value="practitioner" type="radio" name="forstudent" id="flexRadioDefault2">
                                                  <label class="form-check-label" for="flexRadioDefault2">
                                                    For Practitioner
                                                  </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" required>
                                            </div>    
                                            <input type="hidden" name="memberID" value="<?php echo $memberID; ?>" >
                                            <input type="hidden" name="returnurl" value="<?php echo $_SERVER['REQUEST_URI']; ?>" >
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
       
        
        
<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/s0RI4IXKE_o' frameborder='0' allowfullscreen></iframe></div>
        
        
      </div>

    </div>
  </div>
</div>
                    
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end hx-blog-single-section -->


<?php include "layouts/main-footer.php"; ?>