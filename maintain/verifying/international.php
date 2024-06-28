<?php include "layouts/main-header.php"; ?>

<div class="clearfix"></div>


<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
  <div class="container">
    <div class="row">
      <div class="heads">
        <h2 class="wow fadeInLeft">International Core Committee</h2>         
      </div>    
    </div>
    <div class="row pt-md-3">
      <div class="col-md-12" role="tabpanel">
        <div class="[ col-xs-4 col-sm-12 ]">
          <!-- Nav tabs -->
          <ul class="nav nav-justified" id="nav-tabs" role="tablist">


            <li role="presentation">
              <a href="#15" aria-controls="15" role="tab" data-toggle="tab" class="">
               <img class="img-circle" src="img/cts13.png"  style="width:125px;height:150px;">
               <span class="quote"><i class="fa fa-quote-left"></i></span>
             </a>
             <strong class="text-green-big"> Dr. Gaurang Joshi </strong>
           </li>


           <li role="presentation">
            <a href="#16" aria-controls="16" role="tab" data-toggle="tab">
             <img class="img-circle" src="img/cts14.png" title="" style="width:125px;height:150px;">
             <span class="quote"><i class="fa fa-quote-left"></i></span>
           </a>
           <strong class="text-green-big">Dr. Sanjay P. Chhajed</strong>
         </li>

         <li role="presentation">
          <a href="#33" aria-controls="33" role="tab" data-toggle="tab">
           <img class="img-circle" src="img/cts24.png" title="" style="width:125px;height:150px;">
           <span class="quote"><i class="fa fa-quote-left"></i></span>
         </a>
         <strong class="text-green-big">Dr.Bhairav B. Kulkarni</strong>
       </li>

     </ul>
   </div>
   <div class="col-xs-8 col-sm-12">
    <!-- Tab panes -->
    <div class="tab-content" id="tabs-collapse" style="box-shadow: none !important;">            


      <div role="tabpanel" class="tab-pane" id="15" style="border-top:2px solid #e5e5e5">
        <div class="tab-inner fadeIn" style="text-align:justify !important;">  

          <div class="qual-data">
            <h5> Dr. Gaurang Joshi </h5>
            <h6>Designation- <span>President-International Psoriasis Foundation  </span></h6>
            <p>Director of Atharva Multi Specialty Ayurveda Hospital, Cancer Research Center, Panchakarma and Skin Care Hospital </p>
          </div>   

        </div>
      </div>


      <div role="tabpanel" class="tab-pane" id="16" style="border-top:2px solid #e5e5e5">
        <div class="tab-inner fadeIn" style="text-align:justify !important;"> 
         <div class="qual-data">
          <h5>Dr. Sanjaykumar P. Chhajed</h5>
          <h6>Designation- <span>General Secretory - International Core Group, AFI </span></h6>
          <p>NADI - GURU ACHARYA VAIDYA SANJAYKUMAR  </p>
          <p> M.D.,(Jamnagar) Gold Medalist, BAMS(Pune) Gold Medalist</p>
          <p>Nadi Trainer & Mentor, </p>
          <p>NADI GURU PULSE DIAGNOSIS TRAINING & RESEARCH CENTER, MUMBAI</p>
        </div>               


      </div>
    </div>              

    <div role="tabpanel" class="tab-pane" id="33" style="border-top:2px solid #e5e5e5">
      <div class="tab-inner fadeIn" style="text-align:justify !important;">  

        <div class="qual-data">
          <h5>Dr.Bhairav B. Kulkarni</h5>
          <h6>Designation- <span>Director, Shree Siddhivinayak Ayurved Panchakarma Center  Aurangabad -431005 Maharashtra India </span></h6>

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

