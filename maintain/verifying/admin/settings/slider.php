<?php 
   $title   =  "Slider Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   /*Update Slider*/
   if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_slide` SET `is_active`= '$type' WHERE slider_img_id_pk = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):
            $code = 2;
            $errorMsg   =  "Slider Activated";      
         else: 
            $code = 3;
            $errorMsg   =  "Slider image dectivated";
         endif; 
       }
   }
   if(isset($_POST["submit"])){
      $sliderImgName  =  $_FILES['sliderImg']["name"];
      $sliderImgTmp   =  $_FILES['sliderImg']["tmp_name"];
      $sliderImgSize  =  $_FILES['sliderImg']["size"];
      $sliderImgType  =  $_FILES['sliderImg']["type"];
      $content    =  $_POST["content"];
      $alt1    =  $_POST["alt1"];
      $btnLink    =  $_POST["btnLink"];
      $imageName         =    explode(".", $sliderImgName);
      $newName           =    round(microtime(true)) . '_slider.' . end($imageName);
      $sliderExtention   =    pathinfo($sliderImgName, PATHINFO_EXTENSION);
      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
      );
      if($sliderImgName == ""){
         $errorMsg=  "Please select slider image.";
         $code= "1";
      }else if(!in_array($sliderExtention, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "1";
      }else if($sliderImgSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "1";
      }else{
         $query         =      "INSERT INTO `tbl_slide`(`slider_image`,`buttonLink`,`altimg`,`content`) VALUES ('$newName','$btnLink','$alt1','$content')";
         $runQuery      =     $connect->query($query);
         if($runQuery){
            move_uploaded_file($sliderImgTmp,'../uploads/slider/'.$newName);
            $errorMsg = "Image uploaded successfully";
            $code    =  2;
         }
      }
   }
   ?>
<?php 
   if(isset($_GET["Did"])){
      $query = "DELETE FROM `tbl_slide` WHERE slider_img_id_pk  = '".$_GET["Did"]."'";
      $runQuery   =  $connect->query($query);
      if($runQuery){
         $code = 3;
         $errorMsg   =  "Slider Deleted";
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
                     <h4 class="card-title">Upload Slider Image</h4>
                     <p class="card-description">Main Home Slider</p>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>File upload</label>
                           <div class="input-group col-xs-6">
                              <input type="file" class="form-control file-upload-info"  name="sliderImg" placeholder="Upload Image" >
                           </div>
                           <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label>ALT Image Name</label>
                           <input type="text" name="alt1" class="form-control" placeholder="ALT Image ">
                        </div>
                         <div class="form-group">
                           <label>Slider Text</label>
                            <input type="text" name="content" class="form-control" placeholder="Slider Text">
                         </div>
                         <div class="form-group">
                           <label>Button Link</label>
                           <input type="text" name="btnLink" class="form-control" placeholder="Ex:-google.co.in">
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
                           $getSlider        =        "SELECT * FROM tbl_slide";
                           $runGetSlider     =     $connect->query($getSlider);
                           $count = 1;
                        ?>
                        <?php while($row = $runGetSlider->fetch_assoc()): ?>
                           <tr>
                              <td class="py-1">
                                 <?= $count; ?>
                              </td>
                              <td> 
                                 <a href="../uploads/slider/<?php echo $row["slider_image"]; ?>" target="_blank">
                                    <img src="../uploads/slider/<?php echo $row["slider_image"]; ?>" alt="image"> 
                                 </a>
                              </td>
                              <td>
                                 <?php 
                                    if($row["is_active"]=="1"){ ?>
                                       <a href="slider.php?id=<?php echo $row["slider_img_id_pk"];?>&type=0" class="btn btn-danger btn-xs">Inactive</a>
                                    <?php }else{ ?>
                                       <a href="slider.php?id=<?php echo $row["slider_img_id_pk"];?>&type=1" class="btn btn-outline-success btn-xs">Activated</a>
                                       <a href="slider.php?Did=<?php echo $row["slider_img_id_pk"];?>&type=0" class="btn btn-outline-danger btn-xs">Delete</a>
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