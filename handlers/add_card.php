<?php
// Author: Lucas Pfeifer
//handler to add credit card to user account
session_start();
include ('../includes/connect.php');

// Check if user is logged in
include ('../privacy/userCheck.php');

var_dump($_POST);

// Prepare an insert statement
$sql = "INSERT INTO credit_cards (UPID, card_number,  cardholder_name, card_expiry, last_four, billing1, billing2, city, state, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
echo "preparing statement...";
if($stmt = $dbconn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    echo "binding parameters...";
    $stmt->bind_param("isssisssss", $param_UPID, $param_card_number,  $param_cardholder_name, $param_card_expiry, $param_last_four, $param_billing1, $param_billing2, $param_city, $param_state, $param_zip);
    
    // Set parameters
    
    $param_UPID = $_SESSION["user_data"]["UPID"];
    $param_card_number = password_hash(trim($_POST["card_number"]),PASSWORD_DEFAULT);
    
    $param_cardholder_name = password_hash(trim($_POST["cardholder_name"]),PASSWORD_DEFAULT);
    $param_card_expiry = password_hash(trim($_POST["expiration_month"]) . trim($_POST["expiration_year"]),PASSWORD_DEFAULT);
    $param_last_four = substr(trim($_POST["card_number"]), -4);
    $param_billing1 = trim($_POST["billing1"]);
    $param_billing2 = trim($_POST["billing2"]);
    $param_city = trim($_POST["city"]);
    $param_state = trim($_POST["state"]);
    $param_zip = trim($_POST["zip"]);


    var_dump($param_card_number);
    
    
    // Attempt to execute the prepared statement
    echo "executing statement...";
    if($stmt->execute()){
        // Redirect to login page
        $_SESSION["is_card_added"] = true;
        echo "card added";
        
        $_SESSION["card_added"] = $param_last_four;
        echo $param_last_four;
        
        header("location: ../home/account/userbilling.php");
    } else{
        echo "Something went wrong. Please try again later.";
    }
}



?>