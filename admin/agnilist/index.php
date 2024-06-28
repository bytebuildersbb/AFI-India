<!-- tbl_foundingteamdownloadpdf -->

<?php 
   $title   =  "Aginvesh Journal List | Admin";
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
                     <h3>Aginvesh Journal List</h3>
                     <table class="table table-bordered table-responsives" id="tblUser">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Mobile</th>
                              <th>Email</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $query = "SELECT * FROM tbl_foundingteamdownloadpdf ORDER BY f_id DESC";
                              $runQuery   =  $connect->query($query);
                              $count = 1;
                              while($dataObj    = $runQuery->fetch_object()):
                           ?>
                           <tr>
                                 <td><?= $count; ?></td>
                                 <td><?= ucfirst($dataObj->f_name); ?></td>
                                 <td><?= ucfirst($dataObj->f_mobile); ?></td>
                                 <td><?= ucfirst($dataObj->f_email); ?></td>
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