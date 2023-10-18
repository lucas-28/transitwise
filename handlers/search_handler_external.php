<?php
echo '<link rel="stylesheet" href="/transitwise/css/flight_card.css">';


$inputType = "received";
$statementType = "not prepared";
$dep = 20220702;
$ori = 'JFK';
$des = 'LAX';

//$path = '/includes';
//set_include_path(get_include_path() . PATH_SEPARATOR . $path);

include ('../includes/connect.php');
include ('../includes/topnav.php');



// Check connection
if($dbconn->connect_error) {
    die('Connection failed: ' . $dbconn->connect_error);
}


$flights = array();
// Check if form parameters are set



if(isset($_GET['origin'], $_GET['destination'], $_GET['departure-date'])) {

    
    if ($inputType == "manual"){
        
        $origin = $ori;
        $destination = $des;
        $departureDate = $dep;
    }
    else if ($inputType == "received"){
        $origin = $_GET['origin'];
        $destination = $_GET['destination'];
        $departureDate = intval($_GET['departure-date']);
    }
    else {
        echo "Error: inputType not set";
    }


    echo '<h2>Flights departing on ' . date('l, F jS',strtotime(strval($departureDate))) .  ':</h2>';

    #Put dep date in format 'YYYYMMDD'
    
    $returnDate = isset($_GET['return-date']) ? $_GET['return-date'] : null;

    // For debugging
    
    $stmt = $dbconn->prepare("SELECT * FROM `external_flights2` 
    WHERE `origin` = ? AND `destination` = ? AND `origin` = ? ;");

    if ($statementType == "prepared") {
            // Prepare SQL statement to search flights
        if($debug=="true"){
            echo nl2br("\n Preparing statement...\n");
        }
        // Bind the parameters
        if($debug== "true"){
            echo nl2br("
            \n Binding parameters...\n");
            
        }

        $stmt->bind_param("ssi", $origin, $destination, $departureDate);

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
    else if ($statementType == "not prepared"){
        // Insecure query
        $sql = "SELECT * FROM " . "`external_flights2` 
        WHERE `origin` = '" . $origin . "' AND `destination` = '" . $destination .  "' AND `date` = '" . $departureDate . "';";
        if ($debug== "true"){
            printf($sql);
        }
        $result= $dbconn->query($sql);
    }
    else {
        echo "Error: statementType not set";
    }

    
    //echo '<link rel="stylesheet" href="../reserve/results.css">';
    
    echo '<ul class="flight-list">';
    while($row = $result->fetch_assoc()) {
        // Here you can print out the details of each flight or store them in an array
        
        $minutes = $row['duration'];
        $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
        $price = round($row['distance'] * 0.15);

        $row['dep_time'] = sprintf('%04d', $row['dep_time']);
        $row['arr_time'] = sprintf('%04d', $row['arr_time']);
        //$dep_time = DateTime::createFromFormat('Hi', $row['dep_time']);
        //$arr_time = DateTime::createFromFormat('Hi', $row['arr_time']);
        $card = flight_card($row, $duration, $price);
        foreach($card as $value) {
            echo $value;
        }
    }
    
    echo '</ul>';
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


function flight_card($row, $duration, $price) {
    // This function returns a flight card
    return [
        '<a class="reserve-btn" href="reserve.php?flight_number=' . $row['flight_number'] . '&airline=' . $row['airline'] . '&origin=' . $row['origin'] . '&destination=' . $row['destination'] . '&dep_time=' . $row['dep_time'] . '&arr_time=' . $row['arr_time'] . '&duration=' . $duration . '&price=' . $price . '">',
        '<li><div class="flight-card">',
        '    <div class="flight-info">',
        '        <div class="flight-times">',
        '            <span class="display-times">' . date('h:i a',strtotime($row['dep_time'])) . ' - ' . date('h:i a',strtotime($row['arr_time'])) .  '</span>',
        '        </div>',
        '        <div class="route-box">',
        '        <span class="flight-route">' . $row['origin'] . ' -> ' . $row['destination'] . '</span>',
        '        </div>',
        '        <span class="airline-name"> ' . $row['airline'] . '</span>',
        '        <span class="flight-name"> Flight ' . $row['flight_number'] . '</span>',
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

