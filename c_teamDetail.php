<?php 
include "layouts/main-header.php"; 

$memberID = urlencode(base64_decode($_GET['mid']));
// echo($memberID);die();

$query = "SELECT * FROM `tbl_core_committee` where core_committee_id_pk='$memberID'";
$runQuery   =  $connect->query($query);


$data = $runQuery->fetch_object();

$title          = $data->name;
$designation    = $data->designation;
$desc           = $data->artical;
$profileImage   = $data->profilePic;
$img_path       = "admin/uploads/committee/";
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
                            <!--<li><a href="<?php echo BASEPATH;?>founding-team.php">Founding Team</a></li>-->
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
                                <h6><?= $desc; ?></h6>
                               
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