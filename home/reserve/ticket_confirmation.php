<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>TW - Confirmation </title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>

<header>
    <?php include ('../../includes/topnav.php');
        
     ?>
</header>
<body>
<!--Creates the navigation side bar of links to edit/view account.-->

<div class="container">
<div class="container white">
<div class="row-fluid">
    <h2 class="page-header">Booking confirmed.</h2>
    
</div>
<div class="row-fluid">
    <div class="span5 well">
        <?php if(isset($_SESSION["reservationID"])) : ?>
        <h4 class="page-header">Checkout information</h4>
        <p><strong>Name: </strong><?php echo $_SESSION["user_data"]["f_name"] . ' ' . $_SESSION["user_data"]["l_name"] ?><!--user name--></p>
        <p><strong>Email: </strong><?php echo $_SESSION["user_data"]["email"] ?><!--user email--></p>
        
        <p><strong>Departure Date: </strong><?php echo date('l, F jS, Y',strtotime($_SESSION["reservation"]["flight"]["date"])) ?></p>
        <p><strong>Booking Time: </strong><?php echo date('l, F jS, Y, h:i a',strtotime($_SESSION["transaction"]["time_stamp"])) ?></p>
        <p><strong>Booking ID: </strong><?php echo $_SESSION["reservationID"]; 
        
            unset($_SESSION["reservation"]);
            unset($_SESSION["tickets"]);
            unset($_SESSION["transaction"]);
            unset($_SESSION["reservationID"])
            ?></p>
    </div>
    
</div>
<div class="row-fluid">
    <div class="reservations-button">
        <a href="/transitwise/home/account/reservations.php" class="btn btn-primary">View Reservations</a>
        
    </div>
</div>
<?php else : ?>
    <h4 class="page-header">No reservation found.</h4>
<?php endif; ?>
</div>
</div>
<?php include ('../../includes/footer.php'); ?>
</body>
</html>