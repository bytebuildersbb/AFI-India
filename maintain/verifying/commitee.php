<?php include "layouts/main-header.php"; ?>
<?php
    if(isset($_POST["submitSubscribe"])){
        $subName    =   $_POST["subName"];
        $query      =   "SELECT * FROM tbl_subscribe WHERE emailID = '$subName'";
        $runQuery   =   $connect->query($query);
        if($subName == ""){
            $errorMsg = "Please enter your Email ID";
            $code = 1;
        }else{
        if(mysqli_num_rows($runQuery) > 0){ ?>
            <script type="text/javascript">
                alert('Email ID already exist');
            </script>
            <?php }else{
                $query      = "INSERT INTO `tbl_subscribe`(`emailID`) VALUES ('$subName')";
                $runQuery   =   $connect->query($query);
                if($runQuery){ ?>
                    <script type="text/javascript">
                        alert('Thanks for subscribe us.');
                    </script>
                <?php }
            }
        }
    }

?>
<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
</style>
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
    $i = 1;
    $query      =   "SELECT * FROM tbl_core_committee ORDER BY core_committee_id_pk ASC";
    $runQuery   =   $connect->query($query);
    while($dataObj  =   $runQuery->fetch_assoc()):
            $highlight = $i == 1 ? 'active' : '';

        ?>
        <div class="card">
         <div class="card-header" id="headingFive">
          <h2 class="mb-0">
           <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#<?php echo $dataObj["core_committee_id_pk"];?>"><i class="fa fa-plus"></i><?php echo ucfirst($dataObj["designation"]); ?></button>
       </h2>
   </div>
   <div id="<?php echo $dataObj["core_committee_id_pk"];?>" class="collapse " aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
       <div class="col-md-12" role="tabpanel">
        <div class="[ col-xs-4 col-sm-12 ]">
         <!-- Nav tabs -->
         <ul class="nav nav-justified" id="nav-tabs" role="tablist">
          <li role="presentation">
           <a href="#<?php echo $dataObj["core_committee_id_pk"];?>" aria-controls="<?php echo $dataObj["core_committee_id_pk"];?>" role="tab" data-toggle="tab" class="<?php echo $highlight; ?>">
               <img class="img-circle" src="<?= IMG_PATH;?>/committee/<?php echo $dataObj["profilePic"];?>"  style="width:125px;height:150px;">
               <span class="quote"><i class="fa fa-quote-left"></i></span>
           </a>
           <strong class="text-green-big"><?= ucfirst($dataObj["name"]);?></strong>
       </li>
   </ul>
</div>
<div class="col-xs-8 col-sm-12">
 <!-- Tab panes -->
 <div class="tab-content<?php echo $dataObj["core_committee_id_pk"];?>" id="tabs-collapse" style="box-shadow: none !important; display: block;
 color: #000 !important;
 border: none !important;
 background-color: #f3f3f3;">
 <div role="tabpanel" class="tab-pane <?php echo $highlight; ?>" id="<?php echo $dataObj["core_committee_id_pk"];?>" style="border-top:2px solid #e5e5e5">
   <div class="tab-inner fadeIn" style="text-align:justify !important;">
    <div class="qual-data">
     <h5><?php echo ucfirst($dataObj["name"]); ?></h5>
     <div>
        <?php echo ucfirst($dataObj["artical"]); ?>
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
<?php $i++; endwhile; ?>
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
    <form class="example" action="" method="POST">
     <input type="text" placeholder="Your Email Address" name="subName" class="<?php if(isset($code) && $code==1):echo 'errorMsg'; endif; ?>" value="<?php if(isset($subName)):echo $subName; endif; ?>">
     <button type="submit" name="submitSubscribe">Subscribe</button>
 </form>
    <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<?php include "layouts/main-footer.php"; ?>
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
<script></script>
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
