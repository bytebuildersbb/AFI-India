<?php

include $_SERVER['DOCUMENT_ROOT']."/connection.php";
$query = "SELECT * FROM tbl_maintenance_mode";
$runQuery = $connect->query($query);
$dataObject = $runQuery->fetch_object();
$_SESSION['mode'] = $dataObject->status;
if($_SESSION['mode'] == 1){
	header('Location:maintenance.php');
}else{
	unset($_SESSION['mode']);
	header("Location:");
}

/*Function file*/
include $_SERVER['DOCUMENT_ROOT']."/function.php";



$pageName =  ltrim($_SERVER['PHP_SELF'],'/');

$getMetas   =  "SELECT * FROM tbl_page_meta WHERE pageName = '".$pageName."'";
$runQuery   =  $connect->query($getMetas);
$metaObj    =  $runQuery->fetch_object();

/*Code For News Letter*/
if(isset($_POST["subscribe"])){
    $email    =  $_POST["newsletter"];
    $query   =  "SELECT * FROM tbl_subscribe WHERE emailID = '$email'";
    $runQuery   =  $connect->query($query);
    if(mysqli_num_rows($runQuery) > 0){ ?>
        <script>
            alert('Email id already registered for newsletter.');
        </script>
    <?php }else{
        $query   =  "INSERT INTO `tbl_subscribe`(`emailID`) VALUES ('$email')";
        $runQuery   =  $connect->query($query);	
        if($runQuery){ ?>
            <script>alert('Thanks for subscribe newsletter.');</script>
        <?php }
    }
}



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php if(isset($metaObj->pageTitle)){echo $metaObj->pageTitle;} ?></title>
    <meta name="description" content="<?php if(isset($metaObj->pageDesciption)){echo $metaObj->pageDesciption; } ?>" />
    <meta name="keywords" content="<?php if(isset($metaObj->pageMeta)){echo $metaObj->pageMeta; } ?>" />
    <link rel="shortcut icon" href="<?php echo BASEPATH;?>assets/images/logo/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if($pageName == 'index.php'){?>
    <meta name="google-site-verification" content="K6BubaN1f3f4t4XjHjYBqj5B1AreK5B1fP8AYWPOdRw" />
    <?php } ?>
	<link href="<?php echo BASEPATH;?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/flaticon.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASEPATH;?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugins for this template -->
    <link href="<?php echo BASEPATH;?>css/animate.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/odometer-theme-default.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/slick.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/slicknav.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/jquery.fancybox.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo BASEPATH;?>css/style.css" rel="stylesheet">
    <link href="<?php echo BASEPATH;?>css/responsive.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 
<?php if($pageName == 'index.php'){ ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NV1EXM0HNQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'G-NV1EXM0HNQ');
    </script>
        
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "AFI India",
        "image": "https://afi-india.in/img/logo.png",
        "@id": "",
        "url": "https://afi-india.in/",
        "telephone": "8595336710",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "E-5, First Floor lane No 1, Westend Marg, Near Saket Metro, Saidulajab, New Delhi, Delhi 110030",
            "addressLocality": "New Delhi",
            "postalCode": "110030",
            "addressCountry": "IN"
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
            ],
            "opens": "00:00",
            "closes": "23:59"
        },
        "sameAs": [
            "https://www.facebook.com/ayurvedafederation/",
            "https://www.youtube.com/channel/UCqH0I9ZuYSEoBthE_yiukOg",
            "https://afi-india.in/",
            "AyurvedaFedera1/status/1435100542775095306?s=08"
        ]  
    }
    </script>
<?php } ?>

</head>
<body oncopy="return false" oncut="return false">

	 <!-- start preloader -->
   
    <!-- end preloader -->
    <!-- header-area start -->
	<header>

        <div class="header-top">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-8 col-sm-12 col-12 col-lg-6">
                        <ul class="d-flex account_login-area">
                            <li><a href="mailto:contact@afi-india.in"><i class="fa fa-envelope" aria-hidden="true"></i>contact@afi-india.in</a></li>
                            <li><a href="tel:8799701700"><i class="fa fa-phone"></i>8799701700</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 col-lg-6">
                        <ul class="d-flex header-social">
                            <li>
								<a href="https://www.facebook.com/ayurvedafederation/" target="_blank"> 
									<img src="<?php echo BASEPATH;?>assets/images/social-icon/facebook.png">
								</a>
							</li>
                            <li>
								<a href="https://twitter.com/AyurvedaFedera1/status/1435100542775095306?s=08" target="_blank"> 
									<img src="<?php echo BASEPATH;?>assets/images/social-icon/twitter.png">
								</a>
							</li>
                            <li>
								<a href="https://www.linkedin.com/company/ayurveda-federation-of-india" target="_blank"> 
									<img src="<?php echo BASEPATH;?>assets/images/social-icon/linkedin.png">
								</a>
							</li>
                            <li>
								<a href="https://www.instagram.com/invites/contact/?i=b1un1xzrx6fn&utm_content=mdquld3" target="_blank">
									<img src="<?php echo BASEPATH;?>assets/images/social-icon/instagram.png">
								</a>
							</li>
                            <li>
								<a href="https://www.youtube.com/channel/UCqH0I9ZuYSEoBthE_yiukOg" target="_blank">
									<img src="<?php echo BASEPATH;?>assets/images/social-icon/youtube.png">
								</a>
							</li>
                            <li>
								<a href="https://t.me/ayurvedafederation" target="_blank"> 
									<img src="<?php echo BASEPATH;?>assets/images/social-icon/telegram.png">
								</a>
							</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

		<div class="middle-header">
            <div class="container">

                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a class="navbar-brand" href="<?php echo BASEPATH;?>index.php">
								<img src="<?php echo BASEPATH;?>assets/images/logo/logo.png" alt="" width="65%">
							</a>
       <!--                     <div class="header_img-2"> -->
							<!--	<a class="navbar-brand  pl-3 ml-0" href="<?php echo BASEPATH;?>index.php">-->
							<!--		<img src="<?php echo BASEPATH;?>assets/images/Asset 2-8.png" alt="">-->
							<!--	</a>-->
							<!--</div>-->
							<!--<div class="header_img-2"> -->
							<!--	<a class="navbar-brand  pl-3 ml-0" href="<?php echo BASEPATH;?>index.php">-->
							<!--		<img src="<?php echo BASEPATH;?>assets/images/logo3header.png" alt="">-->
							<!--		<p style="-->
       <!--                                 font-size: 11px;-->
       <!--                                 font-weight: 700;-->
       <!--                             ">Partner Organisation: Vaidya's Tattva Private Limited</p>-->
							<!--	</a>-->
							<!--</div>-->
                            <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">-->
                            <!--    <span class="navbar-toggler-icon"></span>-->
                            <!--</button>-->
                            <!--<div class="collapse navbar-collapse" id="main_nav">-->
                                <ul class="navbar-nav ml-auto d-flex flex-row align-items-center">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Events</a>
                                        <ul class="dropdown-menu new-menu">
                                            <li>
												<a class="dropdown-item" href="<?php echo BASEPATH;?>upcoming-event.php">Upcoming Event</a>
                                            </li>
                                            <li>
												<a class="dropdown-item" href="<?php echo BASEPATH;?>past-event.php">Past Event </a>
											</li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="<?php echo BASEPATH;?>journal-public.php">Agnivesh Journal</a>
                                        <!--ul class="dropdown-menu">
                                            <li>
												<a class="dropdown-item" href="#"> For Doctors &raquo </a>  
                                                <ul class="submenu dropdown-menu">
                                                    <li>
														<a class="dropdown-item" href="<?php echo BASEPATH;?>journal-doctor.php"> 1 <sup>st</sup> Edition </a>
                                                    </li>
                                                    <li>
														<a class="dropdown-item" href="<?php echo BASEPATH;?>journal-doctor.php"> 2<sup>nd</sup> Edition </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
												<a class="dropdown-item" href="#"> For Public &raquo </a>
                                                <ul class="submenu dropdown-menu">
                                                    <li>
														<a class="dropdown-item" href="<?php echo BASEPATH;?>journal-public.php"> 1 <sup>st</sup> Edition </a>
                                                    </li>
                                                    <li>
														<a class="dropdown-item" href="<?php echo BASEPATH;?>journal-public.php"> 2<sup>nd</sup> Edition </a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul-->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Courses</a>
                                        <ul class="dropdown-menu new-menu">
                                            <li><a class="dropdown-item" href="<?php echo BASEPATH;?>doctor-course.php">For Doctors</a></li>
                                            <!--<li><a class="dropdown-item" href="#">For Student</a></li>-->
                                            <li><a class="dropdown-item" href="<?php echo BASEPATH;?>public-course.php">For Public</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <!--</div> <!-- navbar-collapse.// -->
                        </nav>
            </div>

        </div>
        <div class="header-area" id="sticky-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-11 d-none d-lg-block">
                        <div class="main-menu">
                            <nav class="nav_mobile_menu">
                                <ul>
								
 
                                    <?php									
										$query = "SELECT * FROM tbl_menu WHERE parent_ID = '0' AND status != '0' order by forCommuniteSorting asc";
										$runQuery = $connect->query($query);
										while($row = $runQuery->fetch_assoc()){
											$getChildMenu     = "SELECT * FROM tbl_menu WHERE parent_ID = ".$row['menu_id_pk']."";
											$runChildQuery    =  $connect->query($getChildMenu);
									?>
									<li>
										<?php 
											if($row['menu_id_pk'] == 3){
												$getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."' order by forCommuniteSorting asc" ;
											}else{
												$getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."'" ;
											}
											$runGetSub  =  $connect->query($getSub);
											$dropCheck =   '';
											if( $row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5 or $row['menu_id_pk'] == 30){
												$dropCheck = "submenu";
											}else{
												$dropCheck = "";
											}
											
											if($row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5 or $row['menu_id_pk'] == 30){ ?>
												<a href="#" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
											<?php } else { ?>
												<a href="<?php echo BASEPATH.$row["url"]; ?>" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
											<?php } ?>
                                            
                                            <?php if($dropCheck == 'submenu'){?>
											<ul class=<?php echo $dropCheck; ?>>
												<!-- For State Consuil page -->	
												<?php 
												while ($childObj = $runGetSub->fetch_object()) { 
													if($row['menu_id_pk'] == 3){
														//for communite menu 
													?>
														<li><a class="dropdown-item" href="<?php echo BASEPATH.$childObj->url."?MemberType=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a></li>
													<?php }elseif($row['menu_id_pk'] == 5){
														//for state
													?>
														<li><a class="dropdown-item" href="<?php echo BASEPATH.$childObj->url."?StateConvener=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a></li>
													<?php }else{ ?>
														<li><a class="dropdown-item" href="<?php echo BASEPATH.$childObj->url; ?>"><?php echo $childObj->manuName;?></a> </li>
													<?php }
												} ?>
											</ul>
											<?php } ?>
									</li>    
									<?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 search">
                        <ul>
                            <li><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                <ul>
                                    <li>
                                        <form action="<?php echo BASEPATH;?>search.php">
                                            <input type="text" placeholder="search here.." name="search">
                                            <button><i class="fa fa-search"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <div class="mobile_menu"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="whatsapp_float" style="position:fixed; bottom:20px; left:20px; cursor:pointer; z-index:999;">
    <a href="https://wa.me/+918799701700" target="blank">
    <img src="/img/whatsapp_icon.png" width="50px" class="whatsapp_float_btn"/>
    </a>
</div>
    </header>
	
	
	
    
<div class="clearfix"></div>