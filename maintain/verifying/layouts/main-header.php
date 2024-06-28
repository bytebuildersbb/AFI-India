<!-- Setup Maintenance Mode -->
<?php
session_start();
  include "./connection.php";

?>
<?php 
/*Function file*/
include "./function.php";
$pageName =  basename($_SERVER['PHP_SELF']);
$getMetas   =  "SELECT * FROM tbl_page_meta WHERE pageName = '".$pageName."'";
$runQuery   =  $connect->query($getMetas);
$metaObj    =  $runQuery->fetch_object();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title><?= $metaObj->pageTitle; ?></title>
   <meta name="description" content="<?= $metaObj->pageDesciption; ?>" />
   <meta name="keywords" content="<?= $metaObj->pageMeta; ?>" />
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" href="validationAssets/parsley.css">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
   rel="stylesheet" type="text/css" />
   <script src="js/wow.min.js"></script>    
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
            <form action="search.php">
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
               <a href="index.php"><img src="img/logo.png" class="img-fluid wow fadeInLeft" title="AFI">
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
               $query = "SELECT * FROM tbl_menu WHERE parent_ID = '0'";
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
               ?>
                 <a class="nav-link wow fadeInRight" href="<?php echo $row["url"]; ?>" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
                  <div class="dropdown-menu">
                     <?php 
                     while ($childObj =   $runGetSub->fetch_object()) {
                     ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url; ?>"><?php echo $childObj->manuName;?></a>
                 <?php     }?>
                  </div>
              </li>    
         <?php } ?>
         </ul>            
  </div>
</nav>
</div>
<div class="clearfix"></div>