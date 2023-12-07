<!DOCTYPE html>
<html>
<head>
    <title>Refund Ticket</title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
</head>
<body>
    <h1>Refund Ticket</h1>
    
    <form action="refundconfirm.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern="[a-zA-Z0-9]+" required><br><br>

        <label for="flight_id">Flight ID:</label>
        <input type="text" id="flight_id" name="flight_id" pattern="[a-zA-Z0-9]+" required><br><br>

        <input type="submit" value="Refund">
    </form>
</body>
</html>
