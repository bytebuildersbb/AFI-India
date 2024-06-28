<?php 
   $title   =  "Achivements Memories Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   /*Update Slider*/
   if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_settings` SET `is_active`= '$type' WHERE setting_id_pk = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):?>
            <script>alert('Status image activated');</script>
         <?php else: ?>
            <script>alert('Status image dectivated');</script>
         <?php endif; ?>
      <?php }
   }
   if(isset($_POST["submit"])){
      $achivementsName  =  $_FILES['achivements']["name"];
      $achivementsTmp   =  $_FILES['achivements']["tmp_name"];
      $achivementsSize  =  $_FILES['achivements']["size"];
      $achivementsType  =  $_FILES['achivements']["type"];
      $alt1    =  $_POST["alt1"];
      $imageName         =    explode(".", $achivementsName);
      $newName           =    round(microtime(true)) . '_memories.' . end($imageName);
      $sliderExtention   =    pathinfo($achivementsName, PATHINFO_EXTENSION);
      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
      );

      if($achivementsName == ""){
         $errorMsg=  "Please select slider image.";
         $code= "1";
      }else if(!in_array($sliderExtention, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "1";
      }else if($achivementsSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "1";
      }else{
         $query         =      "INSERT INTO `tbl_settings`(`achievemnetsMemories`,`altImg`) VALUES ('$newName','$alt1')";
         $runQuery      =     $connect->query($query);
         if($runQuery){
            move_uploaded_file($achivementsTmp,'../uploads/memories/'.$newName);
            $errorMsg = "Image uploaded successfully";
            $code    =  2;
         }
      }
   }
?>

<?php
   if(isset($_GET["Did"])){
      $query      =  "DELETE FROM `tbl_settings` WHERE setting_id_pk = '".$_GET["Did"]."'";
      $runQuery   =  $connect->query($query);
      if($runQuery){
         $code = 3;
         $errorMsg   =  "Image Deleted";
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
                      <?php if(isset($code) && $code == 3): ?>
                     <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <?php if(isset($code) && $code == 2): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title">Achievemnets & Memories</h4>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>File upload</label>
                           <div class="input-group col-xs-6">
                              <input type="file" class="form-control file-upload-info"  name="achivements" placeholder="Upload Image">
                           </div>
                           <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label>ALT Image Name</label>
                           <input type="text" name="alt1" class="form-control" placeholder="ALT Image Name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Slider Image</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $getMemories        =        "SELECT * FROM tbl_settings";
                           $runGetMemories     =     $connect->query($getMemories);
                           $count = 1;
                        ?>
                        <?php while($row = $runGetMemories->fetch_assoc()): ?>
                           <tr>
                              <td class="py-1">
                                 <?= $count; ?>
                              </td>
                              <td> 
                                 <a href="../uploads/memories/<?php echo $row["achievemnetsMemories"]; ?>" target="_blank">
                                    <img src="../uploads/memories/<?php echo $row["achievemnetsMemories"]; ?>" alt="image"> 
                                 </a>
                              </td>
                              <td>
                                 <?php 
                                    if($row["is_active"]=="1"){ ?>
                                       <a href="achievements-memories.php?id=<?php echo $row["setting_id_pk"];?>&type=0" class="btn btn-danger btn-xs">Inactive</a>
                                    <a href="achievements-memories.php?Did=<?php echo $row["setting_id_pk"];?>" class="btn btn-danger btn-xs">Delete</a>
                                    <?php }else{ ?>
                                       <a href="achievements-memories.php?id=<?php echo $row["setting_id_pk"];?>&type=1" class="btn btn-success btn-xs">Activated</a>
                                    <?php } ?>
                              </td>
                           </tr>
                        <?php 
                           $count++; 
                        endwhile;
                        ?>
                        </tbody>
                     </table>
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