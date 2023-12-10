<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'adminCheck.php';
?>
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
    <div id="body">
        

        <form id="register" action="handlers/register_handler.php" method="post"> 
            <h1>Change Password</h1>
            
            <fieldset class="flex-box">
                <p>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="myInput1">
                    <input type="checkbox" id="showpassword" onclick="myPassword()">Show Password
                </p><br>
                <p>
                    <label for="password">Confirm Password </label>
                    <input id="myInput2" type="password" name="password" required>
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
    <!-- footer -->
    <?php include('../../../includes/footer.php'); ?>
</body>
</html>