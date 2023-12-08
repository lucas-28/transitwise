<?php
// start session
if(!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Seat</title>
    <link rel="stylesheet" href="/transitwise/css/seats.css">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="stylesheet" href="/transitwise/css/style2.css">
    <style>
        .seat-map {
            position: absolute;
            top: 120px;
            width: 100%;
            max-width: 800px;
            
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);



        }
        .seat-map h1 {
            text-align: center;
            margin: 0 0 20px;
            font-size: 24px;
            font-weight: 600;
        }
        .seat-map__screen {
            position: relative;
            margin-bottom: 20px;
            padding-top: 30px;
            height: 60px;
            background: #333;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            color: #fff;
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .close-button {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            padding: 10px;
            cursor: pointer;
            background: #036;
            color: #fff;
        }

        

    </style>
</head>

    


<body>

<div class="seat-map hidden">
    
    <p class="close-button" >Close</p>
    <h1>Seats</h1>
    <p>Click on a seat to select it. Click again to deselect it.</p>
    <div class="seats">
        <table class="plane">
            <?php
                // Create availability chart
                $Nrows = 15; // define number of rows
                $Ncolumns = 6;// define number of columns

                $aisles = array(); // define array for storing aisle seats
                $aisles = array(4);

                for($r = 1; $r <= $Nrows; $r++){ // Loop through rows
                    for($c = 1; $c <= $Ncolumns; $c++){ // Loop through columns
                        $seat = $r . $alphas[$c-1]; // create a seat number
                        $availability_chart[$seat] = 'available';
                        //var_dump($availability_chart);
                    }
                }
            
                $sql = "SELECT * FROM reservations 
                INNER JOIN tickets ON reservations.RSID = tickets.RSID
                WHERE FDID = 1546979;";
                $result = $dbconn->query($sql);
                $unavailability = array();
                while($row = $result->fetch_assoc()){
                    $seat = $row['seat'];
                    array_push($unavailability, $seat);
                }


                
                
                
                
                // Get string of alphabet
                $alphas = range('A', 'Z'); 

                for($r = 1; $r <= $Nrows; $r++){ // Loop through rows
                    echo "<tr class='row'>"; 
                    $aisleCount = 0;
                    $yes = "available";
                    $no = "unavailable";
                    for($c = 1; $c <= $Ncolumns; $c++){ // Loop through columns
                        
                        $seat = $r . $alphas[$c-1]; // create a seat number
                        if(in_array($c, $aisles)){ echo "<th class='aisle'></th>"; }
                        $value = (in_array($seat, $unavailability)) ? $no:$yes;
                        echo "<td class='seat " . $value . "' data-seat='$seat'>$seat</td>";
                    }
                    echo "</tr>";
                }
            ?>

            <!-- You can duplicate the above tr for more rows -->
        </table>
    </div>
</div>


</body>
</html>
