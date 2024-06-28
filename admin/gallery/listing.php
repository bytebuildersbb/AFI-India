<?php include "../layouts/main-header.php"; 

if(isset($_GET["dtId"])){
        $query = "Delete FROM tbl_gallery WHERE g_id = '".$_GET["dtId"]."'";
        $runQuerys   =  $connect->query($query);
        if($runQuerys){ ?>
            <script type="text/javascript">alert('Gallery Updated Succssfully');</script>
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
                            <h4 class="card-title">Gallery List</h4>
                            <table class="table table-bordered table-responsives" id="tblUser">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $q = "SELECT * FROM `tbl_gallery` ORDER BY g_id DESC";
            						    $runuery   = $connect->query($q);
            						    $count = 1;
            						    while($row = $runuery->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $row->title; ?></td>
                                            <td><?= $row->image; ?></td>
                                            <td>
                                                <a href="index.php?gId=<?php echo $row->g_id;?>" class="btn btn-outline-primary btn-xs">Edit</a> |
                                                <a href="listing.php?dtId=<?php echo $row->g_id;?>" class="btn btn-danger btn-xs">Delete</a>
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