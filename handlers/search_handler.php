<?php
echo 'old';
echo '<link rel="stylesheet" href="../reserve/flight_card.css">';

include ('../includes/connect.php');
include ('../includes/topnav.php');
include ('../includes/flight_card.php');

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
    $returnDate = $_GET['return-date'];
    echo '<h2>Flights departing on ' . date('F j, Y',strtotime($departureDate)) .  ':</h2>';
    echo '<h2>Flights returning on ' . date('F j, Y',strtotime($returnDate)) .  ':</h2>';


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
        $flight_card($row);
    }
    echo '</ul>';
    // Close the statement
    $stmt->close();
}

// Close the database connection
$dbconn->close();
?>
