<?php
if( !isset($_SESSION["user_data"]) || $_SESSION["user_data"]["is_employee"] != 1){
    printf("You are not authorized to view this page.<br>");
    //header("location: /transitwise/home/portal/login.php");
    exit;
}
$data = $_SESSION["user_data"];
?>