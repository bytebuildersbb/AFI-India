<?php 
include "layouts/main-header.php"; 

$memberID = urlencode(base64_decode($_GET['mid']));

$query = "SELECT * FROM `tbl_core_committee` where core_committee_id_pk='$memberID'";
$runQuery   =  $connect->query($query);


$data = $runQuery->fetch_object();

$title          = $data->t_title;
$designation    = $data->t_designation;
$desc           = $data->artical;
$profileImage   = $data->profilePic;
$img_path       = "admin/uploads/committee/";
$img            = $img_path.$profileImage;

?>






<?php include "layouts/main-footer.php"; ?>