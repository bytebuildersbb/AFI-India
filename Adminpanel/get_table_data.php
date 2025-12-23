<?php
$host = "127.0.0.1"; 
$user = "u512009538_root";     
$pass = "Afi_1234";         
$db   = "u512009538_afi_india";  

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed"]));
}

if(!isset($_GET['table']) || empty($_GET['table'])){
    echo json_encode(["error" => "Table not specified"]);
    exit;
}

$table = $_GET['table'];

// Prevent SQL injection
$validTables = [];
$result = $conn->query("SHOW TABLES");
while($row = $result->fetch_array()) {
    $validTables[] = $row[0];
}

if(!in_array($table, $validTables)){
    echo json_encode(["error" => "Invalid table name"]);
    exit;
}

// Get columns
$columnsResult = $conn->query("SHOW COLUMNS FROM `$table`");
$columns = [];
while($col = $columnsResult->fetch_assoc()){
    $columns[] = $col['Field'];
}

// Get rows
$rowsResult = $conn->query("SELECT * FROM `$table`");
$rows = [];
while($row = $rowsResult->fetch_assoc()){
    $rows[] = $row;
}

// Return JSON with total count
echo json_encode([
    "columns" => $columns,
    "rows" => $rows,
    "total" => count($rows)   // <-- total records
]);
?>
