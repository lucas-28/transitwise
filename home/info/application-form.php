<?php
//Jonathan Farnham
//Transitwise
//Application form
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers Page</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>

<!-- Imports top nav bar -->
<?php include ('../../includes/topnav.php'); ?>

<body>

<div class="container">
    <h2>Application</h2>
    <?php 
    if (isset($_SESSION["applicationMessage"])) {
        echo "<p>" . $_SESSION["applicationMessage"] . "</p>";
        unset($_SESSION["applicationMessage"]);
        
    }
    ?>

    <form action="/transitwise/handlers/process-application.php" method="post" enctype="multipart/form-data">

    <label for="position">Applying For:</label>
        <select id="position" name="position" required>
            <option value="" disabled selected>Select a Position</option>
            <option value="frontend">Front End Developer</option>
            <option value="backend">Back End Developer</option>
            <option value="financial">Financial Compliance</option>
        </select>

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone">

        <label for="resume">Upload Resume:</label>
        <input type="file" id="resume" name="resume">

        <input type="submit" value="Submit Application">
    </form>
</div>

<!-- imports footer -->
<?php include ("../../includes/footer.php"); ?>


</body>
</html>
