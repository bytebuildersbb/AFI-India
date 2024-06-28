<?php include "layouts/main-header.php"; ?>

<div class="clearfix"></div>


<div class="clearfix"></div>
<div class="achieves pt-md-5 pb-md-5" style="position: relative;">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">AFI Membership Form</h2>             
      </div>    
    </div>
    <div class="row pt-md-3">
      <div class="col-md-4">
        <a href="registration.php">
      <div class="mem-d jnts">
        Membership for Doctor and Student
      </div>
      </a>
    </div>

     
    
    <div class="col-md-4">
      <a href="special.php">
      <div class="mem-d jnts">
        Membership for Patron
      </div>
      </a>
      </div>

       <div class="col-md-4">
        <a href="membership-detail.html">
        <div class="mem-d jnts">
           Membership details
      </div>
      </a>
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
