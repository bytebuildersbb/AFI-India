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
                            <h4 class="card-title">Events List</h4>
                            <table class="table table-bordered table-responsives">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Event Title</th>
                                        <th>Event Description</th>
                                        <th>Event Start Date</th>
                                        <th>Event End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $query = "SELECT * FROM tbl_events ORDER BY id DESC";
            						    $runQuery   = $connect->query($query);
            						    $count = 1;
            						    while($row = $runQuery->fetch_object()){
            						        
            						        $startdate=date_create($row->event_start_date);
                                            $startdate =  date_format($startdate,"d M Y");
                                            $enddate=date_create($row->event_end_date);
                                            $enddate =  date_format($enddate,"d M Y");
                                    ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $row->event_title; ?></td>
                                            <td>
                                                <?= substr($row->event_description, 0, 500); ?>
                                            </td>
                                            <td><?php echo $startdate; ?></td>
                                            <td><?php echo $enddate; ?></td>
                                            <td>
                                                <a href="index.php?eId=<?php echo $row->id;?>" class="btn btn-outline-primary btn-xs">Edit</a>
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