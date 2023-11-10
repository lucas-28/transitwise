<?php
session_start();
if(!isset($_SESSION["EMID"]) || !isset($_SESSION["user_data"]) || $_SESSION["data"]["is_admin"] != 1){
    printf("You are not authorized to view this page.<br>");
    //header("location: /transitwise/home/portal/login.php");
    exit;
}
else{
    $data = $_SESSION["data"];
    printf("Logged in as admin.<br>");
    printf("Name: %s %s<br>", $data["f_name"], $data["l_name"]);
    echo '<a href="/transitwise/home/portal/logout.php">Logout</a><br>';
}
?>