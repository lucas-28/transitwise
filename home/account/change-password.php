<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); include 'userCheck.php'; ?>
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

<style>
    #change-password {
        display: flex;
        flex-direction: column;
        max-width: 500px;
    }
</style>

</head>
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>

</head>
<body>
    
    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../includes/leftnav.php'); ?>
    <div class="container" id="change-password">
        
        <?php include ('../../includes/error-message.php'); ?>
        <form action="/transitwise/handlers/change_user_pw_handler.php" id="change-password" method="post"> 
            <h1>Change Password</h1>
            <p>Password must be at least 8 characters long, and contain at least one number, one uppercase letter, and one lowercase letter.</p>
            <p></p>
            
            
            <fieldset class="flex-box" style="
            display: grid;
            grid-template-rows: 1fr 1fr 1fr;
                ">
                <p>
                    <label for="old-password">Previous Password:</label>
                    <input type="password" name="oldPassword" id="myInput1">
                    <input type="checkbox" id="checkbox1">Show Password
                </p>
                <p>
                    <label for="new-password">New Password:</label>
                    <input type="password" name="newPassword" id="myInput2">
                    <input type="checkbox"  id="checkbox2">Show Password
                </p>
                <p>
                    <label for="conf-password">Confirm New Password </label>
                    <input id="myInput3" type="password" name="conf-password" required>
                    <input type="checkbox"  id="checkbox3">Show Password
                </p>
                
            </fieldset>
        
            <div class="btn-holder">
                <input id="submit" class="btn" type="submit" name="send" value="Submit">
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