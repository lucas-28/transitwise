<?php

$FlightID = 1;


$availability = 'available'; // set availability to available by default
$availability_chart = [
    '1A' => 'unavailable',
    '1B' => 'available',
    '1C' => 'available',
    '1D' => 'available',
    '1E'=> 'available',
    '1F' => 'available',
    '2A' => 'available',
    '2B' => 'available',
    '2C' => 'available',
    '2D' => 'available',
    '2E'=> 'available',
    '2F'=> 'available',];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Seat</title>
    <link rel="stylesheet" href="/transitwise/css/seats.css">
    <link rel="stylesheet" href="/transitwise/css/style.css">
</head>

    <?php include '../../includes/topnav.php'; ?>


<body>

<div class="seat-map">
    <h1>Choose Your Seat</h1>
    <div class="seat-map__screen"></div>
    <div class="seats">
        <table class="plane">
            <?php
                $rows = 15; // define number of rows
                $columns = 8;// define number of columns
                
                $aisles = array(); // define array for storing aisle seats
                $aisles[0] = 3; // first aisle
                $aisles[1] = 7; // second aisle
                
                // Get string of alphabet
                $alphas = range('A', 'Z'); 

                for($r = 1; $r <= $rows; $r++){ // Loop through rows
                    echo "<tr class='row'>"; 
                    
                    for($c = 1; $c <= $columns; $c++){ // Loop through columns
                        $seat_number = $r . $alphas[$c-1]; // create a seat number
                        if(in_array($c, $aisles)){ echo "<th class='aisle'></th>"; } 
                        echo "<td class='seat " . $availability . "' data-seat='$seat_number'>$seat_number</td>";
                    }
                    echo "</tr>";
                }
            ?>

            <!-- You can duplicate the above tr for more rows -->
        </table>
    </div>
</div>
<?php include '../../includes/footer.php'; ?>
<script src="/transitwise/js/seats.js"></script>
</body>
</html>
