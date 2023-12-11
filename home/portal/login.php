<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["user_data"]["is_admin"] === "1"){
    echo "redirecting to admin homepage...";
    header("location: admin/dashboard.php");
    exit;
}
else if (isset($_SESSION["loggedin"]) && $_SESSION["user_data"]["is_employee"] === "1"){
    echo "redirecting to employee homepage...";
    header("location: employee/employeehomepage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>TW - Portal Login </title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="stylesheet" href="/transitwise/css/portal_login.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include '../../includes/nav-icon.php'; ?>
        <form action="/transitwise/handlers/portal_login.php" method="post">
            <h1>Employee Login</h1>
            <?php include("../../includes/error-message.php"); ?>
            <div class="input-box">
                <input type="text" name="EMID" placeholder="Employee ID" id="EMID" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <!--
            <div class="remember-forget">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forget password?</a>
            </div>
            -->

            <button type="submit" name="send" class="btn" id="submit">Login</button>
            <!-- 
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
            -->
        </form>
    </div>


    <script src="/transitwise/js/portal_login.js"></script>
</body>

</html>