<?php 
   $title   =  "Navbar Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   /*Update Slider*/
   if(isset($_REQUEST["manuSubmit"])){
      $mainMenu         =     $_POST['mainMenu'];
      if($mainMenu == ""){
         $errorMsg = "Please enter menu name";
         $code = 1;
      }else{
         $query      =  "INSERT INTO `tbl_menu`(`manuName`) VALUES ('$mainMenu')";
         $runQuery   =  $connect->query($query);
         if($runQuery){
            $errorMsg = "Menu Created";
            $code = 2;
         }
      }
     
   }
   if(isset($_POST["childSubmit"])){
      $childMenu  =  $_POST["childMenu"];
      $parentID   =  $_POST["parentID"];
      if($childMenu == ""){
         $errorMsg = "Please enter child menu name";
         $code = 3;
      }else{
         $query       =    "INSERT INTO `tbl_menu`(`manuName`, `parent_ID`) VALUES ('$childMenu','$parentID')";
         $runQuery    =    $connect->query($query);
         if($runQuery){
            $errorMsg = "Child Menu Created";
            $code = 4;
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
                     <h4 class="card-title">Parent Menu's</h4>
                     <?php if(isset($code) && $code == 2): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <form method="POST" action="">
                        <div class="form-group">
                           <label>Menu Name</label>
                           <input type="text" name="mainMenu" class="form-control <?php if(isset($code) && $code==1):echo 'errorMsg'; endif; ?>" placeholder="Main Menu">
                            <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                              <input type="submit" name="manuSubmit" class="btn btn-primary" value="Submit">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Child Menu's</h4>
                  <?php if(isset($code) && $code == 4): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <form method="POST">
                        <div class="form-group">
                           <label>Child Menu</label>
                           <select type="text" name="parentID" class="form-control" placeholder="Child Menu">
                              <?php 
                                 $getMenu    =  "SELECT * FROM tbl_menu";
                                 $runQuery   =  $connect->query($getMenu);
                                 while($dataObj    =  $runQuery->fetch_object()):
                              ?>
                              <option value="<?php echo $dataObj->menu_id_pk;?>"><?= $dataObj->manuName; ?></option>
                           <?php endwhile; ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <input type="text" name="childMenu" class="form-control <?php if(isset($code) && $code==3):echo 'errorMsg'; endif; ?>" placeholder="Child Menu">
                        <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                        </div>
                        <div class="form-group">
                           <input type="submit" name="childSubmit" class="btn btn-primary" value="Submit">
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