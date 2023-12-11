<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["user_data"]["is_customer"] != 1) {
    printf("You are not authorized to view this page.<br>");
    header("location: /transitwise/home/account/login.php");
    exit;
} else {
    $user_data = $_SESSION["user_data"];
}
