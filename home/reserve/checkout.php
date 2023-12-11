<?php
//Jonathan Farnham
//Transitwise
//Checkout Page

//echo getcwd() . "\n";
//include '\..\..\..\classes\Cart.php';
//include '\..\..\..\classes\Flight.php';
//$cart = new Cart();

//$ticket1 = new Flight();
//$ticket2 = new Flight();

//$cart-> addticket($ticket1, 2);
//$cart->addTicket($ticket2);

//$cartData = $cart->getCart();

// redirect if cart is empty
// if(!isset($_SESSION["reservation"])) {
//     header("location: /transitwise/home");
// }
// start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <style>
        .main-content {
            
            margin: 0 auto;
        }
        
    </style>
</head>
<body>

<header>
    <?php include("../../includes/topnav.php"); ?>
</header>


<div class="main-content">
    
<div class="container">
    <h1>Checkout</h1>
    <?php include("checkout_info.php"); ?>
    
        <!-- Cart Summary Container -->


    <div class="white container">
        
        <form action="/transitwise/handlers/checkout_handler.php" method="post">
        <?php if (isset($_SESSION['email'])) :
                ?>
                    
                    <h3>Profile Information Found for <?php
                    echo  $_SESSION['user_data']['f_name'] . ' ' . $_SESSION['user_data']['l_name']?></h3>
                    
                    
                    
                <?php else : ?>
                    <h3>Who's Travelling</h3>
                    <div class="options-search-group">
                <div class="location-search-group">
                    <label for="passenger-first-name">First Name:</label>
                    <input type="text" id="passenger-first-name" name="f_name" required>
                </div>
                <div class="location-search-group">
                    <label for="passenger-middle-name">Middle Name:</label>
                    <input type="text" id="passenger-middle-name" name="m_name">
                </div>
                <div class="location-search-group">
                    <label for="passenger-last-name">Last Name:</label>
                    <input type="text" id="passenger-last-name" name="l_name" required>
                </div>
            </div>
            

            <div class="location-search-group">
                <label for="passenger-dob">Date of Birth:</label>
                <input type="date" id="passenger-dob" name="birth_date" required>
            </div>

            <div class="location-search-group">
                <label for="passenger-phone">Phone Number:</label>
                <input type="tel" id="passenger-phone" name="phone" required>
            </div>
            <div class="location-search-group">
                <label for="passenger-email">Email:</label>
                <input type="tel" id="passenger-phone" name="email" required>
            </div>

                <?php endif; ?>
            <?php
                // Check if user is logged in
                if (isset($_SESSION['email'])) :
                ?>
            <!-- Passenger Information -->
            
            <?php else : ?>
            


            <?php endif; ?>
            
            
            <?php
                // Check if user is logged in
                if (isset($_SESSION['user_data']['card'])) :
                ?>
                    
                    <?php echo '<h3>Selected card... ' . $_SESSION['user_data']['card']['last_four'] . '</h3>'; ?>
                    

                <?php else : ?>
                    <h3>Payment Information</h3>

            <div class="location-search-group">
                <label for="card-holder-name">Name on Card:</label>
                
                <input type="text" id="card-holder-name" name="cardholder-name"  required>
            </div>

            <div class="location-search-group">
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" name="card-number" placeholder="xxxx-xxxx-xxxx-xxxx" maxlength="19" required>
            </div>

            <div id="dates" class="options-search-group">
                <div class="departure-date">
                    <label for="exp-date">Expiration Date (mm/yy):</label>
                    <input type="text" id="exp-date" name="exp-date" pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="MM/YY" maxlength="5" required>
                </div>

                <div class="return-date">
                    <label for="security-code">Security Code:</label>
                    <input type="text" id="security-code" name="security-code" required>
                </div>
            </div>

            <div class="location-search-group">
                <label for="billing-address-1">Billing Address Line 1:</label>
                <input type="text" id="billing-address-1" name="billing-address-1" required>
            </div>

            <div class="location-search-group">
                <label for="billing-address-2">Billing Address Line 2:</label>
                <input type="text" id="billing-address-2" name="billing-address-2">
            </div>

            <div class="options-search-group">
                <div class="location-search-group">
                    <label for="billing-city">City:</label>
                    <input type="text" id="billing-city" name="billing-city" required>
                </div>

                <div class="location-search-group">
                    <label for="billing-state">State:</label>
                    <input type="text" id="billing-state" name="billing-state" required>
                </div>

                <div class="location-search-group">
                    <label for="billing-zip">Zip Code:</label>
                    <input type="text" id="billing-zip" name="billing-zip" required>
                </div>
            </div>

                <?php endif; ?>
            <!-- Payment Information -->
            

            <div class="checkboxButtonDiv">
                <button type="submit">Checkout</button>
            </div>
        </form>
    </div>
</div>
</div>

<footer>
    <div class="footer-container">
    </div>
</footer>

</body>
</html>
