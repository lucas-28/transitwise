<?php
    // Author: Lucas Pfeifer
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $num_passengers = $_SESSION["reservation"]["num_tickets"];
    $total_bags = 0;
    for($i=1;$i<=$num_passengers;$i++){
        
        $_SESSION["tickets"][$i]["seat"] = $_GET["seat" . $i];
        $_SESSION["tickets"][$i]["class"] = $_GET["class" . $i];
        $_SESSION["tickets"][$i]["bags"] = $_GET["bags" . $i];
        $_SESSION["tickets"][$i]["f_name"] = $_GET["f_name" . $i];
        $_SESSION["tickets"][$i]["l_name"] = $_GET["l_name" . $i];
        $_SESSION["tickets"][$i]["email"] = $_GET["email" . $i];
        $_SESSION["tickets"][$i]["FFID"] = $_GET["FFID" . $i];
        
        $totalBags += $_SESSION["tickets"][$i]["bags"];
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
    <link rel="stylesheet" href="/transitwise/css/flight_card.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <style>
        .customize {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
        }
        .white {
            background-color: #fff;
        }
        .flight-card {
            cursor: default;
            background-color: #cff5ff;
        }

        .flight-card:hover {
            box-shadow: none;
            cursor: default;
        }

        .price-list {
            width: fit-content;
        }

        .price-list > li {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;

        }
        
        
    </style>
</head>
<div class="container white">

<?php



echo '<h2>Your Flight:</h2>';
if(isset($_GET['dep-flightID'])){
    $depFlightID = intval($_GET['dep-flightID']);
    //var_dump($depFlightID); 
    
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


echo '</ul>';

echo '<ul class="cust-options">';
// echo '<li><span class="cust-item">Seat: </span><span class="cust">'. $_SESSION["cust"]["seat"].'</span></li>';
// echo '<li><span class="cust-item">Class: </span><span class="cust">'. $_SESSION["cust"]["class"].'</span></li>';
// echo '<li><span class="cust-item">Number of bags: </span><span class="cust">'. $_SESSION["cust"]["bags"].'</span></li>';
echo '</ul>';


if(isset($_GET['roundtrip']) && $_GET['roundtrip'] == 'true') {
    $return_row = $_SESSION["return_row"];
    echo "<h2>Return Flight:</h2>";
    flight_card($return_row);

}
$basePrice = $_SESSION['reservation']['basePrice'];
$numPassengers = $_SESSION['reservation']['num_tickets'];
$bagPrice = $_SESSION['reservation']['bagPrice'];
$bagFee = $totalBags * $bagPrice;
$subtotal = $numPassengers * $basePrice + $bagFee;
$taxes = $subtotal * 0.13;
$total = $subtotal + $taxes + ($totalBags * $bagPrice);





echo '<h2> Price breakdown:</h2>';
echo '<ul class="price-list">';
echo '<li><span class="price-item">Number of Passengers..........</span><span class="price">' . $numPassengers . '</span></li>';
echo '<li><span class="price-item">Base Price:</span><span class="price">$' . $basePrice . '</span></li>';

echo '<li><span class="price-item">Number of Bags: </span><span class="price">' . $totalBags . '</span></li>';
echo '<li><span class="price-item">Baggage Fee: </span><span class="price">$' . $bagPrice . '</span></li>';
echo '<li><span class="price-item">Subtotal:</span><span class="price">$' . $subtotal  . '</span></li>';

echo '<li><span class="price-item">Taxes: </span><span class="price">$' . $taxes . '</span></li>';
echo '<li><span class="price-item">Total: </span><span class="price">$' . $total . '</span></li>';
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
        '         <span class="ticket_cost">$' . $_SESSION['reservation']['basePrice'] . '</span>',
        '    </div>',
        '</div></li>',
        '</a>',
    ];
    }
?>
</div>