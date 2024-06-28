<?php include "layouts/main-header.php"; ?>

	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Related Links</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Related Links</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- .hx-team-area start -->
    <div class="team-area clear-fix">
        <div class="container">
             <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <span>Links</span>
                    <h2>Related Links</h2>
                </div>
            </div>
			<table class="table table-striped table-hover">
                <tbody>
					<tr>
						<th colspan="2" style="background-color: #343a40;color: #fff;">Central Government</th>
					</tr>
					<?php 
						$query = "SELECT * FROM tbl_related_link ORDER BY shortingOrder";
						$runQuery = $connect->query($query);
						while($row = $runQuery->fetch_object()){
					  ?>
					  <tr class="even">
						 <td><?= $row->linkTitle; ?></td>
						 <td><a href="<?= $row->linkURL; ?> " target="_blank"><?= $row->linkURL; ?></a></td>
					  </tr>
					<?php } ?>
                </tbody>
			</table>
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