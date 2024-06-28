<?php include "../layouts/main-header.php"; ?>

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
                     <h4 class="card-title">Course Data</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Course Name</th>
                                <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                              <th>Father's / Husband</th>
                              <th>DOB</th>
                              <th>Address</th>
                              <th>Pincode</th>
                              <th>State</th>
                              <th>Mobile No</th>
                              <th>Email</th>
                               <th>Application</th>
                                <th>AFI Member</th>
                               <th>Member No</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM tbl_application_form INNER JOIN tbl_course ON tbl_application_form.course_table_fk=tbl_course.course_id_pk order by application_id_pk desc";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($row  = $runQuery->fetch_object()):
                           ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= $row->course_name; ?></td>
                                  <td><?= $row->paymentStatus; ?></td>
                                      <td><?= $row->paymentAmount; ?></td>
                              <td><?= $row->name; ?></td>
                              <td><?= $row->father_husband_guardian_name; ?></td>
                              <td><?= $row->dob; ?></td>
                              <td><?= $row->address; ?></td>
                              <td><?= $row->pincode; ?></td>
                              <td><?= $row->state; ?></td>
                              
                              <td><?= $row->mobileNo; ?></td>
                              <td><?= $row->emailId; ?></td>
                              <td><?= $row->application_for; ?></td>
                            <td><?php if($row->member_type==1){ echo "Member";}
                            else { echo "Not A Member"; }
                            ?></td>
                              <td><?= $row->IDCArd; ?></td>
                           </tr>
                        <?php  $count++; endwhile; ?>
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