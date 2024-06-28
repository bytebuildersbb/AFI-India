<?php 
	include "../connection.php";
	$url 	=	$_REQUEST['q'];
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
      <style>
      </style>
   </head>
   <body>
      <div class="header-top">
         <div class="top-left">
            <p class="wow fadeInUp"><i class="fa fa-phone"></i><a href="mailto:info@afi.com">info@afi.com</a></p>
            <p class="wow fadeInDown"><i class="fa fa-envelope" aria-hidden="true"></i><a href="tel:+1800 666 2222">+1800 666 2222</a></p>
         </div>
         <div class="top-right">
            <a href="" target="_blank"> <i class="fa fa-facebook-f wow fadeInLeft" title="facebook"></i></a>
            <a href="" target="_blank"><i class="fa fa-twitter wow fadeInUp" title="twitter"></i></a>
            <a href="" target="_blank"> <i class="fa fa-linkedin wow fadeInDown" title="facebook"></i></a>
            <a href="" target="_blank"><i class="fa fa-instagram wow fadeInUp" title="twitter"></i></a>
            <a href="" target="_blank"> <i class="fa fa-youtube wow fadeInRight" title="facebook"></i></a>
         </div>
      </div>
      <div class="middle-header">
         <div class="middle-left d-none d-md-block">
            <ul>
               <li class="wow fadeInLeft"><a href="">Public Activities</a></li>
               <li class="wow fadeInLeft"><a href="">Publication</a></li>
               <li class="wow fadeInLeft"><a href="">Downloads</a></li>
               <li class="wow fadeInLeft"><a href="">Media </a></li>
               <li class="wow fadeInLeft"><a href="">Events </a></li>
               <li class="wow fadeInLeft"><a href="">Updates</a></li>
               <li class="wow fadeInLeft"><a href="">Advertisement section</a></li>
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
         <nav class="navbar navbar-expand-lg navbar-light" id="main_navbar">
            <div class="brand">
               <p class="mt-0 mb-0">
                  <a href="index.html"><img src="../img/logo.png" class="img-fluid wow fadeInLeft" title="AFI">
                  </a>
               </p>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="index.html">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle wow fadeInRight" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About AFI</a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="about.html">About Us </a>
                        <a class="dropdown-item" href="international.html">International Core Committee</a>
                        <a class="dropdown-item" href="national.html">National Committee </a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="commitee.html">Committee</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active wow fadeInRight" href="membership.html">AFI Membership</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="">State Councils</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="">AFI Schemes</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="">Legel Matters </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="">AFI Achievments</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link wow fadeInRight" href="">Help Desk</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Public Activities</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Publication</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Downloads</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Media</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Events</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Updates</a>
                  </li>
                  <li class="nav-item d-block d-md-none">
                     <a class="nav-link wow fadeInRight" href="">Advertisement section</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
      <div class="achieves pt-md-3 pb-md-3" style="position: relative;">
         <div class="container">
            <div class="row">
               <div class="heads">
                  <h2 class="wow fadeInLeft">News</h2>
               </div>
            </div>
            <div class="row pt-md-3">
               <div class="members">
               	<?php 
               		$blogQuery 	=	"SELECT * FROM tbl_blog WHERE urlSlug = '$url'";
               		$runQuery 	=	$connect->query($blogQuery);
               		$dataObject =	$runQuery->fetch_object();
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