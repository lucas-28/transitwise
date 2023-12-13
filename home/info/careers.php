<?php
//Jonathan Farnham
//Transitwise
//Careers Page
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Imports style sheet -->
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
    <div class="container skyblue full">
        <h1 class="faq-heading">Careers</h2>
    </div>
<div class="container white full">
    
    
    <div class="main">
        <ul class="job-list">
            <li class="job-box">
                <h3>Front End Developer</h3>
                <p>Looking for skilled front-end developers to join our team. Must have expertise in HTML, CSS, and JavaScript.</p>
            </li>

            <li class="job-box">
                <h3>Back End Developer</h3>
                <p>Looking for backend developers to join our team. Must have expertise in PHP, MySQL, and database administration.</p>
            </li>

            <li class="job-box">
                <h3>Financial Compliance</h3>
                <p>Looking for developers that specilise in online transactions to join our team. Financial Compliance experts will be responsible for all finacial aspects of TransitWise including secure checkouts and detailed fincial reports.</p>
            </li>
        </ul>
        
        <div class="checkboxButtonDiv">
            <!-- links to application form -->
            <a href="../info/application-form.php"><button>Apply Now</button></a>
        </div>
    </div>
</div>
</div>

<!-- imports footer -->
<?php include ("../../includes/footer.php"); ?>

</body>
</html>
