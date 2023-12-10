<?php
// Author: Lucas Pfeifer
    require_once("../includes/connect.php");
    date_default_timezone_set('America/New_York');
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
        $f_name = $_SESSION["user_data"]["f_name"];
        $m_name = $_SESSION["user_data"]["m_name"];
        $l_name = $_SESSION["user_data"]["l_name"];
        $email = $_SESSION["user_data"]["email"];
        $phone = $_SESSION["user_data"]["phone"];
        $birth_date = $_SESSION["user_data"]["birth_date"];

        var_dump($_SESSION["user_data"]);
    } else {
        $UPID = 0;
    }
    echo 'UPID: ' . $UPID;
    
    echo 'start';

    

    $FDID = $_SESSION["reservation"]["flight"]["FDID"];
    $num_tickets = $_SESSION["reservation"]["num_tickets"];
    
    //test values
    

    //f_name,m_name,l_name,birth_date,phone,email,
    $sql = "INSERT INTO `reservations`(`UPID`,`FDID`,`num_tickets`) VALUES (?,?,?);";
    echo 'preparing statement...';
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binging parameters...';
        mysqli_stmt_bind_param($stmt, "iii", $UPID, $FDID, $num_tickets);
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){ 
            echo 'statement executed...';
            $RSID = mysqli_insert_id($dbconn);
            $_SESSION["reservationID"] = $RSID;
            
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }


    $tax_rate = 1.13;
    $sql = "SELECT * FROM `external_flights` WHERE FDID = " . $_SESSION["reservation"]["flight"]["FDID"] . ";";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $amount = round(($row["price"] * $_SESSION["reservation"]["num_tickets"] + $_SESSION["reservation"]["bags"] * 25) * $tax_rate, 2);

    
    $is_refund = $_SESSION["transaction"]["is_refund"];
    $log = $_SESSION["transaction"]["log"];
    $time_stamp = date("Y-m-d H:i:s");
    
    // test values
    
    
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
    

    




    foreach ($_SESSION["tickets"] as $ticket) {
    var_dump($ticket);
    
    $FFID = $ticket["FFID"];
    echo 'FFID: ' . $FFID;
    $f_name = $ticket["f_name"];
    
    $l_name = $ticket["l_name"];
    $seat = $ticket["seat"];
    $email = $ticket["email"];
    
    $bags = $ticket["bags"];
    $class = $ticket["class"];
    $class = 'First';
    

    


    var_dump($RSID);
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
            $_SESSION["transaction"]["time_stamp"] = $time_stamp;
            $_SESSION["ticketID"] = $ticketID;
            printf("redirecting...");
            header("location: /transitwise/home/reserve/ticket_confirmation.php");
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }
    }

    
    
    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
    echo 'end';
    ?>