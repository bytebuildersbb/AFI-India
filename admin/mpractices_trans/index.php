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
                     <h4 class="card-title">Transaction History</h4>
                     <table class="table table-bordered table-responsive">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Customer Phone</th>
                              <th>Customer Email</th>
                              <th>Transaction Amount</th>
                              <th>Transaction Payment Id</th>
                              <th>Transaction Status</th>
                              <th>Transaction Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM upgrade_medical_practice_transaction ORDER BY id  DESC";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($row  = $runQuery->fetch_object()):

                           ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= $row->contact; ?></td>
                              <td><?= $row->email; ?></td>
                              <td><?= $row->amount; ?></td>
                              <td><?= $row->payment_id; ?></td>
                              <td><?= $row->status; ?></td>
                              <td><?= $row->created_at; ?></td>
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