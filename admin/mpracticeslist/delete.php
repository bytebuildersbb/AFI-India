<?php
ob_start();
    include "../layouts/main-header.php";
    

    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $query = 'SELECT COUNT(*) AS count FROM upgrade_medical_form where id = ' . $_REQUEST['id'];
        $result = $connect->query($query);

        if ($result) {
        // Fetch result
        $row = $result->fetch_assoc();
        $count = $row['count'];
            $query1 = "UPDATE upgrade_medical_form SET display = 0 WHERE id =".$id;
                    $result = $connect->query($query1);
                    if($result){
                        header("Location: index.php");
                    }

    } else {
        echo "Error executing query: " . $connect->error;
    }

    // Close connection
    $connect->close();
    }

?>