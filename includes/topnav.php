

<?php
// Written by Lucas with the help of the following resources:
// Chat GPT-4


$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
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
        }
        .topnav a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<div class="topnav">
    <a href="index.php" <?php echo ($current_page == "index.php") ? "class='active'" : ""; ?>>Home</a>
    <a href="products.php" <?php echo ($current_page == "products.php") ? "class='active'" : ""; ?>>Products</a>
    <a href="sales.php" <?php echo ($current_page == "sales.php") ? "class='active'" : ""; ?>>Sales</a>
    <a href="reports.php" <?php echo ($current_page == "reports.php") ? "class='active'" : ""; ?>>Reports</a>
    <a href="settings.php" <?php echo ($current_page == "settings.php") ? "class='active'" : ""; ?>>Settings</a>

    <?php
    // Check if user is logged in
    if (isset($_SESSION['user_id'])): 
    ?>
        <a href="logout.php" style="float:right">Logout</a>
    <?php else: ?>
        <a href="lp_login.php" style="float:right">Login</a>
    <?php endif; ?>
</div>

<!-- The main content of the page will be here -->

</body>
</html>
