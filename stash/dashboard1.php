<?php
// Author: LP
session_start();
echo "started";
include "/transitwise/privacy/adminCheck.php";


$data = $_SESSION["user_data"];
printf("Logged in as admin.<br>");
printf("Name: %s %s<br>", $data["f_name"], $data["l_name"]);
echo '<a href="/transitwise/home/portal/logout.php">Logout</a><br>';

?>