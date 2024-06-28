<?php 
	include "connection.php";
	$number = $_POST['MobileNo'];
	$query 		=		"SELECT * FROM tbl_doctors_list WHERE dr_mobile_no = '$number'";
	$runQuery 	=	$connect->query($query);
	if(mysqli_num_rows($runQuery) > 0){
		echo "1";
	}else{
		echo "2";
	}

?>