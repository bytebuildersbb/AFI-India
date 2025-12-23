<?php 
    $title   =  "Gallery Section | Admin";
    $description = 'Gallery | Admin';
    $keyword    = 'Gallery | Admin';
    include "../layouts/main-header.php";
     
    if(isset($_POST["storeGallery"])){
       
        $title        =  $_POST["title"];
        
        $galleryFile        =  $_FILES["galleryThumbnail"]["name"];
        $galleryFileTmp     =  $_FILES["galleryThumbnail"]["tmp_name"];
        $gallerySize        =  $_FILES["galleryThumbnail"]["size"];
        $galleryType        =  $_FILES["galleryThumbnail"]["type"];
       
        $allowed_pdf = array( "png", "jpg", "pdf", "PDF", "jpeg" );
        
        $galImageName      =     explode(".", $galleryFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($galImageName);
        $pdfImgExtention    =     pathinfo($galleryFile, PATHINFO_EXTENSION);
        
        if($title == ""){
            $errorMsg=  "Please enter Title.";
            $code= "1";
        }else if($galleryFile == ""){
            $errorMsg=  "Please enter Gallery Thumbnail";
            $code= "4";
        }else{
            strcmp($galleryFileTmp,'../uploads/gallery/'.$thumbNew); 
            
            $query = "INSERT INTO `tbl_gallery`(`title`, `image`) VALUES ('$title','$thumbNew')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
                $errorMsg=  "Gallery created succssfully";
                $code= "5";
            }
        }
        
    }

    
    /*========= Edit Form ===============*/
    
    if(isset($_POST["editGallery"])){
		
        $id              	=  $_GET["gId"];
        $galleryFile        =  $_FILES["galleryThumbnail"]["name"];
        $galleryFileTmp     =  $_FILES["galleryThumbnail"]["tmp_name"];
        $gallerySize        =  $_FILES["galleryThumbnail"]["size"];
        $galleryType        =  $_FILES["galleryThumbnail"]["type"];
        
        $title        =  $_POST["title"];
          
        $galImageName       =     explode(".", $galleryFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($galImageName);
        
        if(empty($galleryFile)){
            $previewthumb    =  $_POST["ifpbcempty"];
        }else{
            $previewthumb    =  $thumbNew;
            strcmp($galleryFileTmp,'../uploads/gallery/'.$thumbNew); 
        }
        
        $query = "UPDATE `tbl_gallery` SET `title`='$title', `image`='$previewthumb' WHERE g_id = '".$id."'";
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Gallery Updated Succssfully');</script>
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
      if(isset($_GET["gId"])){ ?>
         <?php
            $id   =   $_GET["gId"];
            $query = "SELECT * FROM tbl_gallery WHERE g_id = '".$id."'";
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
                        <h4 class="card-title">Gallery</h4>
                        <p class="card-description">Create Gallery</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Title</label>
                              <input type="text" class="form-control" name="title" placeholder="Title" value="<?= $dataObj->title; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="galleryThumbnail" placeholder="Upload Image">
                                    <input type="hidden" name="ifpbcempty" value="<?php echo $dataObj->image; ?>">
                                </div>
                            </div>
                            
                           <button type="submit" name="editGallery" class="btn btn-primary mr-2">Update</button>
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
                        <h4 class="card-title">Gallery</h4>
                        <p class="card-description">Create Gallery</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="title" placeholder="Title" value="<?php if(isset($title)){echo $title;} ?>">
                                <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="galleryThumbnail" placeholder="Upload Image" required>
                                </div>
                            </div>
                            
                           <button type="submit" name="storeGallery" class="btn btn-primary mr-2">Submit</button>
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
