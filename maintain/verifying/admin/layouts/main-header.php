<?php 
    session_start();
    include "../connect.php";
    if(!isset($_SESSION['userdata']) && empty($_SESSION['userdata'])){
        header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "meta.php"; ?>
  </head>
  <body>