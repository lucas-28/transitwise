<?php
// Initialize the session
session_status() === PHP_SESSION_ACTIVE ?: session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /transitwise/home/account/lp_login.php");
    exit;
}
else {
    include '../../includes/topnav.php';
    echo "<div class = 'main'>";
    echo "<div class='container'>";
    echo "<h1>Account Page</h1>";
    echo "<p>You now are logged in with the email: " . htmlspecialchars($_SESSION["email"]) . "</p>";
    echo "</div>";
    echo "</div>";

    include '../../includes/footer.php';
}
?>




