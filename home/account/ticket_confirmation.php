<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codenhal </title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
</head>

<header>
    <?php include ('../../includes/topnav.php');
        
     ?>
</header>
<body>
<!--Creates the navigation side bar of links to edit/view account.-->
<?php include ('../../includes/leftnavuser.php'); ?>
    
<div class="row-fluid">
    <h2 class="page-header">Booking #<?php echo $_SESSION["reservation"]["RSID"] ?> confirmed!</h2>
    
</div>
<div class="row-fluid">
    <div class="span5 well">
        <h4 class="page-header">Checkout information</h4>
        <p><strong>Email: </strong><?php echo $_SESSION["user_data"]["email"] ?><!--user email--></p>
        <p><strong>Venue: </strong><?php echo $_SESSION["flight"]["name"] ?> Airplane name</p>
        <p><strong>Date: </strong><?php echo $_SESSION["flight"]["date"] ?></p>
        <p><strong>Created on: </strong><?php echo $_SESSION["date"] ?>Booking date</p>
    </div>
    <div class="span5 well">
        <h4 class="page-header">Ticket allocations</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Ticket #</th>
                <th>Seat</th>
            </tr>
            </thead>
            <tbody>
            <% $.each(_.sortBy(booking.tickets, function(ticket) {return ticket.id}), function (i, ticket) { %>
            <tr>
                <td><?php echo $_SESSION["ticket"]["id"] ?><%= ticket.id %></td>
                <td><?php echo $_SESSION["flight"]["seat"] ?><%=ticket.seat.number%></td>
            </tr>
            <% }) %>
            </tbody>
        </table>
    </div>
</div>

<?php include ('../../includes/footer.php'); ?>
</body>
</html>