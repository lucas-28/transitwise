<?php

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if(isset($_SESSION["user_data"])){
        $user_data = $_SESSION["user_data"];
        if($user_data["is_admin"] == 1){
            header("location: /transitwise/home/portal/admin/adminhomepage.php");
            exit;
        }
        else if($user_data["is_employee"] == 1){
            header("location: /transitwise/home/portal/employee/employeehomepage.php");
            exit;
        }
        else {
            header("location: /transitwise/home/account/account.php");
            exit;
        }
    } else {
        // User data missing
        header("location: /transitwise/home/portal/logout.php");
        exit;
    }
}

if(isset($_SESSION["login_failed"]) && $_SESSION["login_failed"] == true){
    $error_message = $_SESSION["login_error"];
    unset($_SESSION["login_failed"]);
    unset($_SESSION["login_error"]);
}
?>

<!DOCTYPE html>
<p class="error">
    <?php
    echo $error_message;
    ?>
<form action="/transitwise/handlers/portal_login.php" method="post">
    <input type="text" name="EMID" placeholder="Employee ID" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
</form>