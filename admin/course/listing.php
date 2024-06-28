<?php include "../layouts/main-header.php"; ?>
<?php 
	if(isset($_REQUEST['dId'])){
	    if($_REQUEST['check']=="disable")
	    {
	      $query = "UPDATE `tbl_course` SET `if_enable`=0 WHERE course_id_pk = '".$_REQUEST['dId']."'";
         $runQuery   =  $connect->query($query); 
         if($runQuery){ ?>
			<script>alert('Course Disable Successfully');</script>
		<?php }
	    }
	    else{
	       $query = "UPDATE `tbl_course` SET `if_enable`=1 WHERE course_id_pk = '".$_REQUEST['dId']."'";
         $runQuery   =  $connect->query($query); 
         	if($runQuery){ ?>
			<script>alert('Course Enable Successfully');</script>
		<?php }
	    }
	}
?>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <div class="col-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <h4 class="card-title">Blog List</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Course Name</th>
                              <th>Course Duration</th>
                              <th>Course Details</th>
                              <th>Course Fee</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	 $query = "SELECT * FROM tbl_course ORDER BY course_id_pk DESC";
						        $runQuery   = $connect->query($query);
						        $count = 1;
						                while($row = $runQuery->fetch_object()){
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= $row->course_name; ?></td>
                              <td>
                                <?= $row->course_duration; ?>
                              </td>
                              <td><?= $row->course_details; ?></td>
                              <td><?= $row->course_fee; ?></td>
                              <td>
                             <a href="index.php?eId=<?php echo $row->course_id_pk;?>" class="btn btn-outline-primary btn-xs">Edit</a>
                               <?php if($row->if_enable==1){
                                   ?>
                               <a href="listing.php?dId=<?php echo $row->course_id_pk;?>&check=disable" class="btn btn-outline-danger btn-xs">Click here to Disable Course</a>
                                   <?php
                               } else{
                                   ?>
                                 
                                <a href="listing.php?dId=<?php echo $row->course_id_pk;?>&check=enable" class="btn btn-outline-danger btn-xs">Click here to Enable Course</a>
                                    
                                   <?php
                               } ?>
                               
                              </td>
                           </tr>
                       <?php $count++; }; 	?>
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