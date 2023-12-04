<?php
// Initialize the session
session_status() === PHP_SESSION_ACTIVE ?: session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: /transitwise/home/index.php");
exit;
?>