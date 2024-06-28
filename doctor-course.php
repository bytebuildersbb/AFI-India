<?php include "layouts/main-header.php";  ?>

<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Courses</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Courses</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- .hx-team-area start -->
    <div class="team-area clear-fix pt-5 ">
        <div class="container">
             <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <span>Courses</span>
                    <h2>Doctor  Courses</h2>
                </div>
            </div>
            <div class="table-responsive">
               <table class="table table-bordered  table-striped table-hover">
                     <thead class="bg-warning">
                        <tr>
                            <th>S.No</th>
                            <th>Course Name</th>
                            <th>Duration of Course</th>
                            <th>Course Details</th>
                            <th>Course Fees</th>
                            <!--<th>Prospects</th>-->
                            <th>Registration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
							$query = "SELECT * FROM tbl_course where if_enable=1 AND course_type=2 or course_type=3 ORDER BY course_id_pk DESC";
							$runQuery   = $connect->query($query);
							$count = 1;
							while($row = $runQuery->fetch_assoc()){
								if(($row['course_name'] != "") && ($row['course_duration']!="") ){
						?>
							<tr>
								<td><?= $count; ?></td>
								<td><?= $row['course_name']; ?></td>
								<td><?= $row['course_duration']; ?></td>
								<td><?= $row['course_details']; ?></td>
								<td><?= $row['course_fee']; ?></td>
								<!--<td><button type="button" class="btn btn-success" onclick="opn('<?php echo $row['pdf']; ?>')">View</button></td>-->
								<?php
                                $course_type = $row['course_type']; 
                                if ($course_type == 2) {
                                    // For course_type = 2
                                    $href = "PayForCourse.php";
                                } elseif ($course_type == 3) {
                                    // For course_type = 3
                                    $href = "https://afi-india.in/upgrade-medical-practice/";
                                } else {
                                    // Handle other cases if needed
                                }
                                echo '<td><a class="btn btn-info" href="' . $href . '">Click Here</a></td>';
                                ?>
							</tr>
						
						<?php $count++; }else{ } } ?>
                    </tbody>
                </table>
             </div>
         </div>
    </div>
    <!-- .hx-team-area end -->


    <!-- Modal -->
    <div class="modal fade" id="editDayModell" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="" frameborder="0" width="100%" height="600px" id="img2">
                    <!--  <img src="admin/uploads/PDF/" style="max-width: 1100px !important">-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--   <a href="" id="dn" target="_blank">Download</a>
                    <button type="button" class="btn btn-primary">Download</button>-->
                </div>
            </div>
        </div>
    </div>
	

<?php include "layouts/main-footer.php"; ?>
<script>
    opn=(img)=>{
    //admin/uploads/PDF/<?php echo $row->pdf_file?>
    //alert(img);
    //$('#img2').attr("src","admin/uploads/PDF/"+img+"#toolbar=0");
        $('#img2').attr("src","admin/uploads/PDF/"+img);
        $("#dn").prop("href", "https://afi-india.in/admin/uploads/PDF/"+img);
        $('#editDayModell').modal('show');
    }
</script>