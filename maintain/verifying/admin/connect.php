<?php
    define('IMG_PATH','admin/uploads/');
   /*For Local*/
  /*  $host       = "localhost";
    $user       = "root";
    $pass       = "";
    $database   = "afi";*/
    /*For Live*/
    $host       = "localhost";
    $user       = "afiindda_afi_root";
    $pass       = "+NppF=jdw7cg";
    $database   = "afiindda_ayurveda";
    $connect = new mysqli($host, $user, $pass, $database);
    if (!$connect) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $connect->set_charset('utf8');
    }
?>