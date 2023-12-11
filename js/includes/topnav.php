

<?php
// Written by Lucas with the help of the following resources:
// Chat GPT-4

session_start(); // Start the session
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
$absolute_path = realpath($current_page); // Get the absolute path of the current page
$absolute_path = str_replace($current_page, "", $absolute_path); // Remove the current page name from the absolute path
$absolute_path = str_replace("\\", "/", $absolute_path); // Replace backslashes with forward slashes
//printf($absolute_path); // Print the absolute path
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
</head>

<header>
<div class="topnav">
    <div class="commerce">
        <a href="/transitwise/home/index.php" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>>Home</a>
        <div class="dropdown">
            <a href="#" class="dropbtn" <?php echo ($current_page == "info.php") ? "class='active'" : ""; ?>>Info</a>
            <div class="dropdown-content">
                <a href="/transitwise/home/info/about.php">About Us</a>
                <a href="/transitwise/docs/html_javascript/FAQ.html">FAQs</a>
                <a href="#">Careers</a>
            </div>
        </div>
        <div class="dropdown">
        <a href="#" class="dropbtn" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>s>Deals</a>
            <div class="dropdown-content">
                <a href="#">New Deals</a>
                <a href="#">Classics</a>
                <a href="#">Explore</a>
            </div>
        </div>
        <div class="dropdown">
        <a href="#" class="dropbtn" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>>Trips</a>
            <div class="dropdown-content">
                <a href="ticket.php">Current Trips</a>
                <a href="#">Past Trips</a>
            </div>
        </div>
    </div>
    <button class="nav-toggle">☰</button>
    <!-- logo will go here
    <div id="logo-box">
        <img id="logo" src="/transitwise/images/logo3.png" alt="logo" width="60%" height="60%">
    </div>
    -->
    <div class="account">
        <?php
        // Check if user is logged in
        if (isset($_SESSION['email'])): 
        ?>
            <a href="/transitwise/home/account/logout.php" style="float:right">Sign out</a>
            <a href="/transitwise/home/account/account.php" style="float:right">Profile</a>
        <?php else: ?>
            <a href="/transitwise/home/account/login.php" style="float:right">Sign in</a>
            <a href="/transitwise/home/account/register.php" style="float:right">Register</a>
        <?php endif; ?>
    </div>
</div>

<!-- The main content of the page will be here -->

</header>
</html>
