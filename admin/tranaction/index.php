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
                              <th>#</th>
                              <th>Customer Name</th>
                              <th>Customer Email</th>
                              <th>Customer Phone</th>
                              <th>TXN Amount</th>
                              <th>TXN Status</th>
                              <th>TXN Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM tbl_id_card ORDER BY tbl_id_card_pk DESC";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($row  = $runQuery->fetch_object()):
                           ?>
                           <tr>
                              <td><?= $count; ?></td>
                              <td><?= $row->name; ?></td>
                              <td><?= $row->email; ?></td>
                              <td><?= $row->mob; ?></td>
                              <td><?= $row->payment; ?></td>
                              <td><?= $row->paymentStatus; ?></td>
                              <td><?= $row->tymstamp; ?></td>
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