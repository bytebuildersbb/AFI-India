<?php include "../layouts/main-header.php"; 

if(isset($_GET["bcId"])){
        $query = "Delete FROM tbl_blog_category WHERE blog_category_id_pk = '".$_GET["bcId"]."'";
        $runQuerys   =  $connect->query($query);
        if($runQuerys){ ?>
            <script type="text/javascript">alert('Blog category Updated Succssfully');</script>
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
                            <h4 class="card-title">Blog Category List</h4>
                            <table class="table table-bordered table-responsives" id="tblUser">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM `tbl_blog_category` ORDER BY blog_category_id_pk DESC";
            						    $runQuery   = $connect->query($query);
            						    $count = 1;
            						    while($row = $runQuery->fetch_object()){
                                    ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $row->categoryName; ?></td>
                                            <td>
                                                <a href="createcategory.php?bcId=<?php echo $row->blog_category_id_pk;?>" class="btn btn-outline-primary btn-xs">Edit</a> |
                                                <a href="catlisting.php?bcId=<?php echo $row->blog_category_id_pk;?>" class="btn btn-danger btn-xs">Delete</a>
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