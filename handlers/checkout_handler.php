<?php
    require_once("../includes/connect.php");
    //require_once "includes/session.php";
    //require_once "includes/functions.php";
    //require_once "includes/header.php";
    //require_once "includes/footer.php";
    //require_once "includes/redirect.php";
    //require_once "includes/redirect_admin.php";
    //require_once "includes/redirect_user.php";

    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    if (isset($_SESSION["error"]) && $_SESSION["error"] == true) {
        $error_message = $_SESSION["error-message"];
        echo '<style type="text/css">
         #error-message {
            display: block;
        }
        </style>';
    }

    unset($_SESSION['error']);

    if (isset($_SESSION["user_data"])) {
        $UPID = $_SESSION["user_data"]["UPID"];
    } else {
        $UPID = 0;
    }
    echo 'UPID: ' . $UPID;
    
    echo 'start';
    //$amount = $_SESSION["total"];
    $amount = 100;
    $time_stamp = date("Y-m-d H:i:s");
    //$is_refund = $_SESSION["is_refund"];
    $is_refund = 0;
    $log = "None";
    $sql = "INSERT INTO `transactions`(`UPID`,`amount`,`time_stamp`,`is_refund`,`log`) VALUES (?,?,?,?,?);
            INSERT INTO `reservations`(`UPID`,`transactionID`,`f_name`,`l_name`,`email`,`phone`) VALUES (?,?,?,?,?,?);
            INSERT INTO `tickets` (`RSID`,`FDID`,`seatID`,`class`,`is_return`) VALUES (?,?,?,?,?,?);
    ";
    echo 'preparing statement...';  
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binging parameters...';
        mysqli_stmt_bind_param($stmt, "idsss", $UPID, $amount, $time_stamp, $is_refund, $log);
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){ 
            echo 'statement executed...';
            $transactionID = mysqli_insert_id($dbconn);
            $_SESSION["transactionID"] = $transactionID;
            printf("redirecting...");
            header("location: /transitwise/home/reserve/submit.php");
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }

    var_dump($_POST);

    if($m_name == "") {
        $m_name = NULL;
    }
    if($address2 == "") {
        $address2 = NULL;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    var_dump($password);

    
    printf("validating credentials...");
    
    $sql = "SELECT email FROM users WHERE email = ?;";
    if($stmt = mysqli_prepare($dbconn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) >= 1){
                printf("Email already exists.");
                $_SESSION["error-type"] = "duplicate-email";
                $_SESSION["error-message"] = "An account with this email already exists.";
                $_SESSION["duplicate-email"] = $param_email;
                header("location: /transitwise/home/account/register.php");
                exit;
            }
        }
    }
    $stmt = mysqli_stmt_init($dbconn);
    printf("inserting into database...");
    $sql = "INSERT INTO `users`(`UPEID`,`f_name`,`m_name`,`l_name`,`email`,`phone`,`birth_date`,`address1`,`address2`,`city`,`state`,`zip`,`password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
    

    
    printf("preparing statement...");
    if($stmt = mysqli_prepare($dbconn, $sql)){
        printf("statement prepared...");
        printf("binding parameters...");
        mysqli_stmt_bind_param($stmt, "issssssssssss", $UPEID, $f_name, $m_name, $l_name, $email, $phone, $birth_date, $address1, $address2, $city, $state, $zipcode, $password);
        //var_dump($stmt);
        printf("executing statement...");
        if(mysqli_stmt_execute($stmt)){ 
            
                   
            
            // Redirect user to login
            printf("redirecting...");
            header("location: /transitwise/home/account/LP_login.php");
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
?>