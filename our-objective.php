<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>Our Objective</title>
   <meta name="description" content="Our Objective" />
   <meta name="keywords" content="Our Objective" />
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
      .dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    color: #1180df !important;
    border-bottom: 3px solid #1180df !important;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: transparent;
}
button.dropbtn {
    background: transparent;
    border: none;
    color: #202021;
    font-size: 15px;
    text-decoration: none;
    cursor: pointer;
     border-bottom: 3px solid transparent;
}
button.dropbtn:hover{
    color: #1180df !important;
    border-bottom: 3px solid #1180df !important;
}
button:focus {
    outline: 1px dotted;
    outline:none;
}
.dropdown-content a:hover {
    border: none !important;
    color: #16181b !important;
    text-decoration: none;
    background-color: #f8f9fa;
}
</style>
</head>
<?php
include "connection.php";
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
include "function.php";
$pageName =  basename($_SERVER['PHP_SELF']);
//echo $pageName;
$getMetas   =  "SELECT * FROM tbl_page_meta WHERE pageName = '".$pageName."'";
//echo $getMetas;
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

<body onstrcmp="return false" oncut="return false">
   <div class="header-top">
      <div class="top-left">
         <p class="wow fadeInUp"><i class="fa fa-phone"></i><a href="mailto:ayurvedafederation@gmail.com">info@afi-india.in</a></p>
         <p class="wow fadeInDown"><i class="fa fa-envelope" aria-hidden="true"></i>
            <a href="tel:+8595336710">011-41354100</a>,
            <a href="tel:+8595336710">8595336710</a>
         </p>
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
        <li class="wow fadeInLeft"><a href="">Events </a></li>
        <li class="wow fadeInLeft">
          <div class="dropdown">
            <button class="dropbtn">Publications</button>
             <div class="dropdown-content">
              <a href="#">For Doctors</a>
              <a href="#">For Public</a>
            </div>
          </div>
        </li>
           <li class="wow fadeInLeft">
          <div class="dropdown">
            <button class="dropbtn">Courses</button>
             <div class="dropdown-content">
              <a href="doctor-course.php">For Doctors</a>
              <a href="public-course.php">For Public</a>
            </div>
          </div>
        </li>          
      </ul>
      </div>
      <div class="middle-right wow fadeInRight">
         <div class="search-container">
            <form action="search.php">
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
               <a href="index.php"><img src="img/logo.png" alt="AFI India Logo" class="img-fluid wow fadeInLeft" title="AFI">
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
                 if($row['menu_id_pk'] == 2 or $row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5 or $row['menu_id_pk'] == 30){
                  $dropCheck = "dropdown-menu";
               }else{
                  $dropCheck = "";
               }
               if($row['menu_id_pk'] == 3 or $row['menu_id_pk'] == 5 or $row['menu_id_pk'] == 30){ ?>
                <a class="nav-link wow fadeInRight" href="#" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
             <?php } else {
               ?>
               <a class="nav-link wow fadeInRight" href="<?php echo $row["url"]; ?>" id="navbarDropdownMenuLink"><?php echo $row["manuName"];?></a>
               <?php
            } ?>
            <div class=<?php echo $dropCheck; ?>>
               <!-- For State Consuil page -->
               <?php 
               while ($childObj =   $runGetSub->fetch_object()) {
                  if($row['menu_id_pk'] == 3){
                         //for communite menu
                     ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url."?MemberType=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
                  <?php    } 
                   elseif($row['menu_id_pk'] == 5){
                         //for state
                     ?>
                     <a class="dropdown-item" href="<?php echo $childObj->url."?StateConvener=".str_replace(' ', '-', $childObj->manuName); ?>"><?php echo $childObj->manuName;?></a>
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
</div>
<div class="clearfix"></div>
<style type="text/css">
	.text-justify{
		line-height: 25px !important;
	}
	ol li{
		padding: 10px;
	}
</style>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
	<div class="container">
		<div class="row">
			<div class="heads pb-3">
				<!-- <h2 class="wow fadeInLeft">Founder</h2> -->
			</div>
		</div>
		<div class="row pt-md-3 pb-md-3" style="box-shadow: 5px 10px 18px rgb(0 0 0 / 18%); border-radius: 5px;">
			<div class="col-md-12 abhgs">
				<div class="f-right">
					<div class="qual-data p-0">
						<h3 class="text-center">Ayurveda Federation of India Objectives</h3>       
						<ol>
							<li class="text-justify">To initiate, aid, develop and coordinate scientific research in different aspects, fundamental and applied of Ayurvedic Sciences and to promote and assist for the study of diseases, their prevention, causation and remedy. 	</li>
							<li class="text-justify">To mentor, care and facilitate Ayurveda Practitioners with expertise knowledge of technology, commerce, finance & overall skill development to achieve global competitiveness and to collect and disseminate and circulate statistics and other useful information and to carry out attempts to spread knowledge concerning Ayurveda, skill development, economy, industry, in India and outside by holding seminars, conventions, discussions and to organize exhibitions and to send and invite representatives to/from foreign countries for the benefit of the general public at large/country and to work as an interface between government agencies and entrepreneurs, submit memorandum & innovative thoughts on policies, laws and regulations. </li>
							<li class="text-justify">To promote and advance Ayurveda as the first line of treatment and Improvement of public health and Ayurveda education in India.	</li>
							<li class="text-justify">To conduct research on various aspects of Ayurveda for providing Medical Care through Ayurvedic Systems of Medicine to the suffering humanity.</li>
							<li class="text-justify">To maintain honor and dignity and to uphold the interest of the Ayurveda practitioners and to promote co-operation amongst the members thereof.</li>
							<li class="text-justify">To organize free Ayurveda camps and dispensaries to give free medical consultation, medicines and other medicinal aids to the poor and needy. 	</li>
							<li class="text-justify">To make representation to Central & State Governments, Local, State or Central authorities, Executive or Legislative or other bodies, authorities on Ayurveda reforms, various issues related to Ayurveda clinical practice, Ayurveda education, Ayurveda research and other interest of Ayurveda practitioners and act as Policy advisory body for matters related them.	
 
							</li>
							<li class="text-justify">To play a pro-active role in the creation of a policy environment besides playing the role of a catalyst in terms of encouraging, nurturing the growth and development of entrepreneurs, skill development, trade, commerce, industry, service sectors and service providers in India in particular and in any part of the world.
							</li>
							<li class="text-justify">To carry out or get carried out research for achieving the objects of the Forum and to promote and foster unity, amity and fraternity amongst the Ayurveda Practitioners and entrepreneurs concerning their progress and protection of their interest.
							</li>
							<li class="text-justify">To take steps for the solution to problems relating to the welfare &interest of the Ayurveda Practitioners and entrepreneurs.
							</li>
							<li class="text-justify">To collect and disseminate statistical and other information for the promotion of the objects of the Forum and also to make efforts for the spread of commercial, economic, technological, professional and scientific knowledge.	
							</li>
							<li class="text-justify">To take all such steps as may be necessary for promoting, protecting, supporting or opposing legislation or other matters adversely affecting the interest of the Ayurveda Practitioners and entrepreneurs and in general to take initiative to secure the welfare of the Indian and Non-Residential Indian (NRI) entrepreneurs community in all respects.	 
							</li>
							<li class="text-justify">To undertake all the acts required to create an informational database in respect of international markets, update the database and create a system for allowing the Ayurveda Practitioners and entrepreneurs access to the database so created besides providing training them consultancy or the use of such database. 	
							</li>
							<li class="text-justify">To undertake advocacy for a change in the public policies of the government and international organizations in the favor of Ayurveda Practitioners and entrepreneurs.	
							</li>
							<li class="text-justify">To assist, open, establish, found and maintain institutions for the production of Ayurvedic medicines, instruments where such medicine & instruments may be distributed free or below cost for the relief of the general public.	 
							</li>
							<li class="text-justify">To organize lectures, seminars, workshop courses, and training programs as well as to publish books, literature and such other promotional material for the enhancement of knowledge and creation of an awareness of the Ayurveda products.	 
							</li><li class="text-justify">To hold, assist or support exhibitions, collective display and such other promotional programs, of the objects of the company.	 
							</li><li class="text-justify">To create awareness of Indian Ayurveda products & Services in overseas markets.	 
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>
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
</script>
<script>
	$(document).ready(function () {
  // Add minus icon for collapse element which is open by default
  $(".collapse.show").each(function () {
  	$(this)
  	.prev(".card-header")
  	.find(".fa")
  	.addClass("fa-minus")
  	.removeClass("fa-plus");
  });
  // Toggle plus minus icon on show hide of collapse element
  $(".collapse")
  .on("show.bs.collapse", function () {
  	$(this)
  	.prev(".card-header")
  	.find(".fa")
  	.removeClass("fa-plus")
  	.addClass("fa-minus");
  })
  .on("hide.bs.collapse", function () {
  	$(this)
  	.prev(".card-header")
  	.find(".fa")
  	.removeClass("fa-minus")
  	.addClass("fa-plus");
  });
});
</script>