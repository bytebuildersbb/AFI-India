<?php 
   $title   =  "Navbar Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   if(isset($_POST["metaSubmit"])){
      $errorMsg = "Page Assign";
      $code = 4;
   }
?>

<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
</style>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Assign Page Meta</h4>
                  <?php if(isset($code) && $code == 4): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <form method="POST">
                        <div class="form-group">
                           <label>Page Name</label>
                            <select class="form-control">
                              <option>--Please Select--</option>
                              <option value="page-demo.php">Public Activities</option>
                              <option value="page-demo.php">Publication</option>
                              <option value="page-demo.php">Downloads</option>
                              <option value="page-demo.php">Media</option>
                              <option value="page-demo.php">Events</option>
                              <option value="page-demo.php">Updates</option>
                              <option value="page-demo.php">Advertisement Section</option>
                           </select>

                        </div>
                        <div class="form-group">
                           <label>Assign Page</label>
                           <select class="form-control">
                              <option>--Please Select--</option>
                              <option value="page-demo.php">Demo Page</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <input type="submit" name="metaSubmit" class="btn btn-primary" value="Submit">
                        </div>
                     </form>
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