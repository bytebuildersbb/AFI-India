<?php 
ob_start();
    session_start();
    include "../connect.php";
    if(!isset($_SESSION['userdata']) && empty($_SESSION['userdata'])){
        // header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "meta.php"; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="../layouts/ckeditor/ckeditor.js"></script>
  </head>
 
  <body>