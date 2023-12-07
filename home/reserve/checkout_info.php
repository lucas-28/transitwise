<?php
include("../../includes/topnav.php");
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
    <link rel="stylesheet" href="/transitwise/css/flight_card.css">
    <style>
        .customize {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
        }
    </style>
</head>
<div class="container">
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo '<h2>Your Flights:</h2>';
if(isset($_GET['dep-flightID'])){
    $depFlightID = intval($_GET['dep-flightID']);
    //var_dump($depFlightID); 
    echo '<h4>Departure Flight:</h4>';
    if (isset($_SESSION["results"])){
        //echo "results set";
        foreach ($_SESSION["results"] as $row) {
            //var_dump($row['FDID']);
            if ($row['FDID'] == $depFlightID){
                $departure_row = $row;
                //echo "found";
            }
            
        }
        
        //var_dump($departure_row); 
    }
}
echo '<ul class="flight-list">';
$card = flight_card($departure_row);
foreach($card as $line) {
    echo $line;
}

$_SESSION["cust"]["seat"] = "1A";
$_SESSION["cust"]["class"] = "Economy";
$_SESSION["cust"]["bags"] = 0;
echo '</ul>';

echo '<ul class="cust-options">';
echo '<li><span class="cust-item">Seat: </span><span class="cust">'. $_SESSION["cust"]["seat"].'</span></li>';
echo '<li><span class="cust-item">Class: </span><span class="cust">'. $_SESSION["cust"]["class"].'</span></li>';
echo '<li><span class="cust-item">Number of bags: </span><span class="cust">'. $_SESSION["cust"]["bags"].'</span></li>';
echo '</ul>';


if(isset($_GET['roundtrip']) && $_GET['roundtrip'] == 'true') {
    $return_row = $_SESSION["return_row"];
    echo "<h2>Return Flight:</h2>";
    flight_card($return_row);

}

echo '<h2> Price breakdown:</h2>';
echo '<ul class="price-list">';
echo '<li><span class="price-item">Base Price: </span><span class="price">$' . $_SESSION['price'] . '</span></li>';
echo '<li><span class="price-item">Taxes and Fees: </span><span class="price">$' . round($_SESSION['price'] * 0.1) . '</span></li>';
echo '<li><span class="price-item">Total: </span><span class="price">$' . round($_SESSION['price'] * 1.1) . '</span></li>';
echo '</ul>';






function flight_card($row) {
    // This function returns a flight card
    $minutes = $row['duration'];
    $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
    $price = round($row['distance'] * 0.15);
    return [
        
        '<li><div class="flight-card" data-dep-time=' . $row['dep_time'] . ' data-arr-time=' . $row['arr_time']  . ' data-airline=' . $row['airline'] . ' data-price=' . $_SESSION['price'] . '>',
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
        '         <span class="ticket_cost">$' . $_SESSION['price'] . '</span>',
        '    </div>',
        '</div></li>',
        '</a>',
    ];
    }
?>
</div>