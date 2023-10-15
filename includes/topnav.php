

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
    <style>


        .topnav {
            background: #003366;
            overflow: hidden;
            box-sizing: border-box;
            

        }
        .topnav a, .topnav .dropbtn {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
            cursor: pointer;
        }
        .topnav a.active {
            background-color: #cff5ff;
            color: black;
        }
        .dropdown {
            float: left;
            overflow: hidden;
            cursor: pointer;
        }
        .dropdown .dropbtn {
            font-size: 1em; 
            border: none;
            outline: none;
            color: white;
            padding: .8em 2em;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
            
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 10em;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            box-sizing: border-box;
            top: 2.6em;
        }
        .dropdown-content a {
            float: none;
            color: black;
            padding: .8em 2em;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* From W3 schools: When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
        @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {display: none;}
        .topnav a.icon {
            float: right;
            display: block;
        }
        }

        /* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
        @media screen and (max-width: 600px) {
        .topnav.responsive {position: relative;}
        .topnav.responsive a.icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
}
    </style>
</head>
<body>

<div class="topnav">
    <a href="/transitwise/index.php" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>>Home</a>
    <div class="dropdown">
        <a href="index.php" class="dropbtn" <?php echo ($current_page == "info.php") ? "class='active'" : ""; ?>>Info</a>
        <div class="dropdown-content">
            <a href="/transitwise/info/about.php">About Us</a>
            <a href="/transitwise/docs/html_javascript/FAQ.html">FAQs</a>
            <a href="#">Careers</a>
        </div>
    </div>
    <div class="dropdown">
    <a href="index.php" class="dropbtn" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>s>Deals</a>
        <div class="dropdown-content">
            <a href="#">New Deals</a>
            <a href="#">Classics</a>
            <a href="#">Explore</a>
        </div>
    </div>
    <div class="dropdown">
    <a href="index.php" class="dropbtn" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>>Trips</a>
        <div class="dropdown-content">
            <a href="ticket.php">Current Trips</a>
            <a href="#">Past Trips</a>
        </div>
    </div>


    <?php
    // Check if user is logged in
    if (isset($_SESSION['email'])): 
    ?>
        <a href="/transitwise/logout.php" style="float:right">Sign out</a>
        <a href="/transitwise/account.php" style="float:right">Profile</a>
    <?php else: ?>
        <a href="/transitwise/lp_login.php" style="float:right">Sign in</a>
        <a href="/transitwise/register.php" style="float:right">Register</a>
    <?php endif; ?>
</div>

<!-- The main content of the page will be here -->

</body>
</html>
