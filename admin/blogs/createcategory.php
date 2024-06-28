<?php 
    $title   =  "Blog Category Section | Admin";
    $description = 'Best Category section | Admin';
    $keyword    = 'Blog category | Admin';
    include "../layouts/main-header.php";
     
    if(isset($_POST["storeBlogCategory"])){
       
        $categoryName   =  $_POST["categoryName"];
        $isActive       =  $_POST["isActive"];
        
        if($categoryName == ""){
            $errorMsg=  "Please enter Category Name.";
            $code= "1";
        }else{
            
            $query = "INSERT INTO `tbl_blog_category`(`categoryName`, `isActive`) VALUES ('$categoryName','$isActive')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
                $errorMsg=  "Blog Category created succssfully";
                $code= "5";
            }
        }
        
    }

    
    /*========= Edit Form ===============*/
    
    if(isset($_POST["editBlogCategory"])){
        $id             =  $_GET["bcId"];
        
        $categoryName   =  $_POST["categoryName"];
        $isActive       =  $_POST["isActive"];
        
        $query = "UPDATE `tbl_blog_category` SET `categoryName`='$categoryName',`isActive`='$isActive' WHERE blog_category_id_pk = '".$id."'";
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Blog Category Updated Succssfully');</script>
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
      if(isset($_GET["bcId"])){ ?>
         <?php
            $id   =   $_GET["bcId"];
            $query = "SELECT * FROM tbl_blog_category WHERE blog_category_id_pk = '".$id."'";
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
                        <h4 class="card-title">Blog Category</h4>
                        <p class="card-description">Create Category</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Category Name</label>
                              <input type="text" class="form-control" name="categoryName" placeholder="Category Name" value="<?= $dataObj->categoryName; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">IsActive</label>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="isActive" value="0" id="flexRadioDefault1" <?php if($dataObj->isActive == 0){echo "checked"; }?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Active
                                    </label>
                                </div>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="isActive" value="1" id="flexRadioDefault2" <?php if($dataObj->isActive == 1){echo "checked"; }?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Deactive
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" name="editBlogCategory" class="btn btn-primary mr-2">Update</button>
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
                        <h4 class="card-title">Blog Category</h4>
                        <p class="card-description">Create Category</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Category Name</label>
                                <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="categoryName" placeholder="Category Name" value="<?php if(isset($categoryName)){echo $categoryName;} ?>">
                                <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">IsActive</label>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="isActive" value="0" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Active
                                    </label>
                                </div>
                                <div class="form-checks">
                                    <input class="form-check-input" type="radio" name="isActive" value="1" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Deactive
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" name="storeBlogCategory" class="btn btn-primary mr-2">Submit</button>
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
