<?php include "../layouts/main-header.php"; 

if(isset($_GET["dpId"])){
        $query = "Delete FROM tbl_publication WHERE pub_id = '".$_GET["dpId"]."'";
        $runQuerys   =  $connect->query($query);
        if($runQuerys){ ?>
            <script type="text/javascript">alert('Publication Updated Succssfully');</script>
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
                            <h4 class="card-title">Publications List</h4>
                            <table class="table table-bordered table-responsives" id="tblUser">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM `tbl_publication` ORDER BY pub_id DESC";
            						    $runQuery   = $connect->query($query);
            						    $count = 1;
            						    while($row = $runQuery->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $row->pub_title; ?></td>
                                            <td>
                                                <?= substr($row->pub_shortdesc, 0, 100); ?>
                                            </td>
                                            <td>
                                                <a href="index.php?pId=<?php echo $row->pub_id;?>" class="btn btn-outline-primary btn-xs">Edit</a> |
                                                <a href="listing.php?dpId=<?php echo $row->pub_id;?>" class="btn btn-danger btn-xs">Delete</a>
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