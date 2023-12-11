

<?php
// Author: Lucas Pfeifer
// This page will handle the edit user form submission
session_start();
include '../includes/connect.php';
//var_dump($dbconn);
$oldEmail = $_SESSION["user_data"]["email"];
$UPID = $_SESSION["user_data"]["UPID"];

// If user attempts to change email, check to ensure the email is not in use.
if (isset($_POST["email"])) {
    $newEmail = $_POST["email"];
    $sql = "SELECT email FROM users WHERE email = ?;";
    if($stmt = mysqli_prepare($dbconn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $newEmail;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) >= 1){
                
                printf("Email already exists.");
                $_SESSION["error"] = True;
                $_SESSION["error-type"] = "duplicate-email";
                $_SESSION["error-message"] = "An account with this email already exists.";
                header("location: /transitwise/home/account/usereditprofile.php");
                exit;
            }
        }
    }
}
else {
    $newEmail = $oldEmail;
}


foreach($_POST as $key => $value) {
    echo $key . " " . $value . "<br>";
    if ($value == "") {
        continue;
    }
    
    else if (in_array($key, array("f_name", "m_name", "l_name", "email", "phone", "birth_date", "address1", "address2", "city", "state", "zip"))){

        $_SESSION["user_data"][$key] = $value;
    }

}
//var_dump($_SESSION["user_data"]);

$f_name = $_SESSION["user_data"]["f_name"];
$m_name = $_SESSION["user_data"]["m_name"];
$l_name = $_SESSION["user_data"]["l_name"];
$newEmail = $_SESSION["user_data"]["email"];
$phone = $_SESSION["user_data"]["phone"];
$birth_date = $_SESSION["user_data"]["birth_date"];
$address1 = $_SESSION["user_data"]["address1"];
$address2 = $_SESSION["user_data"]["address2"];
$city = $_SESSION["user_data"]["city"];
$state = $_SESSION["user_data"]["state"];
$zipcode = $_SESSION["user_data"]["zip"];

var_dump($m_name) ;



$sql = "UPDATE users SET f_name = ?, m_name = ?, l_name = ?, email = ?, phone = ? , birth_date = ?, address1 = ?  WHERE UPID = '". $UPID . "';";
echo $sql;
echo 'preparing statement...';
//, m_name = ?, l_name = ?, email = ?, phone = ?, birth_date = ?, address1 = ?, address2 = ?, city = ?, state = ?, zip = ?
//var_dump($_SESSION["user_data"]);
if($stmt = mysqli_prepare($dbconn, $sql)){
    echo 'binding parameters...';
    
    mysqli_stmt_bind_param($stmt, "sssssss", $param_f_name, $param_m_name, $param_l_name, $param_email, $param_phone, $param_birth_date, $param_address1);
    //, $param_m_name, $param_l_name, $param_email, $param_phone, $param_birth_date, $param_address1, $param_address2, $param_city, $param_state, $param_zipcode);
    $param_f_name = $f_name;
    //var_dump($m_name);
    $param_m_name = $m_name;
    $param_l_name = $l_name;
    $param_email = $newEmail;
    $param_phone = $phone;
    $param_birth_date = $birth_date;
    $param_address1 = $address1;
    $param_address2 = $address2;
    $param_city = $city;
    $param_state = $state;
    $param_zipcode = $zipcode;
    //var_dump($stmt);
    echo 'executing statement...';
    if(mysqli_stmt_execute($stmt)){
        printf("User updated successfully.");
        $_SESSION["error"] = True;
        $_SESSION["error-type"] = "success";
        $_SESSION["error-message"] = "User profile updated successfully.";
        var_dump($_SESSION["user_data"]);
        header("location: /transitwise/home/account/usereditprofile.php");
        //exit;
    }
    else {
        printf("User update failed.");
        $_SESSION["error"] = True;
        $_SESSION["error-type"] = "failure";
        $_SESSION["error-message"] = "User update failed.";
        header("location: /transitwise/home/account/usereditprofile.php");
        exit;
    }
}
else {
    printf("User update failed.");
    $_SESSION["error"] = True;
    $_SESSION["error-type"] = "failure";
    $_SESSION["error-message"] = "User update failed.";
    header("location: /transitwise/home/account/usereditprofile.php");
    exit;
}
?>