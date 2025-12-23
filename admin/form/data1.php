<?php $title   =  "Membership List | Admin";
include "../layouts/main-header.php"; ?>
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
                      <?php if(isset($_GET['type'])){
                          if($_GET['type']==1){
                      ?>
                     <h4 class="card-title">Students</h4>

                   <form id="myForm" method="get" class="mb-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="type" value="1"> 
                        <div class="row">
                              <div class="col-2">
                              <select id="paymentStatusFilter" class="form-control" name="status">
                                 <option disabled>Select Payment status</option>
                              <option value="all" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'all') { echo 'selected'; } ?>>All</option>
                              <option value="failed" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'failed') { echo 'selected'; } ?>>Failed</option>
                              <option value="success" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'success') { echo 'selected'; } ?>>Success</option>
                              </select>
                        </div>
                        <div class="col-4">
                           <input type="submit" value="Filter" class="btn btn-primary">
                              <div class="float-left mr-2 <?php if(isset($_REQUEST['status']) && !empty($_REQUEST['status']) ) { echo 'd-block'; }else{ echo 'd-none'; } ?>">
                           <a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?type=1">Clear Filter</a>
                        </div>
                        </div>
                      
                        </div>
                        
                     </form>
                     <table class="table table-bordered table-responsive" >
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Type</th>
                               <th>Payment Status</th>
                                <th>Payment Amount</th>
                                <th>Certificate Share</th>
                                <th>Certificate Download</th>
                              <th>ProfilePic</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father's Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                              <th>Collage name</th>
                              <th>Id card pic</th>
                              <th>Enrollment no</th>
                             <th> Through whom did you come to know about Ayurveda Federation?</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                       
                        <?php 

                        if(isset($_REQUEST['status']) && $_REQUEST['status'] != 'all'){
                           $status = strtoupper($_REQUEST['status']);
                            $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_student ON tbl_pro_lect_member_form.id=tbl_if_member_student.pro_lect_member_id_fk where type_of=1 and tbl_if_member_student.paymentStatus = '".$status."' order by tbl_pro_lect_member_form.id desc";
                        }else{
                           $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_student ON tbl_pro_lect_member_form.id=tbl_if_member_student.pro_lect_member_id_fk where type_of=1 order by tbl_pro_lect_member_form.id desc";
                        }
                        	
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        	   
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                             <td>Student</td>
                             <td><?php echo $row["paymentStatus"]; ?></td>
                             <td><?php echo $row["payment"]; ?></td>
                               <?php if($row["paymentStatus"] == "SUCCESS"){ ?>
                              <td>  <a class='text-decoration-none text-xl pl-5' title='Download'  target="_blank" href='../membershippdf/pdf.php?image=<?php echo urlencode("https://afi-india.in/uploads/profilePics/" . $row["profile_pic"]); ?>&id=<?php echo urlencode($row['id']);?>&name=<?php echo urlencode($row["name"]); ?>&address=<?php echo urlencode($row["comaddress"]); ?>&fname=<?php echo urlencode($row["fathername"]);?>&pin=<?php echo urlencode($row["pinncode"]);?>&type=<?php echo urlencode('STUDENT'); ?>&mailid=<?php echo urlencode($row["mailid"]); ?>'><i class='icon-share fa-2x'></i></a></td>
                             <?php } else { ?>
                              <td></td>
                             <?php }?>
                              <?php if($row["paymentStatus"] == "SUCCESS"){ ?>
                              <td>  <a class='text-decoration-none text-xl pl-5' title='Download' target="_blank" href='../membershippdf/down.php?image=<?php echo urlencode("https://afi-india.in/uploads/profilePics/" . $row["profile_pic"]); ?>&id=<?php echo urlencode($row['id']);?>&name=<?php echo urlencode($row["name"]); ?>&address=<?php echo urlencode($row["comaddress"]); ?>&fname=<?php echo urlencode($row["fathername"]);?>&pin=<?php echo urlencode($row["pinncode"]);?>&type=<?php echo urlencode('STUDENT'); ?>&mailid=<?php echo urlencode($row["mailid"]); ?>'><i class='icon-cloud-download fa-2x'></i></a></td>
                             <?php } else { ?>
                              <td></td>
                             <?php }?>
                              <td>

                              <img src="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>">View</a>
                              </td>
                              <td><?= substr($row["name"],0,30); ?></td>
                              <td><?php if($row["gender"]==1){ echo "Male"; } if($row["gender"]==2){ echo "Female"; } if($row["gender"]==3){ echo "Transgender"; } ?></td>
                              <td><?= substr($row["fathername"],0,30); ?></td>
                              <td><?= substr($row["mailid"],0,30); ?></td>
                              <td><?= substr($row["numberBoth"],0,30); ?></td>
                              <td><?= substr($row["comaddress"],0,30); ?></td>
                              <td><?= substr($row["peraddress"],0,30); ?></td>
                              <td><?= substr($row["pinncode"],0,30); ?></td>
                              <td><?= substr($row["state"],0,30); ?></td>
                              <td><?= substr($row["nationality"],0,30); ?></td>
                              <td><?= substr($row["collage_name"],0,30); ?></td>
                              <td>
                              <img src="https://afi-india.in/uploads/idcards/<?php echo $row["id_card_pic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/idcards/<?php echo $row["id_card_pic"]; ?>">View</a>
                              </td>
                              
                              <td><?= substr($row["enrollment_no"],0,30); ?></td>
                            <td><?= substr($row["howDoYouKnw"],0,30); ?></td>
                            <td><?= substr($row["canYou"],0,30); ?></td>
                            <td><?= substr($row["yourtype"],0,30); ?></td>
                                <td><?php echo date("d-F-Y", strtotime($row["createdDate"]));  ?></td>
                            
                            
                            
                           </tr>
                       <?php $count++; endwhile; 	?>
                        </tbody>
                     </table>
                     <?php
                          }
                          
                               if($_GET['type']==2){
                      ?>
                     <h4 class="card-title">Doctors</h4>
                      <form id="myForm" method="get" class="mb-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="type" value="2"> 
                        <div class="row">
                              <div class="col-2">
                              <select id="paymentStatusFilter" class="form-control" name="status">
                                 <option disabled>Select Payment status</option>
                              <option value="all" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'all') { echo 'selected'; } ?>>All</option>
                              <option value="failed" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'failed') { echo 'selected'; } ?>>Failed</option>
                              <option value="success" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'success') { echo 'selected'; } ?>>Success</option>
                              </select>
                        </div>
                        <div class="col-4">
                           <input type="submit" value="Filter" class="btn btn-primary">
                              <div class="float-left mr-2 <?php if(isset($_REQUEST['status']) && !empty($_REQUEST['status']) ) { echo 'd-block'; }else{ echo 'd-none'; } ?>">
                           <a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?type=1">Clear Filter</a>
                        </div>
                        </div>
                      
                        </div>
                        
                     </form>
                      <table class="table table-bordered table-responsive" >
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Type</th>
                                <th>Payment Status</th>
                                <th>Payment Amount</th>
                                <th>Certificate Share</th>
                                <th>Certificate Download</th>
                              <th>ProfilePic</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father's Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                            
                              <th>Clinic address</th>
                   
                              <th>Registartion</th>
                              <th>Registered board</th>
                              <th> Through whom did you come to know about Ayurveda Federation?</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                             <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        if(isset($_REQUEST['status']) && $_REQUEST['status'] != 'all'){
                           $status = strtoupper($_REQUEST['status']);
                            $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_doctor ON tbl_pro_lect_member_form.id=tbl_if_member_doctor.pro_lect_member_id_fk where type_of=2 and tbl_if_member_doctor.paymentStatus = '".$status."' order by tbl_pro_lect_member_form.id desc";
                        }else{
                           $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_doctor ON tbl_pro_lect_member_form.id=tbl_if_member_doctor.pro_lect_member_id_fk where type_of=2 order by tbl_pro_lect_member_form.id desc";
                        }

                        	
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                             <td>Doctor</td>
                            <td><?php echo $row["paymentStatus"]; ?></td>
                             <td><?php echo $row["payment"]; ?></td>
                            <?php if($row["paymentStatus"] == "SUCCESS"){ ?>
                              <td>  <a class='text-decoration-none text-xl pl-5' title='Download' target="_blank" href='../membershippdf/pdf.php?image=<?php echo urlencode("https://afi-india.in/uploads/profilePics/" . $row["profile_pic"]); ?>&id=<?php echo urlencode($row['id']);?>&name=<?php echo urlencode($row["name"]); ?>&address=<?php echo urlencode($row["comaddress"]); ?>&fname=<?php echo urlencode($row["fathername"]);?>&pin=<?php echo urlencode($row["pinncode"]);?>&type=<?php echo urlencode('LIFETIME'); ?>&mailid=<?php echo urlencode($row["mailid"]); ?>'><i class='icon-share fa-2x'></i></a></td>
                             <?php } else { ?>
                              <td></td>
                             <?php }?>
                             <?php if($row["paymentStatus"] == "SUCCESS"){ ?>
                              <td>  <a class='text-decoration-none text-xl pl-5' title='Download' target="_blank" href='../membershippdf/down.php?image=<?php echo urlencode("https://afi-india.in/uploads/profilePics/" . $row["profile_pic"]); ?>&id=<?php echo urlencode($row['id']);?>&name=<?php echo urlencode($row["name"]); ?>&address=<?php echo urlencode($row["comaddress"]); ?>&fname=<?php echo urlencode($row["fathername"]);?>&pin=<?php echo urlencode($row["pinncode"]);?>&type=<?php echo urlencode('LIFETIME'); ?>&mailid=<?php echo urlencode($row["mailid"]); ?>'><i class='icon-cloud-download fa-2x'></i></a></td>
                             <?php } else { ?>
                              <td></td>
                             <?php }?>
                              <td>
                              <img src="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>">View</a>
                              </td>
                                 <td><?= substr($row["name"],0,30); ?></td>
                                <td><?php if($row["gender"]==1){ echo "Male"; } if($row["gender"]==2){ echo "Female"; } if($row["gender"]==3){ echo "Transgender"; } ?></td>
                              <td><?= substr($row["fathername"],0,30); ?></td>
                              <td><?= substr($row["mailid"],0,30); ?></td>
                              <td><?= substr($row["numberBoth"],0,30); ?></td>
                              <td><?= substr($row["comaddress"],0,30); ?></td>
                              <td><?= substr($row["peraddress"],0,30); ?></td>
                              <td><?= substr($row["pinncode"],0,30); ?></td>
                              <td><?= substr($row["state"],0,30); ?></td>
                              <td><?= substr($row["nationality"],0,30); ?></td>
                              
                     
                              
                              
                              <td><?= substr($row["clinic_address"],0,30); ?></td>
                       
                              
                              <td><?= substr($row["registartion"],0,30); ?></td>
                                <td><?= substr($row["registered_board"],0,30); ?></td>
                              
                   
                              <td><?= substr($row["howDoYouKnw"],0,30); ?></td>
                            <td><?= substr($row["canYou"],0,30); ?></td>
                            <td><?= substr($row["yourtype"],0,30); ?></td>
                            
                              <td><?php echo date("d-F-Y", strtotime($row["createdDate"]));  ?></td>
                            
                           </tr>
                       <?php $count++; endwhile; 	?>
                        </tbody>
                     </table>
                     <?php
                          }
                               if($_GET['type']==3){
                      ?>
                     <h4 class="card-title">Prof./Lect Data</h4>
                      <form id="myForm" method="get" class="mb-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="type" value="3"> 
                        <div class="row">
                              <div class="col-2">
                              <select id="paymentStatusFilter" class="form-control" name="status">
                                 <option disabled>Select Payment status</option>
                              <option value="all" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'all') { echo 'selected'; } ?>>All</option>
                              <option value="failed" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'failed') { echo 'selected'; } ?>>Failed</option>
                              <option value="success" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'success') { echo 'selected'; } ?>>Success</option>
                              </select>
                        </div>
                        <div class="col-4">
                           <input type="submit" value="Filter" class="btn btn-primary">
                              <div class="float-left mr-2 <?php if(isset($_REQUEST['status']) && !empty($_REQUEST['status']) ) { echo 'd-block'; }else{ echo 'd-none'; } ?>">
                           <a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?type=1">Clear Filter</a>
                        </div>
                        </div>
                      
                        </div>
                        
                     </form>
                         <table class="table table-bordered table-responsive" id="tblUser">
                        <thead>
                           <tr>
                              <th>S.No</th>
                                 <th>Type</th>
                                   <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>ProfilePic</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father's Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                            
                              
                    
                              <th>Id card pic</th>
                              <th>Qualification</th>
                               <th>Profession</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                         if(isset($_REQUEST['status']) && $_REQUEST['status'] != 'all'){
                           $status = strtoupper($_REQUEST['status']);
                            $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_prof_lect ON tbl_pro_lect_member_form.id=tbl_if_member_prof_lect.pro_lect_member_id_fk where type_of=3 and tbl_if_member_prof_lect.paymentStatus = '".$status."' order by tbl_pro_lect_member_form.id desc";
                        }else{
                           $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_prof_lect ON tbl_pro_lect_member_form.id=tbl_if_member_prof_lect.pro_lect_member_id_fk where type_of=3 order by tbl_pro_lect_member_form.id desc";
                        }
                        	
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                             <td>Prof./Lect</td>
                               <td><?php echo $row["paymentStatus"]; ?></td>
                             <td><?php echo $row["payment"]; ?></td>
                              <td>
                                  
                              <img src="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>">View</a>
                              </td>
                             <td><?= substr($row["name"],0,30); ?></td>
                                <td><?php if($row["gender"]==1){ echo "Male"; } if($row["gender"]==2){ echo "Female"; } if($row["gender"]==3){ echo "Transgender"; } ?></td>
                              <td><?= substr($row["fathername"],0,30); ?></td>
                              <td><?= substr($row["mailid"],0,30); ?></td>
                              <td><?= substr($row["numberBoth"],0,30); ?></td>
                              <td><?= substr($row["comaddress"],0,30); ?></td>
                              <td><?= substr($row["peraddress"],0,30); ?></td>
                              <td><?= substr($row["pinncode"],0,30); ?></td>
                              <td><?= substr($row["state"],0,30); ?></td>
                              <td><?= substr($row["nationality"],0,30); ?></td>
                             
                  
                              
                            
                              
                          
                                <td>
                                  
                              <img src="https://afi-india.in/uploads/idcards/<?php echo $row["idCard"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/idcards/<?php echo $row["idCard"]; ?>">View</a>
                              </td>
                              
                              <td><?= substr($row["qq"],0,30); ?></td>
                                  <td><?= substr($row["pp"],0,30); ?></td>
                                  
                                    <td><?= substr($row["canYou"],0,30); ?></td>
                            <td><?= substr($row["yourtype"],0,30); ?></td>
                             
                               <td><?php echo date("d-F-Y", strtotime($row["createdDate"]));  ?></td>
                            
                            
                           </tr>
                       <?php $count++; endwhile; 	?>
                        </tbody>
                     </table>
                     <?php
                          }
                           if($_GET['type']==4){
                      ?>
                     <h4 class="card-title">Pharmacy</h4>
                      <form id="myForm" method="get" class="mb-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="type" value="4"> 
                        <div class="row">
                              <div class="col-2">
                              <select id="paymentStatusFilter" class="form-control" name="status">
                                 <option disabled>Select Payment status</option>
                              <option value="all" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'all') { echo 'selected'; } ?>>All</option>
                              <option value="failed" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'failed') { echo 'selected'; } ?>>Failed</option>
                              <option value="success" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'success') { echo 'selected'; } ?>>Success</option>
                              </select>
                        </div>
                        <div class="col-4">
                           <input type="submit" value="Filter" class="btn btn-primary">
                              <div class="float-left mr-2 <?php if(isset($_REQUEST['status']) && !empty($_REQUEST['status']) ) { echo 'd-block'; }else{ echo 'd-none'; } ?>">
                           <a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?type=1">Clear Filter</a>
                        </div>
                        </div>
                      
                        </div>
                        
                     </form>
                         <table class="table table-bordered table-responsive" id="tblUser">
                        <thead>
                           <tr>
                              <th>S.No</th>
                                 <th>Type</th>
                                   <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>ProfilePic</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father's Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                          
                           <th>Qualification</th>
                               <th>Profession</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                  <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                        if(isset($_REQUEST['status']) && $_REQUEST['status'] != 'all'){
                           $status = strtoupper($_REQUEST['status']);
                            $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_pharmacy ON tbl_pro_lect_member_form.id=tbl_if_member_pharmacy.pro_lect_member_id_fk where type_of=4 and tbl_if_member_pharmacy.paymentStatus = '".$status."' order by tbl_pro_lect_member_form.id desc";
                        }else{
                           $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_pharmacy ON tbl_pro_lect_member_form.id=tbl_if_member_pharmacy.pro_lect_member_id_fk where type_of=4 order by tbl_pro_lect_member_form.id desc";
                        } 
                        	
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                             <td>Pharmacy</td>
                               <td><?php echo $row["paymentStatus"]; ?></td>
                             <td><?php echo $row["payment"]; ?></td>
                              <td>
                                  
                              <img src="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>">View</a>
                              </td>
                             <td><?= substr($row["name"],0,30); ?></td>
                                <td><?php if($row["gender"]==1){ echo "Male"; } if($row["gender"]==2){ echo "Female"; } if($row["gender"]==3){ echo "Transgender"; } ?></td>
                              <td><?= substr($row["fathername"],0,30); ?></td>
                              <td><?= substr($row["mailid"],0,30); ?></td>
                              <td><?= substr($row["numberBoth"],0,30); ?></td>
                              <td><?= substr($row["comaddress"],0,30); ?></td>
                              <td><?= substr($row["peraddress"],0,30); ?></td>
                              <td><?= substr($row["pinncode"],0,30); ?></td>
                              <td><?= substr($row["state"],0,30); ?></td>
                              <td><?= substr($row["nationality"],0,30); ?></td>
                              
                  
                              
                              <td><?= substr($row["qq"],0,30); ?></td>
                                  <td><?= substr($row["pp"],0,30); ?></td>
                                  
                                    <td><?= substr($row["canYou"],0,30); ?></td>
                            <td><?= substr($row["yourtype"],0,30); ?></td>
                              
                          
                              
                            
                             
                            
                              <td><?php echo date("d-F-Y", strtotime($row["createdDate"]));  ?></td>
                            
                           </tr>
                       <?php $count++; endwhile; 	?>
                        </tbody>
                     </table>
                     <?php
                          } if($_GET['type']==5){
                      ?>
                     <h4 class="card-title">Patron</h4>
                      <form id="myForm" method="get" class="mb-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="type" value="5"> 
                        <div class="row">
                              <div class="col-2">
                              <select id="paymentStatusFilter" class="form-control" name="status">
                                 <option disabled>Select Payment status</option>
                              <option value="all" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'all') { echo 'selected'; } ?>>All</option>
                              <option value="failed" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'failed') { echo 'selected'; } ?>>Failed</option>
                              <option value="success" <?php if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'success') { echo 'selected'; } ?>>Success</option>
                              </select>
                        </div>
                        <div class="col-4">
                           <input type="submit" value="Filter" class="btn btn-primary">
                              <div class="float-left mr-2 <?php if(isset($_REQUEST['status']) && !empty($_REQUEST['status']) ) { echo 'd-block'; }else{ echo 'd-none'; } ?>">
                           <a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?type=1">Clear Filter</a>
                        </div>
                        </div>
                      
                        </div>
                        
                     </form>
                         <table class="table table-bordered table-responsive" id="tblUser">
                        <thead>
                           <tr>
                              <th>S.No</th>
                                 <th>Type</th>
                                   <th>Payment Status</th>
                                <th>Payment Amount</th>
                                <th>Certificate Share</th>
                                <th>Certificate Download</th>
                              <th>ProfilePic</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father's Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                              <th>Qualification</th>
                               <th>Profession</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                  <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        if(isset($_REQUEST['status']) && $_REQUEST['status'] != 'all'){
                           $status = strtoupper($_REQUEST['status']);
                            $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_patron ON tbl_pro_lect_member_form.id=tbl_if_member_patron.pro_lect_member_id_fk where type_of=5 and tbl_if_member_patron.paymentStatus = '".$status."' order by tbl_pro_lect_member_form.id desc";
                        }else{
                           $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_patron ON tbl_pro_lect_member_form.id=tbl_if_member_patron.pro_lect_member_id_fk where type_of=5 order by tbl_pro_lect_member_form.id desc";
                        } 
                        	
                        	$runQuery 	=	$connect->query($query);
                        	$count = 1;
                        	while($row = $runQuery->fetch_assoc()):
                        ?>
                           <tr>
                              <td><?= $count; ?></td>
                             <td>Patron</td>
                               <td><?php echo $row["paymentStatus"]; ?></td>
                             <td><?php echo $row["payment"]; ?></td>
                               <?php if($row["paymentStatus"] == "SUCCESS"){ ?>
                              <td>  <a class='text-decoration-none text-xl pl-5' title='Download' target="_blank" href='../membershippdf/pdf.php?image=<?php echo urlencode("https://afi-india.in/uploads/profilePics/" . $row["profile_pic"]); ?>&id=<?php echo urlencode($row['id']);?>&name=<?php echo urlencode($row["name"]); ?>&address=<?php echo urlencode($row["comaddress"]); ?>&fname=<?php echo urlencode($row["fathername"]);?>&pin=<?php echo urlencode($row["pinncode"]);?>&type=<?php echo urlencode('PATRON'); ?>&mailid=<?php echo urlencode($row["mailid"]); ?>'><i class='icon-share fa-2x'></i></a></td>
                             <?php } else { ?>
                              <td></td>
                             <?php }?>
                             <?php if($row["paymentStatus"] == "SUCCESS"){ ?>
                              <td>  <a class='text-decoration-none text-xl pl-5' title='Download' target="_blank" href='../membershippdf/down.php?image=<?php echo urlencode("https://afi-india.in/uploads/profilePics/" . $row["profile_pic"]); ?>&id=<?php echo urlencode($row['id']);?>&name=<?php echo urlencode($row["name"]); ?>&address=<?php echo urlencode($row["comaddress"]); ?>&fname=<?php echo urlencode($row["fathername"]);?>&pin=<?php echo urlencode($row["pinncode"]);?>&type=<?php echo urlencode('PATRON'); ?>&mailid=<?php echo urlencode($row["mailid"]); ?>'><i class='icon-cloud-download fa-2x'></i></a></td>
                             <?php } else { ?>
                              <td></td>
                             <?php }?>
                              <td>
                              <img src="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>" style="width:50px; height:50px;"><a href="https://afi-india.in/uploads/profilePics/<?php echo $row["profile_pic"]; ?>">View</a>
                              </td>
                             <td><?= substr($row["name"],0,30); ?></td>
                                <td><?php if($row["gender"]==1){ echo "Male"; } if($row["gender"]==2){ echo "Female"; } if($row["gender"]==3){ echo "Transgender"; } ?></td>
                              <td><?= substr($row["fathername"],0,30); ?></td>
                              <td><?= substr($row["mailid"],0,30); ?></td>
                              <td><?= substr($row["numberBoth"],0,30); ?></td>
                              <td><?= substr($row["comaddress"],0,30); ?></td>
                              <td><?= substr($row["peraddress"],0,30); ?></td>
                              <td><?= substr($row["pinncode"],0,30); ?></td>
                              <td><?= substr($row["state"],0,30); ?></td>
                              <td><?= substr($row["nationality"],0,30); ?></td>
                                <td><?= substr($row["qq"],0,30); ?></td>
                                  <td><?= substr($row["pp"],0,30); ?></td>
                                  
                                    <td><?= substr($row["canYou"],0,30); ?></td>
                            <td><?= substr($row["yourtype"],0,30); ?></td>
                              
                          
                              
                            
                             
                            
                              <td><?php echo date("d-F-Y", strtotime($row["createdDate"]));  ?></td>
                             
                            
                            
                            
                           </tr>
                       <?php $count++; endwhile; 	?>
                        </tbody>
                     </table>
                     <?php
                          }
                          
                      }
                      ?>
                     
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
 jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );

</script>