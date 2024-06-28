<?php 
   $title   =  "Membership Section | Admin";
   $description = 'Description | Admin';
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<?php
   /*Update Slider*/
   if(isset($_POST["submit"])){
      $lifeMember    =  $_POST["lifeMember"];
      $partonMember  =  $_POST["partonMember"];
      $associateMember     =  $_POST["associateMember"];
      $overseasMember   =  $_POST["overseasMember"];
      $studentsCost     =  $_POST["studentsCost"];
      $leftText      =  $_POST["leftText"];
      $associateText       =  $_POST["associateText"];
      $overseasText     =  $_POST["overseasText"];
      $studentText      =  $_POST["studentText"];
      if($lifeMember == ""){
         $errorMsg=  "Please enter life member cost.";
        $code= 1;
      }else if($partonMember == ""){
         $errorMsg=  "Please enter life special patron member cost.";
        $code= 2;
      }else if($associateMember == ""){
         $errorMsg=  "Please enter associate member cost.";
        $code= 3;
      }else if($overseasMember == ""){
         $errorMsg=  "Please enter overseas member cost.";
        $code= 4;    
      }else if($studentsCost == ""){
         $errorMsg=  "Please enter student member cost.";
        $code= 5;    
      }else{
         $query = "INSERT INTO `tbl_membership_details`(`lifeMCost`, `spacialPCost`, `associateCost`, `overseasCost`, `studentCost`, `lifeMemberText`, `associateMembersText`, `overseasMembersText`, `studentMemberText`) VALUES ('$lifeMember','$partonMember','$associateMember','$overseasMember','$studentsCost','$leftText','$associateText','$overseasText','$studentText')";
         $runQuery   =  $connect->query($query);
         if($runQuery){
            $errorMsg=  "Membership Added";
         $code= 5;   
         }
      }
   }
   ?>
<?php 
   if(isset($_POST["editsubmit"])){
      $lifeMember    =  $_POST["lifeMember"];
      $partonMember  =  $_POST["partonMember"];
      $associateMember     =  $_POST["associateMember"];
      $overseasMember   =  $_POST["overseasMember"];
      $studentsCost     =  $_POST["studentsCost"];
      $leftText      =  $_POST["leftText"];
      $associateText       =  $_POST["associateText"];
      $overseasText     =  $_POST["overseasText"];
      $studentText      =  $_POST["studentText"];
      $query   =  $connect->query("UPDATE `tbl_membership_details` SET `lifeMCost`='$lifeMember',`spacialPCost`='$partonMember',`associateCost`='$associateMember',`overseasCost`='$overseasMember',`studentCost`='$studentsCost',`lifeMemberText`='$leftText',`associateMembersText`='$associateText',`overseasMembersText`='$overseasText',`studentMemberText`='$studentText' WHERE membership_detail_id_pk = '".$_GET['id']."'");
      if($query){ ?>
            <script type="text/javascript">
               alert('Data Updated');
            </script>
      <?php }
   }
?>
<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
     .ck-content>p{
   height: 100px !important;
   }
</style>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
        <!-- Ends -->
        <div class="row">
            <div class="col-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <?php if(isset($code) && $code == 5): ?>
                     <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                     <?php endif; ?>
                     <?php 
                        if(isset($_GET['id'])){
                           $getDataByID   =  "SELECT * FROM tbl_membership_details WHERE membership_detail_id_pk = '".$_GET['id']."'";
                           $runQuery   =  $connect->query($getDataByID);
                           $editObj    =  $runQuery->fetch_object();
                     ?>
                        <h4 class="card-title">Membership Details Edit</h4>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="">Life Member</label>
                           <input type="text" name="lifeMember" class="form-control" value="<?= $editObj->lifeMCost; ?>">
                        </div>
                        <div class="form-group">
                           <label for="">Special Patron Member</label>
                           <input type="text" name="partonMember" class="form-control" value="<?= $editObj->spacialPCost; ?>" >
                        </div>
                        <div class="form-group">
                           <label for="">Associate Member</label>
                           <input type="text" name="associateMember" class="form-control" value="<?= $editObj->associateCost; ?>">
                        </div>
                        <div class="form-group">
                           <label for="">Overseas  Member Cost</label>
                           <input type="text" name="overseasMember" class="form-control" value="<?= $editObj->overseasCost; ?>">
                        </div>
                        <div class="form-group">
                           <label for="">Student Cost</label>
                           <input type="text" name="studentsCost" class="form-control" value="<?= $editObj->studentCost; ?>">
                       </div>
                        <div class="form-group">
                           <label for="">Life Members Desciption</label>
                           <textarea name="leftText" class="form-control" value="" id="editor"><?= $editObj->lifeMemberText; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Associate  Members Desciption</label>
                           <textarea name="associateText" class="form-control" value="" id="editor1"><?= $editObj->associateMembersText; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Overseas Members Desciption</label>
                           <textarea name="overseasText" class="form-control" value="" id="editor2"><?= $editObj->overseasMembersText; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Student  Members Desciption</label>
                           <textarea name="studentText" class="form-control" value="" id="editor3"><?= $editObj->studentMemberText; ?></textarea>
                        </div>
                        <button type="submit" name="editsubmit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                     <?php }else{ ?>
                           <h4 class="card-title">Membership Details</h4>
                     <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="">Life Member</label>
                           <input type="text" name="lifeMember" class="form-control <?php if(isset($code) && $code==1):echo 'errorMsg'; endif; ?>" placeholder="Life Member Cost" value="<?php if(isset($lifeMember)):echo $lifeMember; endif; ?>">
                            <?php if (isset($code) && $code == 1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">Special Patron Member</label>
                           <input type="text" name="partonMember" class="form-control <?php if(isset($code) && $code==2):echo 'errorMsg'; endif; ?>" placeholder="Special Patron Member Cost" value="<?php if(isset($partonMember)):echo $partonMember; endif; ?>">
                            <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">Associate Member</label>
                           <input type="text" name="associateMember" class="form-control <?php if(isset($code) && $code==3):echo 'errorMsg'; endif; ?>" placeholder="Associate Member Cost" value="<?php if(isset($associateMember)):echo $associateMember; endif; ?>">
                            <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">Overseas  Member Cost</label>
                           <input type="text" name="overseasMember" class="form-control <?php if(isset($code) && $code==4):echo 'errorMsg'; endif; ?>" placeholder="Overseas member cost" value="<?php if(isset($overseasMember)):echo $overseasMember; endif; ?>">
                            <?php if (isset($code) && $code==4) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                        </div>
                        <div class="form-group">
                           <label for="">Student Cost</label>
                           <input type="text" name="studentsCost" class="form-control <?php if(isset($code) && $code==5):echo 'errorMsg'; endif; ?>" placeholder="Student Cost" value="<?php if(isset($studentsCost)):echo $studentsCost; endif; ?>">
                            <?php if (isset($code) && $code==5) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                       </div>
                        <div class="form-group">
                           <label for="">Life Members Desciption</label>
                           <textarea name="leftText" class="form-control <?php if(isset($code) && $code==6):echo 'errorMsg'; endif; ?>" value="" id="editor"><?php if(isset($leftText)):echo $leftText; endif; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Associate  Members Desciption</label>
                           <textarea name="associateText" class="form-control <?php if(isset($code) && $code==6):echo 'errorMsg'; endif; ?>" value="" id="editor1"><?php if(isset($associateText)):echo $associateText; endif; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Overseas Members Desciption</label>
                           <textarea name="overseasText" class="form-control <?php if(isset($code) && $code==6):echo 'errorMsg'; endif; ?>" value="" id="editor2"><?php if(isset($overseasText)):echo $overseasText; endif; ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="">Student  Members Desciption</label>
                           <textarea name="studentText" class="form-control <?php if(isset($code) && $code==6):echo 'errorMsg'; endif; ?>" value="" id="editor3"><?php if(isset($studentText)):echo $studentText; endif; ?></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                     </form>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
               <div class="card" style="overflow-x: auto; height:auto; ">
                  <div class="card-body">
                     <?php 
                        $query = "SELECT * FROM tbl_membership_details ORDER BY membership_detail_id_pk  DESC LIMIT 1";
                        $runQuery   =  $connect->query($query);
                        $dataObj    =  $runQuery->fetch_object();
                     ?>
                    <h4 class="card-title">Membership Details</h4>
                     <a href="../memberships?id=<?php echo $dataObj->membership_detail_id_pk; ?>" class="btn btn-primary btn-xs">Edit</a>
                    </p>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>Life Member:</th>
                          <th>Special Patron Member:</th>
                          <th>Associate Member:</th>
                          <th>Overseas</th>
                          <th>Students</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th><?php echo $dataObj->lifeMCost; ?></th>
                          <th><?php echo $dataObj->spacialPCost; ?></th>
                          <th><?php echo $dataObj->associateCost; ?></th>
                          <th><?php echo $dataObj->overseasCost; ?></th>
                          <th><?php echo $dataObj->studentCost; ?></th>
                        </tr>
                      </tbody>
                    </table>
                  <p>
                     <?php echo $dataObj->lifeMemberText; ?>
                  </p>   
                  <p>
                     <?php echo $dataObj->associateMembersText; ?>
                  </p> 
                  <p>
                     <?php echo $dataObj->overseasMembersText; ?>
                  </p> 
                  <p>
                     <?php echo $dataObj->studentMemberText; ?>
                  </p>                 
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
       ClassicEditor
       .create( document.querySelector( '#editor1' ) )
       .catch( error => {
           console.error( error );
       } );
       ClassicEditor
       .create( document.querySelector( '#editor2' ) )
       .catch( error => {
           console.error( error );
       } ); ClassicEditor
       .create( document.querySelector( '#editor3' ) )
       .catch( error => {
           console.error( error );
       } );
</script>