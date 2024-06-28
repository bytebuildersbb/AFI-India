<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$db = "hiims_afi_india";*/

$servername = "127.0.0.1"; // database host
$username1 = "hiims_afi_india";
$password1 = "oK!V0U#{ES.M";
$db1 = "hiims_afi_india";

$conn = new mysqli( $servername, $username1, $password1, $db1 );

// Create connection
//$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>