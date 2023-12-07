<?php
if( !isset($_SESSION["user_data"]) || $_SESSION["user_data"]["is_customer"] != 1){
    printf("You are not authorized to view this page.<br>");
    //header("location: /transitwise/home/portal/login.php");
    exit;
}
else {
    echo "user check done...";
}
?>