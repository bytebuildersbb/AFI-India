<?php include "layouts/main-header.php"; ?>


<div class="achieves py-5">
    <div class="container">
           <h2 class="text-center px-3">State Councils</h2>
        <div class="row pt-md-3 align-items-center justify-content-center">
        
                <!--start-->
                <?php
                $Type = str_replace('-', ' ', $_REQUEST['StateConvener']);
                $select = "SELECT * FROM tbl_core_committee WHERE designation='$Type' AND type = '1'";
                $ss = $connect->query($select);
                $ii = 1;
                while ($sss = mysqli_fetch_assoc($ss)) {
                    $designation = $sss['designation'];
                ?>
                    <div class="col-lg-3 col-md-3 mb-4">
                        <?php
                        $query = "SELECT * FROM tbl_core_committee WHERE designation='$designation' ORDER BY orderr ASC";
                        $queryy = $connect->query($query);
                        $i = 111;
                        while ($queryyy = mysqli_fetch_assoc($queryy)) {
                            $x = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $queryyy['name'])));
                        ?>
                            <div class="teams2 p-4 text-center h-100">
                                <a href="#<?php echo $x; ?>" aria-controls="<?php echo $i; ?>" role="tab" data-toggle="tab">
                                </a>
                                    <?php
                                    $b = explode(",", $queryyy["profilePic"]);
                                    foreach ($b as $img) {
                                    ?>
                                        <img src="admin/uploads/committee/<?php echo $img; ?>" class="img-responsive rounded-circle" alt="Team">
                                    <?php
                                    }
                                    ?>
                                    <h5 class="pt-3 mb-1"><?php echo $queryyy['name']; ?></h5>
                                    <p class="text-success mb-2"><?php echo $queryyy['DesignationName']; ?></p>
                                    <div class="btns custom-btn">
                                        <div class="btn-style"><a href="c_teamDetail.php?mid=<?php echo urlencode(base64_encode($queryyy['core_committee_id_pk'])); ?>" >View More</a></div>
                                    </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
               
                    
                    <div class="card" style="border-radius: 5px;display: none;">
                        <div class="card-header" id="heading<?php echo $ii; ?>">
                            <h2 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $ii; ?>">
                                    <i class="fa fa-plus"></i>
                                    <?php echo $sss['designation']; ?>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse<?php echo $ii; ?>" class="collapse <?php if ($ii == 1) { echo 'show'; } ?>" aria-labelledby="heading<?php echo $ii; ?>" data-parent="#accordionExample">
                   
                        </div>
                    </div>
                    <?php
                    $ii++;
                }
                ?>
                <!--end-->
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<?php include "layouts/main-footer.php"; ?>
