<?php 
   $title   =  "Navbar Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   if(isset($_POST["metaSubmit"])){
      $pageName         =  $_POST["pageName"];
      $metaTitle        =  $_POST["metaTitle"];
      $metaKeyword      =  $_POST["metaKeyword"];
      $metaDescription  =  $_POST["metaDescription"];
      if($metaTitle == ""){
         $errorMsg = "Please enter page title";
         $code = 1;
      }else{
         $query   =  "INSERT INTO `tbl_page_meta`(`pageName`, `pageTitle`, `pageMeta`, `pageDesciption`) VALUES ('$pageName','$metaTitle','$metaKeyword','$metaDescription')";
         $runQuery   =  $connect->query($query);
         if($runQuery){
            $errorMsg = "Page Meta Create Succssfully";
            $code = 4;
         }
      }
   }
   
   /*========= Edit Form ===============*/
    
    if(isset($_POST["editMeta"])){
        $id             =  $_GET["pmId"];
        
        $pageName      =  $_POST["pageName"];
        $metaTitle        =  $_POST["metaTitle"];
        $metaKeyword      =  $_POST["metaKeyword"];
        $metaDescription  =  $_POST["metaDescription"];
        
        $query = "UPDATE `tbl_page_meta` SET `pageName`='$pageName',`pageTitle`='$metaTitle',`pageMeta`='$metaKeyword',`pageDesciption`='$metaDescription' WHERE meta_id_pk = '".$id."'";
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Page Meta Updated Succssfully');</script>
        <?php }
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
    
    <?php
        if(isset($_GET["pmId"])){ 
            $id   =   $_GET["pmId"];
            $query = "SELECT * FROM tbl_page_meta WHERE meta_id_pk = '".$id."'";
            $runQuery   =  $connect->query($query);
            $dataObj    =  $runQuery->fetch_object();
          
    ?>
    <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Assign Page Meta</h4>
                    <?php if(isset($code) && $code == 4): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Page Name</label>
                            <input type="text" name="pageName" class="form-control" placeholder="EX: index.php" value="<?= $dataObj->pageName; ?>">
                        </div>
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="metaTitle" class="form-control" placeholder="EX: About Us | Hello World" value="<?= $dataObj->pageTitle; ?>">
                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" name="metaKeyword" class="form-control" placeholder="EX: SEO,SMO" value="<?= $dataObj->pageMeta; ?>">
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="metaDescription" class="form-control" placeholder="EX: Best ayurvedha firm in delhi" value="<?= $dataObj->pageDesciption; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="editMeta" class="btn btn-primary" value="Update">
                        </div>
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
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Assign Page Meta</h4>
                    <?php if(isset($code) && $code == 4): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Page Name</label>
                            <input type="text" name="pageName" class="form-control <?php if(isset($code) && $code==1):echo 'errorMsg'; endif; ?>" placeholder="EX: index.php" value="<?php if(isset($pageName)):echo $pageName; endif; ?>">
                            <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                           

                        </div>
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="metaTitle" class="form-control <?php if(isset($code) && $code==2):echo 'errorMsg'; endif; ?>" placeholder="EX: About Us | Hello World" value="<?php if(isset($metaTitle)):echo $metaTitle; endif; ?>">
                            <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>

                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" name="metaKeyword" class="form-control" placeholder="EX: SEO,SMO">
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="metaDescription" class="form-control" placeholder="EX: Best ayurvedha firm in delhi">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="metaSubmit" class="btn btn-primary" value="Submit">
                        </div>
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