<?php 
   $title   =  "Video Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
    
    if(isset($_POST["storeVideo"])){
        $a=addslashes($_REQUEST['t1']);
        $b=addslashes($_REQUEST['t2']);
     
        $teamFile        =  $_FILES["videoThumbnail"]["name"];
        $teamFileTmp     =  $_FILES["videoThumbnail"]["tmp_name"];
        $teamSize        =  $_FILES["videoThumbnail"]["size"];
        $teamType        =  $_FILES["videoThumbnail"]["type"];
       
        $allowed_pdf = array( "png", "jpg", "pdf", "PDF", "jpeg" );
        
        $teamImageName       =     explode(".", $teamFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($teamImageName);
        $pdfImgExtention    =     pathinfo($teamFile, PATHINFO_EXTENSION);
        
        strcmp($teamFileTmp,'../uploads/video/'.$thumbNew);
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date('m/d/Y h:i:s a', time());
         
        $query   =  "INSERT INTO `tbl_video`(`videoTitle`,`videoURL`, `videoThumbnail`,`createdOn`) VALUES ('$a','$b','$thumbNew','$date')";
        $runQuery   =  $connect->query($query);
        if($runQuery){
      
            $errorMsg=  "Added successfully";
            $code= "5";
        }
    }
   
    if(isset($_POST["editVideo"])){
        /*Current Date Time*/
        // Change the line below to your timezone!
        $a=addslashes($_REQUEST['t1']);
         $b=addslashes($_REQUEST['t2']);
        $Eid           =     $_POST["Eid"];
      
        $teamFile        =  $_FILES["videoThumbnail"]["name"];
        $teamFileTmp     =  $_FILES["videoThumbnail"]["tmp_name"];
        $teamSize        =  $_FILES["videoThumbnail"]["size"];
        $teamType        =  $_FILES["videoThumbnail"]["type"];
       
        $allowed_pdf = array( "png", "jpg", "pdf", "PDF", "jpeg" );
        
        $teamImageName       =     explode(".", $teamFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($teamImageName);
        $pdfImgExtention    =     pathinfo($teamFile, PATHINFO_EXTENSION);
        
        if(empty($teamFile)){
            $previewthumb    =  $_POST["ifpbcempty"];
        }else{
            $previewthumb    =  $thumbNew;
            strcmp($teamFileTmp,'../uploads/video/'.$thumbNew); 
        }

        $query = "UPDATE `tbl_video` SET `videoTitle`='$a',`videoURL`='$b', `videoThumbnail`= '$previewthumb' WHERE `video_id_pk` = '$Eid'";
         
         
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Content Update Succssfully');</script>
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
      if(isset($_GET["Eid"])){ ?>
         <?php
            $id   =   $_GET["Eid"];
            $query = "SELECT * FROM tbl_video WHERE video_id_pk  = '".$id."'";
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
                        <h4 class="card-title">Video</h4>
                        <p class="card-description">Videos</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="Eid" value="<?= $id; ?>">
                           
                           <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="t1" class="form-control" placeholder="Title" value="<?= $dataObj->videoTitle; ?>">
                           </div>
                          <div class="form-group">
                              <label>URL</label>
                              <input type="text" name="t2" class="form-control" placeholder="URL" value="<?= $dataObj->videoURL; ?>">
                           </div>
                           
                           <div class="form-group">
                                <label>Video Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="videoThumbnail" placeholder="Upload Image">
                                    <input type="hidden" name="ifpbcempty" value="<?php echo $dataObj->videoThumbnail; ?>">
                                </div>
                            </div>
                           
                           <button type="submit" name="editVideo" class="btn btn-primary mr-2">Submit</button>
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
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Video</h4>
                        <p class="card-description">Add Video</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                          
                           <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="t1" class="form-control" placeholder="Title" required>
                           </div>
                          
                           <div class="form-group">
                              <label>URL</label>
                              <input type="text" name="t2" class="form-control" placeholder="URL" required>
                           </div>
                           <div class="form-group">
                                <label>Video Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="videoThumbnail" placeholder="Upload Image" required>
                                </div>
                            </div>
                            
                           <button type="submit" name="storeVideo" class="btn btn-primary mr-2">Submit</button>
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