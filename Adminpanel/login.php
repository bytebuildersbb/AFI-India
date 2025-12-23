<?php
// Hardcoded credentials
$adminEmail = "admin@afi.com";
$adminPass  = "admin123";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === $adminEmail && $password === $adminPass) {
        // Set a cookie valid for 1 hour
        setcookie("admin_logged_in", $email, time() + 3600, "/"); 
        header("Location: panel.php");
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
            width: 320px;
        }
        .login-box h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
        input{
            width:-webkit-fill-available
        }
    </style>
    </head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>
