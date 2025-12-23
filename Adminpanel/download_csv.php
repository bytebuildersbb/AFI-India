<?php
if (!isset($_COOKIE['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['table']) || empty($_GET['table'])){
    die("Table not specified");
}

$table = $_GET['table'];

$host = "127.0.0.1"; 
$user = "u512009538_root";
$pass = "Afi_1234";
$db = "u512009538_afi_india";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$result = $conn->query("SELECT * FROM `$table`");
if(!$result){
    die("Error fetching table data");
}

// Send CSV headers
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$table.'.csv"');

$output = fopen('php://output', 'w');

// Output column headers
$columns = array();
while ($fieldinfo = $result->fetch_field()) {
    $columns[] = $fieldinfo->name;
}
fputcsv($output, $columns);

// Output rows
while($row = $result->fetch_assoc()){
    fputcsv($output, $row);
}

fclose($output);
exit();
?>
