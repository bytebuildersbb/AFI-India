<?php 
    $title   =  "Founding Team Section | Admin";
    $description = 'Best Founding Team | Admin';
    $keyword    = 'Best Ayurveda Team | Admin';
    include "../layouts/main-header.php";
     
    if(isset($_POST["storeFoundingTeam"])){
       
        $t_title        =  $_POST["t_title"];
        $t_designation  =  $_POST["t_designation"];
        $t_desc         =  base64_encode($_POST["t_desc"]);
        $t_shortdesc    =  $_POST["t_shortdesc"];
        $t_city         =  $_POST["t_city"];
        
        $teamFile        =  $_FILES["videoThumbnail"]["name"];
        $teamFileTmp     =  $_FILES["videoThumbnail"]["tmp_name"];
        $teamSize        =  $_FILES["videoThumbnail"]["size"];
        $teamType        =  $_FILES["videoThumbnail"]["type"];
       
        $allowed_pdf = array( "png", "jpg", "pdf", "PDF", "jpeg" );
        
        $teamImageName       =     explode(".", $teamFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($teamImageName);
        $pdfImgExtention    =     pathinfo($teamFile, PATHINFO_EXTENSION);
        
        /*---------------------------------------------------*/
        $tpdfFile        =  $_FILES["t_pdf"]["name"];
        $tpdfFileTmp     =  $_FILES["t_pdf"]["tmp_name"];
        $tpdfSize        =  $_FILES["t_pdf"]["size"];
        $tpdfType        =  $_FILES["t_pdf"]["type"];
       
        $allowed_pdf = array( "pdf", "PDF" );
        
        $tpdfImageName       =     explode(".", $tpdfFile);
        $tpdfhumbNew           =     round(microtime(true)) . 'PDF.' . end($tpdfImageName);
        
        
        if($t_title == ""){
            $errorMsg=  "Please enter Team Title.";
            $code= "1";
        }else if($t_designation == ""){
            $errorMsg=  "Please enter Team Designation.";
            $code= "2";
        }else if($t_desc == ""){
            $errorMsg=  "Please enter Team Description";
            $code= "3";
        }/*else if($t_shortdesc == ""){
            $errorMsg=  "Please enter Team Short Description.";
            $code= "3";
        }*/else if($teamFile == ""){
            $errorMsg=  "Please Upload Team Thumbnail";
            $code= "4";
        }else if($tpdfFile == ""){
            $errorMsg=  "Please Upload PDF";
            $code= "5";
        }else{
            strcmp($teamFileTmp,'../uploads/foundingteam/'.$thumbNew); 
            strcmp($tpdfFileTmp,'../uploads/foundingteam/pdf/'.$tpdfhumbNew); 
            
            $query = "INSERT INTO `tbl_foundingteam`(`t_title`, `t_designation`, `t_desc`, `t_shortdesc`, `t_city`, `t_thumbnail`, `t_pdf`) VALUES ('$t_title','$t_designation','$t_desc','$t_shortdesc','$t_city','$thumbNew','$tpdfhumbNew')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
                $errorMsg=  "Team created succssfully";
                $code= "5";
            }
        }
        
    }

    
    /*========= Edit Form ===============*/
    
    if(isset($_POST["editFoundingTeam"])){
        $id             =  $_GET["tId"];
        $teamFile        =  $_FILES["videoThumbnail"]["name"];
        $teamFileTmp     =  $_FILES["videoThumbnail"]["tmp_name"];
        $teamSize        =  $_FILES["videoThumbnail"]["size"];
        $teamType        =  $_FILES["videoThumbnail"]["type"];
        
        $t_title        =  $_POST["t_title"];
        $t_designation  =  $_POST["t_designation"];
        $t_desc         =  base64_encode($_POST["t_desc"]);
        $t_shortdesc    =  $_POST["t_shortdesc"];
        $t_createdFor   =  $_POST["t_createdFor"];
        $t_city         =  $_POST["t_city"];
          
        $teamImageName       =     explode(".", $teamFile);
        $thumbNew           =     round(microtime(true)) . 'PDF.' . end($teamImageName);
        
        /*---------------------------------------------------*/
        $tpdfFile        =  $_FILES["t_pdf"]["name"];
        $tpdfFileTmp     =  $_FILES["t_pdf"]["tmp_name"];
        $tpdfSize        =  $_FILES["t_pdf"]["size"];
        $tpdfType        =  $_FILES["t_pdf"]["type"];
       
        $allowed_pdf = array( "pdf", "PDF" );
        
        $tpdfImageName       =     explode(".", $tpdfFile);
        $tpdfhumbNew           =     round(microtime(true)) . 'PDF.' . end($tpdfImageName);
        
        if(empty($teamFile)){
            $previewthumb    =  $_POST["ifpbcempty"];
        }else{
            $previewthumb    =  $thumbNew;
            strcmp($teamFileTmp,'../uploads/foundingteam/'.$thumbNew); 
        }
        
        if(empty($tpdfFile)){
            $previewthumbpdf    =  $_POST["ifpbcemptypdf"];
        }else{
            $previewthumbpdf    =  $tpdfhumbNew;
            strcmp($tpdfFileTmp,'../uploads/foundingteam/pdf/'.$tpdfhumbNew); 
        }
        
        $query = "UPDATE `tbl_foundingteam` SET `t_title`='$t_title', `t_designation`='$t_designation',`t_desc`='$t_desc',`t_shortdesc`='$t_shortdesc',`t_city`='$t_city',`t_thumbnail`='$previewthumb',`t_pdf`='$previewthumbpdf' WHERE t_id = '".$id."'";
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Founding Team Updated Succssfully');</script>
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
      if(isset($_GET["tId"])){ ?>
         <?php
            $id   =   $_GET["tId"];
            $query = "SELECT * FROM tbl_foundingteam WHERE t_id = '".$id."'";
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
                        <h4 class="card-title">Founding Team</h4>
                        <p class="card-description">Create Founding Team</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Team Title</label>
                              <input type="text" class="form-control" name="t_title" placeholder="Team Title" value="<?= $dataObj->t_title; ?>">
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputName1">Team Designation</label>
                              <input type="text" class="form-control" name="t_designation" placeholder="Team Designation" value="<?= $dataObj->t_designation; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Team Description</label>
                                <textarea class="form-control" name="t_desc" id="editor" rows="15" ><?= base64_decode($dataObj->t_desc); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Team Short Description</label>
                                <textarea name="t_shortdesc" class="form-control"  rows="15"><?= $dataObj->t_shortdesc; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputName1">Team City</label>
                              <input type="text" class="form-control" name="t_city" placeholder="Team City" value="<?= $dataObj->t_city; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Video Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="videoThumbnail" placeholder="Upload Image">
                                    <input type="hidden" name="ifpbcempty" value="<?php echo $dataObj->t_thumbnail; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Pdf Upload</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="t_pdf" placeholder="Upload PDF">
                                    <input type="hidden" name="ifpbcemptypdf" value="<?php echo $dataObj->t_pdf; ?>">
                                </div>
                            </div>
                            
                           <button type="submit" name="editFoundingTeam" class="btn btn-primary mr-2">Update</button>
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
                        <h4 class="card-title">Founding Team</h4>
                        <p class="card-description">Create Founding Team</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Team Title</label>
                                <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="t_title" placeholder="Team Title" value="<?php if(isset($t_title)){echo $t_title;} ?>">
                                <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputName1">Team Designation</label>
                              <input type="text" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" name="t_designation" placeholder="Team Designation" value="<?php if(isset($t_designation)){echo $t_designation;} ?>">
                                <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Team Description</label>
                                <textarea class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="t_desc" id="editor" rows="15" ><?php if(isset($t_desc)){echo $t_desc;} ?></textarea>
                                <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Team Short Description</label>
                                <textarea class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="t_shortdesc" id="editor" rows="15" ><?php if(isset($t_shortdesc)){echo $t_shortdesc;} ?></textarea>
                                <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputName1">Team City</label>
                                <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="t_city" placeholder="Team City" value="<?php if(isset($t_city)){echo $t_city;} ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Video Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="videoThumbnail" placeholder="Upload Image" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Pdf Upload</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="t_pdf" placeholder="Upload PDF" required>
                                </div>
                            </div>
                            
                           <button type="submit" name="storeFoundingTeam" class="btn btn-primary mr-2">Submit</button>
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
