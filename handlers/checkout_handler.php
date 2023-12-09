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

    

    $FDID = $_SESSION["reservation"]["FDID"];
    $num_tickets = $_SESSION["reservation"]["num_tickets"];
    
    //test values
    $UPID = 1;
    $FDID = 1;
    $num_tickets = 1;

    $sql = "INSERT INTO `reservations`(`UPID`,`FDID`,`num_tickets`) VALUES (?,?,?);";
    echo 'preparing statement...';
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binging parameters...';
        mysqli_stmt_bind_param($stmt, "iii", $UPID, $FDID, $num_tickets);
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){ 
            echo 'statement executed...';
            $reservationID = mysqli_insert_id($dbconn);
            $_SESSION["reservationID"] = $reservationID;
            
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }


    


    $amount = $_SESSION["transaction"]["amount"];
    $is_refund = $_SESSION["transaction"]["is_refund"];
    $log = $_SESSION["transaction"]["log"];
    $time_stamp = date("Y-m-d H:i:s");
    
    // test values
    $UPID = 1;
    $RSID = 1;
    $amount = 100; 
    $is_refund = 0;
    $log = "None";
    
    $log = "None";
    $sql = "INSERT INTO `transactions`(`UPID`,`RSID`,`amount`,`time_stamp`,`is_refund`,`log`) VALUES (?,?,?,?,?,?);";
    echo 'preparing statement...';  
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binging parameters...';
        mysqli_stmt_bind_param($stmt, "iidsss", $UPID, $RSID, $amount, $time_stamp, $is_refund, $log);
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){ 
            echo 'statement executed...';
            $transactionID = mysqli_insert_id($dbconn);
            $_SESSION["transactionID"] = $transactionID;
            
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }
    

    $RSID = $_SESSION["reservationID"];

    $_SESSION["tickets"] = array();


    //foreach ($_SESSION["tickets"] as $ticket) {
    // $FFID = $_SESSION[$ticket]["FFID"];
    // $f_name = $_SESSION[$ticket]["f_name"];
    // $l_name = $_SESSION[$ticket]["l_name"];
    // $seat = $_SESSION[$ticket]["seat"];
    // $email = $_SESSION[$ticket]["email"];
    
    // $bags = $_SESSION[$ticket]["bags"];
    // $class = $_SESSION[$ticket]["class"];

    //test values
    $FFID = 1;
    $f_name = "lucas";
    $l_name = "lucas";
    $seat = "1A";
    $email = "test@gmail.com";
    $phone = "1234567890";
    $bags = 1;
    $class = "Economy";

    
    $sql = "INSERT INTO `tickets`(`RSID`,`FFID`,`f_name`,`l_name`,`seat`,`email`,`bags`,`class`) VALUES (?,?,?,?,?,?,?,?);";
    echo 'preparing statement...';
    //var_dump($sql);
    //var_dump($dbconn);
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binging parameters...';
        mysqli_stmt_bind_param($stmt, "iissssss", $RSID, $FFID, $f_name, $l_name, $seat, $email, $bags, $class);
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){ 
            echo 'statement executed...';
            $ticketID = mysqli_insert_id($dbconn);
            $_SESSION["ticketID"] = $ticketID;
            printf("redirecting...");
            //header("location: /transitwise/home/reserve/ticket_confirmation.php");
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }
    //}

    
    
    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
    echo 'end';
    ?>