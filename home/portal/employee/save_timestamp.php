<?php

session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'employeeCheck.php';

// Aidan Callan
// Transitwise
// Timestamp database connection

//Include database connection
include('../../../includes/connect.php');

//Set emid variable for later usage
//Save current date and time in appropriate formats
$emid = $_SESSION["user_data"]["EMID"];
$current_date = date('Y-m-d');
$timestamp = gmdate("H:i:s", time());

//Prepare statement to prevent SQL injection attacks
//Select rows with matching EMID and date
$stmt = $dbconn->prepare("SELECT * FROM timecard WHERE `EMID` = ? AND `date` = ? ORDER BY start_time DESC;");
$stmt->bind_param("is", $emid, $current_date);
$stmt->execute();
$result = $stmt->get_result();

// If the number of rows pulled from database is greater than 0
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    //If employee has clocked-in and currently working yet to clock-out
    if ($row['start_time'] != null && $row['end_time'] == null) {
        $stmt = $dbconn->prepare("UPDATE timecard SET `end_time` = ? WHERE `EMID` = ? AND `TCID` = ?");
        $tcid = $row['TCID'];
        $stmt->bind_param("sii", $timestamp, $emid, $tcid);
        //Timestamp creation success/failure status saved to session to be echoed back on timestamp.php
        if ($stmt->execute()) {
            $_SESSION["timestamp_status"] = "Timestamp created successfully.";
        } else {
            $_SESSION["timestamp_status"] = "Error creating timestamp.";
        }
        echo $_SESSION["timestamp_status"];
        $stmt->close();

        //Prepare additional select statement so that updated row can be pulled
        $stmt = $dbconn->prepare("SELECT * FROM timecard WHERE `TCID` = ?");
        $stmt->bind_param("i", $tcid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        //Convert start and end times for current shift from string to time format
        $shift_start = strtotime($row['start_time']);
        $shift_end = strtotime($row['end_time']);
        $interval = $shift_end - $shift_start;
        $secs = $interval % 60;
        $mins = floor(($interval % 3600) / 60);
        $hrs = floor($interval / 3600);

        //Add up hours with remainder of minutes and remainder of seconds to compute total hours worked in shift with 3 decimal places
        $time_worked = $hrs + $mins / 60 + $secs / 3600;
        $adjusted_hrs = sprintf("%.3f", $time_worked);

        //Update hours field in database with computed shift duration
        $stmt = $dbconn->prepare("UPDATE timecard SET `hours` = ? WHERE `EMID` = ? AND `TCID` = ?");
        $stmt->bind_param("dii", $adjusted_hrs, $emid, $tcid);
        $stmt->execute();

        //Retrieve all rows from employees table joined with timecard table where EMIDs match and fetch employee's pay per hour
        $stmt = $dbconn->prepare("SELECT * FROM employees INNER JOIN timecard ON employees.EMID = timecard.EMID WHERE employees.EMID = ?");
        $stmt->bind_param("i", $emid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $pay_per_hour = $row['salary'];

        //Multiply employee's pay per hour with number of hours worked to find wage earned for shift, then insert it into the database
        $stmt = $dbconn->prepare("UPDATE timecard SET wage = ? WHERE TCID = ?");
        $wage = $pay_per_hour * $adjusted_hrs;
        $stmt->bind_param("di", $wage, $tcid);
        $stmt->execute();

        //Close prepared statement
        $stmt->close();
    }
    //If employee's last saved timestamp was a clock-out and they are clocking in
    else {
        $stmt = $dbconn->prepare("INSERT INTO timecard (`EMID`,`date`,`start_time`) VALUES (?,?,?)");
        $stmt->bind_param("iss", $emid, $current_date, $timestamp);
        if ($stmt->execute()) {
            $_SESSION["timestamp_status"] = "Timestamp created successfully.";
        } else {
            $_SESSION["timestamp_status"] = "Error creating timestamp.";
        }

        //Close prepared statement
        $stmt->close();
    }
}
//If employee is creating first timestamp
else {
    $stmt = $dbconn->prepare("INSERT INTO timecard (`EMID`,`date`,`start_time`) VALUES (?,?,?)");
    $stmt->bind_param("iss", $emid, $current_date, $timestamp);

    //Timestamp creation success/failure status saved to session to be echoed back on timestamp.php
    if ($stmt->execute()) {
        $_SESSION["timestamp_status"] = "Timestamp created successfully.";
    } else {
        $_SESSION["timestamp_status"] = "Error creating timestamp.";
    }

    //Close prepared statement
    $stmt->close();
}

//Close database connection
$dbconn->close();

//Redirect employee to timestamp page to view updates immediately
header("Location: timestamp.php");
