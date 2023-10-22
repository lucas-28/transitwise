<?php
// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: lp_login.php");
    exit;
}
else {
    
    include 'includes/topnav.php';
    echo "<br><br>";
    echo "<h1>Account Page</h1>";
}
?>


<p>You now are logged in with the email: <?php echo htmlspecialchars($_SESSION["email"]); ?> </p>

