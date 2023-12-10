<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); include 'userCheck.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <title>Display Data from Database</title>
    <style>
        html {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            font-size: 16px;
        }
        
        /* Define your CSS styles here */
        h2 {
            text-align: center;
        }
        
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            margin-top: 2rem;
            margin-bottom: 8rem;
        }

        th, td {
            border: .08em solid #dddddd;
            text-align: left;
            padding: 1.4rem;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data from Database</h1>
    
    <?php
    // Include the database connection code here
    require 'includes/connect.php';
    // SQL query to select data from a table
    $TKID = 1;
    $sql = "SELECT * FROM 
        tickets 
        INNER JOIN reservations ON tickets.RSID = reservations.RSID 
        INNER JOIN flights ON reservations.FDID = flights.FDID
        INNER JOIN airlines ON flights.ALID = airlines.ALID
        WHERE tickets.TKID = $TKID;
        ;";
    
    // Execute the query
    $result = $dbconn->query($sql);
    
    echo '<h6>Main Data received</h6>';

    if ($result === false) {
        die("Error: " . $dbconn->error);
    }
    
    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $departure = $dbconn->query("SELECT * FROM airports WHERE APID = " . $row["APID_D"] . ";");
        $arrival = $dbconn->query("SELECT * FROM airports WHERE APID = " . $row["APID_A"] . ";");

        $arrival_row = $arrival->fetch_assoc();
        $departure_row = $departure->fetch_assoc();
        
        // Output data for each row
        echo '<br />';
        echo '<h2>Your ticket: </h2>';
        echo '<table>';
        
            
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<td>' . $row["f_name"] . " " . $row["l_name"]  . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Reservation Number</th>';
            echo '<td>' . $row["RSID"] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Flight Number</th>';
            echo '<td>' . $row["flight_number"] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Airline</th>';
            echo '<td>' . $row["name"]  . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Departure City</th>';
            echo '<td>' . $departure_row["city"]  . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Arrival City</th>';
            echo '<td>' . $arrival_row["city"]  . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Phone Number</th>';
            echo '<td>' . $row["phone_number"] . '</td>';
            // Add more table cells for additional fields as needed
            echo '</tr>';
        
        
        echo '</table>';

        //echo 'Table created successfully.';
    } else {
        echo "No results found.";
    }

    // Close the database connection
    $dbconn->close();
    ?>

</body>
</html>
