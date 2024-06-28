<?php include "../layouts/main-header.php"; ?>
<?php 
	/*Update Slider*/
    if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_blog` SET `is_active`= '$type' WHERE blog_id_pk  = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):?>
            <script>alert('Blog is activated');</script>
         <?php else: ?>
            <script>alert('Blog is dectivated');</script>
         <?php endif; ?>
      <?php }
   }
?>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Membership for Student OR Doctor OR Prof./Lect Data</h4>
                
                     <center>
                         <a href="data1.php?type=1">(A) Student Data</a>
                          <a href="data1.php?type=2">(B) Lifetime Data</a>
                           <a href="data1.php?type=3">(C) Associate Data</a>
                           <a href="data1.php?type=4">(D) Pharma Data</a>
                             <a href="data1.php?type=5">(E) Patron Data</a>
                     </center>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include "../layouts/main-footer.php"; ?>