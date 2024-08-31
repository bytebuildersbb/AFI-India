<?php include "layouts/main-header.php"; 

    $query = "SELECT * FROM tbl_foundingteam where t_id >3 AND t_id <= 21 order by t_id";  
    $runQuery   =  $connect->query($query);
    $query2 = "SELECT * FROM tbl_foundingteam WHERE t_id IN (1, 2, 3) ORDER BY t_id"; 
    $runQuery2   =  $connect->query($query2);
?>
<style>
    .teams2 .content-height {
        height: 50px;
    }


    .text-success {
        height: 20px;
    }

    @media (max-width: 767px) {
        .text-success {
            height: auto;
        }

        .teams2 .content-height {
            height: auto;
        }

    }
</style>
<div class="top-header marquee pt-2">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <div class="marquee_text">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><a
                            href="file:///C:/Users/user/Downloads/AFI-Project/AFI-Project/membership.html">AFI
                            Membership Plans</a></marquee>
                    <marquee behavior="scroll" direction="Right" onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="#">Ayurved Arjun Event</a></marquee>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Our Founders</h2>
                    <ul>
                        <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                        <li><span>Our Founders</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-area clear-fix  bg-light pt-5 pb-5">
    <div class="container">
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-12">
                <div class="hx-site-title-1 text-center">

                    <h2>Our Founders</h2>
                </div>
            </div>

            <?php while($row = $runQuery2->fetch_object()){ ?>
            <div class="col-sm-8 col-md-4 col-lg-3 mb-4 text-center">
                <div class="teams2 p-3 h-100">
                    <img src="admin/uploads/foundingteam/<?php echo $row->t_thumbnail; ?>"
                        class="img-responsive rounded-circle" alt="Team">
                    <h5 class="pt-3 mb-1">
                        <?php echo $row->t_title; ?>
                    </h5>
                    <p class="text-success mb-2">
                        <?php echo $row->t_qual; ?>
                    </p>
                    <p>(Founder - AFI) </p>
                    <div class="btns custom-btn">
                        <div class="btn-style">
                            <a class="team-btn"
                                href="f_teamDetail.php?mid=<?php echo urlencode(base64_encode($row->t_id)); ?>">View
                                More </a>
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<!-- .hx-team-area start -->
<div class="team-area team-member clear-fix  bg-light pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <h2>Founding Team Members</h2>
                </div>
            </div>
            <?php while($row = $runQuery->fetch_object()){ ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4 text-center">
                <div class="teams2 p-3 h-100">
                    <img src="admin/uploads/foundingteam/<?php echo $row->t_thumbnail; ?>"
                        class="img-responsive rounded-circle" alt="Team">
                    <h5 class="pt-3 mb-1">
                        <?php echo $row->t_title; ?>
                    </h5>
                    <p class="text-success content-height mb-2">
                        <?php echo $row->t_qual; ?>
                    </p>
                    <div class="btns custom-btn">
                        <div class="btn-style">
                            <a class="team-btn"
                                href="f_teamDetail.php?mid=<?php echo urlencode(base64_encode($row->t_id)); ?>">View
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="join_india py-5">
    <div class="container">
        <div class="hx-site-title-1 text-center">
            <span>Join with Us</span>
            <h2>Join Ayurveda Federation of India</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="ayurveda">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-3 text-center">
                            <a href="membership.php">
                                <img src="assets/images/afi3.png" class="img-fluid afilift">
                            </a>
                        </div>
                        <div class="col-md-4 mb-3 text-center">

                            <div class="d-flex justify-content-center align-items-center text-center">
                                <a>
                                    <h3>Facebook Followers</h3>
                                    <h2>4.8K</h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 text-center">
                            <a href="certificate-page.php">
                                <img src="assets/images/afi2-new.png" class="img-fluid afilift">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "layouts/main-footer.php"; ?>