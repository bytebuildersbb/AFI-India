<?php 
$title   =  "Core Committee Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php 
   if(isset($_POST["storeBlog"])){
      $profileFile      =     $_FILES["profilePic"]["name"];
      $profileFileTmp   =     $_FILES["profilePic"]["tmp_name"];
      $profileSize      =     $_FILES["profilePic"]["size"];
      $profileType      =     $_FILES["profilePic"]["type"];
      /*Text Felids*/
      $designaition     =     $_POST["designaition"];
      $name             =     $_POST["name"];
      $aboutUs          =     $_POST["aboutUs"];
      $alt1          =     $_POST["alt1"];
      /*Ends*/
      $imageName         =    explode(".", $profileFile);
      $profileRename        =    round(microtime(true)) . '_cProfile.' . end($imageName); // Committee Pro
      $proImgExtention  =    pathinfo($profileFile, PATHINFO_EXTENSION);
      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
      );
      if($designaition == ""){
         $errorMsg=  "You did't select designation.";
         $code= "1";
      }else if($profileFile ==""){
         $errorMsg=  "You did't select profile pic";
         $code= "2";
      }else if(!in_array($proImgExtention, $allowed_image_extension)){
         $errorMsg=  "Upload valiid images. Only PNG and JPEG are allowed.";
         $code= "2";
      }else if($profileSize > 2000000){
         $errorMsg=  "Image size exceeds 2MB";
         $code= "2";
      }else if($name == ""){
         $errorMsg=  "You did't select name";
         $code= "3";
      }else if($aboutUs == ""){
         $errorMsg=  "You did't select about us";
         $code= "4";
      }else{
         $query   =  "INSERT INTO `tbl_core_committee`(`name`, `designation`, `artical`, `profilePic`,`altImg`) VALUES ('$name','$designaition','$aboutUs','$profileRename','$alt1')";
         $runQuery   =  $connect->query($query);
         if($runQuery){
            strcmp($profileFileTmp,'../uploads/committee/'.$profileRename);
            $errorMsg=  "Committee Member Added";
            $code= "5"; ?>
         <?php }
      }
   }
   ?>
<?php 
   if(isset($_POST["editBlog"])){
      $Eid  =   $_GET["Eid"];
      $profileFile      =     $_FILES["profilePic"]["name"];
      $profileFileTmp   =     $_FILES["profilePic"]["tmp_name"];
      $profileSize      =     $_FILES["profilePic"]["size"];
      $profileType      =     $_FILES["profilePic"]["type"];
      $profileRename  =  '';
      $designaition     =     $_POST["designaition"];
      $name             =     $_POST["name"];
      $aboutUs          =     $_POST["aboutUs"];
      $alt1          =     $_POST["alt1"];
      if(empty($profileFile)){
         $profileRename  =  $_POST["imgEmptyIf"];
      }else{
         $imageName            =    explode(".", $profileFile);
         $profileRename        =    round(microtime(true)) . '_cProfile.' . end($imageName);
      }
      $query   =  "UPDATE `tbl_core_committee` SET `name`='$name',`designation`='$designaition',`artical`='$aboutUs',`profilePic`='$profileRename',`altImg`='$alt1' WHERE core_committee_id_pk = '$Eid'";
      $runQuery   =  $connect->query($query);
      if($runQuery){
         $code = 200;
         $errorMsg   =  'Profile Update Succssfully';
      }
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
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
               <?php if(isset($_GET["Eid"])){ ?>
                  <?php 
                     $query   =  "SELECT * FROM tbl_core_committee WHERE core_committee_id_pk = '".$_GET["Eid"]."'";
                     $runQuery   =  $connect->query($query);
                     $dataObj    =  $runQuery->fetch_object();
                  ?>
                  <div class="card-body">
                     <?php if(isset($code) && $code == 200): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title">Core Committee</h4>
                     <p class="card-description">Add Members</p>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="">Designation</label>
                           <input type="text" class="form-control" name="designaition" placeholder="Designation" value="<?= $dataObj->designation; ?>">
                        </div>
                         <div class="form-group">
                           <label>Profile Pic</label>
                           <div class="input-group col-xs-12">
                              <input type="file" class="form-control file-upload-info" name="profilePic" placeholder="Upload Image">
                           </div>
                           <input type="hidden" name="imgEmptyIf" value="<?php echo $dataObj->profilePic; ?>">
                           <div class="form-group">
                              <div class="col-lg-6 row">
                                 <img src="../uploads/committee/<?= $dataObj->profilePic; ?>" style="border: 1px solid;">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>ALT Image</label>
                           <input type="text" name="alt1" class="form-control" placeholder="ALT Image" value="<?= $dataObj->altImg; ?>">
                        </div>
                        <div class="form-group">
                           <label>Name</label>
                           <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" name="name" placeholder="Name" value="<?= $dataObj->name; ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="exampleTextarea1">About Content</label>
                           <textarea class="form-control" name="aboutUs" id="editor" rows="15" ><?= $dataObj->artical; ?></textarea>
                        </div>
                        <button type="submit" name="editBlog" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                  </div>
               <?php }else{ ?>
                  <div class="card-body">
                     <?php if(isset($code) && $code == 5): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <h4 class="card-title">Core Committee</h4>
                     <p class="card-description">Add Members</p>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="">Designation</label>
                           <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="designaition" placeholder="Designation" value="<?php if(isset($designaition)){echo $designaition;} ?>">
                           <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                         <div class="form-group">
                           <label>Profile Pic</label>
                           <div class="input-group col-xs-12">
                              <input type="file" class="form-control file-upload-info <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" name="profilePic" placeholder="Upload Image">
                           </div>
                           <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label>ALT Image</label>
                           <input type="text" name="alt1" class="form-control" placeholder="ALT Image">
                        </div>
                        <div class="form-group">
                           <label>Name</label>
                           <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="name" placeholder="Name" value="<?php if(isset($name)){echo $name;} ?>">
                           </div>
                           <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="exampleTextarea1">About Content</label>
                           <textarea class="form-control" name="aboutUs" id="editor" rows="15" ></textarea>
                        <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <button type="submit" name="storeBlog" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                  </div>
               <?php }  ?>
               </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="overflow-x: auto;overflow-y: scroll;">
                  <div class="card-body">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Designation</th>
                              <th>About US</th>
                              <th>Profile Pic</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $getMemories        =        "SELECT * FROM tbl_core_committee ORDER BY core_committee_id_pk  DESC";
                           $runGetMemories     =     $connect->query($getMemories);
                           $count = 1;
                        ?>
                        <?php while($row = $runGetMemories->fetch_assoc()): ?>
                           <tr>
                              <td class="py-1">
                                 <?= $count; ?>
                              </td>
                              <td>
                                 <?php echo $row["name"]; ?>
                              </td>
                              <td>
                                 <?php echo $row["designation"]; ?>
                              </td>
                              <td>
                                 <?php echo substr($row["artical"],0,25); ?>
                              </td>
                              <td> 
                                 <a href="../uploads/committee/<?php echo $row["profilePic"]; ?>" target="_blank">
                                    <img src="../uploads/committee/<?php echo $row["profilePic"]; ?>" alt="image"> 
                                 </a>
                              </td>
                              <th>
                                 <a href="index.php?Eid=<?php echo $row["core_committee_id_pk"]; ?>" class="btn btn-primary btn-xs">EDIT</a>
                              </th>
                           </tr>
                        <?php 
                           $count++; 
                        endwhile;
                        ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
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
</script>