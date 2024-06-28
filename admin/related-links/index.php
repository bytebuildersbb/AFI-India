<?php 
   $title   =  "Related Links| Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<?php
   /*Update Slider*/
   if(isset($_POST["Editsubmit"])){
      $linkName 	=  		$_POST["linkName"];
      $link    		=  		$_POST["link"];
$query      =     "UPDATE `tbl_related_link` SET `linkTitle`='$linkName',`linkURL`='$link' WHERE related_link_id_pk = '".$_GET['eID']."'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
            <script>alert('Related Link Updated');</script>
      <?php }
   }


   if(isset($_POST["submit"])){
      $linkName 	=  		$_POST["linkName"];
      $link    		=  		$_POST["link"];
      if($linkName == ""){
         $errorMsg=  "Please related link name.";
         $code= "1";
      }else if($link == ""){
         $errorMsg=  "Please enter related url Link";
         $code= "2";
      }else{
         $query         =      "INSERT INTO `tbl_related_link`(`linkTitle`, `linkURL`) VALUES ('$linkName','$link')";
         $runQuery      =     $connect->query($query);
         if($runQuery){
            $errorMsg = "Link Created Succssfully";
            $code    =  3;
         }
      }
   }
?>
<?php
   if(isset($_GET["Did"])){
      $query      =  "DELETE FROM `tbl_related_link` WHERE related_link_id_pk  = '".$_GET["Did"]."'";
      $runQuery   =  $connect->query($query);
      if($runQuery){
         $code = 0;
         $errorMsg   =  "Related Link Delete";
      }
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
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card" style="height: fit-content;">
                  <?php 
                  	if(!isset($_GET["eID"])){ ?>
                  		<div class="card-body">
		                      <?php if(isset($code) && $code == 0): ?>
		                     <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
		                     <?php endif; ?>
		                     <?php if(isset($code) && $code == 3): ?>
		                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
		                     <?php endif; ?>
		                     <h4 class="card-title">Related Links</h4>
		                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
		                        <div class="form-group">
		                           <label>Link Name</label>
		                           <div class="input-group col-xs-6">
		                              <input type="text" class="form-control file-upload-info"  name="linkName" placeholder="Enter Link Name">
		                           </div>
		                           <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
		                        </div>
		                        <div class="form-group">
		                           <label>Link</label>
		                           <input type="text" name="link" class="form-control" placeholder="Link"><?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
		                        </div>
		                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
		                        <button class="btn btn-light">Cancel</button>
		                     </form>
		                  </div>
                  	<?php }else{ ?>
                  	<?php
                  		$query 	 =	"SELECT * FROM tbl_related_link WHERE related_link_id_pk = '".$_GET['eID']."'";
                  		$runQuery =	$connect->query($query);
                  		$dataObj 	=	$runQuery->fetch_object();
                  	?>
                  		<div class="card-body" style="overflow: auto;">
		                      <?php if(isset($code) && $code == 0): ?>
		                     <div class="alert alert-danger" role="alert"><?php echo $errorMsg; ?></div>
		                     <?php endif; ?>
		                     <?php if(isset($code) && $code == 3): ?>
		                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
		                     <?php endif; ?>
		                     <h4 class="card-title">Update Related Links</h4>
		                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
		                        <div class="form-group">
		                           <label>Link Name</label>
		                           <div class="input-group col-xs-6">
		                              <input type="text" class="form-control file-upload-info"  name="linkName" value="<?php echo $dataObj->linkTitle; ?>">
		                           </div>
		                        </div>
		                        <div class="form-group">
		                           <label>Link</label>
		                           <input type="text" name="link" class="form-control" placeholder="Link" value="<?php echo $dataObj->linkURL; ?>">
		                        </div>
		                        <button type="submit" name="Editsubmit" class="btn btn-primary mr-2">Update</button>
		                        <button class="btn btn-light">Cancel</button>
		                     </form>
		                  </div>
                  	<?php }	
                  ?>
                 
               </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
               <div class="card" style="overflow: auto;">
                  <div class="card-body">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Title</th>
                              <th>Link URL</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $getMemories        =        "SELECT * FROM tbl_related_link";
                           $runGetMemories     =     $connect->query($getMemories);
                           $count = 1;
                        ?>
                        <?php while($row = $runGetMemories->fetch_assoc()): ?>
                           <tr>
                              <td class="py-1">
                                 <?= $count; ?>
                              </td>
                              <td> 
                                <?= $row["linkTitle"]; ?>
                              </td>
                                <td> 
                                <?= $row["linkURL"]; ?>
                              </td>
                              <td>
                                <a href="../related-links.php?eID=<?php echo $row["related_link_id_pk"];?>" class="btn btn-info btn-xs">Edit</a>
                 <a href="../related-links.php?Did=<?php echo $row["related_link_id_pk"];?>" class="btn btn-danger btn-xs">Delete</a>
                              </td>
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