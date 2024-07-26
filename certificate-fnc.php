<?php
include "connection.php";
print_r($_GET);


if(isset($_GET['membership']) && is_numeric($_GET['membership'])){
    if($_GET['membership'] == 1){
        $query=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_student ON tbl_pro_lect_member_form.id=tbl_if_member_student.pro_lect_member_id_fk where type_of=1 order by tbl_pro_lect_member_form.id desc";
    }
    else{
        $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_student ON tbl_pro_lect_member_form.id=tbl_if_member_student.pro_lect_member_id_fk where type_of=1 order by tbl_pro_lect_member_form.id desc";
        }
        $runQuery 	=	$connect->query($query);
        $count = 1;
        while($row = $runQuery->fetch_assoc()){
            if($row["paymentStatus"] == "SUCCESS") {
             $redirect_url = "../admin/membershippdf/pdf.php?";
        $redirect_url .= "image=" . "https://afi-india.in/uploads/profilePics/" . urlencode($row["profile_pic"]);
        $redirect_url .= "&name=" . urlencode($row["name"]);
        $redirect_url .= "&address=" . urlencode($row["comaddress"]);
        $redirect_url .= "&fname=" . urlencode($row["fathername"]);
        $redirect_url .= "&pin=" . urlencode($row["pinncode"]);
        $redirect_url .= "&type=" . urlencode('STUDENT');
        $redirect_url .= "&mailid=" . urlencode($row["mailid"]);

        // Redirect to the built URL
        header("Location: $redirect_url");
        exit;
        }
    }
if($_GET['membership']==2){
         $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_doctor ON tbl_pro_lect_member_form.id=tbl_if_member_doctor.pro_lect_member_id_fk where type_of=2  order by tbl_pro_lect_member_form.id desc";
         
    }
    else{
       $query =	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_doctor ON tbl_pro_lect_member_form.id=tbl_if_member_doctor.pro_lect_member_id_fk where type_of=2 order by tbl_pro_lect_member_form.id desc";
        }
        $runQuery 	=	$connect->query($query);
        $count = 1;
        while($row = $runQuery->fetch_assoc()){
            if($row["paymentStatus"] == "SUCCESS") {
             $redirect_url = "../admin/membershippdf/pdf.php?";
        $redirect_url .= "image=" . "https://afi-india.in/uploads/profilePics/" . urlencode($row["profile_pic"]);
        $redirect_url .= "&name=" . urlencode($row["name"]);
        $redirect_url .= "&address=" . urlencode($row["comaddress"]);
        $redirect_url .= "&fname=" . urlencode($row["fathername"]);
        $redirect_url .= "&pin=" . urlencode($row["pinncode"]);
        $redirect_url .= "&type=" . urlencode('LIFETIME');
        $redirect_url .= "&mailid=" . urlencode($row["mailid"]);

        // Redirect to the built URL
        header("Location: $redirect_url");
        exit;
        }
}
if($_GET['membership']==5){
     $query 		=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_  ON tbl_pro_lect_member_form.id=tbl_if_member_patron.pro_lect_member_id_fk where type_of=5 and order by tbl_pro_lect_member_form.id desc";
              
    }
    else{
       $query=	"SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_patron ON tbl_pro_lect_member_form.id=tbl_if_member_patron.pro_lect_member_id_fk where type_of=5 order by tbl_pro_lect_member_form.id desc";
        }
        $runQuery 	=	$connect->query($query);
        $count = 1;
        while($row = $runQuery->fetch_assoc()){
            if($row["paymentStatus"] == "SUCCESS") {
             $redirect_url = "../admin/membershippdf/pdf.php?";
        $redirect_url .= "image=" . "https://afi-india.in/uploads/profilePics/" . urlencode($row["profile_pic"]);
        $redirect_url .= "&name=" . urlencode($row["name"]);
        $redirect_url .= "&address=" . urlencode($row["comaddress"]);
        $redirect_url .= "&fname=" . urlencode($row["fathername"]);
        $redirect_url .= "&pin=" . urlencode($row["pinncode"]);
        $redirect_url .= "&type=" . urlencode('PATRON');
        $redirect_url .= "&mailid=" . urlencode($row["mailid"]);

        // Redirect to the built URL
        header("Location: $redirect_url");
        exit;
        }
}
}
?>
