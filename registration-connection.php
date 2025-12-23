<?php
// 1. DB credentials
    $host       = "localhost";
    $user       = "u512009538_root";
    $pass       = "Afi_1234";
    $database   = "u512009538_afi_india";

$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $fullname = $_POST['fullname'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $qualification = $_POST['qualification'] ?? '';
    $system = $_POST['system'] ?? '';
    $location = $_POST['location'] ?? '';
    $clinic = $_POST['clinic'] ?? '';
    $experience = $_POST['experience'] ?? 0;
    $treating = $_POST['treating'] ?? '';
    $registration_type = $_POST['registration_type'] ?? '';
    $addon = $_POST['addon'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment = $_POST['payment'] ?? '';
    $referral = $_POST['referral'] ?? '';
    $basefare = $_POST['basefare'] ?? 'INR 0';
    $basefare = (int) filter_var($basefare, FILTER_SANITIZE_NUMBER_INT);

    // Handle certificate file upload
    $certificatePath = '';
    if (isset($_FILES['certificate']) && $_FILES['certificate']['error'] === 0) {
        $uploadDir = 'uploads/Kidney-Care-CME-Registration/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // create uploads/ if it doesn't exist
        }

        $filename = uniqid() . '_' . basename($_FILES['certificate']['name']);
        $filename = preg_replace("/[^A-Za-z0-9_\-\.]/", '', $filename);
        $targetPath = $uploadDir . $filename;

        if ($_FILES['certificate']['size'] > 5 * 1024 * 1024) {
            die("File too large. Max 5MB allowed.");
        }

        $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
        if (!in_array($_FILES['certificate']['type'], $allowedTypes)) {
            die("Invalid file type. Only PDF, JPG, PNG allowed.");
        }

        if (move_uploaded_file($_FILES['certificate']['tmp_name'], $targetPath)) {
            $certificatePath = $targetPath;
        } else {
            die("Error uploading certificate file.");
        }
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO `Kidney Care CME Registration` 
    (`Name`, `Mobile Number`, `Email ID`, `Qualification`, `System Practiced`, `State & City`, `Clinic / Institution / Hospital Name`, 
    `Years of Clinical Experience`, `Are You Treating Kidney Patients?`, `Select Your Registration Type`, `Upload Degree Certificate / Registration Proof`,
    `Add-on Features`, `Postal Address`, `Preferred Payment Mode`, `Referral Code (if any)`, `Total Fees`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssisssssssi",
        $fullname, $mobile, $email, $qualification, $system,
        $location, $clinic, $experience, $treating, $registration_type,
        $certificatePath, $addon, $address, $payment, $referral, $basefare
    );

    // $certificatePath,

    if ($stmt->execute()) {
        echo "<h2>Registration Successful!</h2>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>