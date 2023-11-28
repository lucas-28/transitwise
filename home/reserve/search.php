<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transitwise</title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="stylesheet" href="/transitwise/css/flight_card.css">
</head>

<header>
<?php include ('../../includes/topnav.php'); ?>
</header>
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
}


$flights = array();
// Check if form parameters are set


// If both departure and return flight IDs have been set, redirect to reserve.php
if(isset($_GET['dep-flightID'])) {
    $depFlightID = $_GET['dep-flightID'];
    if(isset($_GET['return-flightID'])) {
        $retFlightID = $_GET['return-flightID'];
        header("location: /transitwise/home/reserve/reserve.php?dep-flightID=" . $depFlightID . " &return-flightID=" . $retFlightID);
    }
    // For choosing a return flight
    else if(isset($_GET['return-date'])) {
        echo 'return date set';
        if (intval($_GET['return-date'])== 0) {
            echo 'return date is 0. ';
            header("location: /transitwise/home/reserve/reserve.php");
            echo 'redirect failed. ';
        }
            
        else {
            $date = intval($_GET['return-date']);
            $depFlightID = $_GET['dep-flightID'];
        }
        
    }
}


// For departure flight
if(isset($_GET['origin'], $_GET['destination'], $_GET['departure-date'])) {

    if(isset($_GET['return-date']) ){
        $return = true;
        $returnDate = $_GET['return-date'];
        
    } else {
        $return = false;
        $returnDate = 0;
    }

    // For manual debugging
    if ($inputType == "manual"){
        $origin = $ori;
        $destination = $des;
        $date = $dep;
    }
    else if ($inputType == "received"){
        $origin = strtoupper($_GET['origin']);
        $destination = strtoupper($_GET['destination']);
        $date = intval(implode("",explode("-", $_GET['departure-date'])));
        echo $date;
    }
    else {
        echo "Error: inputType not set";
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
        while($row = $result->fetch_assoc()) {
            // Loop through result
            //
            $minutes = $row['duration'];
            $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
            $price = round($row['distance'] * 0.15);

            $row['dep_time'] = sprintf('%04d', $row['dep_time']);
            $row['arr_time'] = sprintf('%04d', $row['arr_time']);
            
            // If departure flight has been chosen, set departure flight ID equal to that ID, stored in the URL, else set it to the current flight ID
            if(isset($_GET['dep-flightID']) ) {
                $depFlightID = $_GET['dep-flightID'];
                $retFlightID = $row['flightID'];
            }
            else {
                $depFlightID = $row['flightID'];
                $retFlightID = 0;
            }
            $card = flight_card($row, $duration, $price, $depFlightID, $retFlightID, $returnDate);
            foreach($card as $value) {
                echo $value;
            }
        }
        
        echo '</ul>';
    }
    else {
        echo '<p>No flights found</p>';
    }
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


function flight_card($row, $duration, $price, $depFlightID, $returnFlightID, $returnDate) {
    // This function returns a flight card
    return [
        '<a class="reserve-btn" href="search.php?dep-flightID=' . $depFlightID . '&return-flightID='. $returnFlightID . '&return-date=' . $returnDate . '">',
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

// Close the database connection
$dbconn->close();
?>

