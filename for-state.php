<?php include "layouts/main-header.php"; ?>


<div class="afi-blog pt-md-5 pb-md-5" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="headers">
            <h2 class="wow fadeInLeft">For State Goverment</h2>
            <!-- <p>Ayurveda is considered by many scholars to be the oldest healing science.</p> -->
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="container">
      <div id="accordion" class="accordion">
    <?php
    $select="select * from tbl_doctor_info where doctorType = '1' AND type='0' group by state_name  order by state_name";
        $ss    =     $connect->query($select);
        $ii=1;
        if(mysqli_num_rows($ss)>0){
        while($sss=mysqli_fetch_assoc($ss)){ 
        $designation=$sss['state_name'];
        ?>
         
  
        <div class="card mb-0">
            <div class="card-header collapsed" data-toggle="collapse" href="#collapse<?php echo $ii; ?>">
                <a class="card-title">
                   <?php echo $designation; ?>
                </a>
            </div>
            <div id="collapse<?php echo $ii; ?>" class="card-body collapse" data-parent="#accordion" >
                <div class="container-fluid">
   <div class="row">
               <?php 
         $query = "SELECT * FROM tbl_doctor_info WHERE type = '0' AND doctorType = '1' AND state_name='$designation'";
         $runQuery   =  $connect->query($query);
         while($row = $runQuery->fetch_object()){
      ?>
      
         <div class="col-md-4">
           <div class="ptrs-cont2" style="border-radius: 5px;height:440px !important;">
               <img src="admin/uploads/PDF/<?php echo $row->pdf_image; ?> " class="img-fluid" style="width:236px; height: 236px;">
               <h4 style="font-size: 18px; margin-top: 10px;"><?= $row->title; ?></h4>
               <p><a href="javascript:oo('<?php echo $row->pdf_file; ?>')">Read More</a></p>
               <!-- <p><a href="q.php?Find=<?php echo $row->doctor_info_id_pk; ?>" target="_blank">Read More</a></p> -->
               <h6><?php echo date("d-F-Y", strtotime($row->upload_on));  ?></h6>
            </div>
         </div>
         <?php } ?>
          </div>
         
          
            </div>
            </div>
         
          
            </div>
         <?php 
           $ii++;
         } } ?>   
            
            
        </div>
    </div>
</div>
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
              <!--  <img src="admin/uploads/PDF/<?php echo $row->pdf_file?>" style="max-width: 1100px !important">-->
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Understood</button>
               </div>
             </div>
           </div>
         </div>
<div class="clearfix"></div>
<?php 
include "layouts/main-footer.php";
?>
<script>
    oo=(img)=>{
      //  alert(img);
          $('#img2').attr("src","admin/uploads/PDF/"+img+"#toolbar=0");
         $('#editDayModell').modal('show');
    }
</script>