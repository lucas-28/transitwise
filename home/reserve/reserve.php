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

</body>

<?php include '../../includes/footer.php'; ?>

</html>