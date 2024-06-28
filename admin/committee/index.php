<?php 
$title   =  "Core Committee Section | Admin";
$description = 'Description | Admin';
$keyword    = 'Keyword | Admin';
include "../layouts/main-header.php";
?>
<?php 
if(isset($_POST["storeBlog"])){
    
    foreach ($_FILES["profilePic"]["name"] as $key => $value) {
        $profileFile      =     $_FILES["profilePic"]["name"][$key];
        $profileFileTmp   =     $_FILES["profilePic"]["tmp_name"][$key];
        $profileSize      =     $_FILES["profilePic"]["size"][$key];
        $profileType      =     $_FILES["profilePic"]["type"][$key];
        $proImgExtention  =    pathinfo($profileFile, PATHINFO_EXTENSION);
        $imageName        =    explode(".", $profileFile);
        $profileRename    =    round(microtime(true)).'_cProfile'.$profileFile; // Committee Pro
        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );
        move_uploaded_file($profileFileTmp,'../uploads/committee/'.$profileRename);
        
        /*  $images_name[] = array(
             "image"  => $profileRename
          );*/
          
          $images_name[] = $profileRename;
       }  
       $img=implode(",",$images_name);
       
     //  $img = json_encode($images_name);
    /*  $profileFile      =     $_FILES["profilePic"]["name"];
      $profileFileTmp   =     $_FILES["profilePic"]["tmp_name"];
      $profileSize      =     $_FILES["profilePic"]["size"];
      $profileType      =     $_FILES["profilePic"]["type"];*/
      
      $designaition     =     $_POST["designaition"];
      $name             =     $_POST["name"];
      $aboutUs          =     $_POST["aboutUs"];
      $alt1             =     $_POST["alt1"];
      $orderr           =     $_POST["orderr"];
      $designationn     =     $_POST["designationn"];
      
      
      
   /*   $imageName         =    explode(".", $profileFile);
      $profileRename        =    round(microtime(true)) . '_cProfile.' . end($imageName); // Committee Pro
      $proImgExtention  =    pathinfo($profileFile, PATHINFO_EXTENSION);
      $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
     );*/
     
     if($designaition == ""){
      $errorMsg=  "You did't select Type of Commitiee.";
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
        $aboutUs = '';
        $query   =  "INSERT INTO `tbl_core_committee`(`name`, `designation`, `artical`, `profilePic`,`altImg`,`orderr`,`DesignationName`) VALUES ('$name','$designaition','$aboutUs','$img','$alt1','$orderr','$designationn')";
      $runQuery   =  $connect->query($query);
      if($runQuery){
        //    move_uploaded_file($profileFileTmp,'../uploads/committee/'.$profileRename);
         $errorMsg=  "Committee Member Added";
         $code= "5"; ?>
      <?php }
   }
}
?>
<?php 
if(isset($_GET["delete"])){
  $ID=$_REQUEST["delete"];
  $a="DELETE FROM `tbl_core_committee` WHERE `core_committee_id_pk`='$ID'";
  $runQuery   =  $connect->query($a);
  if($runQuery){
   $code = 200;
   $errorMsg   =  'Deleted Succssfully';
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
   $aboutUs          =     addslashes($_POST["aboutUs"]);
   $alt1          =     $_POST["alt1"];
   $orderr          =     $_POST["orderr"];
     $designationn     =     $_POST["designationn"];
   if(empty($profileFile)){
      $profileRename  =  $_POST["imgEmptyIf"];
   }else{
      $imageName            =    explode(".", $profileFile);
      $profileRename        =    round(microtime(true)) . '_cProfile.' . end($imageName);
      move_uploaded_file($profileFileTmp,'../uploads/committee/'.$profileRename);
   }
   $query   =  "UPDATE `tbl_core_committee` SET `name`='$name',`designation`='$designaition',`artical`='$aboutUs',`orderr`='$orderr',`DesignationName`='$designationn',`profilePic`='$profileRename',`altImg`='$alt1' WHERE core_committee_id_pk = '$Eid'";
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
                              <label for="">Type of Committees</label>
                              <select class="form-control" name="designaition" required> <option>Select</option>
                             <option value="International Core Committee" <?php if($dataObj->designation=="International Core Committee"){ echo "selected"; } ?> >International Core Committee</option>
                             <option value="Central Committee" <?php if($dataObj->designation=="Central Committee"){ echo "selected"; } ?>>Central Core Committee</option>
                             <option value="Women’s Committee" <?php if($dataObj->designation=="Women’s Committee"){ echo "selected"; } ?>>Women’s Committee</option>
                             <option value="Student Committee" <?php if($dataObj->designation=="Student Committee"){ echo "selected"; } ?>>Student Committee</option>
                             <option value="NHM And Gov Employee Committee" <?php if($dataObj->designation=="NHM And Gov Employee Committee"){ echo "selected"; } ?>>NHM & Gov. Employees Committee</option>
                             <option value="Clinic and Hospital Committee" <?php if($dataObj->designation=="Clinic & Hospital Committee"){ echo "selected"; } ?>>Clinic & Hospital Committee</option>
                             <option value="Ayurvedic Surgeons Committee" <?php if($dataObj->designation=="Ayurvedic Surgeons Committee"){ echo "selected"; } ?>>Ayurvedic Surgeons Committee</option>
                             <option value="Academic Committee" <?php if($dataObj->designation=="Academic Committee"){ echo "selected"; } ?>>Academic Committee</option>
                             <option value="Journal of AFI" <?php if($dataObj->designation=="Journal of AFI"){ echo "selected"; } ?>>Journal of AFI</option>
                             <option value="Swasthya Sandesh Patrika" <?php if($dataObj->designation=="Swasthya Sandesh Patrika"){ echo "selected"; } ?>>Swasthya Sandesh Patrika</option>
                             <option value="Pharma Committee" <?php if($dataObj->designation=="Pharma Committee"){ echo "selected"; } ?>>Pharma Committee</option>
                             <option value="Research Committee" <?php if($dataObj->designation=="Research Committee"){ echo "selected"; } ?>>Research Committee</option>
                             <option value="Agnivesh International Journal of Ayurveda and Research" <?php if($dataObj->designation=="Agnivesh International Journal of Ayurveda and Research"){ echo "selected"; } ?>>Agnivesh International Journal of Ayurveda and Research</option>
                          </select>
                                <!-- <option value="Founder" <?php if($dataObj->designation=="Founder"){ echo "selected"; } ?> >Founder</option>
                                 <option value="National president of AFI"  <?php if($dataObj->designation=="National president of AFI"){ echo "selected"; } ?> >National president of AFI</option>
                                 <option value="Vice President"  <?php if($dataObj->designation=="Vice President"){ echo "selected"; } ?> >Vice President</option>
                                 <option value="General Secretary" <?php if($dataObj->designation=="General Secretary"){ echo "selected"; } ?> >General Secretary</option>
                                 <option value="Secretary" <?php if($dataObj->designation=="Secretary"){ echo "selected"; } ?>>Secretary</option>
                                 <option value="Media & Oragnaization Secretary" <?php if($dataObj->designation=="Media & Oragnaization Secretary"){ echo "selected"; } ?>>Media & Oragnaization Secretary</option>
                                 <option value="Social Media Committee" <?php if($dataObj->designation=="Social Media Committee"){ echo "selected"; } ?>>Social Media Committee</option>
                                 <option value="International Core Committee" <?php if($dataObj->designation=="International Core Committee"){ echo "selected"; } ?>>International Core Committee</option>-->
                           
                           </div>
                               <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designationn" class="form-control" placeholder="Designation" value="<?= $dataObj->DesignationName; ?>">
                     </div> 
                           <div class="form-group">
                              <label>Profile Pic</label>
                              <div class="input-group col-xs-12">
                                 <input type="file" class="form-control file-upload-info" name="profilePic" placeholder="Upload Image">
                              </div>
                              <input type="hidden" name="imgEmptyIf" value="<?php echo $dataObj->profilePic; ?>">
                              <?php
                              $b=explode(",",$dataObj->profilePic);
                              foreach($b as $img){
                                ?>
                                <div class="form-group">
                                 <div class="col-lg-6 row">
                                    <img src="../uploads/committee/<?php echo $img; ?>" style="border: 1px solid;">
                                 </div>
                              </div>
                              <?php
                           } ?>
                        </div>
                        <div class="form-group">
                           <label>ALT Image</label>
                           <input type="text" name="alt1" class="form-control" placeholder="ALT Image" value="<?= $dataObj->altImg; ?>">
                        </div>
                        <div class="form-group">
                           <label>Order</label>
                           <input type="text" name="orderr" class="form-control" placeholder="Order" value="<?= $dataObj->orderr; ?>">
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
                           <label for="">Type of Committees</label>
                           <!--  <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="designaition" placeholder="Designation" value="<?php if(isset($designaition)){echo $designaition;} ?>">-->
                           <select class="form-control" name="designaition" required> <option>Select</option>
                             <option value="International Core Committee">International Core Committee</option>
                             <option value="Central Committee">Central Core Committee</option>
                             <option value="Women’s Committee">Women’s Committee</option>
                             <option value="Student Committee">Student Committee</option>
                             <option value="NHM And Gov Employee Committee">NHM & Gov. Employees Committee</option>
                             <option value="Clinic and Hospital Committee">Clinic & Hospital Committee</option>
                             <option value="Ayurvedic Surgeons Committee">Ayurvedic Surgeons Committee</option>
                             <option value="Academic Committee">Academic Committee</option>
                             <option value="Journal of AFI">Journal of AFI</option>
                             <option value="Swasthya Sandesh Patrika">Swasthya Sandesh Patrika</option>
                             <option value="Pharma Committee">Pharma Committee</option>
                             <option value="Research Committee">Research Committee</option>
                             <option value="Agnivesh International Journal of Ayurveda and Research">Agnivesh International Journal of Ayurveda and Research</option>
                          </select>
                          <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                       </div>
                          <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designationn" class="form-control" placeholder="Designation" >
                     </div> 
                       <div class="form-group">
                        <label>Profile Pic</label>
                        <div class="input-group col-xs-12">
                           <input type="file" class="form-control file-upload-info <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" name="profilePic[]" placeholder="Upload Image" multiple>
                        </div>
                        <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                     </div>
                     <div class="form-group">
                        <label>ALT Image</label>
                        <input type="text" name="alt1" class="form-control" placeholder="ALT Image">
                     </div>
                     <div class="form-group">
                        <label>Order</label>
                        <input type="text" name="orderr" class="form-control" placeholder="Order" >
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
                     <th>Order</th>
                     <th>Type of Committee</th>
                     <th>About US</th>
                     <th>Profile Pic</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $getMemories        =        "SELECT * FROM tbl_core_committee ORDER BY orderr asc";
                  $runGetMemories     =     $connect->query($getMemories);
                  $count = 1;
                  ?>
                  <?php while($row = $runGetMemories->fetch_assoc()):
                      //  $json=json_decode($row["profilePic"],true);
                     //$ss=$json[0];
                     //echo $ss[0].$image[0];
                     ?>
                     <tr>
                        <td class="py-1">
                           <?= $count; ?>
                        </td>
                        <td>
                           <?php echo $row["name"]; ?>
                        </td>
                        <td>
                           <?php echo $row["orderr"]; ?>
                        </td>
                        <td>
                           <?php echo $row["designation"]; ?>
                        </td>
                        <td>
                           <?php echo substr($row["artical"],0,25); ?>
                        </td>
                        <td> 
                           <?php
                           $b=explode(",",$row["profilePic"]);
                           foreach($b as $img){
                             ?>
                             <a href="../uploads/committee/<?php echo $img; ?>" target="_blank">
                              <img src="../uploads/committee/<?php echo $img; ?>" alt="image"> 
                           </a>
                           <?php
                        } ?>
                     </td>
                     <th>
                        <a href="index.php?Eid=<?php echo $row["core_committee_id_pk"]; ?>" class="btn btn-primary btn-xs">EDIT</a>
                        <a href="index.php?delete=<?php echo $row["core_committee_id_pk"]; ?>" class="btn btn-primary btn-xs">DELETE</a>
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