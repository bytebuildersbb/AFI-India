<?php 
    $title   =  "Events Section | Admin";
    $description = 'Best Event | Admin';
    $keyword    = 'Best Ayurveda Event | Admin';
    include "../layouts/main-header.php";
     
    if(isset($_POST["storeEvent"])){
       
        $event_title       =  $_POST["event_title"];
        $event_description =  $_POST["event_description"];
        $event_start_date  =  $_POST["event_start_date"];
        $event_end_date    =  $_POST["event_end_date"];
        $event_location    =  $_POST["event_location"];
        $eventFile         =  $_FILES["event_thumbnail"]["name"];
        $eventFileTmp      =  $_FILES["event_thumbnail"]["tmp_name"];
        $eventSize         =  $_FILES["event_thumbnail"]["size"];
        $eventType         =  $_FILES["event_thumbnail"]["type"];
       
        $allowed_pdf = array( "png", "jpg", "pdf", "PDF", "jpeg" );
        
        $eventImageName      =     explode(".", $eventFile);
        $pdfNew              =     round(microtime(true)) . 'PDF.' . end($eventImageName);
        $pdfImgExtention     =     pathinfo($eventFile, PATHINFO_EXTENSION);
        
        if($event_title == ""){
            $errorMsg=  "Please enter Event Title.";
            $code= "1";
        }else if($event_description == ""){
            $errorMsg=  "Please enter Event Description";
            $code= "2";
        }else if($event_start_date == ""){
            $errorMsg=  "Please enter Event Start Date.";
            $code= "3";
        }else if($event_end_date == ""){
            $errorMsg=  "Please enter Event End Date";
            $code= "4";
        }else{
            strcmp($eventFileTmp,'../uploads/events/'.$pdfNew); 
            $query = "INSERT INTO `tbl_events`(`event_title`, `event_description`, `event_thumbnail`, `event_start_date`,`event_end_date`,`event_location`) VALUES ('$event_title','$event_description','$pdfNew','$event_start_date','$event_end_date','$event_location')";
            $runQuery   =  $connect->query($query);
            if($runQuery){
                $errorMsg=  "Event create succssfully";
                $code= "5";
            }
        }
        
    }

    
    /*========= Edit Form ===============*/
    
    if(isset($_POST["editEvent"])){
        $id                 =   $_GET["eId"];
        $eventFile          =   $_FILES["event_thumbnail"]["name"];
        $eventFileTmp       =   $_FILES["event_thumbnail"]["tmp_name"];
        $eventSize          =   $_FILES["event_thumbnail"]["size"];
        $eventType          =   $_FILES["event_thumbnail"]["type"];
        
        $event_title        =   $_POST["event_title"];
        $event_description  =   $_POST["event_description"];
        $event_start_date   =  $_POST["event_start_date"];
        $event_end_date     =  $_POST["event_end_date"];
        $event_location     =  $_POST["event_location"];
          
        $eventImageName     =     explode(".", $eventFile);
        $pdfNew             =     round(microtime(true)) . 'PDF.' . end($eventImageName);
        
        if(empty($eventFile)){
            $previewPDF    =  $_POST["ifPDFempty"];
        }else{
            $previewPDF    =  $pdfNew;
            strcmp($eventFileTmp,'../uploads/events/'.$pdfNew); 
        }
        
        $query = "UPDATE `tbl_events` SET `event_title`='$event_title',`event_description`='$event_description',`event_thumbnail`='$previewPDF',`event_start_date`='$event_start_date',`event_end_date`='$event_end_date', `event_location`='$event_location' WHERE id = '".$id."'";
        $runQuery   =  $connect->query($query);
        if($runQuery){ ?>
            <script type="text/javascript">alert('Event Update Succssfully');</script>
        <?php }
    }
?>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<style type="text/css">
   .ck-content>p{
   height: 200px !important;
   }
</style>
<style type="text/css" >
   .errorMsg{border:1px solid red; }
   .message{color: red;
   font-weight: 100;
   font-size: 12px;
   font-style: normal;}
</style>
<div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <?php include "../layouts/top-navbar.php"; ?>
   <!-- partial -->
   <?php include "../layouts/left-navbar.php"; ?>
   <!-- partial -->
   <?php 
      if(isset($_GET["eId"])){ ?>
         <?php
            $id   =   $_GET["eId"];
            $query = "SELECT * FROM tbl_events WHERE id = '".$id."'";
            $runQuery   =  $connect->query($query);
            $dataObj    =  $runQuery->fetch_object();
          
         ?>
         <div class="main-panel">
         <div class="content-wrapper">
            <div class="row">
                 <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body">
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Events</h4>
                        <p class="card-description">Create Event</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Event Title</label>
                              <input type="text" class="form-control" name="event_title" placeholder="Event Title" value="<?= $dataObj->event_title; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Event Description</label>
                                <textarea class="form-control" name="event_description" id="editor" rows="15" ><?= $dataObj->event_description; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Event Start Date</label>
                                <input type="text" name="event_start_date" class="form-control datepicker" placeholder="Event Start Date" value="<?= $dataObj->event_start_date; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Event End Date</label>
                                <input type="text" name="event_end_date" class="form-control" placeholder="Event End Date" value="<?= $dataObj->event_end_date; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Event Location</label>
                                <input type="text" name="event_location" class="form-control" placeholder="Event Location" value="<?= $dataObj->event_location; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Event Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="event_thumbnail" placeholder="Upload Image">
                                    <input type="hidden" name="ifPDFempty" value="<?php echo $dataObj->event_thumbnail; ?>">
                                </div>
                            </div>
                            
                           <button type="submit" name="editEvent" class="btn btn-primary mr-2">Update</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php }else{ ?>
      <div class="main-panel">
         <div class="content-wrapper">
            <div class="row">
               <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-body">
                        <?php if(isset($code) && $code == 5): ?>
                        <div class="alert alert-success" role="alert"><?php echo $errorMsg; ?></div>
                        <?php endif; ?>
                        <h4 class="card-title">Events</h4>
                        <p class="card-description">Create Event</p>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Event Title</label>
                                <input type="text" class="form-control <?php if(isset($code) && $code==1): echo 'errorMsg'; endif;?>" name="event_title" placeholder="Event Title" value="<?php if(isset($courseName)){echo $courseName;} ?>">
                                <?php if (isset($code) && $code==1) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleTextarea1">Event Description</label>
                                <textarea class="form-control <?php if(isset($code) && $code==3): echo 'errorMsg'; endif;?>" name="event_description" id="editor" rows="15" ><?php if(isset($courseDetails)){echo $courseDetails;} ?></textarea>
                                <?php if (isset($code) && $code==3) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Event Start Date</label>
                                <input type="text" name="event_start_date" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" placeholder="Event Start Date" value="<?php if(isset($cDuration)){echo $cDuration;} ?>">
                                <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Event End Date</label>
                                <input type="text" name="event_end_date" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" placeholder="Event End Date" value="<?php if(isset($cDuration)){echo $cDuration;} ?>">
                                <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Event Location</label>
                                <input type="text" name="event_location" class="form-control <?php if(isset($code) && $code==2): echo 'errorMsg'; endif;?>" placeholder="Event Location" value="<?php if(isset($cDuration)){echo $cDuration;} ?>">
                                <?php if (isset($code) && $code==2) { echo "<span class='message'>" .$errorMsg. "</span>" ;} ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Event Thumbnail</label>
                                <div class="input-group col-xs-12 col-lg-6 row">
                                    <input type="file" class="form-control file-upload-info" name="event_thumbnail" placeholder="Upload Image" required>
                                </div>
                            </div>
                            
                           <button type="submit" name="storeEvent" class="btn btn-primary mr-2">Submit</button>
                           <button class="btn btn-light">Cancel</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php } ?>
   <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include "../layouts/main-footer.php"; ?>
<script>
   ClassicEditor
       .create( document.querySelector( '#editor' ) )
       .catch( error => {
           console.error( error );
       } );
</script>

<script>
$(function() {
  $('input[name="event_start_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
      format: 'Y-MM-DD'
    },
    minDate:new Date()
  });
  $('input[name="event_end_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
      format: 'Y-MM-DD'
    },
    minDate:new Date()
  });
  
});
</script>