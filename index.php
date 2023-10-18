<?php 
session_start();
include 'includes/topnav.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirTicket - Book Your Flight</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .search-box {
            background-color: #fff;
            margin: 1em;
            padding: 2em;
            border-radius: 0.3125em; /* Equivalent to 5px when base font-size is 16px */
            box-shadow: 0.125em 0.125em 0.75em #aaa;
            display: flex;
            flex-direction: column;
            gap: 0.625em; /* Equivalent to 10px when base font-size is 16px */
        }
        select, input[type="text"], input[type="date"], input[type="submit"] {
            padding: 0.625em; /* Equivalent to 10px when base font-size is 16px */
            margin: 0.3125em 0; /* Equivalent to 5px when base font-size is 16px */
            box-sizing: border-box;
            width: 100%;
            max-width: 100%;
            border-radius: 0.3125em;
            border: 0.0625em solid #ddd; /* Equivalent to 1px when base font-size is 16px */
        }
        select:focus, input[type="text"]:focus, input[type="date"]:focus {
            outline: 0.0625em solid #aaa; /* Equivalent to 1px when base font-size is 16px */
        }
        option {
            padding: 0.625em; /* Equivalent to 10px when base font-size is 16px */
            margin: 0.3125em 0; /* Equivalent to 5px when base font-size is 16px */
            min-width: 100%;
            max-width: 100%;
            background-color: #fff;
        }
        input[type="submit"] {
            background-color: #003366;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #cff5ff;
            color: #003366;
        }
        input[type="submit"]:active {
            background-color: #003366;
        }
        #logo {
            display: block;

        }
        #logo-box {
            display:flex;
            justify-content: center;
            background-color: #fff;
            margin: 2em auto;
        }
    </style>
</head>
<body>
    <div id="logo-box">
        <img id="logo" src="images/logo3.png" alt="logo" width="60%" height="60%">
    </div>
    <div class="container">
        <div class="search-box">
            <h2>Search Flights</h2>
            <form action="handlers/search_handler_external.php" method="get">
                <label for="origin">Origin (3 letter code)</label>
                <input type="text" name="origin" placeholder="Origin">
                <label for="destination">Destination</label>
                <input type="text" name="destination" placeholder="Destination">
                <label for="departure-date">Departure Date (YYYYMMDD)</label>
                <input type="text" name="departure-date" placeholder="Departure Date">
                <label for="return-date">Return Date (Optional)</label>
                <input type="text" name="return-date" placeholder="Return Date (Optional)">
                <input type="submit" value="Search Flights">
            </form>
        </div>
    </div>
    
</body>
</html>






