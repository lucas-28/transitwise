



<?php include 'leftnav.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket Service</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
        }

        p {
            font-size: 18px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 20px;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Airline Ticket Service</h1>
        <p>Your One-Stop Destination for Booking Flights</p>
    </header>

    <div ID='flight_listings'>
        <!-- Put all flight listings here !-->
    </div>
    
    <footer>
        <p>&copy; 2023 Airline Ticket Service</p>
    </footer>
</body>
</html>


