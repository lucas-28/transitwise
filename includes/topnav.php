<?php
// Written by Lucas with the help of the following resources:
// Chat GPT-4

session_status() === PHP_SESSION_ACTIVE ?: session_start();
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name


$trips = array("reservations.php", "previous-trips.php", "view-tickets.php", "ticket.php");
$home = array("index.php");




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
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>

<header>

    <div class="topnav">
        <div class="web">

            <a href="/transitwise/home/index.php" <?php echo (in_array($current_page, $home)) ? "class='active'" : ""; ?>>Home</a>
            <div class="dropdown">
                <a href="#" class="dropbtn">Info</a>
                <div class="dropdown-content">
                    <a href="/transitwise/home/info/about.php">About Us</a>
                    <a href="/transitwise/home/info/FAQ.php">FAQs</a>
                    <a href="/transitwise/home/info/careers.php">Careers</a>
                    <a href="/transitwise/home/info/compliance.php">Compliance</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>>Deals</a>
                <div class="dropdown-content">
                    <a href="/transitwise/home/info/comingsoon.php">New Deals</a>
                    <a href="/transitwise/home/info/comingsoon.php">Classics</a>
                    <a href="/transitwise/home/info/comingsoon.php">Explore</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn" <?php echo ($current_page == "view-tickets.php") ? "class='active'" : ""; ?>>Trips</a>
                <div class="dropdown-content">
                    <a href="/transitwise/home/account/reservations.php">Current Trips</a>
                    <a href="/transitwise/home/info/comingsoon.php">Past Trips</a>
                </div>
            </div>

        </div>

        <!-- logo will go here
    <div id="logo-box">
        <img id="logo" src="/transitwise/images/logo3.png" alt="logo" width="60%" height="60%">
    </div>
    -->
        <div class="account">
            <?php
            // Check if user is logged in
            if (isset($_SESSION['loggedin'])) :
            ?>
                <a href="/transitwise/home/account/logout.php" style="float:right">Sign out</a>
                <a href="/transitwise/home/account/userhomepage.php" style="float:right">Profile</a>
            <?php else : ?>
                <a href="/transitwise/home/account/login.php" style="float:right">Sign in</a>
                <a href="/transitwise/home/account/register.php" style="float:right">Register</a>
            <?php endif; ?>
        </div>


        <button class="nav-toggle">☰</button>
        <div class="responsive">

            <ul class="responsive-nav-list">
                <li><a href="/transitwise/home/index.php" <?php echo (in_array($current_page, $home)) ? "class='active'" : ""; ?>><span>Home</span></a></li>
                <li><a href="/transitwise/home/info/comingsoon.php" class="dropbtn" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>><span>Deals</span></a></li>
                <li><a href="/transitwise/home/account/reservations.php" class="dropbtn" <?php echo ($current_page == "view-tickets.php") ? "class='active'" : ""; ?>><span>Trips</span></a></li>
                <?php
                // Check if user is logged in
                if (isset($_SESSION['loggedin'])) :
                ?>
                    <li><a href="/transitwise/home/account/userhomepage.php">Profile</a></li>
                    <li><a href="/transitwise/home/account/logout.php">Sign out</a></li>

                <?php else : ?>
                    <li><a href="/transitwise/home/account/register.php">Register</a></li>
                    <li><a href="/transitwise/home/account/login.php">Sign in</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <script src="/transitwise/js/topnav.js"></script>
    </div>


    <!-- The main content of the page will be here -->

</header>

</html>