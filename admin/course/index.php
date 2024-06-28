<?php 
   $title   =  "Course Section | Admin";
   $description = 'Best Course | Admin';
   $keyword    = 'Best Ayurveda Course | Admin';
   include "../layouts/main-header.php";
    ?>
<?php 
   if(isset($_POST["storeBlog"])){
      $courseName       =  $_POST["courseName"];
      $cDuration        =  $_POST["cDuration"];
      $courseDetails    =  $_POST["courseDetails"];
      $courseFee        =  $_POST["courseFee"];
       $blogFile      =     $_FILES["pdfFile"]["name"];
      $blogFileTmp   =     $_FILES["pdfFile"]["tmp_name"];
      $blogSize      =     $_FILES["pdfFile"]["size"];
      $blogType      =     $_FILES["pdfFile"]["type"];
       $course_type    =  $_POST["course_type"];
       $member_cost    =  $_POST["member_cost"];
      $allowed_pdf = array(
        "png",
        "jpg",
        "pdf",
        "PDF",
        "jpeg"
      );
      $pdfName             =     explode(".", $blogFile);
      $pdfNew              =     round(microtime(true)) . 'PDF.' . end($pdfName);
      $pdfImgExtention     =     pathinfo($blogFile, PATHINFO_EXTENSION);
      if($courseName == ""){
         $errorMsg=  "Please enter course name.";
         $code= "1";
      }else if($cDuration == ""){
         $errorMsg=  "Please enter course duration";
         $code= "2";
      }else if($courseDetails == ""){
         $errorMsg=  "Please enter course details.";
         $code= "3";
      }else if($courseFee == ""){
         $errorMsg=  "Please enter course fee";
         $code= "4";
      }else{
          move_uploaded_file($blogFileTmp,'../uploads/PDF/'.$pdfNew); 
         $query   =  "INSERT INTO `tbl_course`(`course_name`, `course_duration`, `course_details`, `course_fee`,`pdf`,`member_cost`,`course_type`) VALUES ('$courseName','$cDuration','$courseDetails','$courseFee','$pdfNew','$member_cost','$course_type')";
         $runQuery   =  $connect->query($query);
         if($runQuery){
            $errorMsg=  "Course create succssfully";
            $code= "5";
         }
      }
   }
   ?>
<?php 
   if(isset($_POST["editBlog"])){
      $id   =   $_GET["eId"];
       $blogFile      =     $_FILES["blogImg"]["name"];
      $blogFileTmp   =     $_FILES["blogImg"]["tmp_name"];
      $blogSize      =     $_FILES["blogImg"]["size"];
      $blogType      =     $_FILES["blogImg"]["type"];
       $course_type    =  $_POST["course_type"];
       $member_cost    =  $_POST["member_cost"];
       
      
      $pdfName             =     explode(".", $blogFile);
      $pdfNew              =     round(microtime(true)) . 'PDF.' . end($pdfName);
         if(empty($blogFile)){
         $previewPDF    =  $_POST["ifPDFempty"];
      }else{
         $previewPDF    =  $pdfNew;
         move_uploaded_file($blogFileTmp,'../uploads/PDF/'.$pdfNew); 
      }
      $courseName       =  $_POST["courseName"];
      $cDuration        =  $_POST["cDuration"];
      $courseDetails    =  $_POST["courseDetails"];
      $courseFee        =  $_POST["courseFee"];
         $query = "UPDATE `tbl_course` SET `course_name`='$courseName',`course_duration`='$cDuration',`pdf`='$previewPDF',`course_details`='$courseDetails',`course_type`='$course_type',`course_fee`='$courseFee',`member_cost`='$member_cost' WHERE course_id_pk = '".$id."'";
         $runQuery   =  $connect->query($query);
         if($runQuery){ ?>
            <script type="text/javascript">alert('Course Update Succssfully');</script>
         <?php }
      }
?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<style type="text/css">
   .ck-content>p{
   height: 200px !important;
   }
</style>
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
   <?php 
      if(isset($_GET["eId"])){ ?>
         <?php
            $id   =   $_GET["eId"];
            $query = "SELECT * FROM tbl_course WHERE course_id_pk  = '".$id."'";
            $runQuery   =  $connect->query($query);
            $dataObj    =  $runQuery->fetch_object();
          
         ?>
         <div class="main-panel">
         <div class="content-wrapper">
            <div class="row">
                 <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body">
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Course</h4>
                        <p class="card-description">Create Course</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="exampleInputName1">Course Name</label>
                              <input type="text" class="form-control" name="courseName" placeholder="Course Name" value="<?= $dataObj->course_name; ?>">
                              
                           </div>
                             <div class="form-group">
                              <label for="exampleFormControlSelect3">Cource is for?</label>
                             <select class="form-control" name="course_type" required>
                                 <option value="">--Select--</option>
                                  <option value="1" <?php if($dataObj->course_type=="1") {echo "selected"; } ?> >For Public Only</option>
                                   <option value="2" <?php if($dataObj->course_type=="2") {echo "selected"; } ?>>For Doctor Only</option>
                                   <option value="3" <?php if($dataObj->course_type=="3") {echo "selected"; } ?> >For Both (Public & Doctor)</option>
                             </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Duration of Course</label>
                              <input type="text" name="cDuration" class="form-control" placeholder="Duration of Course" value="<?= $dataObj->course_duration; ?>">
                           </div>
                            <div class="form-group">
                              <label for="exampleTextarea1">Course Details</label>
                              <textarea class="form-control" name="courseDetails" id="editor" rows="15" ><?= $dataObj->course_details; ?></textarea>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Course Fee</label>
                              <input type="text" name="courseFee" class="form-control" placeholder="Course Fee" value="<?= $dataObj->course_fee; ?>">
                           </div>
                           
                            <div class="form-group">
                              <label for="exampleFormControlSelect3">Course Fee (For Member)</label>
                              <input type="text" name="member_cost" class="form-control" placeholder="member cost" value="<?= $dataObj->member_cost; ?>">
                           </div>
                             <div class="form-group">
                              <label>PDF File</label>
                              <div class="input-group col-xs-12 col-lg-6 row">
                                 <input type="file" class="form-control file-upload-info" name="blogImg" placeholder="Upload Image">
                            
                              <input type="hidden" name="ifPDFempty" value="<?php echo $dataObj->pdf; ?>">
                            
                              </div>
                           </div>
                           <button type="submit" name="editBlog" class="btn btn-primary mr-2">Update</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php }else{ ?>
      <div class="main-panel">
         <div class="content-wrapper">
            <div class="row">
               <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body">
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Course</h4>
                        <p class="card-description">Create Course</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="exampleInputName1">Course Name</label>
                              <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="courseName" placeholder="Course Name" value="<?php if(isset($courseName)){echo $courseName;} ?>">
                              <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                             <div class="form-group">
                              <label for="exampleFormControlSelect3">Cource is for?</label>
                             <select class="form-control" name="course_type" required>
                                 <option value="">--Select--</option>
                                  <option value="1">For Public Only</option>
                                   <option value="2">For Doctor Only</option>
                                   <option value="3">For Both (Public & Doctor)</option>
                             </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Duration of Course</label>
                              <input type="text" name="cDuration" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" placeholder="Duration of Course" value="<?php if(isset($cDuration)){echo $cDuration;} ?>">
                              <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                           </div>
                            <div class="form-group">
                              <label for="exampleTextarea1">Course Details</label>
                              <textarea class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="courseDetails" id="editor" rows="15" ><?php if(isset($courseDetails)){echo $courseDetails;} ?></textarea>
                           <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Course Fee</label>
                              <input type="text" name="courseFee" class="form-control <?php if(isset($code) && $code==4): echo 'errorMsg'; endif;?>" placeholder="Course Fee" value="<?php if(isset($courseFee)){echo $courseFee;} ?>">
                              <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                           </div>
                             <div class="form-group">
                              <label for="exampleFormControlSelect3">Course Fee (For Member)</label>
                              <input type="text" name="member_cost" class="form-control" placeholder="member cost">
                           </div>
                             <div class="form-group">
                              <label>PDF File</label>
                              <div class="input-group col-xs-12 col-lg-6 row">
                                 <input type="file" class="form-control file-upload-info" name="pdfFile" placeholder="Upload Image" required>
                              </div>
                           </div>
                           <button type="submit" name="storeBlog" class="btn btn-primary mr-2">Submit</button>
                           <button class="btn btn-light">Cancel</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php } ?>
   <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include "../layouts/main-footer.php"; ?>
<script>
   ClassicEditor
       .create( document.querySelector( '#editor' ) )
       .catch( error => {
           console.error( error );
       } );
</script>