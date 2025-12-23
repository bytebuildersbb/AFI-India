<?php
include "./connection.php";
header('Content-Type: application/json');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // check if prepare worked
    $stmt = $conn->prepare("SELECT `Id` FROM `Certified Natural Health Ambassador Program Registration` WHERE `Email ID` = ?");
    if (!$stmt) {
        echo json_encode(['error' => $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['exists' => true]);
        $stmt->close();
        $conn->close();
        exit;
    }

    $stmt->close();

    $insert = $conn->prepare("
        INSERT INTO `Certified Natural Health Ambassador Program Registration` (`Name`, `Email ID`, `Mobile`, `Registration Time`)
        VALUES (?, ?, ?, NOW())
    ");
    if (!$insert) {
        echo json_encode(['error' => $conn->error]);
        exit;
    }

    $insert->bind_param("sss", $name, $email, $phone);

    if ($insert->execute()) {
        echo json_encode([
            'exists' => false,
            'id' => $conn->insert_id
        ]);
    } else {
        echo json_encode(['error' => $conn->error]);
    }

    $insert->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Email not provided']);
}
?>
