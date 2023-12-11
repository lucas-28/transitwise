<?php
// Author: Lucas Pfeifer
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
    <link rel="icon" href="/transitwise/images/favicon.ico">
    
    <style>
        .customize {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
        }

        .choose-seat {
            background-color: #036;
            color: #fff;
            border: 1px solid #000;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            width: 100px;
            text-align: center;
        }
        .flight-card {
            cursor: default;
        }

        .flight-card:hover {
            box-shadow: none;
            cursor: default;
        }
        
        .flight-card:active {
            background-color: #fff;
        }
        
        #main-cust {
            min-height: 160vh;
        }

        .seat-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin: 20px 0;
        }

        .passenger {
            padding: 20px;
            margin: 10px 0;
            border-bottom: 3px solid gray;

        }

        input[type="submit"] {
            margin: 20px 0;
        }

        h2 {
            text-align: center;
            width: 100%;
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
            $_SESSION["reservation"]["num_tickets"] = $numPassengers;
            //var_dump($depFlightID); 
            
            if (isset($_SESSION["results"])){
                //echo "results set";
                foreach ($_SESSION["results"] as $row) {
                    //var_dump($row['FDID']);
                    if ($row['FDID'] == $depFlightID){
                        $departureRow = $row;
                        $_SESSION["reservation"]["flight"] = $row;
                        $_SESSION["reservation"]["basePrice"] = round($row['distance'] * 0.15);
                        $_SESSION['reservation']['bagPrice'] = 25;
                        //echo "found";
                    }
                    
                }
                
                //var_dump($departure_row); 
            }
            else {
                echo "no results found";

            }
        }
        echo '<ul class="flight-list">';
        $card = flight_card($departureRow);
        foreach($card as $line) {
            echo $line;
        }
        echo '</ul>';
    

        if(isset($_GET['roundtrip']) && $_GET['roundtrip'] == 'true') {
            $return_row = $_SESSION["return_row"];
            echo "<h2>Return Flight:</h2>";
            flight_card($return_row);

        }
        echo '<div class="customize">';
        echo '<form action="checkout.php" method="get">';
        echo '<input type="hidden" name="num-passengers" id="num-passengers" value="' . $numPassengers . '">';
        echo '<input type="hidden" name="dep-flightID" value="'. $depFlightID .  '">';
        echo '<h2>Passengers</h2>';
        echo '<div class="passenger-list">';
        for ($i=1; $i<$numPassengers+1; $i++){
            foreach(customize($i) as $line) {
                echo $line;
            }
        }
        echo '</div>';
        echo '<div class="button-group"><input type="submit" value="Continue"></div>';
        echo '</form></div>';
    ?>
    
    </div>
    
    </div>
    <?php include 'seats.php'; ?>
    <script src = "../../js/customize.js"></script>
    
</body>

<?php include '../../includes/footer.php'; 


function customize($i) {
    return [
         '<div class="passenger">',
            '<h3>Passenger ' . $i . ':</h3>',
            '<input type="text" name="f_name' . $i . '" id="passenger1' . $i . '" placeholder="First Name" required>',
            '<input type="text" name="l_name' . $i . '" id="passenger2' . $i . '" placeholder="Last Name" required>',
            '<input type="text" name="email' . $i . '" id="passenger3' . $i . '" placeholder="Email" required>',
            '<input type="text" name="FFID' . $i . '" id="FFID' . $i . '" placeholder="Frequent Flyer Number" required>',
            
            '<input type="number" name="bags' . $i . '" min=0 max=3 step=1 placeholder="Number of checked bags">',
            '<div class="seat-info">',
            '<h4>Seat chosen: <span id="display-seat-choice-'.$i.'">None Selected</span> </h4>',
            '<input type="hidden" name="seat' . $i . '" id="input-seat-choice-'.$i.'" value="">',
            '<div class="choose-seat">Choose Seat</div>',
            
            '</div>',
            
            
        '</div>',
    ];
}
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
        '         <span class="ticket_cost">$' . $_SESSION['reservation']['basePrice'] . '</span>',
        '    </div>',
        '</div></li>',
        '</a>',
    ];
    }
?>

</html>


