<?php include "../layouts/main-header.php"; ?>
<?php 
	/*Update Slider*/
    if(isset($_GET["id"])){
      $id         =     $_GET["id"];
      $type       =     $_GET["type"];
      $query      =     "UPDATE `tbl_blog` SET `is_active`= '$type' WHERE blog_id_pk  = '$id'";
      $runQuery   =     $connect->query($query);
      if($runQuery){ ?>
         <?php if($type==1):?>
            <script>alert('Blog is activated');</script>
         <?php else: ?>
            <script>alert('Blog is dectivated');</script>
         <?php endif; ?>
      <?php }
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
                     <h4 class="card-title">Membership for Patron</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Membership Type</th>
                              <th>ProfilePic</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Company Address</th>
                              <th>Qualification</th>
                              
                              <th>Is doctor</th>
                              <th>Board Name</th>
                              <th>Certificate Img</th>
                              <th>Work Profile</th>
                              <th>State</th>
                              <th>PinCode</th>
                              
                               <th>Country</th>
                              <th>Nationality</th>
                              <th>Email ID</th>
                              <th>Contact No</th>
                              <th>whatsappNo</th>
                              <th>CreatedDate</th>
                            
                              
                              
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$query 		=	"SELECT * FROM tbl_membership_form order by membership_id_pk desc";
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <?php if($row["membershipType"]==0){
                                  ?>
                                   <td><?php echo "PATRON (or Doctor)"; ?> </td>
                                  <?php
                              }
                              elseif($row["membershipType"]==1){
                                  ?>
                                 <td> <?php echo "ASSOCIATE MEMBER"; ?></td>
                                  <?php
                                  
                              }
                              else{
                                  ?>
                                 <td>  <?php echo "OVERSEAS MEMBER"; ?></td>
                                  <?php
                              } ?>
                             
                              <td>
                                  
                              <img src="https://afi-india.in/uploads/profilePics/<?php echo $row["profilePic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/profilePics/<?php echo $row["profilePic"]; ?>">View</a>
                              </td>
                              <td><?= substr($row["name"],0,30); ?></td>
                              
                              <td><?= substr($row["address"],0,30); ?></td>
                              
                              <td><?= substr($row["company_address"],0,30); ?></td>
                              
                              <td><?= substr($row["qualification"],0,30); ?></td>
                        <?php if($row["if_doctor"]==1){
                            ?>
                            <td><?php echo "Yes"; ?></td>
                            <?php
                        }
                       if($row["if_doctor"]==2){  ?>
                            <td><?php echo "No"; ?></td>
                          
                            <?php
                        } ?>
                              
                              
                              <td><?= substr($row["boardName"],0,30); ?></td>
                              
                          
                                <td>
                                  
                              <img src="https://afi-india.in/uploads/certificate/<?php echo $row["certificateImg"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/certificate/<?php echo $row["profilePic"]; ?>">View</a>
                              </td>
                              
                              <td><?= substr($row["workProfile"],0,30); ?></td>
                              
                              <td><?= substr($row["state"],0,30); ?></td>
                              
                              
                              <td><?= substr($row["pinCode"],0,30); ?></td>
                              
                              <td><?= substr($row["country"],0,30); ?></td>
                              
                              <td><?= substr($row["nationality"],0,30); ?></td>
                               <td><?= substr($row["email_ID"],0,30); ?></td>
                              <td><?= substr($row["contactNo"],0,30); ?></td>
                              
                              <td><?= substr($row["whatsappNo"],0,30); ?></td>
                             
                              <td><?php echo date("d-F-Y", strtotime($row["createdDate"]));  ?></td>
                            
                            
                           </tr>
                       <?php $count++; endwhile; 	?>
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