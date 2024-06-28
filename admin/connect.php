<?php
define('IMG_PATH','/admin/uploads/');
   /*For Local*/
   $host       = "localhost";
    $user       = "hiims_afi_india";
    $pass       = "oK!V0U#{ES.M";
    $database   = "hiims_afi_india";

    /*For Live*/
    /*$host       = "localhost";
    $user       = "hiims_afiqadia_dftdc";
    $pass       = "wh25dor2g)z&";
    $database   = "hiims_afiqadia_dftdc";*/

    $connect = new mysqli($host, $user, $pass, $database);
    if (!$connect) {
        die ("connection failed: " . mysqli_connect_error());
    } else {
        $connect->set_charset('utf8');
    }
?>