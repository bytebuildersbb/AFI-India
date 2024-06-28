<?php include "layouts/main-header.php"; ?>


<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">Academic Committee</h2>         
      </div>    
    </div>
    <div class="row pt-md-3">
      <div class="col-md-12" role="tabpanel">
            <div class="[ col-xs-4 col-sm-12 ]">
                <!-- Nav tabs -->
                <ul class="nav nav-justified" id="nav-tabs" role="tablist">
                 
                 
                    <li role="presentation">
                        <a href="#15" aria-controls="15" role="tab" data-toggle="tab" class="">
                           <img class="img-circle" src="img/cts2.png"  style="width:125px;height:150px;">
                            <span class="quote"><i class="fa fa-quote-left"></i></span>
                        </a>
                        <strong class="text-green-big">  Dr. ANUJ Jain <span>President</span> </strong>
                    </li>
              
                 
                    <li role="presentation">
                        <a href="#16" aria-controls="16" role="tab" data-toggle="tab">
                           <img class="img-circle" src="img/cts81.png" title="" style="width:125px;height:150px;">
                            <span class="quote"><i class="fa fa-quote-left"></i></span>
                        </a>
                        <strong class="text-green-big">Dr. Sambhu P. Patel <span>General Sec</span></strong>
                    </li>

                    
            
                </ul>
            </div>
            <div class="col-xs-8 col-sm-12">
                <!-- Tab panes -->
                <div class="tab-content" id="tabs-collapse" style="box-shadow: none !important;">            
                 
                 
                  <div role="tabpanel" class="tab-pane" id="15" style="border-top:2px solid #e5e5e5">
                        <div class="tab-inner fadeIn" style="text-align:justify !important;">  
<div class="qual-data">
                            <h5>Dr. Anuj jain</h5>
                             <h6>Designation- <span>National president of AFI </span></h6>
                             <p>He is an ayurved and panchkarm consultant,</p>
                             <p>He is treating cardiac and kidney failure patients </p>
                             <p>He is a director of shreevishwadhyasayurved and panchkarmchikitsalay,</p>
                             <p>He has been treating critical patients through ayurved and is a popular speaker of emergency treatment in ayurved ,he is delivered more than 100 lectures in seminars and workshops across india .</p>
                          </div> 

                        </div>
                    </div>
                
                 
                    <div role="tabpanel" class="tab-pane" id="16" style="border-top:2px solid #e5e5e5">
                        <div class="tab-inner fadeIn" style="text-align:justify !important;"> 
                             <div class="qual-data">
                            <h5> Dr. Shambhu P. Patel.</h5>
                             <h6>Designation- <span>General Secretory </span></h6>
                             <p>Dr. Shambhu P. Patel is presently working as Assist. Professor in the Department of Dravyaguna at Vivek College of Ayurvedic Sciences & Hospital, Bijnor, Uttar Pradesh. His academic qualifications are B.A.M.S from Govt. Ayurvedic Medical & Hospital, Jabalpur Madhya Pradesh. And Post-Graduation from R. D. Memorial Ayurvedic College & Hospital, Bhopal, Madhya Pradesh. </p>
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

</body>
</html>
