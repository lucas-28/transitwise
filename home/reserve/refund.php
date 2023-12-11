<?php 
//Steven Macaluso
//Transitwise
//Refund Page 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Refund Ticket</title>
	<!-- add Transitwise Stylesheet and Icon -->
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<body>
<!-- add Transitwise Header -->
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>

    <h1>Refund Ticket</h1>
<!-- add labels and inputs for form. Flight ID only accepts letters and numbers. User sent to refundconfirm.php upon submission -->    
    <form action="refundconfirm.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="flight_id">Flight ID:</label>
        <input type="text" id="flight_id" name="flight_id" pattern="[a-zA-Z0-9]+" required><br><br>

        <input type="submit" value="Refund">
    </form>
	<!-- add Transitwise Footer -->
	<footer>
    <div class="footer-container">
        <a href="/transitwise/home/portal/login.php">Transitwise Portal</a>
        <a href="contact.html">Contact</a>
        <a href="feedback.html">Feedback</a>
    </div>
</footer>
</body>
</html>
