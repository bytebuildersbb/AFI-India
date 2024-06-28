<!-- upgrade_medical_form -->

<?php 
   $title   =  "Health-Ambassador List | Admin";
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
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
                     <h3>Health-Ambassador List</h3>
                     <table class="table table-bordered table-responsive" id="tblUser" >
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>Address</th>
                              <th>Pincode</th>
                              <th>Coupon Applied</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM health_ambassador_form ORDER BY id DESC";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($dataObj    = $runQuery->fetch_object()):
                           ?>
                           <tr>
                                 <td><?= $count; ?></td>
                                 <td><?= ucfirst($dataObj->name); ?></td>
                                 <td><?= ucfirst($dataObj->mobile); ?></td>
                                 <td><?= ucfirst($dataObj->email); ?></td>
                                 <td><?= ucfirst($dataObj->address); ?></td>
                                 <td><?= ucfirst($dataObj->pincode); ?></td>
                                 <td><?= ucfirst($dataObj->coupon_applied); ?></td>
                           </tr>
                        <?php $count++;  endwhile; ?>
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
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );
</script>