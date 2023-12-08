
<?php include "../../includes/topnav.php";
include "../../includes/connect.php"  ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        TW - Reservations
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", intial-scale="1.0">
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            border-bottom: solid;
            border-right: solid;
            
        }
        td {
            border-bottom: solid;
            text-align: center;
        }
        td .rightmost {
            border-right: solid;
        }

        .topmost {
            border-top: solid;
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

        table {
            display: flex;
            align-items: center;
            justify-content: center;
            }
            tbody {
                display: flex;
                flex-direction: row;
            }
            tr {
                display: flex;
                flex-direction: column;
            }

    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <th class="topmost">Ticket ID</th>
                <th>Passenger</th>
                <th>Class</th>
                <th>Seat</th>
                <th>Bags</th>
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
            if(isset($_GET['RSID']))
                $RSID = intval($_GET['RSID']);
            $sql = "SELECT * FROM 
                tickets 
                INNER JOIN reservations ON tickets.RSID = reservations.RSID
                INNER JOIN external_flights ON reservations.FDID = external_flights.FDID 
                WHERE tickets.RSID =" .  $RSID ."
                ;";
            //echo $sql;
            if($result = mysqli_query($dbconn, $sql)){
                //echo 'found results';
                if(mysqli_num_rows($result) > 0){
                    echo '<h2>Tickets</h2>';
                    $_SESSION['tickets'] = array();
                    $counter = 0;
                    while($row = mysqli_fetch_array($result)){
                        $counter++;
                        array_push($_SESSION['tickets'], $row);
                        $row['dep_time'] = sprintf('%04d', $row['dep_time']);
                        $row['arr_time'] = sprintf('%04d', $row['arr_time']);
                        echo "<tr>";
                        echo "<td class='topmost'>" . $row['TKID'] . "</td>";
                        echo "<td>" . $row['f_name'] . " " . $row["l_name"] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "<td>" . $row['seatID'] . "</td>";
                        echo "<td>" . $row['bags'] . "</td>";
                        echo "<td>" . date('l, F jS, Y',strtotime(strval($row['date']))) . "</td>";
                        echo "<td>" . date('h:i a',strtotime($row['dep_time'])) . "</td>";
                        echo "<td>" . date('h:i a',strtotime($row['arr_time'])) . "</td>";
                        echo "<td>" . intdiv($row['duration'], 60).' h '. ($row['duration'] % 60) . ' m' . "</td>";
                        echo "<td>" . $row['origin'] . "</td>";
                        echo "<td>" . $row['destination'] . "</td>";
                        echo "<td class='link'> <a href='ticket.php?TKID=". $row['TKID'] . "'>View this ticket </a></td>";
                        echo "</tr>";
                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "No Tickets found.";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconn);
            }
            ?>
        </table>
    </div>
</body>