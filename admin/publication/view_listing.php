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
                            <h4 class="card-title">Publications List</h4>
                            <table class="table table-bordered table-responsives" id="tblUser">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Student/Practitioner</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM `tbl_foundingteamdownloadpdf` ORDER BY ft_id DESC";
            						    $runQuery   = $connect->query($query);
            						    $count = 1;
            						    while($row = $runQuery->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $row->f_name; ?></td>
                                            <td><?= $row->f_forstudent; ?></td>
                                            <td><?= $row->f_mobile; ?></td>
                                            <td><?= $row->f_email; ?></td>
                                            <td><?= $row->f_created; ?></td>
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
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );
</script>