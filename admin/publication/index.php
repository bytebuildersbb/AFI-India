<?php 

    $title   =  "Publications Section | Admin";
    $description = 'Best Publication | Admin';
    $keyword    = 'Best Ayurveda Publication | Admin';
    include "../layouts/main-header.php";
     
    if(isset($_POST["storePublication"])){
       
        $pub_title      =  $_POST["pub_title"];
        $pub_desc       =  base64_encode($_POST["pub_desc"]);
        $pub_shortdesc  =  $_POST["pub_shortdesc"];
        $pub_createdFor =  $_POST["pub_createdFor"];
        $pubFile        =  $_FILES["pub_thumbnail"]["name"];
        $pubFileTmp     =  $_FILES["pub_thumbnail"]["tmp_name"];
        $pubSize        =  $_FILES["pub_thumbnail"]["size"];
        $pubType        =  $_FILES["pub_thumbnail"]["type"];
       
        $allowed_pdf = array( "png", "jpg", "pdf", "PDF", "jpeg" );
        
        $pubImageName       =     explode(".", $pubFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($pubImageName);
        $pdfImgExtention    =     pathinfo($pubFile, PATHINFO_EXTENSION);
        
        $pubFilePdf        =  $_FILES["pub_pdf"]["name"];
        $pubFileTmpPdf     =  $_FILES["pub_pdf"]["tmp_name"];
        $pubSizePdf        =  $_FILES["pub_pdf"]["size"];
        $pubTypePdf        =  $_FILES["pub_pdf"]["type"];
       
        $allowed_pdf = array( "pdf", "PDF" );
        
        $pubImageNamePdf       =     explode(".", $pubFilePdf);
        $thumbNewPdf           =     round(microtime(true)) . 'PDF.' . end($pubImageNamePdf);
        
        if($pub_title == ""){
            $errorMsg=  "Please enter Publication Title.";
            $code= "1";
        }else if($pub_desc == ""){
            $errorMsg=  "Please enter Publication Description";
            $code= "2";
        }/*else if($pub_shortdesc == ""){
            $errorMsg=  "Please enter Publication Short Description.";
            $code= "3";
        }*/else if($pubFile == ""){
            $errorMsg=  "Please Upload Publication Thumbnail";
            $code= "4";
        }else if($pubFilePdf == ""){
            $errorMsg=  "Please Upload Publication Pdf";
            $code= "5";
        }else{
            strcmp($pubFileTmp,'../uploads/publications/'.$thumbNew);
            strcmp($pubFileTmpPdf,'../uploads/publications/pdf/'.$thumbNewPdf);
            
            $query = "INSERT INTO `tbl_publication`(`pub_title`, `pub_desc`, `pub_shortdesc`, `pub_thumbnail`, `pub_pdf`,`pub_createdFor`) VALUES ('$pub_title','$pub_desc','$pub_shortdesc','$thumbNew', '$thumbNewPdf', '$pub_createdFor')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
                $errorMsg=  "Publication create succssfully";
                $code= "6";
            }
        }
        
    }

    
    /*========= Edit Form ===============*/
    
    if(isset($_POST["editPublication"])){
        
        
        $id             =  $_GET["pId"];
        $pubFile        =  $_FILES["pub_thumbnail"]["name"];
        $pubFileTmp     =  $_FILES["pub_thumbnail"]["tmp_name"];
        $pubSize        =  $_FILES["pub_thumbnail"]["size"];
        $pubType        =  $_FILES["pub_thumbnail"]["type"];
        
        $pub_title      =  $_POST["pub_title"];
        $pub_desc       =  base64_encode($_POST["pub_desc"]);
        $pub_shortdesc  =  $_POST["pub_shortdesc"];
        $pub_createdFor =  $_POST["pub_createdFor"];
          
        $pubImageName       =     explode(".", $pubFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($pubImageName);
        
        $pubFilePdf        =  $_FILES["pub_pdf"]["name"];
        $pubFileTmpPdf     =  $_FILES["pub_pdf"]["tmp_name"];
        $pubSizePdf        =  $_FILES["pub_pdf"]["size"];
        $pubTypePdf        =  $_FILES["pub_pdf"]["type"];
       
        $allowed_pdf = array( "pdf", "PDF" );
        
        $pubImageNamePdf       =     explode(".", $pubFilePdf);
        $thumbNewPdf           =     round(microtime(true)) . 'PDF.' . end($pubImageNamePdf);
        
        if(empty($pubFile)){
            $previewthumb    =  $_POST["ifpbcempty"];
        }else{
            $previewthumb    =  $thumbNew;
            strcmp($pubFileTmp,'../uploads/publications/'.$thumbNew); 
        }
        
        if(empty($pubFilePdf)){
            $previewthumbpdf    =  $_POST["ifpbcemptypdf"];
        }else{ 
            $previewthumbpdf    =  $thumbNewPdf;
            strcmp($pubFileTmpPdf,'../uploads/publications/pdf/'.$thumbNewPdf); 
        }
        
        $query = "UPDATE `tbl_publication` SET `pub_title`='$pub_title',`pub_desc`='$pub_desc',`pub_shortdesc`='$pub_shortdesc',`pub_thumbnail`='$previewthumb',`pub_pdf`='$previewthumbpdf',`pub_createdFor`='$pub_createdFor' WHERE pub_id = '".$id."'";
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Publication Updated Succssfully');</script>
        <?php }
    }
    
    
?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<style type="text/css">
.ck-content>p{height: 200px !important;}
.errorMsg{border:1px solid red; }
.message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
.form-checks{padding-left:1.3rem;} 
</style>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   

   <?php 
      if(isset($_GET["pId"])){ ?>
         <?php
            $id   =   $_GET["pId"];
            $query = "SELECT * FROM tbl_publication WHERE pub_id = '".$id."'";
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
                        <h4 class="card-title">Publications</h4>
                        <p class="card-description">Create Publication</p>
                        
                        <form  class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Title</label>
                              <input type="text" class="form-control" name="pub_title" placeholder="Publication Title" value="<?= $dataObj->pub_title; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" name="pub_desc" id="editor" rows="15" ><?= base64_decode($dataObj->pub_desc); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Short Description</label>
                                <textarea name="pub_shortdesc" class="form-control"  rows="15"><?= $dataObj->pub_shortdesc; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Created For</label>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="pub_createdFor" value="0" id="flexRadioDefault1" <?php if($dataObj->pub_createdFor == 0){echo "checked"; }?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Doctor
                                    </label>
                                </div>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="pub_createdFor" value="1" id="flexRadioDefault2" <?php if($dataObj->pub_createdFor == 1){echo "checked"; }?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Public
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="pub_thumbnail" placeholder="Upload Image">
                                    <input type="hidden" name="ifpbcempty" value="<?php echo $dataObj->pub_thumbnail; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>PDF</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="pub_pdf" placeholder="Upload PDF">
                                    <input type="hidden" name="ifpbcemptypdf" value="<?php echo $dataObj->pub_pdf; ?>">
                                </div>
                            </div>
                            
                           <button type="submit" name="editPublication" class="btn btn-primary mr-2">Update</button>
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
                        <h4 class="card-title">Publications</h4>
                        <p class="card-description">Create Publication</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="pub_title" placeholder="Event Title" value="<?php if(isset($pub_title)){echo $pub_title;} ?>">
                                <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="pub_desc" id="editor" rows="15" ><?php if(isset($pub_desc)){echo $pub_desc;} ?></textarea>
                                <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Short Description</label>
                                <textarea class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="pub_shortdesc" id="editor" rows="15" ><?php if(isset($pub_shortdesc)){echo $pub_shortdesc;} ?></textarea>
                                <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Created For</label>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="pub_createdFor" value="0" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Doctor
                                    </label>
                                </div>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="pub_createdFor" value="1" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Public
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="pub_thumbnail" placeholder="Upload Image" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>PDF</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="pub_pdf" placeholder="Upload Pdf" required>
                                </div>
                            </div>
                            
                           <button type="submit" name="storePublication" class="btn btn-primary mr-2">Submit</button>
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
    /*ClassicEditor
       .create( document.querySelector( '#editor' ) )
       .catch( error => {
           console.error( error );
       } );*/
    CKEDITOR.replace('editor');   
</script>
