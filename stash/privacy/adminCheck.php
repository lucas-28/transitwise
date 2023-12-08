<?php
echo "adminCheck starting...";
var_dump($_SESSION);
if( !isset($_SESSION["user_data"]) || $_SESSION["user_data"]["is_admin"] != 1){
    printf("You are not authorized to view this page.<br>");
    header("location: /transitwise/home/portal/login.php");
    exit;
}
else {
    echo "adminCheck done...";
    $data = $_SESSION["user_data"];
}
?>