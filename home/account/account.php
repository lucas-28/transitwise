<?php
// Initialize the session
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /transitwise/home/account/login.php");
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




