<?php 
   require_once("perpage.php");  
   require_once("dbController.php");
   /**/
   $db_handle = new DBController();
   $name = "";
   $code = "";
   $queryCondition = "";
   if(!empty($_POST["search"])) {
   foreach($_POST["search"] as $k=>$v){
   if(!empty($v)) {
      $queryCases = array("name","code");
      if(in_array($k,$queryCases)) {
         if(!empty($queryCondition)) {
            $queryCondition .= " AND ";
         } else {
            $queryCondition .= " WHERE ";
         }
      }
      switch($k) {
         case "name":
            $name = $v;
            $queryCondition .= "articelTitle LIKE '" . $v . "%'";
            break;
         case "code":
            $code = $v;
            $queryCondition .= "code LIKE '" . $v . "%'";
            break;
      }
   }
   }
   }
   $orderby = " ORDER BY articel_id_pk  desc"; 
   $sql = "SELECT * FROM tbl_articel " . $queryCondition;
   $href = 'news/index.php';              
   $perPage = 9; 
   $page = 1;
   if(isset($_POST['page'])){
      $page = $_POST['page'];
   }
   $start = ($page-1)*$perPage;
   if($start < 0) $start = 0;
   $query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
   $result = $db_handle->runQuery($query);
   if(!empty($result)) {
      $result["perpage"] = showperpage($sql, $perPage, $href);
   }
   
   ?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../connection.php";
$query = "SELECT * FROM tbl_maintenance_mode";
$runQuery    =  $connect->query($query);
$dataObject     =  $runQuery->fetch_object();
$_SESSION['mode']    =  $dataObject->status;
if($_SESSION['mode'] == 1){
header('Location:maintenance.php');
}else{
unset($_SESSION['mode']);
header("Location:");
}
?>
<?php 
/*Function file*/
include "../function.php";
$pageName =  basename($_SERVER['PHP_SELF']);
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
   <title><?= $metaObj->pageTitle; ?></title>
   <meta name="description" content="<?= $metaObj->pageDesciption; ?>" />
   <meta name="keywords" content="<?= $metaObj->pageMeta; ?>" />
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="../css/bootstrap.css">
   <link rel="stylesheet" href="../css/owl.carousel.min.css">
   <link rel="stylesheet" href="../css/owl.theme.default.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/responsive.css">
   <link rel="stylesheet" href="../css/animate.css">
   <link rel="stylesheet" href="validationAssets/parsley.css">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
   rel="stylesheet" type="text/css" />
   <script src="../js/wow.min.js"></script>    
   <script>   
      new WOW().init();         
      mobile:false;             
   </script>  
 <style>
         #toys-grid {
         margin-bottom: 30px;
         }
         #toys-grid .txt-heading {
         background-color: #D3F5B8;
         }
         #toys-grid table {
         width: 100%;
         background-color: #F0F0F0;
         }
         #toys-grid table td {
         background-color: #FFFFFF;
         }
         .search-box {
         border: 1px solid #F0F0F0;
         background-color: #C8EEFD;
         margin: 2px 0px;
         }
         .demoInputBox {
         padding: 10px;
         border: #F0F0F0 1px solid;
         border-radius: 4px;
         margin: 0px 5px
         }
         .btnSearch {
         padding: 10px;
         border: #F0F0F0 1px solid;
         border-radius: 4px;
         margin: 0px 5px;
         }
         .perpage-link {
         padding: 5px 10px;
         border: #C8EEFD 2px solid;
         border-radius: 4px;
         margin: 0px 5px;
         background: #FFF;
         cursor: pointer;
         }
         .current-page {
         padding: 5px 10px;
         border: #C8EEFD 2px solid;
         border-radius: 4px;
         margin: 0px 5px;
         background: #C8EEFD;
         }
         .btnEditAction {
         background-color: #2FC332;
         padding: 2px 5px;
         color: #FFF;
         text-decoration: none;
         }
         .btnDeleteAction {
         background-color: #D60202;
         padding: 2px 5px;
         color: #FFF;
         text-decoration: none;
         }
         #btnAddAction {
         background-color: #09F;
         border: 0;
         padding: 5px 10px;
         color: #FFF;
         text-decoration: none;
         }
         #frmToy {
         border-top: #F0F0F0 2px solid;
         background: #FAF8F8;
         padding: 10px;
         }
         #frmToy div {
         margin-bottom: 15px
         }
         #frmToy div label {
         margin-left: 5px
         }
         .error {
         background-color: #FF6600;
         border: #AA4502 1px solid;
         padding: 5px 10px;
         color: #FFFFFF;
         border-radius: 4px;
         }
         .info {
         font-size: .8em;
         color: #FF6600;
         letter-spacing: 2px;
         padding-left: 5px;
         }
      </style>
</head>
<body onstrcmp="return false" oncut="return false">
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
        <li class="wow fadeInLeft"><a href="index.php">Home</a></li>
            <li class="wow fadeInLeft"><a href="test.php">Events</a></li>
            <li class="wow fadeInLeft"><a href="test.php">Publication</a></li>
           <!-- <li class="wow fadeInLeft"><a href="">Downloads</a></li>
            <li class="wow fadeInLeft"><a href="">Media </a></li>
            <li class="wow fadeInLeft"><a href="">Events </a></li>
            <li class="wow fadeInLeft"><a href="">Updates</a></li>
            <li class="wow fadeInLeft"><a href="">Advertisement section</a></li>-->
        
         </ul>
      </div>
       <div class="middle-right wow fadeInRight">
         <div class="search-container">
            <form action="../search.php">
               <input type="text" placeholder="Search.." name="search" required=''>
               <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
         
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="header" id="myHeader">
      <nav class="navbar navbar-expand-lg navbar-light" id="main_navbar">
         <div class="brand">
            <p class="mt-0 mb-0">
               <a href="index.php"><img src="../img/logo.png" class="img-fluid wow fadeInLeft" title="AFI">
               </a>
            </p>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ml-auto">
              <a class="nav-link wow fadeInRight" href="../" id="navbarDropdownMenuLink">Home</a>
            <?php 
               $query = "SELECT * FROM tbl_menu WHERE parent_ID = '0' order by menu_order asc";
               $runQuery = $connect->query($query);
               while($row = $runQuery->fetch_assoc()){
                  $getChildMenu     = "SELECT * FROM tbl_menu WHERE parent_ID = ".$row['menu_id_pk']."";
                  $runChildQuery    =  $connect->query($getChildMenu);
               ?>
               <li class="nav-item dropdown">
                   
               <?php 
                  $getSub  =  "SELECT * FROM tbl_menu WHERE parent_ID = '".$row['menu_id_pk']."'" ;
                  $runGetSub  =  $connect->query($getSub);
                  $dropCheck =   '';
                  if($row['menu_id_pk'] == 2 or $row['menu_id_pk'] == 3 ){
                     $dropCheck = "dropdown-menu";
                  }else{
                     $dropCheck = "";
                  }
               if($row['menu_id_pk'] == 3){ ?>
                 <a class="nav-link wow fadeInRight" href="#" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
                 <?php } else {
                     ?>
                      <a class="nav-link wow fadeInRight" href="<?php echo $row["url"]; ?>" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
                     <?php
                 } ?>
                  <div class=<?php echo $dropCheck; ?>>
                     <?php 
                     while ($childObj =   $runGetSub->fetch_object()) {
                     if($row['menu_id_pk'] == 3){
                     ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url."?MemberType=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
                 <?php    } 
                 else{ ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url; ?>"><?php echo $childObj->manuName;?></a> 
                     <?php
                 }
                 
                 
                 }?>
                  </div>
              </li>    
         <?php } ?>
         </ul>            
  </div>
</nav>
</div>
      <form name="frmSearch" method="post" action="index">

<div class="middle-header p-md-3 mhds">    
       <div class="middle-right wow fadeInRight" >
        <ul>
          <li class="wow fadeInLeft"><a href="">Latest Article  </a></li>
         <!--  <li class="wow fadeInLeft"><a href="">AFI's Events News </a></li>
          <li class="wow fadeInLeft"><a href="">Government News </a></li>  -->                              
      </ul>
         <div class="search-container">
          <input type="text" placeholder="Search" name="search[name]"  value="<?php echo $name; ?>">
          <button ttype="submit" name="go" class="btnSearch" value="Search"><i class="fa fa-search"></i></button>
       </div>
        
    </div>
  </div>
<div class="clearfix"></div>
<div class="afi-news pt-md-5 pb-md-5" style="position: relative;">
  <div class="container">
    <div class="row">
      <div class="headers">
      <h2 class="wow fadeInLeft">Article</h2> 
      <p>Ayurveda is considered by many scholars to be the oldest healing science.</p>            
      </div>    
    </div>    
  </div>
</div>
<div class="clearfix"></div>
<div class="news pt-md-4 pb-md-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <div class="newsleft">
          <div class="row">
            <?php
              if(!empty($result)) {
                 foreach($result as $k=>$v) {
                    if(is_numeric($k)) {
            ?>
            <div class="col-md-4">
              <div class="ptrs poters">
                <img src="../<?php echo IMG_PATH; ?>articel/<?php echo $result[$k]["articelImg"]; ?>" class="img-fluid">
                <div class="ptrs-cont">
                  <h4><?php echo $result[$k]["articelTitle"]; ?></h4>
                  <h6><?php echo date("d-F-Y", strtotime($result[$k]["createdOn"]));  ?></h6>
                </div>
              </div>  
            </div>
            <?php
                    }
                  }
              }
          ?>
          </div>
          <div class="row">
            <div class="pagination">              
              <table>
                 <?php 
                    if(isset($result["perpage"])) {
                    ?>
                 <tr>
                    <td colspan="6" align=right > <?php echo $result["perpage"]; ?></td>
                 </tr>
              </table>
              <?php } ?>          
            </div>
          </div>
        </div>
      </div>
    </form>
      <div class="col-md-3">
        <div class="newsright">
          <div class="newsright1">
            <h4>Text Widget</h4>
            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</p>
          </div>
          <div class="newsright1">
            <h4>Recent Articles</h4>
             <div class="news-blog">
              <div class="news-blog1">
                <img src="../img/bts1.png" class="img-fluid">
              </div>
              <div class="news-blog2">
                <h6>Lorem ipsum dolor sit amet and feel the charm</h6>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> JULY 31, 2020 | <i class="fa fa-clock-o" aria-hidden="true"></i> JULY 31, 2020</p>
              </div>
             </div>

             <div class="news-blog">
              <div class="news-blog1">
                <img src="../img/bts2.png" class="img-fluid">
              </div>
              <div class="news-blog2">
                <h6>Lorem ipsum dolor sit amet and feel the charm</h6>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> JULY 31, 2020 | <i class="fa fa-clock-o" aria-hidden="true"></i> JULY 31, 2020</p>
              </div>
             </div>

             <div class="news-blog">
              <div class="news-blog1">
                <img src="../img/bts3.png" class="img-fluid">
              </div>
              <div class="news-blog2">
                <h6>Lorem ipsum dolor sit amet and feel the charm</h6>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> JULY 31, 2020 | <i class="fa fa-clock-o" aria-hidden="true"></i> JULY 31, 2020</p>
              </div>
             </div>
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
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">Article</a>
                        </div>

                        <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead2">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                            aria-expanded="true" aria-controls="faq2">Blog</a>
                        </div>

                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                            aria-expanded="true" aria-controls="faq3">Health</a>
                        </div>

                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="faqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                            aria-expanded="true" aria-controls="faq3">Uncategorized</a>
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
</div>
<div class="clearfix"></div>
<div class="register pt-md-3 pb-md-3">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">Registered AFI Members</h2>  
      <p class="wow fadeInRight"></p>
      </div>    
    </div>
    <div class="row pt-md-3 jits">
      <div class="col-md-4">
       <!--  <div class="register-box">
          <img src="../img/r1.png" class="img-fluid">
          <p>AFI member ID card</p>
        </div> -->
        <div class="afis">
          <img src="../img/afi1.png" class="img-fluid">
        </div>
      </div>
      <div class="col-md-4">
        <!-- <div class="register-box">
          <img src="../img/r2.png" class="img-fluid">
          <p>AFI Total Member</p>
        </div> -->
        <div class="afis">
          <img src="../img/afi2.png" class="img-fluid">
        </div>
      </div>
      <div class="col-md-4">
        <!-- <div class="register-box">
          <img src="../img/r3.png" class="img-fluid">
          <p>AFI member and volunteer registration</p>
        </div> -->
        <div class="afis">
          <img src="../img/afi3.png" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

   <div class="clearfix"></div>
   <div class="highlight pt-md-3 pb-md-3">
   <div class="container">
      <div class="row">
         <div class="heads">
            <h2 class="wow fadeInLeft">Subscribe to our Publication</h2>
            <p class="wow fadeInRight">Get updates for new classes and new products</p>
         </div>
      </div>
      <div class="row">
         <div class="subscribe">
            <form class="example" action="" method="POST">
               <input type="text" placeholder="Your Email Address" name="newsletter" required="">
               <button type="submit" name="subscribe">Subscribe</button>
            </form>
         </div>
      </div>
   </div>
</div>
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
                     <p class="wow fadeInLeft">80, Ground Floor- Rt. side, New Manglapuri, Mehrauli Gurgaon Road, New Delhi-110030</p>
                     <p class="wow fadeInRight"><i class="fa fa-phone " ></i><a href="mailto:info@afi.com">ayurvedafederation@gmail.com</a></p>
                     <p class="wow fadeInLeft"><i class="fa fa-envelope" aria-hidden="true"></i><a href="tel:+011-41354100">011-41354100</a>,<a href="tel:+8595336710">8595336710</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="strcmpright">
         <div class="container">
            <div class="row">
               <p class="wow fadeInUp">strcmpright &strcmp; 2021 <a href="">Ayurveda Federation of India. </a> All Rights Reserved.  | Design By <a href="http://www.razorse.com/" target="_blank">RAZORSE Software Pvt. Ltd</a> </p>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/owl.carousel.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script href="../validationAssets/parsley.min.js"></script>

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

      <script>
         $('.counter').countUp();
      </script>
   </body>
</html>