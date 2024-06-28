<?php 
include "layouts/main-header.php";
?>
<style>
.modal-dialog {
    max-width: 1140px !important;

}
#toys-grid {
   margin-bottom: 30px;
}
#toys-grid .txt-heading {
   background-color: #D3F5B8;
}
#toys-grid table {
   width: 100%;
   background-color: #F0F0F0;
}
#toys-grid table td {
   background-color: #FFFFFF;
}
.search-box {
   border: 1px solid #F0F0F0;
   background-color: #C8EEFD;
   margin: 2px 0px;
}
.demoInputBox {
   padding: 10px;
   border: #F0F0F0 1px solid;
   border-radius: 4px;
   margin: 0px 5px
}
.btnSearch {
   padding: 10px;
   border: #F0F0F0 1px solid;
   border-radius: 4px;
   margin: 0px 5px;
}
.perpage-link {
   padding: 5px 10px;
   border: #C8EEFD 2px solid;
   border-radius: 4px;
   margin: 0px 5px;
   background: #FFF;
   cursor: pointer;
}
.current-page {
   padding: 5px 10px;
   border: #C8EEFD 2px solid;
   border-radius: 4px;
   margin: 0px 5px;
   background: #C8EEFD;
}
.btnEditAction {
   background-color: #2FC332;
   padding: 2px 5px;
   color: #FFF;
   text-decoration: none;
}
.btnDeleteAction {
   background-color: #D60202;
   padding: 2px 5px;
   color: #FFF;
   text-decoration: none;
}
#btnAddAction {
   background-color: #09F;
   border: 0;
   padding: 5px 10px;
   color: #FFF;
   text-decoration: none;
}
#frmToy {
   border-top: #F0F0F0 2px solid;
   background: #FAF8F8;
   padding: 10px;
}
#frmToy div {
   margin-bottom: 15px
}
#frmToy div label {
   margin-left: 5px
}
.error {
   background-color: #FF6600;
   border: #AA4502 1px solid;
   padding: 5px 10px;
   color: #FFFFFF;
   border-radius: 4px;
}
.info {
   font-size: .8em;
   color: #FF6600;
   letter-spacing: 2px;
   padding-left: 5px;
}
.blog-box p {
  text-align: center !important;
}

.ptrs-cont2{
   background-color: #fff !important;
   border-bottom: 5px solid #5697d2;
   padding: 15px 25px;
   margin: 20px auto 20px;
   z-index: 99999;
   box-shadow: 5px 10px 18px rgb(0 0 0 / 30%);
   /* position: relative; */
   top: -100%;
}
</style>
</head>
<div class="clearfix"></div>
<div class="afi-blog pt-md-5 pb-md-5" style="position: relative;">
   <div class="container">
      <div class="row">
         <div class="headers">
            <h2 class="wow fadeInLeft">Information for doctors</h2>
            <!-- <p>Ayurveda is considered by many scholars to be the oldest healing science.</p> -->
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="container-fluid">
   <div class="row">
      <?php 
         $query = "SELECT * FROM tbl_doctor_info WHERE type = '0' ORDER BY doctor_info_id_pk DESC";
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
                <img src="admin/uploads/PDF/<?php echo $row->pdf_image?>" style="max-width: 1100px !important">
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
