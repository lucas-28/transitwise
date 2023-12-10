<?php

if( !isset($_SESSION["loggedin"]) || $_SESSION["user_data"]["is_admin"] != 1){
    printf("You are not authorized to view this page.<br>");
    header("location: /transitwise/home/portal/login.php");
    exit;
}
else {
    $data = $_SESSION["user_data"];
}
?>