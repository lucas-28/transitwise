<?php
    // Constants
    $IS_REFUND = 0;
    $LOG = "Transaction successful.";
    $SEAT = "NA";
    $CLASS = "First";
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    // Author: Lucas Pfeifer
    // Date: 2021-09-30
    require_once("../includes/connect.php");
    date_default_timezone_set('America/New_York');

    if(!isset($_SESSION["reservation"])) {
        header("location: /transitwise/home");
    }

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
        var_dump($_POST);
        $UPID = 0;
        $f_name = $_POST["f_name"];
        $m_name = $_POST["m_name"];
        $l_name = $_POST["l_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $birth_date = $_POST["birth_date"];

        $_SESSION["user_data"]["UPID"] = $UPID;
        $_SESSION["user_data"]["f_name"] = $f_name;
        $_SESSION["user_data"]["l_name"] = $l_name;
        $_SESSION["user_data"]["email"] = $email;

    }

    
    $FDID = $_SESSION["reservation"]["flight"]["FDID"];
    $num_tickets = $_SESSION["reservation"]["num_tickets"];

    // will need f_name,m_name,l_name,birth_date,phone,email,
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
    
    $is_refund = $IS_REFUND;
    $log = $LOG;
    
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

    // Insert ticket into database
    foreach ($_SESSION["tickets"] as $ticket) {
    
        var_dump($ticket);
        if(isset($ticket["FFID"])){
            $FFID = $ticket["FFID"];
        }
        else {
            $FFID = 0;
        }

        if(isset($ticket["seat"])){
            $seat = $ticket["seat"];
        }
        else {
            $seat = "NA";
        }
        $FFID = $ticket["FFID"];
        echo 'FFID: ' . $FFID;
        $f_name = $ticket["f_name"];

        $l_name = $ticket["l_name"];

        $email = $ticket["email"];

        $bags = $ticket["bags"];
        $class = $ticket["class"];
        $class = $CLASS;

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