<?php
    define('IMG_PATH','admin/uploads/');
   /*For Local*/
  /*  $host       = "localhost";
    $user       = "root";
    $pass       = "";
    $database   = "afi";*/
    /*For Live*/
    $host       = "localhost";
    $user       = "u512009538_root";
    $pass       = "nqqkCMO1Y,%,";
    $database   = "afiindda_ayurveda";
    $connect = new mysqli($host, $user, $pass, $database);
    if (!$connect) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $connect->set_charset('utf8');
    }
?>