<?php
    define('IMG_PATH','/admin/uploads/');
   /*For Local*/
    /*$host       = "localhost";
    $user       = "root";
    $pass       = "";
    $database   = "afifullwebsite";*/
    /*For Live*/
    $host       = "localhost";
    $user       = "hiims_afi_india";
    $pass       = "oK!V0U#{ES.M";
    $database   = "hiims_afi_india";
	
    $connect = new mysqli($host, $user, $pass, $database);
    if (!$connect) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $connect->set_charset('utf8');
        //echo "connected";
    }
    
    define('BASEPATH', 'https://afi-india.in/');
?>