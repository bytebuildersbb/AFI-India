<?php
include $_SERVER['DOCUMENT_ROOT']."/connection.php";

if(isset($_POST['submit'])){
    
    $memberID   = $_POST['memberID'];
    $name       = $_POST['name'];
    $forstudent = $_POST['forstudent'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email'];
    $returnurl  = $_POST['returnurl'];
    
$query = "SELECT * FROM `tbl_publication` where pub_id='$memberID'";
$runQuery   =  $connect->query($query);

$data = $runQuery->fetch_object();

$tpdf           = $data->pub_pdf;
 
$pdf_path       = $_SERVER['DOCUMENT_ROOT']."/admin/uploads/publications/pdf/";
$pdf            = $pdf_path.$tpdf;
   
    
    
        $query = "INSERT INTO `tbl_foundingteamdownloadpdf`( `ft_id`,`f_name`, `f_forstudent`, `f_mobile`, `f_email` ) VALUES ( '$memberID','$name','$forstudent','$mobile','$email' )";
        $runQuery   =  $connect->query($query);
        if($runQuery){
            
            
            // Send appropriate headers
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.$tpdf.'"');
            header('Content-Length: ' . filesize($pdf));
            // Output the file
            readfile($pdf);
            
            
            
        }
    
    
}  

?>