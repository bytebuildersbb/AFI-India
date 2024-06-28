<?php 
  include "layouts/main-header.php";
?>
<style type="text/css">
  .banner-text p a {
    text-decoration: none;
    background-color: #000;
    color: #fff;
    padding: 7px 15px 10px;
    border-radius: 5px;
}
</style>
<div class="clearfix"></div>
<div class="banner">
  <div class="owl-carousel owl-theme" id="head">
   <?php 
      $getSlider     =  "SELECT * FROM tbl_slide WHERE is_active = 1";
      $runGetSlider  =  $connect->query($getSlider);
      while($row = $runGetSlider->fetch_assoc()){
   ?>
    <div class="item">
      <div class="head-text">
      <img src="<?php echo IMG_PATH; ?>slider/<?php echo $row["slider_image"]; ?>" class="img-fluid"> 
       <div class="banner-text">
       <h1 class="wow fadeInUp">Ayurveda Federation of India</h1>
       <h5 class="wow fadeInDown">Ayurveda is considered by many scholars to be the oldest healing science. In Sanskrit, Ayurveda means "The Science of Life.” Ayurvedic knowledge originated in India more than 5,000 years ago and is often called the “Mother of All Healing."</h5>   
       <p class="wow fadeInRight"><a href="<?php echo $row["buttonLink"]; ?>" target="_blank" class="btn btn-primary">Know More</a></p>     
       </div>       
      </div>
    </div>
 <?php } ?>
  </div>
</div>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">AFI Achievement & Memories</h2>  
      <p class="wow fadeInRight">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      </div>    
    </div>
    <div class="row pt-md-3 jits ">
      <?php 
         $getMemories      =  "SELECT * FROM tbl_settings WHERE is_active = '1'";
         $runGetMemories   =  $connect->query($getMemories);
         while($row = $runGetMemories->fetch_assoc()){
      ?>
      <div class="col-md-4">
        <div class="achieves-box">
          <img src="<?php echo IMG_PATH; ?>memories/<?php echo $row["achievemnetsMemories"]; ?>" class="img-fluid wow fadeInLeft">
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="highlight pt-md-3 pb-md-3">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">General Information</h2>  
      <p class="wow fadeInRight">For more in-depth information about Ayurveda and how it can help you to return to balance, the articlesbelow will get you started.</p>
      </div>    
    </div>
    <div class="row">
      <div class="col-md-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active wow fadeInUp" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">News Gallery</a>
                      <a class="nav-item nav-link wow fadeInDown" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Events Gallery</a>
                      <a class="nav-item nav-link wow fadeInUp" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Blog</a>
                      <a class="nav-item nav-link wow fadeInDown" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Article</a>
                      <a class="nav-item nav-link wow fadeInUp" id="nav-about-tab1" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Videos</a> 
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                       <div class="row">
                        <div class="owl-carousel owl-theme" id="bans">
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts1.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum is placeholder text commonly used in the graphic</h4>
                                      <h6>January 26,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts2.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum is placeholder text commonly used in the graphic</h4>
                                      <h6>January 26,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts3.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                   <h4>Lorem ipsum is placeholder text commonly used in the graphic</h4>
                                      <h6>January 26,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>                              
                    </div> 
                  </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <div class="row">
                        <div class="owl-carousel owl-theme" id="bps1">
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts1.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 26,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts2.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 27,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts3.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 28,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts1.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 26,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts2.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 27,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts3.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 28,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts1.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 26,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts2.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 27,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>
                                <div class="item"> 
                                  <div class="ptrs">
                                    <img src="img/pts3.png" class="img-fluid">
                                    <div class="ptrs-cont">
                                      <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit </h4>
                                      <h6>January 28,2021</h6>
                                    </div>
                                  </div>                                 
                                </div>                                                            
                    </div> 
                  </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about-tab1">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
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
      <p class="wow fadeInRight">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      </div>    
    </div>
    <div class="row pt-md-3 jits">
      <div class="col-md-4">
       <!--  <div class="register-box">
          <img src="img/r1.png" class="img-fluid">
          <p>AFI member ID card</p>
        </div> -->
        <div class="afis">
          <img src="img/afi1.png" class="img-fluid">
        </div>
      </div>
      <div class="col-md-4">
        <!-- <div class="register-box">
          <img src="img/r2.png" class="img-fluid">
          <p>AFI Total Member</p>
        </div> -->
        <div class="afis">
          <img src="img/afi2.png" class="img-fluid">
        </div>
      </div>
      <div class="col-md-4">
        <!-- <div class="register-box">
          <img src="img/r3.png" class="img-fluid">
          <p>AFI member and volunteer registration</p>
        </div> -->
        <div class="afis">
          <img src="img/afi3.png" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="highlight pt-md-3 pb-md-3">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">Subscribe to our newsletter</h2>  
      <p class="wow fadeInRight">Get updates for new classes and new products</p>
      </div>    
    </div>
    <div class="row">
      <div class="subscribe">
        <form class="example" action="action_page.php">
          <input type="text" placeholder="Your Email Address" name="search">
          <button type="submit">Subscribe</button>
        </form>
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
          <h5 class="wow fadeInLeft"><img src="img/foot-logo.png" class="img-fluid">Ayurveda Federation of India</h5>
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
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js">  
</script>
<script src="js/jquery.countup.js"></script>
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
  //
       $('#head').owlCarousel({
          loop:true,
          margin:20,
          autoplay:true,
          nav:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:1
              }
          }
      });
  //
       $('#bans').owlCarousel({
          loop:true,
          margin:20,
          autoplay:true,
          nav:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:3
              }
          }
      });
 //
       $('#bps1').owlCarousel({
          loop:true,
          margin:20,
          autoplay:true,
          nav:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:1
              },
              1000:{
                  items:3
              }
          }
      });    
</script>
<script>
$('.counter').countUp();
</script>
</body>
</html>