<?php 
//Steven Macaluso
//Transitwise
//Compliance Page 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- add Transitwise Icon -->
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <title>Compliance Documents</title>
    <style>
        body {
            text-align: center;
			font-family: Arial, sans-serif;
        }

        #title {
            margin-top: 30px;
            font-weight: bold;
        }

		.button {
            display: block;
            width: 400px;
            margin: 40px auto;
            padding: 10px;
            font-size: 18px;
            text-decoration: none;
            color: #fff;
            background-color: #036;
            border: 0.0625em solid #ddd;
            border-radius: 5px;
			box-sizing: border-box;
			padding: 0.625em;
        }
		
		.footer {
			background-color: #003366;
			color: blue;
			padding: 20px 0;
			width: 100%;
		}
		
		.footer-container {
			max-width: 1200px;
			margin: 0 auto;
			display: flex;
			justify-content: center;
			gap: 30px;
		}

		.footer-container a {
			color: blue;
			text-decoration: none;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.3s ease;
		}

		.footer-container a:hover {
			background-color: rgba(255, 255, 255, 0.1);
		}
    </style>
</head>
<body>
<!-- add Transitwise Header -->
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>
<!-- displays title and buttons that link to pages that display compliance docs -->
<div class="container">
    <div class="container skyblue full">
        <h1 class="faq-heading">Compliance Documents</h2>
    </div>
    <div class="container white full">
        <a href="terms.php" class="button">Terms</a>
        <a href="privacypolicy.php" class="button">Privacy Policy</a>
        <a href="ada.php" class="button">ADA</a>
	
    </div>
</div>
    <!-- Add Transitwise Footer -->
<?php include ("../../includes/footer.php"); ?>

</body>
</html>
