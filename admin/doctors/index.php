<?php 
   $title   =  "Doctor Info Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
    ?>
<?php 
   if(isset($_POST["createPDF"])){
      /*PDF Preview Image*/
      $preFile      =     $_FILES["previewImg"]["name"];
      $preFileTmp   =     $_FILES["previewImg"]["tmp_name"];
      $preSize      =     $_FILES["previewImg"]["size"];
      $preType      =     $_FILES["previewImg"]["type"];
      $ss      =     $_POST["state"];
      /*Allow Extention For Image*/
      $allowed_image = array(
        "png",
        "jpg",
        "jpeg"
      );
      $previewName         =    explode(".", $preFile);
      $previewNew          =    round(microtime(true)) . '_pdfPre.' . end($previewName);
      $preImgExtention     =    pathinfo($preFile, PATHINFO_EXTENSION);
      /*Image Priview Ends*/
      /*PDF Files */
      $blogFile      =     $_FILES["pdfFile"]["name"];
      $blogFileTmp   =     $_FILES["pdfFile"]["tmp_name"];
      $blogSize      =     $_FILES["pdfFile"]["size"];
      $blogType      =     $_FILES["pdfFile"]["type"];
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
      $blogTitle           =     $_POST["blogTitle"];
      $pdfContent          =     $_POST["pdfContent"];
      $typeOf          =     $_POST["typeOf"];
      $documentType          =     $_POST["documentType"];
      /*Validation Condition Start*/
      if($preFile == ""){
         $errorMsg=  "You did't select image preview";
         $code= "1";
      }else if(!in_array($preImgExtention, $allowed_image)){
         $code= "1";
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
      }else if($preSize > 2000000){
         $code= "1";
         $errorMsg=  "Image size exceeds 2MB";
      }else if($blogFile == ""){
         $errorMsg=  "You did't select PDF File";
         $code= "2";
      }else if(!in_array($pdfImgExtention, $allowed_pdf)){
         $code= "2";
         $errorMsg=  "Upload valiid PDF. Only PDF are allowed.";
      }else if($blogTitle == ""){
         $code= "3";
         $errorMsg=  "You did't select PDF Title.";
      }else{
         $blogTitle=addslashes($blogTitle);
         $query   =  "INSERT INTO `tbl_doctor_info`(`type`,`pdf_file`, `pdf_image`, `title`, `description`,`doctorType`,`state_name`) VALUES ('$typeOf','$pdfNew','$previewNew','$blogTitle','$pdfContent','$documentType','$ss')";
         $runQuery   =  $connect->query($query);
       //  echo $query;
       //  die();
         if($runQuery){
            $errorMsg=  "Data Uploaded Succssfully";
            $code= "4";
            strcmp($preFileTmp,'../uploads/PDF/'.$previewNew);
            strcmp($blogFileTmp,'../uploads/PDF/'.$pdfNew);    
         }
         else{
              $errorMsg=  mysqli_error($runQuery);
         }
      }
   }
   ?>
<?php 
   if(isset($_POST["editBlog"])){
      $id   =  $_POST["Eid"];
      /*For Image Preview*/
      $previewImage  =     $_FILES["previewImage"]["name"];
      $previewTmp    =     $_FILES["previewImage"]["tmp_name"];
      $previewSize   =     $_FILES["previewImage"]["size"];
      $previewType   =     $_FILES["previewImage"]["type"];
      $previewName         =    explode(".", $previewImage);
      $previewNew          =    round(microtime(true)) . '_pdfPre.' . end($previewName);
      /*For PDF Preview*/
      $blogFile      =     $_FILES["blogImg"]["name"];
      $blogFileTmp   =     $_FILES["blogImg"]["tmp_name"];
      $blogSize      =     $_FILES["blogImg"]["size"];
      $blogType      =     $_FILES["blogImg"]["type"];
      $pdfName             =     explode(".", $blogFile);
      $pdfNew              =     round(microtime(true)) . 'PDF.' . end($pdfName);
      /*POST Felids*/
      $blogTitle        =     $_POST["blogTitle"];
      $blogContent      =     $_POST["blogContent"];
      $typeOf      =     $_POST["typeOf"];
       $ss      =     $_POST["state"];
            $documentType          =     $_POST["documentType"];

      $previewImg;
      $previewPDF;
      if(empty($previewImage)){
         $previewImg = $_POST["ifEmptyPre"];
      }else{
         $previewImg   =  $previewNew;
          strcmp($previewTmp,'../uploads/PDF/'.$previewNew);
      }  
      /*PDF Preview*/
      if(empty($blogFile)){
         $previewPDF    =  $_POST["ifPDFempty"];
      }else{
         $previewPDF    =  $pdfNew;
         strcmp($blogFileTmp,'../uploads/PDF/'.$pdfNew); 
      }
      $query   =  "UPDATE `tbl_doctor_info` SET `type`='$typeOf',`pdf_file`= '$pdfNew',`pdf_image`='$previewNew',`state_name`='$ss',`title`='$blogTitle',`description`= '$blogContent', `doctorType` =  '$documentType' WHERE doctor_info_id_pk = '$id'";
      $runQuery   =  $connect->query($query);
    /*  if($runQuery){
         strcmp($previewTmp,'../uploads/PDF/'.$previewNew);
         strcmp($blogFileTmp,'../uploads/PDF/'.$pdfNew);  
      }*/
      /*Current Date Time*/
      // Change the line below to your timezone!
      date_default_timezone_set('Asia/Kolkata');
      $date = date('m/d/Y h:i:s a', time());
      /*End Time Date*/
      $blogFile      =     $_FILES["blogImg"]["name"];
      $blogFileTmp   =     $_FILES["blogImg"]["tmp_name"];
      $blogSize      =     $_FILES["blogImg"]["size"];
      $blogType      =     $_FILES["blogImg"]["type"];
      /*Text Felids*/
      $blogCategory  =     $_POST["blogCategory"];
      $blogTitle     =     $_POST["blogTitle"];
      $blogContent   =     $_POST["blogContent"];
      $alt1          =     $_POST["alt1"];
      $Eid           =     $_POST["Eid"];
      /*Ends*/
      /*URL Slug*/
      $urlSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $blogTitle)));
      /*URL Slug Ends*/
      $imageName         =    explode(".", $blogFile);
      $blogRename        =    round(microtime(true)) . '_blog.' . end($imageName);
      $blogImgExtention  =    pathinfo($blogFile, PATHINFO_EXTENSION);
      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
      );
         $query = "UPDATE `tbl_blog` SET `altImg`= '$alt1',`blogTitle`='$blogTitle',`urlSlug`='$urlSlug',`blogCategory`='$blogCategory',`blogContent`= '$blogContent',`updatedOn`= '$date'WHERE blog_id_pk = '$Eid'";
         $runQuery   =  $connect->query($query);
         if($runQuery){ ?>
            <script type="text/javascript">alert('Content Update Succssfully');</script>
         <?php }
      }
?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<style type="text/css">
   .ck-content>p{
   height: 100px !important;
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
      if(isset($_GET["Eid"])){ ?>
         <?php
            $id   =   $_GET["Eid"];
            $query = "SELECT * FROM tbl_doctor_info WHERE doctor_info_id_pk  = '".$id."'";
            $runQuery   =  $connect->query($query);
            $dataObj    =  $runQuery->fetch_object();
            if($runQuery == true){
               $code = 5;
               $errorMsg = "Content Update Succssfully";
            }
         ?>
         <div class="main-panel">
         <div class="content-wrapper">
            <div class="row">
               <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body">
                        <?php if(isset($code) && $code == 4): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Edit</h4>
                        <p class="card-description">Edit Doctors PDF</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="Eid" value="<?= $id; ?>">
                           <div class="form-group">
                              <label>Preview Image</label>
                              <div class="input-group col-xs-12 col-lg-6 row">
                                 <input type="file" class="form-control file-upload-info" name="previewImage" placeholder="Upload Image">
                                 <input type="hidden" name="ifEmptyPre" value="<?php echo $dataObj->pdf_image; ?>">
                              <div class="input-group col-xs-12 col-lg-6">
                                 <img src="../uploads/PDF/<?php echo $dataObj->pdf_image; ?>" style="width:100%; height: auto;">
                              </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>PDF File</label>
                              <div class="input-group col-xs-12 col-lg-6 row">
                                 <input type="file" class="form-control file-upload-info" name="blogImg" placeholder="Upload Image">
                              <div class="input-group col-xs-12 col-lg-6">
                                 <a href="../uploads/PDF/<?php echo $dataObj->pdf_file; ?>" class="btn btn-info" target="_blank">View</a>
                              <input type="hidden" name="ifPDFempty" value="<?php echo $dataObj->pdf_file; ?>">
                              </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Title</label>
                              <input type="text" class="form-control" name="blogTitle" placeholder="Blog Title" value="<?= $dataObj->title; ?>">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Type</label>
                              <select class="form-control" name="typeOf">
                                 <option value="0">Doctor for Info</option>
                                 <option value="1">Achievement</option>
                              </select>
                           </div>
                            <div class="form-group">
                              <label for="exampleInputName1">Type of document</label>
                              <select class="form-control" name="documentType" onchange="funn(this.value)">
                                 <option value="1">State Goverment</option>
                                 <option value="2">Central Goverment</option>
                              </select>
                           </div>
                                <div class="form-group">
                              <label for="exampleInputName1">Select State</label>
                              <select class="form-control" name="state" id="statee">
                                  <option value="">--Select--</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
                      
                           </div>
                           <div class="form-group">
                              <label for="exampleTextarea1">Description</label>
                              <textarea class="form-control" name="blogContent" id="editor" rows="15" ><?= $dataObj->description; ?></textarea>
                           </div>
                           <button type="submit" name="editBlog" class="btn btn-primary mr-2">Submit</button>
                           <button class="btn btn-light">Cancel</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>---
         </div>
      </div>
      <?php }else{ ?>
      <div class="main-panel">
         <div class="content-wrapper">
            <div class="row">
               <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body">
                        <?php if(isset($code) && $code == 4): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Info For Doctors</h4>
                        <p class="card-description">ADD PDF</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label>Preview Image</label>
                              <div class="input-group col-xs-12">
                                 <input type="file" class="form-control file-upload-info <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="previewImg" placeholder="Upload Image">
                              </div>
                              <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label>Select Main File</label>
                              <div class="input-group col-xs-12">
                                 <input type="file" class="form-control file-upload-info <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" name="pdfFile" placeholder="Upload Image">
                              </div>
                              <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Title</label>
                              <input type="text" class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="blogTitle" placeholder="Document Title" value="<?php if(isset($pdfTitle)){echo $pdfTitle;} ?>">
                              <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Type</label>
                              <select class="form-control" name="typeOf">
                                 <option value="0">Doctor for Info</option>
                                 <option value="1">Achievement</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Type of document</label>
                              <select class="form-control" name="documentType" onchange="funn(this.value)">
                                 <option value="1">State Goverment</option>
                                 <option value="2">Central Goverment</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Select State</label>
                              <select class="form-control" name="state" id="state">
                                  <option value="">--Select--</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
                      
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Description</label>
                              <textarea class="form-control" name="pdfContent" id="editor" rows="15" ></textarea>
                           </div>
                           <button type="submit" name="createPDF" class="btn btn-primary mr-2">Submit</button>
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
funn=(ee)=>{
    if(ee==2){
        $("#state").hide();
    }
    else{
         $("#state").show(); 
    }
}
   ClassicEditor
       .create( document.querySelector( '#editor' ) )
       .catch( error => {
           console.error( error );
       } );
</script>