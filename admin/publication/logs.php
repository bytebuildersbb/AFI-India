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
                            <h4 class="card-title">Publications Logs</h4>
                            <table class="table table-bordered table-responsives" id="tblUser">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Publication Title</th>
                                        <th>Member ID</th>
                                        <th>Phone</th>
                                        <th>Member/Non Member</th>
                                        <th>Checked At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM tbl_publication_logs as tpls LEFT JOIN tbl_publication as tp ON tpls.publication_id = tp.pub_id ORDER BY tpls.plog_id DESC";
            						    $runQuery   = $connect->query($query);
            						    $count = 1;
            						    while($row = $runQuery->fetch_object()){
            						       $date=date_create($row->checked_at);
                                    ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row->pub_title; ?></td>
                                            <td><?php if($row->who_watched == 0){echo $row->member_id;}else{echo "";} ?></td>
                                            <td><?php if($row->who_watched == 1){echo $row->member_id;}else{echo "";} ?></td>
                                            <td>
                                                <?php if($row->who_watched == '0'){echo 'Member';}else{echo 'Non Member';} ?>
                                            </td>
                                            <td><?php echo date_format($date,"d-m-Y H:i:s"); ?></td>
                                        </tr>
                                    <?php $count++; } 	?>
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