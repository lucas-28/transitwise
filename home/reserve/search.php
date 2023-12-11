<?php
// Author: Lucas Pfeifer
// start session
(session_status() === PHP_SESSION_ACTIVE) ?: session_start();

// flights from 2022
$dataYear = 2022;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Flights</title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="stylesheet" href="/transitwise/css/flight_card.css">
    <style>
        
    </style>
</head>

<header>
<?php include ('../../includes/topnav.php'); ?>
</header>
<div class="main-content">
<div class="container">
<h2>Filter Results</h2>
<div id="filterDiv">
    
    
        <div class="checkboxDiv">
        <div class="checkboxButtonDiv">
            <button class="selectCheckboxes">Select</button>
            <button class="resetCheckboxes">Clear</button>
        </div>
        <h4>Airline:</h4>

        <input type="checkbox" class="airline" value="AS">
        <label>Alaska</label>

        <input type="checkbox" class="airline" value="AA">
        <label>American</label>

        <input type="checkbox" class="airline" value="B6">
        <label>JetBlue</label>

        <input type="checkbox" class="airline" value="DL">
        <label>Delta</label>

        <input type="checkbox" class="airline" value="F9">
        <label>Frontier</label>

        <input type="checkbox" class="airline" value="WN">
        <label>Southwest</label>

        <input type="checkbox" class="airline" value="NK">
        <label>Spirit</label>

        <input type="checkbox" class="airline" value="UA">
        <label>United</label>


        
    </div>
    
    <div class="checkboxDiv">
        <div class="checkboxButtonDiv">
            <button class="selectCheckboxes">Select</button>
            <button class="resetCheckboxes">Clear</button>
        </div>
        <h4>Departure Time:</h4>
        <input type="checkbox" id="morning-filter" class="dep-time" value="0-12">
        <label>Morning</label>

        <input type="checkbox" id="afternoon-filter" class="dep-time" value="12-18">
        <label>Afternoon</label>

        <input type="checkbox" id="night-filter" class="dep-time" value="18-24">
        <label>Night</label>

        
    </div>
    
    <div class="checkboxDiv">
        
        <div class="checkboxButtonDiv">
            <button class="selectCheckboxes">Select</button>
            <button class="resetCheckboxes">Clear</button>
        </div>
        <h4>Price:</h4>
        <input type="checkbox" id="price1" class="price" value="0-100">
        <label for="price1">$100-</label>

        <input type="checkbox" id="price2" class="price" value="100-300">
        <label for="price2">$200</label>
        
        <input type="checkbox" id="price3" class="price" value="300-400">
        <label for="price3">$300</label>

        <input type="checkbox" id="price4" class="price" value="400-1000">
        <label for="price4">$400+</label>

        <!-- You can add more checkboxes similarly -->
    </div>

    
    <script src="/transitwise/js/filter.js"></script>
</div>
<button id="submitBtn">Submit</button>
</div>




<?php


$debug = "true";
$inputType = "received";
$statementType = "prepared";
$dep = 20220702;
$ori = 'JFK';
$des = 'LAX';

//$path = '/includes';
//set_include_path(get_include_path() . PATH_SEPARATOR . $path);

include ('../../includes/connect.php');


// Check connection
if($dbconn->connect_error) {
    die('Connection failed: ' . $dbconn->connect_error);
    echo 'Connection failed';
}


$flights = array();
// Check if form parameters are set


// If both departure and return flight IDs have been set, redirect to reserve.php
if(isset($_GET['dep-flightID'])) {
    $depFlightID = $_GET['dep-flightID'];
    if(isset($_GET['ret-flightID']) && $_GET['ret-flightID'] != 0) {
        $retFlightID = $_GET['ret-flightID'];
        echo 'both flight IDs set. ';
        
        header("location: customize.php?dep-flightID=" . $depFlightID . " &ret-flightID=" . $retFlightID);
    }
    // For choosing a return flight
    else if(isset($_GET['return-date'])) {
        echo 'return date set. ';
        
        if (intval($_GET['return-date'])== 0) {
            echo 'return date is 0. ';
            //header("location: /transitwise/home/index.php");
            echo 'redirect failed. ';
        }
            
        else {
            $date = intval($dataYear . implode("",explode("/", $_GET['return-date'])));
            $depFlightID = $_GET['dep-flightID'];
        }
        
    }
}


// For departure flight
if(isset($_GET['origin'], $_GET['destination'], $_GET['departure-date']) || isset($_GET['dep-flightID'], $_GET['return-date'])) {
    if(isset($returnDate)){
        $returnDate = $_GET['return-date'];
    }
    else {
        $returnDate = 0;
    }
    


    
    // For manual debugging
    if ($inputType == "manual"){
        $origin = $ori;
        $destination = $des;
        $date = $dep;
    }
    else if ($inputType == "received"){
        // normal input
        $origin = strtoupper($_GET['origin']);
        $_SESSION['origin'] = $origin;
        $destination = strtoupper($_GET['destination']);
        $_SESSION['destination'] = $destination;
        
        $numPassengers = intval($_GET['passengers']);
        $date = intval($dataYear . implode("",explode("/", $_GET['departure-date'])));

        
    }
    else {
        echo "Error: inputType not set";
    }
    
    if(isset($_GET['dep-flightID'])) {
        $date = intval($dataYear . implode("",explode("/", $_GET['return-date'])));

        // Get the departure flight info
        if(isset($_SESSION['departure_row'])){
            // reverse the airports for roundtrip
            $depFlight = $_SESSION['departure_row'];
            $origin = $depFlight['destination'];
            $destination = $depFlight['origin'];
        }
        else {
            $depFlightID = $_GET['dep-flightID'];
            $depFlight = $dbconn->query('SELECT * FROM `external_flights` WHERE FDID = ' . $depFlightID . ';')->fetch_assoc();
            $origin = $depFlight['origin'];
            $destination = $depFlight['destination'];
        }
        
    }
    

    // For debugging
    if($debug=="true"){
        echo nl2br("\n Preparing statement...\n");
    }
    $stmt = $dbconn->prepare("SELECT * FROM `external_flights`
    INNER JOIN `airlines` ON `external_flights`.`airline` = `airlines`.`AL_code`
    WHERE `origin` = ? AND `destination` = ? AND `date` = ? ORDER BY `dep_time` ASC;");

    if ($statementType == "prepared") {
            // Prepare SQL statement to search flights
        
        // Bind the parameters
        if($debug== "true"){
            echo nl2br("
            \n Binding parameters...\n");
            
        }

        $stmt->bind_param("ssi", $origin, $destination, $date);

        // Execute the statement
        if($debug=="true"){
            echo nl2br("\n Executing statement...\n");
        }
        $stmt->execute();

        // Get the results
        if($debug=="true"){
            echo nl2br("\n Getting results...\n");
        }
        $result = $stmt->get_result();
        //$result->data_seek(0);
        
        // Fetch the data
        if($debug=="true"){
            echo nl2br("\n Fetching data...\n");
        }
    }
    else if ($statementType == "not-prepared"){
        // Insecure query
        $sql = "SELECT * FROM " . "`external_flights` 
        WHERE `origin` = '" . $origin . "' AND `destination` = '" . $destination .  "' AND `date` = '" . $date . "';";
        if ($debug== "true"){
            printf($sql);
        }
        $result= $dbconn->query($sql);
    }
    else {
        echo "Error: statementType not set";
    }
    
    echo '<div class="container">';
    echo '<h2>Flights departing on ' . date('l, F jS, Y',strtotime(strval($date))) .  ':</h2>';
    if ($result->num_rows > 0) {
        $first_result = $result->fetch_assoc();
        // Get airport info from DB
        //$origin_row = $dbconn->query('SELECT * FROM `airports` WHERE AP_CODE = '. $first_result['origin'] .';')->fetch_assoc();
        //$destination_row = $dbconn->query('SELECT * FROM `airports` WHERE AP_CODE = '. $first_result['destination'] .';')->fetch_assoc();
        // reset pointer
        $result->data_seek(0);

        //echo '<h4>Showing flights from ' . $origin_row['AP_name'] . ' to ' . $destination_row['AP_name'] . '</h4>';
        echo '<ul class="flight-list">';
        $_SESSION['results'] = [];
        $current = [];
        while($row = $result->fetch_assoc()) {
            // Loop through result
            //
            $row['dep_time'] = sprintf('%04d', $row['dep_time']);
            $row['arr_time'] = sprintf('%04d', $row['arr_time']);
            array_push($_SESSION['results'], $row);

            
            
            // If departure flight has been chosen, set departure flight ID equal to that ID, stored in the URL, else set it to the current flight ID
            if(isset($_GET['dep-flightID']) ) {
                $depFlightID = $_GET['dep-flightID'];
                $retFlightID = $row['FDID'];
                $_SESSION["return_row"] = $row;
            }
            else {
                $depFlightID = $row['FDID'];
                $retFlightID = 0;
                $_SESSION["departure_row"] = $row;

            }
            
            $card = flight_card($row, $depFlightID, $retFlightID, $returnDate, $numPassengers);
            foreach($card as $value) {
                echo $value;
            }
        }
        
        echo '</ul>';
        echo '</div>';
    }
    else {
        echo '<p>No flights found</p>';
    }
    echo '</div>';
    echo '</div>';
    include '../../includes/footer.php';

    // Close the statement
    if ($debug== 'true'){
        echo nl2br('
        \n Closing statement...\n');
    }

    $stmt->close();
}
else {
    echo 'No input specified';
}


function flight_card($row, $depFlightID, $retFlightID, $returnDate, $numPassengers) {
    // This function returns a flight card
    $minutes = $row['duration'];
    $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
    $price = $row['price'];
    $returning = false;
    $card =[];
    $depFlightID = $row['FDID'];
    if ($retFlightID != 0) {
        $link = 'customize.php?dep-flightID=' . $depFlightID . '&ret-flightID=' . $retFlightID;
    }
    else if ($returning) {
        $link = 'customize.php?dep-flightID=' . $depFlightID . '&ret-flightID=' . $retFlightID . '&return-date=' . $returnDate;
    }
    
    else {
        $link = 'customize.php?dep-flightID=' . $depFlightID . '&num-passengers=' . $numPassengers;
    }
    

    
    $card = [
        '<a class="reserve-btn" href="' . $link . '">',
        '<li><div class="flight-card" data-dep-time=' . $row['dep_time'] . ' data-arr-time=' . $row['arr_time']  . ' data-airline=' . $row['airline'] . ' data-price=' . $price . '>',
        '    <div class="flight-info">',
        '    <span>' . $depFlightID . '</span>',
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
    return $card;
    }

// Close the database connection
$dbconn->close();



?>

