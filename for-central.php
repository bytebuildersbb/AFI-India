<?php include "layouts/main-header.php"; ?>

<div class="afi-blog pt-md-5 pb-md-5" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="headers">
            <h2 class="wow fadeInLeft">For Central Goverment</h2>
            <!-- <p>Ayurveda is considered by many scholars to be the oldest healing science.</p> -->
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="container-fluid">
   <div class="row">
      <?php 
         $query = "SELECT * FROM tbl_doctor_info WHERE type = '0' AND doctorType = '2' ORDER BY doctor_info_id_pk DESC";
         $runQuery   =  $connect->query($query);
         while($row = $runQuery->fetch_object()){
      ?>
         <div class="col-md-3">
           <div class="ptrs-cont2" style="border-radius: 5px;">
               <img src="admin/uploads/PDF/<?php echo $row->pdf_image; ?> " class="img-fluid" style="width:236px; height: 236px;">
               <h4 style="font-size: 18px; margin-top: 10px; text-align: justify;"><?= substr($row->title,0,55); ?></h4>
               <p><a href="#" data-toggle="modal"  data-target="#staticBackdrop<?php echo $row->doctor_info_id_pk; ?>"  id="<?php echo $row->doctor_info_id_pk; ?>">Read More</a></p>
               <!-- <p><a href="q.php?Find=<?php echo $row->doctor_info_id_pk; ?>" target="_blank">Read More</a></p> -->
               <h6><?php echo date("d-F-Y", strtotime($row->upload_on));  ?></h6>
            </div>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="staticBackdrop<?php echo $row->doctor_info_id_pk; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
           <div class="modal-dialog modal-xl">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row->title; ?></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                <img src="admin/uploads/PDF/<?php echo $row->pdf_file?>" style="max-width: 1100px !important">
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Understood</button>
               </div>
             </div>
           </div>
         </div>
      <?php } ?>
   </div>
</div>
<
<div class="clearfix"></div>
<?php 
include "layouts/main-footer.php";
?>
