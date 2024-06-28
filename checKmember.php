<?php 
	include "connection.php";
	$number = $_POST['IDCHECK'];
	$query 		=		"SELECT * FROM tbl_course WHERE course_id_pk = '$number'";
	$runQuery 	=	$connect->query($query);
	if(mysqli_num_rows($runQuery) > 0){
	$arr=mysqli_fetch_assoc($runQuery);
	if($arr['member_cost']!=''){
	    $main=$arr['member_cost'];
	    echo $main; 
	}
	else{
	    echo $arr['course_fee'];
	}
	}else{
		echo "2";
	}
?>