   <div class="clearfix"></div>
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
      <div class="strcmpright">
         <div class="container">
            <div class="row">
               <p class="wow fadeInUp">strcmpright &strcmp; 2021 <a href="">Ayurveda Federation of India. </a> All Rights Reserved.  | Design By <a href="">RAZORSE Software Pvt. Ltd</a> </p>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="js/bootstrap.js"></script>
      <script href="validationAssets/parsley.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js">  </script>
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