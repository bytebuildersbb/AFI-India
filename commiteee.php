<?php include "layouts/main-header.php"; ?>


<div class="clearfix"></div>


<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
  <div class="container">
    <div class="row">
      <div class="heads">
      <h2 class="wow fadeInLeft">AFI's Core Committee</h2>         
      </div>    
    </div>
    


    <div class="row pt-md-3">
        <div class="accordion" id="accordionExample">
	<?php
		$select="select * from tbl_core_committee group by designation order by core_committee_id_pk asc";
		   $ss    =     $connect->query($select);
		   $i=1;
		   while($sss=mysqli_fetch_assoc($ss)){
		 $designation=$sss['designation'];
	 ?>
<div class="card">
      <div class="card-header" id="headingFive">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"><i class="fa fa-plus"></i><?php echo $sss['designation']; ?></button>
        </h2>
      </div>
<div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) {echo 'show';} ?>" aria-labelledby="headingFive" data-parent="#accordionExample">
        <div class="card-body">
           <div class="col-md-12" role="tabpanel">
               
               <?php
               $query="select * from tbl_core_committee where designation='$designation' order by core_committee_id_pk asc";
               $queryy    =     $connect->query($query);
              while($queryyy=mysqli_fetch_assoc($queryy)){ ?>
            <div class="[ col-xs-4 col-sm-12 ]">
                <!-- Nav tabs -->
                <ul class="nav nav-justified" id="nav-tabs" role="tablist">
                 
                 
                    <li role="presentation">
                        <a href="#22" aria-controls="22" role="tab" data-toggle="tab" class="active">
                            
                             <?php
                              $b=explode(",",$queryyy["profilePic"]);
                              foreach($b as $img){
                                  ?>
                                 <img class="img-circle" src="admin/uploads/committee/<?php echo $img; ?>"  style="width:125px;height:150px;">
                                  <?php
                              } ?>
                            
                            <span class="quote"><i class="fa fa-quote-left"></i></span>
                        </a>
                        <strong class="text-green-big"><?php echo $queryyy['name']; ?> </strong>
                    </li>
            
                </ul>
            </div>
            <div class="col-xs-8 col-sm-12">
                <!-- Tab panes -->
                <div class="tab-content" id="tabs-collapse" style="box-shadow: none !important;">            
                 
                 
                  <div role="tabpanel" class="tab-pane active" id="22" style="border-top:2px solid #e5e5e5">
                        <div class="tab-inner fadeIn" style="text-align:justify !important;">  

                          <div class="qual-data">
                          <!--  <h5><?php echo $queryyy['name']; ?></h5>
                             <h6>Designation- <span><?php echo $designation; ?></span></h6>-->
                            <?php echo $queryyy['artical']; ?>
                          </div>   

                        </div>
                    </div>
                </div>
            </div> 
            <?php
              }
              ?>
            
            
            
            
            
        </div>
        </div>
      </div>
    </div>
<?php
$i++;
}
?>

   

 
    </div>

     <!--  <div class="card">
      <div class="card-header" id="headingFive">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"><i class="fa fa-plus"></i> International Core Committee </button>
        </h2>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingSix">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"><i class="fa fa-plus"></i> Academic Committee</button>
        </h2>
      </div>
      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingSeven">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"><i class="fa fa-plus"></i> Ayurvedic Surgeons Committee</button>
        </h2>
      </div>
      <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingEight">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight"><i class="fa fa-plus"></i> Clinic and Hospital Committee</button>
        </h2>
      </div>
      <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingNine">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine"><i class="fa fa-plus"></i> Women's Committee</button>
        </h2>
      </div>
      <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingTen">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen"><i class="fa fa-plus"></i> NHM & Govt. Employees Committee</button>
        </h2>
      </div>
      <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingEleven">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven"><i class="fa fa-plus"></i> AFI's Student Committee</button>
        </h2>
      </div>
      <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

      <div class="card">
      <div class="card-header" id="headingTwelve">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve"><i class="fa fa-plus"></i> Journal of AFI</button>
        </h2>
      </div>
      <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingThirteen">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThirteen"><i class="fa fa-plus"></i> Swasthya Sandesh Patrika</button>
        </h2>
      </div>
      <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div>


   <div class="card">
      <div class="card-header" id="headingFourteen">
        <h2 class="mb-0">
          <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourteen"><i class="fa fa-plus"></i> Associate Editor:</button>
        </h2>
      </div>
      <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
        <div class="card-body">
          <p>Third Tab Content</p>
        </div>
      </div>
    </div> -->




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

</body>
</html>
