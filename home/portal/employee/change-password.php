<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'employeeCheck.php'; ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--
    // Uriel Cruz
    // Transitwise
    // This is the Admin change password

    For php editor, 
  - Keep the user login.
    -->
<title>User Change password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="stylesheet" href="/transitwise/css/leftnavbar.css">
<link rel="icon" href="/transitwise/images/favicon.ico">

</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>

</head>
<body>
    
    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../../includes/leftnav.php'); ?>
    <div class="container">
        
        <?php include ('../../../includes/error-message.php'); ?>
        <form id="change-password" action="/transitwise/handlers/change_emp_pw_handler.php" method="post"> 
            <h1>Change Password</h1>
            
            <fieldset class="flex-box" style="
            display: grid;
            grid-template-rows: 1fr 1fr 1fr;
                ">
                <p>
                    <label for="old-password">Previous Password:</label>
                    <input type="password" name="oldPassword" id="myInput1">
                    <input type="checkbox" id="showpassword" onclick="myPassword()">Show Password
                </p>
                <p>
                    <label for="new-password">New Password:</label>
                    <input type="password" name="newPassword" id="myInput1">
                    <input type="checkbox" id="showpassword" onclick="myPassword()">Show Password
                </p>
                <p>
                    <label for="conf-password">Confirm New Password </label>
                    <input id="myInput2" type="password" name="conf-password" required>
                    <input type="checkbox" id="showpassword"onclick="myConfirmPassword()">Show Password
                </p>
                
            </fieldset>
        
            <div class="btn-holder">
                <input class="btn" type="submit" name="send" value="Submit">
            </div>
        </form>
    </div>
    <script>
        <?php include ('../../js/leftnavbar.js'); ?>
        <?php include ('../../js/showPassword.js'); ?>
    </script>
    <footer>
    <div class="footer-container">
        <a href="/transitwise/home/portal/login.php">Transitwise Portal</a>
        <a href="contact.html">Contact</a>
        <a href="feedback.html">Feedback</a>
    </div>
</footer>
</body>
</html>