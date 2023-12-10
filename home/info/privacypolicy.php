<?php 
//Steven Macaluso
//Transitwise
//Transitwise Privacy Policy Page
?>

<!-- Displays PrivacyPolicy.txt document on a page with our UI -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
	<!-- add Transitwise Stylesheet and Icon -->
	<link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<body>
<!-- add Transitwise Header -->
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>

<h1>Transitwise Privacy Policy</h1>
<!-- Link to PrivacyPolicy.txt using iframe element. Displays the document on this webpage for the user to view -->
<iframe src="http://localhost/transitwise/compliance/usageofthissite/PrivacyPolicy.txt" width="1250" height="415" frameborder="0"></iframe>
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