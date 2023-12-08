<?php
session_start();
if(!isset($_SESSION["EMID"]) || !isset($_SESSION["user_data"]) || $_SESSION["data"]["is_employee"] != 1){
    header("location: /transitwise/home/portal/login.php");
    exit;
}
else{
    $data = $_SESSION["data"];
    printf("Logged in as employee.<br>");
    printf("Name: %s %s<br>", $data["f_name"], $data["l_name"]);
}
?>