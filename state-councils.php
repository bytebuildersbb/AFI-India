<?php include "layouts/main-header.php"; ?>


<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="afi-blog pt-md-5 pb-md-5" style="position: relative;">
      <div class="container">
         <div class="row">
            <div class="headers">
               <h2 class="wow fadeInLeft">State Councils</h2>
               <!-- <p>Ayurveda is considered by many scholars to be the oldest healing science.</p> -->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="achieves pt-md-3 pb-md-3" style="position: relative;">
   <div class="container">
      <div class="row pt-md-3">
         <div class="accordion" id="accordionExample">
            <!--start-->
            <?php
               $Type=str_replace('-', ' ', $_REQUEST['StateConvener']);
               $select="select * from tbl_core_committee where designation='$Type' AND type = '1' group by designation";
               $ss    =     $connect->query($select);
               $ii=1;
               while($sss=mysqli_fetch_assoc($ss)){
                $designation=$sss['designation'];
                ?>
            <div class="card" style="border-radius: 5px;">
               <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                     <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $ii; ?>"><i class="fa fa-plus"></i>
                     <?php echo $sss['designation']; ?>
                     </button>
                  </h2>
               </div>
               <div id="collapse<?php echo $ii; ?>" class="collapse <?php if($ii==1) {echo 'show';} ?>" aria-labelledby="headingFive" data-parent="#accordionExample">
                  <div class="card-body">
                     <div class="col-md-12" role="tabpanel">
                        <div class="[ col-xs-4 col-sm-12 ]">
                           <!-- Nav tabs -->
                           <ul class="nav nav-justified" id="nav-tabs" role="tablist">
                              <!--photo-->
                              <?php
                                 $query="select * from tbl_core_committee where designation='$designation' order by orderr asc";
                                 $queryy    =     $connect->query($query);
                                 $i=111;
                                 while($queryyy=mysqli_fetch_assoc($queryy)){ 
                                 // $x=preg_replace('/\s+/', '',$queryyy['name']);
                                  $x=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $queryyy['name'])));
                                  ?>
                              <li role="presentation">
                                 <a href="#<?php echo $x; ?>" aria-controls="<?php echo $i; ?>" role="tab" data-toggle="tab" class="">
                                 <?php
                                    $b=explode(",",$queryyy["profilePic"]);
                                    foreach($b as $img){
                                     ?>
                                 <img class="img-circle" src="admin/uploads/committee/<?php echo $img; ?>"  style="width:150px;height:150px;">
                                 <?php
                                    } ?>
                                 <span class="quote"><i class="fa fa-quote-left"></i></span>
                                 </a>
                                 <strong class="text-green-big"><?php echo $queryyy['name']; ?> </strong><br/>
                                 <p class="text-green-big"><?php echo $queryyy['DesignationName']; ?> </p>
                              </li>
                              <?php 
                                 $i++;
                                 } ?>
                              <!--end-->
                           </ul>
                        </div>
                        <div class="col-xs-8 col-sm-12">
                           <!-- Tab panes -->
                           <div class="tab-content" id="tabs-collapse" style="box-shadow: none !important;">
                              <!--details-->
                              <?php
                                 $queryyyy="select * from tbl_core_committee where designation='$designation' order by orderr asc";
                                 $queryyyyy    =     $connect->query($queryyyy);
                                 $j=111;
                                 while($queryyyyyy=mysqli_fetch_assoc($queryyyyy)){ 
                                  $xx=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $queryyyyyy['name'])));
                                  ?>
                              <div role="tabpanel" class="tab-pane" id="<?php echo $xx; ?>" style="border-top:2px solid #e5e5e5">
                                 <div class="tab-inner fadeIn" style="text-align:justify !important;">
                                    <div class="qual-data">
                                       <?php echo $queryyyyyy['artical']; ?>
                                    </div>
                                 </div>
                              </div>
                              <?php 
                                 $j++;
                                 } ?>
                              <!--end-->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end-->
            <?php
               $ii++;
               }
               ?>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>

<?php include "layouts/main-footer.php"; ?>