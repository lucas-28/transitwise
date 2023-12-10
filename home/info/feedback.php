<?php
//Jonathan Farnham
//TransitWise
//Feedback Page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/transitwise/css/about_us.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <title>Feedback Page</title>
</head>
<!--- imports top nav bar -->
<?php include('../../includes/topnav.php') ?>

<body>

    <div class="container">
        <h2>Feedback</h2>
        <form action="send_feedback.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" placeholder="Feedback" rows="4" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
        <?php
        if (isset($_SESSION["feedback_status"])) {
            echo $_SESSION["feedback_status"];
        }
        unset($_SESSION["feedback_status"]);
        ?>
    </div>

    <!-- imports footer -->
    <?php include("../../includes/footer.php"); ?>

</body>

</html>