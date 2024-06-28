<!-- upgrade_medical_form -->

<?php 
    ob_start();
   $title   =  "Medical Practices List | Admin";
   $keyword    = 'Keyword | Admin';
   include "../layouts/main-header.php";
?>
<style>
   a.btn i {
    color: red;
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
         <div class="row">
            <div class="col-12 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <h3>Medical Practices List</h3>
                     <table class="table table-bordered table-responsive" id="tblUser" >
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Mobile</th>
                              <th>Status</th>
                              <th>Amount</th>
                              <th>Whatsapp</th>
                              <th>Email</th>
                              <th>Address</th>
                              <th>Pincode</th>
                              <th>Coupon Applied</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM upgrade_medical_form where display = 1 ORDER BY id DESC";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($dataObj    = $runQuery->fetch_object()):
                                $status_query = "SELECT status, amount FROM upgrade_medical_practice_transaction WHERE contact = '{$dataObj->mobile}'";
                              $status_result = $connect->query($status_query);
                              $status_data = $status_result->fetch_object();

                               $status = ($status_data) ? $status_data->status : '<span class="text-warning font-weight-bold">Pending</span>';
                               $amount = ($status_data) ? '₹ '. $status_data->amount : '';
                           ?>
                           <tr>
                                  <td><?= $count; ?></td>
                                 <td><?= ucfirst($dataObj->name); ?></td>
                                 <td><?= ucfirst($dataObj->mobile); ?></td>
                                 <td><?= $status; ?></td>
                                 <td><?= $amount ?></td>
                                 <td><?= ucfirst($dataObj->whatsapp); ?></td>
                                 <td><?= ucfirst($dataObj->email); ?></td>
                                 <td><?= ucfirst($dataObj->address); ?></td>
                                 <td><?= ucfirst($dataObj->pincode); ?></td>
                                 <td><?= ucfirst($dataObj->coupon_applied); ?></td>
                                 <td> <a class="btn " onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $dataObj->id; ?>" title="Delete"><i class='icon-trash '></i></a></td>
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