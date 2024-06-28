<?php 
 $host       = "localhost";
    $user       = "afiqadia_wdtd";
    $pass       = "1xp*s(b%8;je";
    $database   = "afiqadia_dftdc";
    $connect = new mysqli($host, $user, $pass, $database);
    if (!$connect) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $connect->set_charset('utf8');
        //echo"done";
    }
$output = '';
if(isset($_REQUEST["astro"]))
{
 
if($_REQUEST["astro"]==1){
     
$dateFrom=$_REQUEST['start'];
$dateTo=$_REQUEST['end'];
$type=$_REQUEST["astro"];
  $query="SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_student ON tbl_pro_lect_member_form.id=tbl_if_member_student.pro_lect_member_id_fk where type_of=1 AND DATE(createdDate) BETWEEN '$dateFrom' AND '$dateTo' order by tbl_pro_lect_member_form.id desc";
	$runQuery 	=	$connect->query($query);
 if(mysqli_num_rows($runQuery) > 0)
 {
    	$sno = 1;
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                      <th>#</th>
                              <th>Type</th>
                              <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                              <th>Collage name</th>
                            
                              <th>Enrollment no</th>
                             <th> Through whom did you come to know about Ayurveda Federation?</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                <th>Created Date</th>
               
                    </tr>
  ';
  while($row = mysqli_fetch_array($runQuery))
 
  {
    if($row["gender"]==1){ $G="Male"; } if($row["gender"]==2){ $G="Female"; } if($row["gender"]==3){ $G="Transgender"; }
   $output .= '
    <tr>  
                     <td>'.$sno.'</td>
                          <td>Student</td>
                           <td>'.$row["paymentStatus"].'</td>
                          <td>'.$row["paymentAmount"].'</td>
                            <td>'.$row["name"].'</td>
                             <td>'.$G.'</td>
                               <td>'.$row["fathername"].'</td>
                                  <td>'.$row["mailid"].'</td>
                                     <td>'.$row["numberBoth"].'</td>
                                        <td>'.$row["comaddress"].'</td>
                                           <td>'.$row["peraddress"].'</td>
                                              <td>'.$row["pinncode"].'</td>
                                                 <td>'.$row["state"].'</td>
                             <td>'.$row["nationality"].'</td>
                            <td>'.$row["collage_name"].'</td>
                             <td>'.$row["enrollment_no"].'</td>
                              <td>'.$row["howDoYouKnw"].'</td>
                               <td>'.$row["canYou"].'</td>
                                <td>'.$row["yourtype"].'</td>
                        <td>'.$row["createdDate"].'</td>
                           
                    </tr>
   ';
   $sno++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
 else{
   echo  "No Record Found";
 }
}
if($_REQUEST["astro"]==2){
$dateFrom=$_REQUEST['start'];
$dateTo=$_REQUEST['end'];
$type=$_REQUEST["astro"];

    $query="SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_doctor ON tbl_pro_lect_member_form.id=tbl_if_member_doctor.pro_lect_member_id_fk where type_of=2 AND DATE(createdDate) BETWEEN '$dateFrom' AND '$dateTo' order by tbl_pro_lect_member_form.id desc";
	$runQuery 	=	$connect->query($query);


 if(mysqli_num_rows($runQuery) > 0)
 {
     
    	$sno = 1;
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                   <th>#</th>
                              <th>Type</th>
                              <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
                                <th>Clinic address</th>
                   
                              <th>Registartion</th>
                              <th>Registered board</th>
                              <th> Through whom did you come to know about Ayurveda Federation?</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                             <th>Created Date</th>
               
                    </tr>
  ';
  while($row = mysqli_fetch_array($runQuery))
   {
       
        if($row["gender"]==1){ $G="Male"; } if($row["gender"]==2){ $G="Female"; } if($row["gender"]==3){ $G="Transgender"; }
   $output .= '
    <tr>  
                     <td>'.$sno.'</td>
                          <td>Doctor</td>
                           <td>'.$row["paymentStatus"].'</td>
                          <td>'.$row["paymentAmount"].'</td>
                            <td>'.$row["name"].'</td>
                             <td>'.$G.'</td>
                               <td>'.$row["fathername"].'</td>
                                  <td>'.$row["mailid"].'</td>
                                     <td>'.$row["numberBoth"].'</td>
                                        <td>'.$row["comaddress"].'</td>
                                           <td>'.$row["peraddress"].'</td>
                                              <td>'.$row["pinncode"].'</td>
                                                 <td>'.$row["state"].'</td>
                             <td>'.$row["nationality"].'</td>
                             
                             
                             
                              <td>'.$row["clinic_address"].'</td>
                       
                              
                              <td>'.$row["registartion"].'</td>
                                <td>'.$row["registered_board"].'</td>
                              
                   
                              <td>'.$row["howDoYouKnw"].'</td>
                            <td>'.$row["canYou"].'</td>
                            <td>'.$row["yourtype"].'</td>
                            
                              <td>'.$row["createdDate"].'</td>
         
                    </tr>
   ';
   $sno++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
  else{
   echo  "No Record Found";
 }
}
if($_REQUEST["astro"]==3){
$dateFrom=$_REQUEST['start'];
$dateTo=$_REQUEST['end'];
$type=$_REQUEST["astro"];

    $query="SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_prof_lect ON tbl_pro_lect_member_form.id=tbl_if_member_prof_lect.pro_lect_member_id_fk where type_of=3 AND DATE(createdDate) BETWEEN '$dateFrom' AND '$dateTo' order by tbl_pro_lect_member_form.id desc";
	$runQuery 	=	$connect->query($query);
//	echo $query;
 if(mysqli_num_rows($runQuery) > 0)
 {
    	$sno = 1;
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                    <th>#</th>
                                 <th>Type</th>
                            <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
               
                         
                              <th>Qualification</th>
                               <th>Profession</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                <th>Created Date</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($runQuery))
 
  {
      if($row["gender"]==1){ $G="Male"; } if($row["gender"]==2){ $G="Female"; } if($row["gender"]==3){ $G="Transgender"; }
   $output .= '
    <tr>  
                    <td>'.$sno.'</td>
                          <td>Prof./Lect</td>
                           <td>'.$row["paymentStatus"].'</td>
                          <td>'.$row["paymentAmount"].'</td>
                            <td>'.$row["name"].'</td>
                             <td>'.$G.'</td>
                               <td>'.$row["fathername"].'</td>
                                  <td>'.$row["mailid"].'</td>
                                     <td>'.$row["numberBoth"].'</td>
                                        <td>'.$row["comaddress"].'</td>
                                           <td>'.$row["peraddress"].'</td>
                                              <td>'.$row["pinncode"].'</td>
                                                 <td>'.$row["state"].'</td>
                             <td>'.$row["nationality"].'</td>
                                 <td>'.$row["qq"].'</td>
                            <td>'.$row["pp"].'</td>
                              <td>'.$row["canYou"].'</td>
                            <td>'.$row["yourtype"].'</td>
                            
                              <td>'.$row["createdDate"].'</td>
                    </tr>
   ';
   $sno++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
  else{
   echo  "No Record Found";
 }
}
if($_REQUEST["astro"]==4){
$dateFrom=$_REQUEST['start'];
$dateTo=$_REQUEST['end'];
$type=$_REQUEST["astro"];

    $query="SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_pharmacy ON tbl_pro_lect_member_form.id=tbl_if_member_pharmacy.pro_lect_member_id_fk where type_of=4 AND DATE(createdDate) BETWEEN '$dateFrom' AND '$dateTo' order by tbl_pro_lect_member_form.id desc";
	$runQuery 	=	$connect->query($query);

 if(mysqli_num_rows($runQuery) > 0)
 {
    	$sno = 1;
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                     <th>#</th>
                                 <th>Type</th>
                            <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
               
                         
                              <th>Qualification</th>
                               <th>Profession</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                <th>Created Date</th>
               
                    </tr>
  ';
  while($row = mysqli_fetch_array($runQuery))
 
  {
    	 if($row["gender"]==1){ $G="Male"; } if($row["gender"]==2){ $G="Female"; } if($row["gender"]==3){ $G="Transgender"; }
   $output .= '
    <tr>  
                    <td>'.$sno.'</td>
                          <td>Pharmacy</td>
                           <td>'.$row["paymentStatus"].'</td>
                          <td>'.$row["paymentAmount"].'</td>
                            <td>'.$row["name"].'</td>
                             <td>'.$G.'</td>
                               <td>'.$row["fathername"].'</td>
                                  <td>'.$row["mailid"].'</td>
                                     <td>'.$row["numberBoth"].'</td>
                                        <td>'.$row["comaddress"].'</td>
                                           <td>'.$row["peraddress"].'</td>
                                              <td>'.$row["pinncode"].'</td>
                                                 <td>'.$row["state"].'</td>
                             <td>'.$row["nationality"].'</td>
                                 <td>'.$row["qq"].'</td>
                            <td>'.$row["pp"].'</td>
                              <td>'.$row["canYou"].'</td>
                            <td>'.$row["yourtype"].'</td>
                            
                              <td>'.$row["createdDate"].'</td>
                    </tr>
   ';
   $sno++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
  else{
   echo  "No Record Found";
 }
}
if($_REQUEST["astro"]==5){
$dateFrom=$_REQUEST['start'];
$dateTo=$_REQUEST['end'];
$type=$_REQUEST["astro"];

    $query="SELECT * FROM tbl_pro_lect_member_form INNER JOIN tbl_if_member_patron ON tbl_pro_lect_member_form.id=tbl_if_member_patron.pro_lect_member_id_fk where type_of=5 AND DATE(createdDate) BETWEEN '$dateFrom' AND '$dateTo' order by tbl_pro_lect_member_form.id  desc";
	$runQuery 	=	$connect->query($query);

 if(mysqli_num_rows($runQuery) > 0)
 {
    	$sno = 1;
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                     <th>#</th>
                                 <th>Type</th>
                            <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                                <th>Gender</th>
                               <th>Father Name</th>
                                <th>Email</th>
                                 <th>Mobile</th>
                       
                              <th>Communication Address</th>
                                <th>Permanent Address</th>
                                 <th>Pincode</th>
                              <th>State</th>
                              <th>Nationality</th>
               
                         
                              <th>Qualification</th>
                               <th>Profession</th>
                              <th>Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?</th>
                               <th>If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time?</th>
                                <th>Created Date</th>
               
                    </tr>
  ';
  while($row = mysqli_fetch_array($runQuery))
 
  {
     if($row["gender"]==1){ $G="Male"; } if($row["gender"]==2){ $G="Female"; } if($row["gender"]==3){ $G="Transgender"; }
   $output .= '
    <tr>  
                    <td>'.$sno.'</td>
                          <td>Patron</td>
                          <td>'.$row["paymentStatus"].'</td>
                          <td>'.$row["paymentAmount"].'</td>
                            <td>'.$row["name"].'</td>
                             <td>'.$G.'</td>
                               <td>'.$row["fathername"].'</td>
                                  <td>'.$row["mailid"].'</td>
                                     <td>'.$row["numberBoth"].'</td>
                                        <td>'.$row["comaddress"].'</td>
                                           <td>'.$row["peraddress"].'</td>
                                              <td>'.$row["pinncode"].'</td>
                                                 <td>'.$row["state"].'</td>
                             <td>'.$row["nationality"].'</td>
                                 <td>'.$row["qq"].'</td>
                            <td>'.$row["pp"].'</td>
                              <td>'.$row["canYou"].'</td>
                            <td>'.$row["yourtype"].'</td>
                            
                              <td>'.$row["createdDate"].'</td>
                    </tr>
   ';
   $sno++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
  else{
   echo  "No Record Found";
 }
}
}
?>