<?php

//include_once('functions.php');
//include_once('footer.php');
include("../../includes/connect.php");


if(isset($_GET['roundtrip']) && $_GET['roundtrip'] == 'true' && !isset($_GET['return-flightID'])) {
    // Return to search page if 
    header("location: /transitwise/home/reserve/search.php");
} 

if(isset($_GET['flightID'])) {
    $flightID = $_GET['flightID'];

    $stmt = $dbconn->prepare('SELECT * FROM `external_flights` 
        INNER JOIN `airlines` ON external_flights.airlineID = airlines.airlineID
        INNER JOIN `airports` ON external_flights.origin = airports.airportID
        INNER JOIN `seats` ON external_flights.flightID = seats.flightID
        WHERE `flightID` = ?;');
    $stmt->bind_param('i', $flightID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transitwise</title>
    <link rel="stylesheet" href="../../css/topnav.css">
    <link rel="stylesheet" href="../../css/footer.css">
</head>
<header>
<?php include '../../includes/topnav.php'; ?>
</header>
<body>
    <?php
        $departure_row = $_SESSION["departure_row"];
        $return_row = $_SESSION["return_row"];
        echo "<h1>Flight Details</h1>";
        flight_details($departure_row);

        if(isset($_GET['roundtrip']) && $_GET['roundtrip'] == 'true') {
            $return_row = $_SESSION["return_row"];
            echo "<h2>Return Flight:</h2>";
            flight_details($return_row);

        }
    
    ?>
</body>

<?php include '../../includes/footer.php'; ?>

</html>

<?php 
function flight_details($row) {
    // This function returns a flight card
    $minutes = $row['duration'];
    $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
    $price = round($row['distance'] * 0.15);
    return [
        
        '<li><div class="flight-card" data-dep-time=' . $row['dep_time'] . ' data-arr-time=' . $row['arr_time']  . ' data-airline=' . $row['airline'] . ' data-price=' . $price . '>',
        '    <div class="flight-info">',
        '        <div class="flight-times">',
        '            <span class="display-times">' . date('h:i a',strtotime($row['dep_time'])) . ' - ' . date('h:i a',strtotime($row['arr_time'])) .  '</span>',
        '        </div>',
        '        <span class="airline-name"> ' . $row['AL_name'] . '</span>',
        '        <span class="flight-name"> ' . $row['flight_number'] . '</span>',
        '        <div class="route-box">',
        '           <span class="flight-route">' . $row['origin'] . ' -> ' . $row['destination'] . '</span>',
        '        </div>',
        '    </div>',
        '    <div class="duration">',
        '        <span class="flight-duration">' . $duration . '</span>',
        '    <div class="flight-price">',
        '         <span class="ticket_cost">$' . $price . '</span>',
        '    </div>',
        '</div></li>',
        '</a>',
    ];
    }