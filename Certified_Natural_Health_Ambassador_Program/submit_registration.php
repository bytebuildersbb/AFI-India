<?php
include "./connection.php";

// Collect POST data
$name          = $_POST['name'] ?? '';
$mobile        = $_POST['mobile'] ?? '';
$email         = $_POST['email'] ?? '';
$qualification = $_POST['qualification'] ?? '';
$programType   = $_POST['programType'] ?? '';
$basefare      = $_POST['basefare'] ?? 'INR 0';
$basefare      = (int) filter_var($basefare, FILTER_SANITIZE_NUMBER_INT);

// 1️⃣ Validate required fields
if (!$email || !$name || !$mobile) {
    die("Required fields missing");
}

// 2️⃣ Check if email already exists
$check = $conn->prepare("
    SELECT Id 
    FROM `Certified Natural Health Ambassador Program Registration`
    WHERE `Email ID` = ?
");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $check->close();
    $conn->close();
    die("This email is already registered.");
}
$check->close();

// 3️⃣ Insert full record
$insert = $conn->prepare("
    INSERT INTO `Certified Natural Health Ambassador Program Registration`
    (
        `Name`,
        `Mobile`,
        `Email ID`,
        `Qualification`,
        `Program Type`,
        `Total Fees`,
        `Registration Time`
    )
    VALUES (?, ?, ?, ?, ?, ?, NOW())
");

$insert->bind_param(
    "sssssi",
    $name,
    $mobile,
    $email,
    $qualification,
    $programType,
    $basefare
);

if ($insert->execute()) {
    $registrationId = $conn->insert_id;
    // redirect or success page
    header("Location: success.php?id=" . $registrationId);
    exit;
} else {
    die("Database error: " . $insert->error);
}

$insert->close();
$conn->close();
