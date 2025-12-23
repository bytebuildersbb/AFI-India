<?php
// Check if cookie exists
if (!isset($_COOKIE['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
$adminEmail = $_COOKIE['admin_logged_in'];


$host = "127.0.0.1"; // database host
$user = "u512009538_root";
$pass = "Afi_1234";
$db = "u512009538_afi_india";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all table names
$tables = [];
$result = $conn->query("SHOW TABLES");
while($row = $result->fetch_array()) {
    $tables[] = $row[0];
}

?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          height: calc(100vh - 20px);
          display: flex;
          flex-direction: column;
        }
        body { font-family: Arial, sans-serif;  }
        select { padding: 5px 10px; font-size: 16px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; }
        th { background-color: #062f50; color:white; font-weight:600;white-space:nowrap; position:sticky; top:0}
        .panel {
          background: white;
          border-radius: 10px;
          flex:1;
          border:1px solid #d6d6d6;
          box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
              overflow: hidden;
    display: flex;
    flex-direction: column;
        }
        a {
          display: inline-block;
          padding: 10px 20px;
          background: #d9534f;
          color: white;
          text-decoration: none;
          border-radius: 5px;
        }
        a:hover {
          background: #c9302c;
        }
        
        tr:nth-child(odd) td{
            background-color:rgb(228 228 228 / 21%);
        }
      
        tr th,tr td{
            transition: all .25s ease-in-out;
          border:1px solid #e4e4e4;
          padding: 8px; text-align: left;
        }
        
        
        tr th:nth-child(1){
            border-left: 0;
        }
        
        tr th:nth-last-child(1){
            border-right: 0;
        }
        tr th{
            border-top: 0;
        }

        tr td:nth-child(1){
            border-left:0;
        }

        tr td:nth-last-child(1){
            border-right:0;
        }
        tr:nth-last-child(1) td{
            border-bottom:0;
        }
        tr:hover td {
    background: rgb(6 47 81 / 11%);
}
        
        table{
          margin: 0;
        }
        
        .totalHeader{
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header {
            background: white;
            border-bottom: 1px solid #e4e4e4;
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
        }
        .container{
            padding: 20px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap:10px
        }
        
        #tableData{
            overflow: auto;
            flex: 1;
            border-radius: 12px;
            border: 1px solid #062f50;
        }
        .fieldBox{
            
        }
      </style>
</head>
<body>
    
<div class="panel">
<div class="header">
    <h2 style="margin:0">Welcome to Admin Panel</h2>
    <a href="logout.php">Logout</a>
  </div>
<div class="container">
    <div class="fieldBox">
        <label for="tables">Select Table:</label>
        <select id="tables">
            <option value="">-- Select Table --</option>
            <?php foreach($tables as $table): ?>
                <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<div class="totalHeader" > 
    <div id="totalHeaderId"></div>
    <button id="downloadBtn" style="display: inline-block;padding: 10px 20px;background: #537ef0;color: white;text-decoration: none;border-radius: 5px;border: 1px solid #537ef0;">Export </button>
</div>
<div id="tableData"></div>
</div>
</div>
<script>
document.getElementById("tables").addEventListener("change", function() {
    const tableName = this.value;
    const container = document.getElementById("tableData");
    if(tableName === "") {
        container.innerHTML = "";
        return;
    }

    fetch("get_table_data.php?table=" + tableName)
        .then(response => response.json())
        .then(data => {
            if(data.error){
                container.innerHTML = data.error;
                return;
            }

            // Show total records
            let totalHeaderId = document.getElementById('totalHeaderId');
            if(totalHeaderId){
                totalHeaderId.innerHTML = "<strong>Total Records: " + data.total + "</strong>";
            }
            let html = "";

            // Build table
            html += "<table><thead><tr>";
            data.columns.forEach(col => html += "<th>"+col+"</th>");
            html += "</tr></thead><tbody>";

            data.rows.forEach(row => {
                html += "<tr>";
                data.columns.forEach(col => html += "<td>"+(row[col] ?? "")+"</td>");
                html += "</tr>";
            });

            html += "</tbody></table>";
            container.innerHTML = html;
        })
        .catch(err => {
            container.innerHTML = "Error fetching data";
            console.error(err);
        });
});
document.getElementById("downloadBtn").addEventListener("click", function(){
    const tableName = document.getElementById("tables").value;
    if(!tableName){
        alert("Please select a table first");
        return;
    }
    window.location.href = "download_csv.php?table=" + tableName;
});

</script>

</body>
</html>
