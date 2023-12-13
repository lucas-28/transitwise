<!--
This is the about page for the website. It contains information about the company and the team. 
Author: Lucas with Chat GPT-4 and copilot
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="/transitwise/css/style.css" rel="stylesheet" type="text/css">
    <link href="/transitwise/css/about_us.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<?php include '../../includes/topnav.php'; ?>

<div class="container">
<div class="container skyblue info full">
    <h1>About Us</h1>
</div>
    <div class="container white full">
        <h2>Plan Your Journey</h2>
        <p>Book your flights with ease and convenience. Whether you're traveling for business or leisure, we've got you covered. (All flights from 2022).</p>

        <h2>Why Choose Us?</h2>
        <ul>
            <li>Wide selection of destinations</li>
            <li>Competitive prices</li>
            <li>Flexible booking options</li>
            <li>24/7 customer support</li>
        </ul>

        <a href="/transitwise/home/index.php" class="cta-button">Book Now</a>
    </div>
    <div class="container white full">
        <h2>Our Story</h2>
        <p>Our team is based in New Paltz and our goal is to bring the best travel deals to our customers.</p>
    </div>
    <div class="container white full">
        <h2>Our Team</h2>
        <p>Our team is made up of 6 members</p>
        <table class="team-list-table">
            <tr class="team-list">
                <td class="team-member">Lucas</td>
                <td class="team-member">Aidan</td>
                <td class="team-member">Jonathan</td>
            </tr>
            <tr class="team-list">
                <td class="team-member">Steven</td>
                <td class="team-member">David</td>
                <td class="team-member">Uriel</td>
            </tr>
        </table>
    </div>
    <div class="container white full">
        <a id="contact">
            <h2>Contact Us</h2>
        </a>
        <p>If you have any questions or inquiries, feel free to contact us:</p>
        <address>
            Email: <a href="mailto:info@example.com">info@example.com</a><br>
            Phone: +1 (123) 456-7890<br>
            Address: SUNY New Paltz Campus
        </address>
    </div>
</div>
<?php include '../../includes/footer.php'; ?>
</body>

</html>