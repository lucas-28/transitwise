<?php
//Aidan Callan
//Transitwise
//Feedback form backend connection

//Begin session
session_start();
echo 'starting';
echo $_SESSION["user_data"]["UPID"];

//Include database connection
include('../../includes/connect.php');

//Data variables retrieved from form

$form_name = $_POST['name'];
$form_email = $_POST['email'];
$feedback = $_POST['feedback'];

//Save current timestamp
$timestamp = gmdate("M d Y H:i:s", time());

//Prepared statement with query to insert form info into database feedback table
$stmt = $dbconn->prepare("INSERT INTO feedback (name,email,feedback,time_stamp) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $form_name, $form_email, $feedback, $timestamp);

//New session variable feedback_status will reflect whether or not execution was successful
if ($stmt->execute()) {
    $_SESSION["feedback_status"] = "Thanks for the feedback.";
} else {
    $_SESSION["feedback_status"] = "Error sending feedback.";
}

//Close prepared statement
$stmt->close();

//Close database connection
$dbconn->close();

//Redirect user to feedback page
header("Location: feedback.php");
