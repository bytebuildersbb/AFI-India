<?php 
   include "../connection.php";
   $url  =  $_REQUEST['q'];
   ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title>terms</title>
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <link rel="shortcut icon" href="../`img/favicon.ico" type="image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="../css/bootstrap.css">
      <link rel="stylesheet" href="../css/owl.carousel.min.css">
      <link rel="stylesheet" href="../css/owl.theme.default.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/responsive.css">
      <link rel="stylesheet" href="../css/animate.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
         rel="stylesheet" type="text/css" />
      <script src="../js/wow.min.js"></script>    
      <script>   
         new WOW().init();         
         mobile:false;             
      </script>  
      <style></style>
   </head>
   <body>
      <div class="header-top">
         <div class="top-left">
            <p class="wow fadeInUp"><i class="fa fa-phone"></i><a href="mailto:ayurvedafederation@gmail.com">ayurvedafederation@gmail.com</a></p>
            <p class="wow fadeInDown"><i class="fa fa-envelope" aria-hidden="true"></i><a href="tel:+8595336710">011-41354100 , 8595336710</a></p>
         </div>
         <div class="top-right">
            <a href="https://www.facebook.com/ayurvedafederation/" target="_blank"> <i class="fa fa-facebook-f wow fadeInLeft" title="facebook"></i></a>
            <a href="https://twitter.com/AyurvedaFedera1/status/1435100542775095306?s=08" target="_blank"><i class="fa fa-twitter wow fadeInUp" title="twitter"></i></a>
            <a href="https://www.linkedin.com/company/ayurveda-federation-of-india" target="_blank"> <i class="fa fa-linkedin wow fadeInDown" title="linkedin"></i></a>
            <a href="https://www.instagram.com/invites/contact/?i=b1un1xzrx6fn&utm_content=mdquld3" target="_blank"><i class="fa fa-instagram wow fadeInUp" title="twitter"></i></a>
            <a href="https://www.youtube.com/channel/UCqH0I9ZuYSEoBthE_yiukOg" target="_blank"> <i class="fa fa-youtube wow fadeInRight" title="youtube"></i></a>
            <a href="https://t.me/ayurvedafederation" target="_blank"> <i class="fa fa-telegram wow fadeInRight" title="telegram"></i></a>
         </div>
      </div>
      <div class="middle-header">
         <div class="middle-left d-none d-md-block">
            <ul>
               <li class="wow fadeInLeft"><a href="../index.php">Home</a></li>
               <li class="wow fadeInLeft"><a href="../test.php">Events</a></li>
               <li class="wow fadeInLeft"><a href="../test.php">Publication</a></li>
                          <li class="wow fadeInLeft"><a href="#">Courses</a></li>

            </ul>
         </div>
         <div class="middle-right wow fadeInRight">
            <div class="search-container">
               <form action="/action_page.php">
                  <input type="text" placeholder="Search.." name="search">
                  <button type="submit"><i class="fa fa-search"></i></button>
               </form>
            </div>
            <div class="user">
               <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="header" id="myHeader">
         <!---Nav start -->
         <nav class="navbar navbar-expand-lg navbar-light" id="main_navbar">
            <div class="brand">
               <p class="mt-0 mb-0">
                  <a href="../index.php"><img src="../img/logo.png" class="img-fluid wow fadeInLeft" title="AFI">
                  </a>
               </p>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <?php 
                     $query = "SELECT * FROM tbl_menu WHERE parent_ID = '0' AND status != '0' order by forCommuniteSorting asc";
                     $runQuery = $connect->query($query);
                     while($row = $runQuery->fetch_assoc()){
                        $getChildMenu     = "SELECT * FROM tbl_menu WHERE parent_ID = ".$row['menu_id_pk']."";
                        $runChildQuery    =  $connect->query($getChildMenu);
                        ?>
                  <li class="nav-item dropdown">
                     <?php 
                        if($row['menu_id_pk'] == 3){
                           $getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."' order by forCommuniteSorting asc" ;
                        }
                        else{
                         $getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."'" ;
                        }
                        $runGetSub  =  $connect->query($getSub);
                        $dropCheck =   '';
                        if($row['menu_id_pk'] == 2 or $row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5){
                        $dropCheck = "dropdown-menu";
                        }else{
                        $dropCheck = "";
                        }
                        if($row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5){ ?>
                     <a class="nav-link wow fadeInRight" href="#" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
                     <?php } else {
                        ?>
                     <a class="nav-link wow fadeInRight" href="../<?php echo $row["url"]; ?>" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
                     <?php
                        } ?>
                     <div class=<?php echo $dropCheck; ?>>
                        <?php 
                           while ($childObj =   $runGetSub->fetch_object()) {
                              if($row['menu_id_pk'] == 3){
                                           //for communite menu
                                 ?>
                        <a class="dropdown-item" href="../<?php echo $childObj->url."?MemberType=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
                        <?php    } 
                           elseif($row['menu_id_pk'] == 5){
                                        //for state
                              ?>
                        <a class="dropdown-item" href="../<?php echo $childObj->url."?StateConvener=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
                        <?php    } 
                           else{ ?>
                        <a class="dropdown-item" href="../<?php echo $childObj->url; ?>"><?php echo $childObj->manuName;?></a> 
                        <?php
                           }
                           }?>
                     </div>
                  </li>
                  <?php } ?>
               </ul>
            </div>
         </nav>
         <style type="text/css">
            @import url("https://fonts.googleapis.com/css2?family=Righteous&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
            :root {
            --primary-color: #f7cd29;
            --primary-hover-color: #f7cd29db;
            --search-section-primary: #f5efcf;
            --search-section-secondary: #f9f6e5;
            --black: #000;
            --box-shadow: rgb(247 205 41 / 25%);
            --secondary-font: "Righteous", cursive;
            --primary-font: "Lato", sans-serif;
            --standard-border-radius: 3px;
            --standard-font-size: 18px;
            }
            body {
            font-family: var(--primary-font);
            color: var(--black);
            font-size: var(--standard-font-size);
            }
            .blog-section {
            margin: 20px 0;
            }
            .blog-main {
            margin-top: 35px;
            }
            .btn,
            .form-control {
            border-radius: var(--standard-border-radius);
            font-size: var(--standard-font-size);
            }
            .blog-button {
            border-radius: 0;
            border-top-right-radius: 15px;
            border-bottom-left-radius: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 3px;
            min-width: 146px;
            }
            .blog-button:not(:first-of-type) {
            margin-left: 10px;
            }
            .btn:focus,
            .form-control:focus {
            box-shadow: 0 0 0 0.1rem var(--box-shadow);
            }
            .btn-custom {
            background-color: var(--primary-color);
            color: var(--black);
            transition: all 0.3s;
            border: 2px solid var(--primary-hover-color);
            border-radius: 0;
            border-top-right-radius: 15px;
            border-bottom-left-radius: 15px;
            }
            .btn-custom-reverse {
            background-color: var(--bs-white);
            border: 2px solid var(--primary-hover-color);
            color: var(--black);
            transition: all 0.3s;
            }
            /* .btn-custom:hover {
            background-color: var(--bs-white);
            } */
            .btn-custom-reverse:hover {
            background-color: var(--primary-hover-color);
            }
            .btn-custom.active::after {
            content: "\A";
            border-style: solid;
            border-width: 0px 21px 23px 104px;
            border-color: transparent var(--primary-color) transparent transparent;
            position: absolute;
            top: 73px;
            left: 83px;
            }
            /**
            * Search
            */
            .search {
            position: relative;
            box-shadow: 0 0 40px rgba(51, 51, 51, 0.1);
            }
            .search .fa-search {
            position: absolute;
            top: 10px;
            left: 10px;
            color: var(--bs-gray);
            }
            .search-box {
            background-color: var(--search-section-primary);
            border: 0;
            text-indent: 25px;
            }
            /**
            * Blog Block
            */
            .blog-block-container {
            border-bottom: 7px dotted var(--primary-color);
            padding-bottom: 25px;
            }
            .blog-block-container:not(:first-of-type) {
            margin-top: 30px;
            }
            .blog-block {
               border-radius: 5px;

            border: 2px solid #898989;
            padding: 40px 40px;
            /*   background: linear-gradient(275deg, var(--primary-color), transparent); */
            }
            .blog-block-row {
            /*   align-items: center; */
            }
            .blog-block-image {
            width: 100%;
           /* filter: grayscale(1);
            transition: filter 0.3s;*/
            }
            .blog-block-image:hover {
            filter: grayscale(0);
            }
            .blog-title {
            font-size: 28px;
            font-family: var(--secondary-font);
            margin-bottom: 0;
            }
            .blog-sub-title {
            font-size: 36px;
            font-family: var(--secondary-font);
            color: var(--bs-red);
            }
            .blog-content {
            text-align: justify;
            padding-top: 8px;
            }
            .blog-read-more-link {
            color: var(--bs-red);
            }
            .blog-block-container .text-secondary a {
            color: var(--bs-gray);
            text-decoration: none;
            }
            .footer-social-info {
            text-align: right;
            }
            .footer-social-info a {
            color: var(--black);
            width: 40px;
            border: 1px solid var(--primary-color);
            justify-content: center;
            display: inline-flex;
            height: 40px;
            align-items: center;
            text-decoration: none;
            }
            .footer-social-info a:hover {
            color: black;
            background-color: var(--primary-color);
            }
            .popular-blog-section {
            background-color: #f9f6e5;
            padding: 10px 10px 10px 10px;
            }
            .popular-blog-section-title {
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: var(--primary-color);
            margin-bottom: 0px;
            background-color: #f5efcf;
            }
            .blog-preview:not(:first-of-type) {
            padding-top: 15px;
            }
            .blog-preview {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #b6b6b6;
            padding-bottom: 15px;
            padding-top: 5px;
            }
            .blog-preview:last-of-type {
            border-bottom: none;
            }
            .blog-preview .blog-preview-content {
            padding: 5px 5px;
            }
         </style>
         <section class="blog-section">
            <?php 
               $blogQuery  =  "SELECT * FROM tbl_blog WHERE urlSlug = '$url'";
               $runQuery   =  $connect->query($blogQuery);
               $dataObject =  $runQuery->fetch_object();
               ?>
            <div class="container blog-main">
               <div class="row">
                  <div class="col-md-8">
                     <div class="">
                        <div class="blog-block" style="-webkit-box-shadow: 0px 5px 13px -1px rgb(0 0 0 / 44%);
    -moz-box-shadow: 0px 5px 13px -1px rgba(0,0,0,0.75);
    box-shadow: 0px 5px 13px -1px rgb(0 0 0 / 44%);">
                           <div class="row blog-block-row">
                              <div class="col-md-12">
                                 <img src="../admin/uploads/blogs/<?php echo $dataObject->blogImg; ?>" alt="Dummy Image" class="img img-responsive blog-block-image" />
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div style="text-align: justify;">
                                 <p class="blog-content" >
                                    <?php echo $dataObject->blogContent; ?>
                                 </p>
                              </div>
                              <p class="text-secondary">
                                 <?php echo date("d-F-Y", strtotime($dataObject->createdOn));  ?> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                              </p>
                           </div>
                        </div>
                      <!--   <div class="row">
                           <div class="col-md-6">
                              <i class="fas fa-thumbs-up"></i> 200
                           </div>
                           <div class="col-md-6">
                              <div class="footer-social-info">
                                 Share:
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook">
                                 <i class="fab fa-facebook"></i>
                                 </a>
                                 <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram">
                                 <i class="fab fa-instagram"></i>
                                 </a>
                                 <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter">
                                 <i class="fab fa-twitter"></i>
                                 </a>
                                 <a href="#" data-toggle="tooltip" data-placement="top" title="Whatsapp">
                                 <i class="fab fa-whatsapp"></i>
                                 </a>
                                 <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin">
                                 <i class="fab fa-linkedin"></i>
                                 </a>
                              </div>
                           </div>
                        </div> -->
                     </div>
                  </div>
                  <div class="col-md-4" >
            <div class="newsright" >
             <!--   <div class="newsright1">
                  <h4>Text Widget</h4>
                  <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</p>
               </div> -->
               <div class="newsright1">
                  <h4>Recent Articles</h4>
                  <?php 
                        $query = "SELECT * FROM tbl_blog ORDER BY blog_id_pk DESC LIMIT 5";
                        $runQuery   =  $connect->query($query);
                        while($row = $runQuery->fetch_object()){
                     ?>
                  <div class="news-blog">
                     <div class="news-blog1">
                        <img src="../<?php echo IMG_PATH; ?>/blogs/<?php echo $row->blogImg; ?>" class="img-fluid" style="width: 80px; height:auto;">
                     </div>
                     <div class="news-blog2">
                        <h6><?php echo $row->blogTitle; ?></h6>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("d-M-Y", strtotime($row->createdOn));  ?></p>
                     </div>
                  </div>
               <?php } ?>
                  
               </div>
               <div class="newsright1">
                  <h4>Tag Cloud</h4>
                  <p class="cloud">
                     <a href="">Breathing</a>
                     <a href="">Health</a>
                     <a href="">Mantra</a>
                     <a href="">Meditation</a>
                     <a href="">Mental</a>
                     <a href="">Mind</a>
                  </p>
               </div>
               <div class="newsright1">
                  <h4>Post Category</h4>
                  <div class="accordion" id="faq">
                     <div class="card">
                        <div class="card-header" id="faqhead1">
                           <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">Article</a>
                        </div>
                        <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
                           <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="faqhead2">
                           <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2">Blog</a>
                        </div>
                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                           <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="faqhead3">
                           <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3" aria-expanded="true" aria-controls="faq3">Health</a>
                        </div>
                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                           <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="faqhead3">
                           <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4" aria-expanded="true" aria-controls="faq3">Uncategorized</a>
                        </div>
                        <div id="faq4" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                           <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
               </div>
            </div>
         </section>
         <?php die(); ?>
         <!--Nav end-->
      </div>
      <div class="clearfix"></div>
      <div class="achieves pt-md-3 pb-md-3" style="position: relative;">
         <div class="container">
            <div class="row">
               <div class="heads">
                  <h2 class="wow fadeInLeft">Blog</h2>
               </div>
            </div>
            <div class="row pt-md-3">
               <div class="members">
                  <?php 
                     $blogQuery  =  "SELECT * FROM tbl_blog WHERE urlSlug = '$url'";
                     $runQuery   =  $connect->query($blogQuery);
                     $dataObject =  $runQuery->fetch_object();
                     ?>
                  <h4><?php echo $dataObject->blogTitle; ?></h4>
                  <img src="../admin/uploads/blogs/<?php echo $dataObject->blogImg; ?>">
                  <p><?php echo $dataObject->blogContent; ?></p>
                  <p><?php if($dataObject->autherName==""):echo "Post by admin"; endif; ?></p>
                  <p ><?php echo date("d-F-Y", strtotime($dataObject->createdOn));  ?></p>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="footer pt-md-3 pb-md-3">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="footer-box">
                     <h5 class="wow fadeInLeft"><img src="../img/foot-logo.png" class="img-fluid">Ayurveda Federation of India</h5>
                     <p class="wow fadeInUp">Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life." Ayurvedic knowledge originated in India more than 5,000 years.</p>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="footer-box">
                     <h4 class="wow fadeInUp">Quick Links</h4>
                     <p class="wow fadeInLeft"><a href="">About AFI</a></p>
                     <p class="wow fadeInRight"><a href="">Committees/Wings</a></p>
                     <p class="wow fadeInLeft"><a href="">AFI Membership</a></p>
                     <p class="wow fadeInRight"><a href="">Event</a></p>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="footer-box">
                     <h4 style="visibility: hidden;" class="d-none d-md-block">Quick Linka</h4>
                     <p class="wow fadeInLeft"><a href="">State Councils</a></p>
                     <p class="wow fadeInRight"><a href="">Legel Matters</a></p>
                     <p class="wow fadeInLeft"><a href="">AFI Schemes</a></p>
                     <p class="wow fadeInRight"><a href="">Privacy Policy</a></p>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="footer-box">
                     <h4 class="wow fadeInUp">Contact Us</h4>
                     <p class="wow fadeInLeft"><a href="">1810 Mahatma Marg Ayurved, 5th Avenue, New Delhi</a></p>
                     <p class="wow fadeInRight"><i class="fa fa-phone " ></i><a href="mailto:info@afi.com">info@afi.com</a></p>
                     <p class="wow fadeInLeft"><i class="fa fa-envelope" aria-hidden="true"></i><a href="tel:+1800 666 2222">+1800 666 2222</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="copyright">
         <div class="container">
            <div class="row">
               <p class="wow fadeInUp">Copyright &copy; 2021 <a href="">Ayurveda Federation of India. </a> All Rights Reserved.  | Design By <a href="">RAZORSE Software Pvt. Ltd</a> </p>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/owl.carousel.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js">  </script>
      <script src="../js/jquery.countup.js"></script>
      <script>
         window.onscroll = function() {myFunction()};
         var header = document.getElementById("myHeader");
         var sticky = header.offsetTop;
         function myFunction() {
          if (window.pageYOffset > sticky) {
           header.classList.add("sticky");
         } else {
           header.classList.remove("sticky");
         }
         }
      </script>
      <script></script>
      <script>
         $('.counter').countUp();
      </script>
   </body>
</html>