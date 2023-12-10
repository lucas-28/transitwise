<?php 
//Steven Macaluso
//Transitwise
//Refund Confirmation Page 
?>

<!-- User sent here after initiating refund on refund.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Confirmed!</title>
	<!-- add Transitwise Stylesheet and Icon -->
	<link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<body>
<!-- add Transitwise Header -->
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>
<?php //Display text. Button sends user back to index.php ?>
    <div style="text-align: center; margin-top: 200px; margin-bottom: 155px">
        <h1>Refund Confirmed!</h1>
        <p>Your refund has been confirmed. Click the button below to return to the homepage.</p>
        <form action="http://localhost/transitwise/home/index.php" method="get">
            <button type="submit">Home</button>
        </form>
    </div>
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
