<?php
session_start();
$successMessage = $_SESSION['successMessage'] ?? '';
unset($_SESSION['successMessage']);

include "./KidneyCare/connection.php"; // $conn should be available from here
include "./KidneyCare/encrption.php";

// Handle POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');

    if (!empty($email)) {
        // Prepare & check if email exists in table
        $stmt = $conn->prepare("SELECT `Email ID` FROM `Kidney Care CME Registration` WHERE `Email ID` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // Email not found
            $errorMessage = "Email is not registered with us.";
        } else {
            // Email found
            $row = $result->fetch_assoc();
            $encryptedEmail = urlencode(encryptData($email)); // urlencode is safe for URL
            $encryptedFlag = urlencode(encryptData('true')); // urlencode is safe for URL
            
            header("Location: ./KidneyCare/payment.php?e=$encryptedEmail&&c=$encryptedFlag");
            // $successMessage = "Email found: " . htmlspecialchars($row['email']);
        }

        $stmt->close();
    } else {
        $errorMessage = "Please enter an email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidney Care Expert CME</title>
    <link rel="stylesheet" href="https://afi-india.in/css/style.css">
    <link rel="stylesheet" href="https://afi-india.in/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://afi-india.in/css/responsive.css">
    <link rel="stylesheet" href="./KidneyCare/styles.css">
</head>

<body>
    
    <div class="container mt-5">
        <div class="col-lg-10" style="min-width: 250px;width: 100%;max-width: unset;">
            <div class="course-content">     
            
            <div class="section-title">
                Clinical Excellence of Ayurveda in Kidney Failure
            </div>
            <!--<h3> Payemnt   </h3>-->
                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
                <?php endif; ?>
        
                <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
                <?php endif; ?>
        
                <form action="" method="POST">
                    <div class="form-group">
                        <label><span class="required">*</span> Email ID</label>
                        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    </div>
                    <div style="display:flex;gap:12px" class="rs-order-2">
                        <button type="submit" style="margin-top:0" class="rs-flex-1 btn btn-primary">Proceed to Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
