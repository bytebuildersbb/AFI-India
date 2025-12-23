<?php
include "./connection.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT `Email ID` FROM `Kidney Care CME Registration` WHERE `Email ID` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    echo json_encode([
        'exists' => $stmt->num_rows > 0
    ]);
    $stmt->close();
}
$conn->close();
?>
