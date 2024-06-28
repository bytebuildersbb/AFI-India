<?php 
   $title   =  "Subscribers List | Admin";
   $description = 'Subscribers | Admin';
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
                     <h3>Newsletter Subscribers</h3>
                     <table class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Email</th>
                              <th>Subscribe Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM tbl_subscribe ORDER BY subscribe_id_pk DESC";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($dataObj    = $runQuery->fetch_object()):
                           ?>
                           <tr>
                                 <td><?= $count; ?></td>
                                 <td><?= ucfirst($dataObj->emailID); ?></td>
                                 <td><?= ucfirst($dataObj->createAt); ?></td>
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