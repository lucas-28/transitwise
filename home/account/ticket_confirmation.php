<!DOCTYPE HTML>
<html lang="en">
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codenhal </title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
</head>
<body>
<div class="row-fluid">
    <h2 class="page-header">Booking #<%=booking.id%> confirmed!</h2>
    
</div>
<div class="row-fluid">
    <div class="span5 well">
        <h4 class="page-header">Checkout information</h4>
        <p><strong>Email: </strong><%= booking.contactEmail %></p>
        <p><strong>Event: </strong> <%= performance.event.name %></p>
        <p><strong>Venue: </strong><%= performance.venue.name %></p>
        <p><strong>Date: </strong><%= new Date(booking.performance.date).toPrettyString() %></p>
        <p><strong>Created on: </strong><%= new Date(booking.createdOn).toPrettyString() %></p>
    </div>
    <div class="span5 well">
        <h4 class="page-header">Ticket allocations</h4>
        <table class="table table-striped table-bordered" style="background-color: #fffffa;">
            <thead>
            <tr>
                <th>Ticket #</th>
                <th>Category</th>
                <th>Section</th>
                <th>Row</th>
                <th>Seat</th>
            </tr>
            </thead>
            <tbody>
            <% $.each(_.sortBy(booking.tickets, function(ticket) {return ticket.id}), function (i, ticket) { %>
            <tr>
                <td><%= ticket.id %></td>
                <td><%=ticket.ticketCategory.description%></td>
                <td><%=ticket.seat.section.name%></td>
                <td><%=ticket.seat.rowNumber%></td>
                <td><%=ticket.seat.number%></td>
            </tr>
            <% }) %>
            </tbody>
        </table>
    </div>
</div>
<div class="row-fluid" style="padding-bottom:30px;">
    <div class="span2"><a href="#">Home</a></div>
</div>
</body>