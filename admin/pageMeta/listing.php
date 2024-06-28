<?php include "../layouts/main-header.php"; 

if(isset($_GET["pmId"])){
        $query = "Delete FROM tbl_page_meta WHERE meta_id_pk = '".$_GET["pmId"]."'";
        $runQuerys   =  $connect->query($query);
        if($runQuerys){ ?>
            <script type="text/javascript">alert('Page Meta Updated Succssfully');</script>
        <?php }
    }?>
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
                            <h4 class="card-title">Page Meta List</h4>
                            <table class="table table-bordered table-responsives" id="tblUser">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Page Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM `tbl_page_meta` ORDER BY meta_id_pk DESC";
            						    $runQuery   = $connect->query($query);
            						    $count = 1;
            						    while($row = $runQuery->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $row->pageName; ?></td>
                                            <td>
                                                <a href="index.php?pmId=<?php echo $row->meta_id_pk;?>" class="btn btn-outline-primary btn-xs">Edit</a> |
                                                <a href="listing.php?pmId=<?php echo $row->meta_id_pk;?>" class="btn btn-danger btn-xs">Delete</a>
                                            </td>
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