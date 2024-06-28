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
// SELECT * FROM tbl_application_form INNER JOIN tbl_course ON tbl_application_form.course_table_fk=tbl_course.course_id_pk INNER JOIN application_education ON tbl_application_form.application_id_pk=application_education.application_id_fk
$dateFrom=$_REQUEST['start'];
$dateTo=$_REQUEST['end'];
$type=$_REQUEST["astro"];
if($type=="ALL"){
    $query=" SELECT * FROM tbl_application_form INNER JOIN tbl_course ON tbl_application_form.course_table_fk=tbl_course.course_id_pk INNER JOIN application_education ON tbl_application_form.application_id_pk=application_education.application_id_fk INNER JOIN tbl_work_experience_profession ON tbl_application_form.application_id_pk=tbl_work_experience_profession.application_id_fk where DATE(createdOn) BETWEEN '$dateFrom' AND '$dateTo'";
}
else{
        $query=" SELECT * FROM tbl_application_form INNER JOIN tbl_course ON tbl_application_form.course_table_fk=tbl_course.course_id_pk INNER JOIN application_education ON tbl_application_form.application_id_pk=application_education.application_id_fk INNER JOIN tbl_work_experience_profession ON tbl_application_form.application_id_pk=tbl_work_experience_profession.application_id_fk where course_table_fk='$type' AND DATE(createdOn) BETWEEN '$dateFrom' AND '$dateTo'";
}
	$runQuery 	=	$connect->query($query);
 if(mysqli_num_rows($runQuery) > 0)
 {
    	$sno = 1;
  $output .= '
   <table class="table" bordered="1">  
                    <tr>
                      <th>#</th>
                    
                              <th>Course Name</th>
                                    <th>Payment Status</th>
                                <th>Payment Amount</th>
                              <th>Name</th>
                              <th>Father / Husband</th>
                              <th>DOB</th>
                              <th>Address</th>
                              <th>Pincode</th>
                              <th>State</th>
                              <th>Mobile No</th>
                              <th>Email</th>
                             
                                <th>AFI Member</th>
                               <th>Member No</th>
                               
                               
                                 <th>University / Collage</th>
                              <th>Diploma/Degree</th>
                              <th>Subject</th>
                              <th>Year</th>
                              <th>Grade</th>
                              <th>Name of Organisation</th>
                              <th>Designation</th>
                             
                                <th>Duration</th>
                               <th>Salary</th>
                <th>Timestamp</th>
                    </tr>
  ';
  $G="";
  while($row = mysqli_fetch_array($runQuery)){
     if($row['member_type']==1){ $G="Member"; } else { $G="Not Member"; }
   $output .= '
    <tr>  
                     <td>'.$sno.'</td>
                            <td>'.$row["course_name"].'</td>
                               <td>'.$row["paymentStatus"].'</td>
                          <td>'.$row["paymentAmount"].'</td>
                             <td>'.$row["name"].'</td>
                               <td>'.$row["father_husband_guardian_name"].'</td>
                                  <td>'.$row["dob"].'</td>
                                     <td>'.$row["address"].'</td>
                                        <td>'.$row["pincode"].'</td>
                                           <td>'.$row["state"].'</td>
                                              <td>'.$row["mobileNo"].'</td>
                                                 <td>'.$row["emailId"].'</td>
                             <td>'.$G.'</td>
                            <td>'.$row["IDCArd"].'</td>
                            
                             <td>'.$row["univercity_collage"].'</td>
                              <td>'.$row["degree_diploma"].'</td>
                               <td>'.$row["subject"].'</td>
                                <td>'.$row["year_of_passing"].'</td>
                        <td>'.$row["grade_parcentage"].'</td>
                          <td>'.$row["name_of_orgnization"].'</td>
                              <td>'.$row["designation"].'</td>
                               <td>'.$row["duration"].'</td>
                                <td>'.$row["salary"].'</td>
                        <td>'.$row["createdOn"].'</td> 
                    </tr>
   ';
   $sno++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
}
}
?>