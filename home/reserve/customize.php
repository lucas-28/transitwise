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
    <link rel="stylesheet" href="/transitwise/css/flight_card.css">
    <link rel="stylesheet" href="/transitwise/css/style2.css">
    <style>
        .customize {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
        }
        
        #main-cust {
            min-height: 160vh;
        }
        
    </style>
</head>
<header>
<?php include '../../includes/topnav.php'; ?>
</header>
<body>
    
    <div class="main-content" id="main-cust">
    <h1>Customize Your Flight</h1>
    <div class="container">
    <?php
    
        if(isset($_GET['dep-flightID'])){
            $depFlightID = intval($_GET['dep-flightID']);
            $numPassengers = intval($_GET['num-passengers']);
            //var_dump($depFlightID); 
            
            echo '<p>Click below to select your seat</p>';
            if (isset($_SESSION["results"])){
                //echo "results set";
                foreach ($_SESSION["results"] as $row) {
                    //var_dump($row['FDID']);
                    if ($row['FDID'] == $depFlightID){
                        $departure_row = $row;
                        $_SESSION["price"] = round($row['distance'] * 0.15);
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
    

        if(isset($_GET['roundtrip']) && $_GET['roundtrip'] == 'true') {
            $return_row = $_SESSION["return_row"];
            echo "<h2>Return Flight:</h2>";
            flight_card($return_row);

        }
    
    ?>
    <div class='customize'>
        <h4>Seats chosen: </h4>
        <div id="seatsChosen"></div>
        <form action="checkout.php" method="get">
            <input type="hidden" name="num-passengers" id="num-passengers" value="<?php echo $numPassengers; ?>">
            <input type="hidden" name="dep-flightID" value="<?php echo $depFlightID; ?>">
            <input type="hidden" name=seatID" id="seatID" value="">
            <label for="bags">Number of checked bags:</label>
            <input type="number" name="bags" placeholder="">
            
            
            <input type="submit" value="Continue">
    </div>
    </div>
    <?php include 'seats.php'; ?>
    </div>
    <script src = "../../js/customize.js"></script>
</body>

<?php include '../../includes/footer.php'; 
function flight_card($row) {
    // This function returns a flight card
    $minutes = $row['duration'];
    $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
    
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

</html>


