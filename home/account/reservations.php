<?php 
// A page to view all reservations for a user.

// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
include 'userCheck.php';
include ('../../includes/connect.php');
include ('../../includes/topnav.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        TW - Reservations
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", intial-scale="1.0">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            border: solid
            
        }
        td {
            border-bottom: solid;
            text-align: center;
        }

        th, td {
            padding: 15px;
        }
        td > a {
            color: black;
            text-decoration: none;
        }
        tr > .link:hover {
            background: #cff5ff;
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="main">
    <?php include('../../includes/leftnav.php'); ?>
    <div class="container">
    <div class="container white">
        <table>
            <tr>
                <th>Reservation ID</th>
                <th>Airline</th>
                <th>Tickets</th>
                <th>Date</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Flight Duration</th>
                <th>Flight Origin</th>
                <th>Flight Destination</th>
                <th>Link</th>
            </tr>
            <?php
            // SQL query to select data from a table
            $UPID = $_SESSION['user_data']['UPID'];
            
            $sql = "SELECT * FROM 
                reservations 
                INNER JOIN external_flights ON reservations.FDID = external_flights.FDID 
                INNER JOIN airlines ON external_flights.airline = airlines.AL_code
                WHERE reservations.UPID =" .  $UPID ."
                ;";
            if($result = mysqli_query($dbconn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo '<h2>Reservations</h2>';
                    $_SESSION['reservations'] = array();
                    while($row = mysqli_fetch_array($result)){
                        array_push($_SESSION['reservations'], $row);
                        $row['dep_time'] = sprintf('%04d', $row['dep_time']);
                        $row['arr_time'] = sprintf('%04d', $row['arr_time']);
                        echo "<tr>";
                        echo "<td>" . $row['RSID'] . "</td>";
                        echo "<td>" . $row['AL_name']. "</td>";
                        echo "<td>" . $row['num_tickets'] . "</td>";
                        echo "<td>" . date('F jS, Y',strtotime(strval($row['date']))) . "</td>";

                        echo "<td>" . date('h:i a',strtotime($row['dep_time'])) . "</td>";
                        echo "<td>" . date('h:i a',strtotime($row['arr_time'])) . "</td>";
                        echo "<td>" . intdiv($row['duration'], 60).' h '. ($row['duration'] % 60) . ' m' . "</td>";
                        echo "<td>" . $row['origin'] . "</td>";
                        echo "<td>" . $row['destination'] . "</td>";
                        echo "<td class='link'> <a href='view-tickets.php?RSID=". $row['RSID'] . "'>View tickets </a></td>";
                        echo "</tr>";
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "No reservations found.";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
            }
            ?>
        </table>
    </div>
    </div>
    </div>
    <?php include "../../includes/footer.php" ?>
</body>



