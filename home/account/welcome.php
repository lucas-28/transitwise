<?php
// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: lp_login.php");
    exit;
}
?>
<p>You now are logged in with the email: <?php echo htmlspecialchars($_SESSION["email"]); ?> </p>

<a href="logout.php">Logout</a>