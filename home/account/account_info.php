<?php
$email = "acallan88@gmail.com";

include('../../includes/connect.php');

if ($debug == "true") {
    echo nl2br("\nPreparing statement...");
}

$stmt = $dbconn->prepare("SELECT * FROM `users`
INNER JOIN user_permission ON users.UPEID = user_permission.UPEID
WHERE `email` = ?;");

if ($debug == "true") {
    echo nl2br("\nBinding parameters...");
}

$stmt->bind_param("s", $email);

if ($debug == "true") {
    echo nl2br("\n Executing statement...");
}
$stmt->execute();

if ($debug == "true") {
    echo nl2br("\n Getting results...");
}
$result = $stmt->get_result();

if ($debug == "true") {
    echo nl2br("\n Fetching data...");
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo nl2br($row['is_customer']);
}

// session_start() to start session
// $_SESSION["loggedin"] = true;
// $_SESSION["email"] = $email;
// add query beneath this then assign row to session variable 

//when the session starts keep all the info in one place 
//set session variable as an array for account info then set it equal to the row
// write checks (issets) to make sure everything is there before it starts displaying info
// when changing user info maybe update session 

// display first name
// display last name
// display 

// INSERTING
// view register_handler.php for reference
// SQL UPDATE to update sql values to values stored in session array

// create message to show that info was updated successfully

//close statement and dbconn with mysqli_ functions at end of file