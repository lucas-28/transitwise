<?php
echo '<link rel="stylesheet" href="../reserve/flight_card.css">';

include ('../includes/connect.php');
include ('../includes/topnav.php');


// Check connection
if($dbconn->connect_error) {
    die('Connection failed: ' . $dbconn->connect_error);
}


$flights = array();
// Check if form parameters are set

if(isset($_GET['from'], $_GET['to'], $_GET['departure-date'])) {
    
    $from = $_GET['from'];
    $to = $_GET['to'];
    $departureDate = $_GET['departure-date'];
    echo '<h2>Flights departing on ' . date('F j, Y',strtotime($departureDate)) .  ':</h2>';
    
    $returnDate = isset($_GET['return-date']) ? $_GET['return-date'] : null;

    // Prepare SQL statement to search flights
    $stmt = $dbconn->prepare("SELECT * FROM flights 
    INNER JOIN airlines ON flights.ALID = airlines.ALID
    WHERE APID_D = ? AND APID_A = ? AND departure_date = ?;");

    // Bind the parameters
    $stmt->bind_param("sss", $from, $to, $departureDate);

    // Execute the statement
    $stmt->execute();

    // Get the results
    $result = $stmt->get_result();

    echo '<ul class="flight-list">';
    // Fetch the data
    while($row = $result->fetch_assoc()) {
        // Here you can print out the details of each flight or store them in an array
        //$flights[] = $row;
        $start_datetime = new DateTime($row['departure_time']); 
        $end_datetime = new DateTime($row['arrival_time']);
        $duration = $start_datetime->diff($end_datetime); 
        
        
        
        //echo '<link rel="stylesheet" href="../reserve/results.css">';
        
        echo '<li><div class="flight-card">';
        echo '    <div class="flight-info">';
        echo '        <div class="flight-times">';
        echo '            <span class="display-times">' . date('h:i a',strtotime($row['departure_time'])) . ' - ' . date('h:i a',strtotime($row['arrival_time'])) .  '</span>';
        echo '        </div>';
        echo '        <div class="route-box">';
        echo '        <span class="flight-route">' . $row['APID_D'] . ' -> ' . $row['APID_A'] . '</span>';
        echo '        </div>';
        echo '        <span class="airline-name"> ' . $row['AL_name'] . '</span>';
        echo '        <span class="flight-name"> Flight ' . $row['flight_number'] . '</span>';
        echo '    </div>';
        echo '    <div class="duration">';
        echo '        <span class="flight-duration">' . $duration->h . 'h ' . $duration->i . 'm </span>';
        echo '    <div class="flight-price">';
        echo '         <span class="ticket_cost">$' . $row['ticket_cost'] . '</span>';
        echo '    </div>';
        echo '</div><li>';
        
    }
    echo '</ul>';
    // Close the statement
    $stmt->close();
}

// Close the database connection
$dbconn->close();
?>
