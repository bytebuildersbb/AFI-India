<?php 
    include "../connect.php"; 
   /*Get Page Details*/
   $query   =  "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC";
   $runQuery   =  $connect->query($query);
   $dataMeta   =  $runQuery->fetch_object();
   $title = $dataMeta->pageTitle;
   $description = $dataMeta->metaDescription;
   $keyword = $dataMeta->metaKeyword;
   include "../layouts/main-header.php"; 
?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<?php
   /*Update Slider*/
   if(isset($_POST["submit"])){
    /*About Us Start IMG*/
      $aboutImgName  =  $_FILES['aboutImg']["name"];
      $aboutImgTmp   =  $_FILES['aboutImg']["tmp_name"];
      $aboutImgSize  =  $_FILES['aboutImg']["size"];
      $aboutImgType  =  $_FILES['aboutImg']["type"];
      $aboutImageName         =    explode(".", $aboutImgName);
      $aboutNewName           =    round(microtime(true)) . '_about.' . end($aboutImageName);
      $aboutExtention   =    pathinfo($aboutImgName, PATHINFO_EXTENSION);
     /*About Image Ends*/
     /*About Us Start IMG*/
      $founderImgName  =  $_FILES['founderImg']["name"];
      $founderImgTmp   =  $_FILES['founderImg']["tmp_name"];
      $founderImgSize  =  $_FILES['founderImg']["size"];
      $founderImgType  =  $_FILES['founderImg']["type"];
      $FounderImageName         =    explode(".", $founderImgName);
      $FounderNewName           =    round(microtime(true)) . '_founder.' . end($FounderImageName);
      $founderExtention   =    pathinfo($founderImgName, PATHINFO_EXTENSION);
     /*About Image Ends*/
      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
      );
      /*Other Text Felids*/
      $aboutHeading   = $_POST["aboutHeading"];
      $aboutParagraph   = $_POST["aboutParagraph"];
      $aboutDesc    = $_POST["aboutDesc"];
      $aboutFounder   = $_POST["aboutFounder"];
      $aboutAFI     = $_POST["aboutAFI"];
      $pageTitle      =  $_POST["pageTitle"];
      $metaTags      =  $_POST["metaTags"];
      $metaKeywords      =  $_POST["metaKeywords"];
      $alt1      =  $_POST["alt-1"];
      $alt2      =  $_POST["alt-2"];
      if($aboutHeading == ""){
        $errorMsg=  "You did't enter about heading";
        $code= "1";
      }else if($aboutParagraph == ""){
        $errorMsg=  "You did't enter about paragraph";
        $code= "2";
      }else if($aboutImgName == ""){
         $errorMsg=  "Please select about us image.";
         $code= "3";
      }else if(!in_array($aboutExtention, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "3";
      }else if($aboutImgSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "3";
      }else if($aboutDesc == ""){
    $errorMsg=  "You did't enter about description";
        $code= "4";
      }else if($founderImgName == ""){
        $errorMsg=  "Please select founder image.";
         $code= "5";
      }else if(!in_array($founderExtention, $allowed_image_extension)){
        $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
        $code= "5";
      }else if($founderImgSize > 2000000){
        $errorMsg=  "Image size exceeds 2MB";
        $code= "5";
      }else if($aboutFounder == ""){
        $errorMsg   = "You didn't enter about founder";
        $code = "6";
      }else if($aboutAFI == ""){
        $errorMsg   = "You didn't enter about AFI";
        $code = "7";
      }else{
        $query         =      "INSERT INTO `tbl_about_us`(`pageTitle`,`metaDescription`, `metaKeyword`,`about_heading`, `about_paragraph`, `aboutUs_img`,`altImg_1`, `aboutUs_Description`, `founderImg`,`altImg_2`,`aboutFounder`, `aboutAFI`) VALUES ('$pageTitle','$metaTags','$metaKeywords','$aboutHeading','$aboutParagraph','$aboutNewName','$alt1','$aboutDesc','$FounderNewName','$alt2','$aboutFounder','$aboutAFI')";
        $runQuery      =     $connect->query($query);
        if($runQuery){
            move_uploaded_file($aboutImgTmp,'../uploads/about-us/'.$aboutNewName);
            move_uploaded_file($founderImgTmp,'../uploads/about-us/'.$FounderNewName);
            $errorMsg = "About us page created succssfully";
            $code    =  8;
        }
      }
   }
   /*Edit*/
   if(isset($_POST["editAbout"])){
      /*Blank Veriables*/
      $imageAbout   = '';
      $imageFounder   = '';
      /*About IMG */
      $aboutImg         = addslashes($_FILES["aboutImg"]["name"]);
    $aboutTmp         = addslashes($_FILES["aboutImg"]["tmp_name"]);
    /*Ends*/
    /*Founder Image*/
      $founderImg   = $_FILES["founderImg"]["name"];
      $founderTmp   = $_FILES["founderImg"]["tmp_name"];
      /*Ends*/
      /*Here We Check About Image Is Empty Or Not*/
      if(empty($aboutImg)){
        $imageAbout   = $_POST["img1"];         
      }else{
        $aboutImageName         =    explode(".", $aboutImg);
          $imageAbout           =    round(microtime(true)) . '_about.' . end($aboutImageName);
      }
      /*Here We Check Founder Image Is Empty Or Not*/
      if(empty($founderImg)){
        $imageFounder   = $_POST["img2"];           
      }else{
        $founderImage           =    explode(".", $founderImg);
          $imageFounder           =    round(microtime(true)) . '_founder.' . end($founderImage);
      }
      /*Other About Felids*/
      $aboutHeading   = addslashes($_POST["aboutHeading"]);
      $aboutParagraph = addslashes($_POST["aboutParagraph"]);
      $aboutDesc    = addslashes($_POST["aboutDesc"]);
      $aboutFounder   = addslashes($_POST["aboutFounder"]);
      $aboutAFI     = $_POST["aboutAFI"];
         $alt1      =  $_POST["alt1"];
         $alt2      =  $_POST["alt2"];
      $query = "UPDATE `tbl_about_us` SET `about_heading`= '$aboutHeading',`about_paragraph`= '$aboutParagraph',`aboutUs_img`= '$imageAbout',`altImg_1`='$alt1',`aboutUs_Description`='$aboutDesc',`founderImg`='$imageFounder',`altImg_2`='$alt2',`aboutFounder`='$aboutFounder',`aboutAFI`= '$aboutAFI' WHERE about_us_id_pk = '".$_GET['id']."'";
      $runQuery   = $connect->query($query);
      if($runQuery){
        move_uploaded_file($aboutTmp,'../uploads/about-us/'.$imageAbout);
          move_uploaded_file($founderTmp,'../uploads/about-us/'.$imageFounder);
         $code = 200;
      }
   }
?>
<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
     .ck-content>p{
   height: 100px !important;
   }
</style>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
        <!-- If Edit Then This Part Executed -->
        <?php if(isset($_GET["id"])):?>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                  <?php if(isset($code) && $code == 200): ?>
                  <div class="alert alert-success" role="alert">Content Updated Succssfully</div>
                  <?php endif; ?>
                     <?php if(isset($code) && $code == 8): ?>
                      <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title" style="float:left;">About Us</h4>
                     <a href="../settings/about-us" title="Go Back">
                      <button type="button" class="btn btn-inverse-dark btn-icon" style="float:right;">
                              <i class="icon-home"></i>
                      </button>
                    </a>
                    <div class="clearfix"></div>
                    <?php 
                      $query = "SELECT * FROM tbl_about_us WHERE about_us_id_pk = '".$_GET['id']."' ORDER BY about_us_id_pk DESC LIMIT 1";
                      $runQuery   = $connect->query($query);
                      $dataObj  = $runQuery->fetch_object();
                    ?>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="">Heading</label>
                           <input type="text" name="aboutHeading" class="form-control" value="<?= $dataObj->about_heading; ?>">
                        </div>
                        <div class="form-group">
                           <label for="">Paragraph</label>
                           <input type="text" name="aboutParagraph" class="form-control" value="<?= $dataObj->about_paragraph; ?>">
                        </div>
                        <div class="form-group row">
                          <div class="col-6">
                              <label for="">About Image</label>
                              <input type="file" name="aboutImg" class="form-control" >
                           </div>
                           <div class="col-6">
                                 <label for="">ALT</label>
                                 <input type="text" name="alt1" class="form-control" placeholder="ALT Image name" >
                           </div>
                           <div class="col-6">
                              <img src="../uploads/about-us/<?= $dataObj->aboutUs_img; ?>" style="width:20%;">
                              <input type="hidden" name="img1" value="<?= $dataObj->aboutUs_img; ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="">About Desciption</label>
                           <textarea name="aboutDesc" class="form-control" id="editor">
                            <?= $dataObj->aboutUs_Description;  ?>
                           </textarea>
                        </div>
                        <div class="form-group row">
                          <div class="col-6">
                              <label for="">Founder Image</label>
                              <input type="file" name="founderImg" class="form-control" >
                           </div>
                           <div class="col-6">
                                 <label for="">ALT</label>
                                 <input type="text" name="alt2" class="form-control" placeholder="ALT Image name" >
                           </div>
                           <div class="col-6">
                              <img src="../uploads/about-us/<?= $dataObj->founderImg; ?>" style="width:20%;">
                              <input type="hidden" name="img2" value="<?= $dataObj->founderImg; ?>">
                           </div>
                        </div>
                         <div class="form-group">
                           <label for="">About Founder</label>
                           <textarea name="aboutFounder" class="form-control" id="editor1"><?= $dataObj->aboutFounder;?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">About AFI</label>
                          <input type="text" name="aboutAFI" class="form-control" value="<?= $dataObj->aboutAFI; ?>">
                        </div>
                        <button type="submit" name="editAbout" class="btn btn-primary mr-2">Update</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                  </div>
               </div>
            </div>
          </div>
        <?php else: ?>
        <!-- Ends -->
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <?php if(isset($code) && $code == 8): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title">About Us</h4>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Page Title</label>
                           <input type="text" name="pageTitle" class="form-control" placeholder="Page Title">
                        </div>
                        <div class="form-group">
                           <label>Meta Description</label>
                           <input type="text" name="metaTags" class="form-control" placeholder="Meta Tags Ex:John Doe">
                        </div>
                        <div class="form-group">
                           <label>Meta Keywords</label>
                           <input type="text" name="metaKeywords" class="form-control" placeholder="Meta Keywords Ex: SEO, search engine optimisation">
                        </div>
                        <div class="form-group">
                           <label for="">Heading</label>
                           <input type="text" name="aboutHeading" class="form-control <?php if(isset($code) && $code==1):echo 'errorMsg'; endif; ?>" placeholder="Heading" value="<?php if(isset($aboutHeading)):echo $aboutHeading; endif; ?>">
                            <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">Paragraph</label>
                           <input type="text" name="aboutParagraph" class="form-control <?php if(isset($code) && $code==2):echo 'errorMsg'; endif; ?>" placeholder="Paragraph" value="<?php if(isset($aboutParagraph)):echo $aboutParagraph; endif; ?>">
                            <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">About Image</label>
                           <input type="file" name="aboutImg" class="form-control <?php if(isset($code) && $code==3):echo 'errorMsg'; endif; ?>" >
                        <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label>ALT IMAGE</label>
                           <input type="text" name="alt-1" class="form-control" placeholder="ALT image name">
                        </div>
                        <div class="form-group">
                           <label for="">About Desciption</label>
                           <textarea name="aboutDesc" class="form-control <?php if(isset($code) && $code==4):echo 'errorMsg'; endif; ?>" value="" id="editor"><?php if(isset($aboutDesc)):echo $aboutDesc; endif; ?></textarea>
                        <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                         <div class="form-group">
                           <label for="">Founder Image</label>
                           <input type="file" name="founderImg" class="form-control <?php if(isset($code) && $code==5):echo 'errorMsg'; endif; ?>" >
                        <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                         <div class="form-group">
                           <label>ALT IMAGE</label>
                           <input type="text" name="alt-2" class="form-control" placeholder="ALT image name">
                        </div>
                         <div class="form-group">
                           <label for="">About Founder</label>
                           <textarea name="aboutFounder" class="form-control <?php if(isset($code) && $code==6):echo 'errorMsg'; endif; ?>"  id="editor1"><?php if(isset($aboutFounder)):echo $aboutFounder; endif; ?></textarea>
            <?php if (isset($code) && $code==6) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">About AFI</label>
                          <input type="text" name="aboutAFI" class="form-control <?php if(isset($code) && $code==7):echo 'errorMsg'; endif; ?>" placeholder="Founder Desciption" value="<?php if(isset($aboutAFI)):echo $aboutAFI; endif; ?>">
            <?php if (isset($code) && $code==7) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
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
                    <?php 
                      $query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
                      $runQuery   = $connect->query($query);
                      $dataObj  = $runQuery->fetch_object();
                    ?>
                    <a href="about-us?id=<?=$dataObj->about_us_id_pk;?>" style="float:right;" class="btn btn-secondary btn-xs">EDIT</a>
                    <h3><?= ucfirst($dataObj->about_heading); ?></h3>
                    <p><?= ucfirst($dataObj->about_paragraph); ?></p>
                    <img src="../uploads/about-us/<?= $dataObj->aboutUs_img; ?>" style="width:50%;">
                    <p><?= ucfirst($dataObj->aboutUs_Description); ?></p>
                    <img src="../uploads/about-us/<?= $dataObj->founderImg; ?>" style="width:50%;">
                    <p><?= ucfirst($dataObj->aboutFounder); ?></p>
                    <p><?= ucfirst($dataObj->aboutAFI); ?></p>
                  </div>
               </div>
            </div>
        </div>
    <?php endif; ?>
      </div>
   </div>
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
       ClassicEditor
       .create( document.querySelector( '#editor1' ) )
       .catch( error => {
           console.error( error );
       } );
</script>