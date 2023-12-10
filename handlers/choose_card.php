<?php
// Author: Lucas Pfeifer
include ('../includes/connect.php');
session_start();

// Check if user is logged in
include ('../privacy/userCheck.php');

// Prepare an update statement
$sql = "UPDATE credit_cards SET is_active = 1 WHERE last_four = ? and UPID = ?";
echo "preparing statement...";
if($stmt = $dbconn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    echo "binding parameters...";
    $stmt->bind_param("ii", $param_four, $param_UPID);
    
    // Set parameters
    var_dump($_POST["last_four"]);
    $param_four = $_POST["creditInfo"];
    $param_UPID = $_SESSION["user_data"]["UPID"];
    
    // Attempt to execute the prepared statement
    echo "executing statement...";
    if($stmt->execute()){
        // Redirect to login page
        $_SESSION["card_selected"] = true;
        $_SESSION["user_data"]["card"]["last_four"] = $param_four;
        echo "card selected";
        //header("location: ../home/account/userbilling.php");
        
    } else{
        echo "Something went wrong. Please try again later.";
    }
}

$sql = "UPDATE credit_cards SET is_active = 0 WHERE last_four != ? and UPID = ?";
echo "preparing statement...";
if($stmt = $dbconn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    echo "binding parameters...";
    $stmt->bind_param("ii", $param_four, $param_UPID);
    
    // Set parameters
    var_dump($_POST["last_four"]);
    $param_four = $_POST["creditInfo"];
    $param_UPID = $_SESSION["user_data"]["UPID"];
    
    // Attempt to execute the prepared statement
    echo "executing statement...";
    if($stmt->execute()){
        // Redirect to login page
        $_SESSION["is_card_selected"] = true;
        $_SESSION["card_selected"] = $_POST["creditInfo"];
        echo "other cards unselected";
        header("location: ../home/account/userbilling.php");
        
    } else{
        echo "Something went wrong. Please try again later.";
    }
}


