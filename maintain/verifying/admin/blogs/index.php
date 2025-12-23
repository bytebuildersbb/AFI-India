<?php 
   $title   =  "Blog Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
    ?>
<?php 
   if(isset($_POST["storeBlog"])){
      $blogFile      =     $_FILES["blogImg"]["name"];
      $blogFileTmp   =     $_FILES["blogImg"]["tmp_name"];
      $blogSize      =     $_FILES["blogImg"]["size"];
      $blogType      =     $_FILES["blogImg"]["type"];
      /*Text Felids*/
      $blogCategory  =     $_POST["blogCategory"];
      $blogTitle     =     $_POST["blogTitle"];
      $blogContent   =     $_POST["blogContent"];
      $alt1          =     $_POST["alt1"];
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
      if($blogFile == ""){
         $errorMsg=  "You did't select blog image.";
         $code= "1";
      }else if(!in_array($blogImgExtention, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "1";
      }else if($blogSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "1";
      }else if($blogCategory == ""){
         $errorMsg=  "You did't select blog category";
         $code= "2";
      }else if($blogTitle == ""){
         $errorMsg=  "You did't select blog title";
         $code= "3";
      }else if($blogContent == ""){
         $errorMsg=  "You did't select blog description";
         $code= "4";
      }else{
         $query   =  "INSERT INTO `tbl_blog`(`blogImg`,`altImg`, `blogTitle`,`urlSlug`,`blogCategory`, `blogContent`) VALUES ('$blogRename','$alt1','$blogTitle','$urlSlug','$blogCategory','$blogContent')";
         $runQuery   =  $connect->query($query);
         if($runQuery){
            strcmp($blogFileTmp,'../uploads/blogs/'.$blogRename);
            $errorMsg=  "Blog craeted successfully";
            $code= "5";
         }
      }
   
      
   }
   ?>
<?php 
   if(isset($_POST["editBlog"])){
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
            $query = "SELECT * FROM tbl_blog WHERE blog_id_pk  = '".$id."'";
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
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Blogs</h4>
                        <p class="card-description">Edit Blogs</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="Eid" value="<?= $id; ?>">
                           <div class="form-group">
                              <label>Blog Image</label>
                              <div class="input-group col-xs-12 col-lg-6 row">
                                 <input type="file" class="form-control file-upload-info" name="blogImg" placeholder="Upload Image">
                              <div class="input-group col-xs-12 col-lg-6">
                                 <img src="../uploads/blogs/<?php echo $dataObj->blogImg; ?>" style="width:auto; height: auto;">
                              </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label>ALT Image Name</label>
                              <input type="text" name="alt1" class="form-control" placeholder="ALT Image Name" value="<?= $dataObj->altImg; ?>">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Blog Title</label>
                              <input type="text" class="form-control" name="blogTitle" placeholder="Blog Title" value="<?= $dataObj->blogTitle; ?>">
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Category</label>
                              <select class="form-control form-control-sm " name="blogCategory">
                                 <?php 
                                    $getCategory   =  "SELECT * FROM tbl_blog_category";
                                    $runCategory   =  $connect->query($getCategory);
                                    while($rowCat  =  $runCategory->fetch_assoc()){ ?>
                                 <option value="<?= $rowCat["blog_category_id_pk"];?>">
                                    <?php echo $rowCat["categoryName"]; ?></option>
                                 <?php } ?>
                              </select>
                              <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label for="exampleTextarea1">Textarea</label>
                              <textarea class="form-control" name="blogContent" id="editor" rows="15" ><?= $dataObj->blogTitle; ?></textarea>
                           <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
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
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Blogs</h4>
                        <p class="card-description">Create Blogs</p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label>Blog Image</label>
                              <div class="input-group col-xs-12">
                                 <input type="file" class="form-control file-upload-info <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="blogImg" placeholder="Upload Image">
                              </div>
                              <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label>ALT Image Name</label>
                              <input type="text" name="alt1" class="form-control" placeholder="ALT Image Name">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputName1">Blog Title</label>
                              <input type="text" class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="blogTitle" placeholder="Blog Title" value="<?php if(isset($blogTitle)){echo $blogTitle;} ?>">
                              <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect3">Category</label>
                              <select class="form-control form-control-sm " name="blogCategory">
                                 <option value="">--Please Select--</option>
                                 <?php 
                                    $getCategory   =  "SELECT * FROM tbl_blog_category";
                                    $runCategory   =  $connect->query($getCategory);
                                    while($rowCat  =  $runCategory->fetch_assoc()){ ?>
                                 <option value="<?= $rowCat["blog_category_id_pk"];?>"><?php echo $rowCat["categoryName"]; ?></option>
                                 <?php } ?>
                              </select>
                              <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           </div>
                           <div class="form-group">
                              <label for="exampleTextarea1">Textarea</label>
                              <textarea class="form-control" name="blogContent" id="editor" rows="15" ></textarea>
                           <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
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