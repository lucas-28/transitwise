<?php
//Jonathan Farnham
//Transitwise
//Checkout Page

echo getcwd() . "\n";
include '\..\..\..\classes\Cart.php';
include '\..\..\..\classes\Flight.php';
$cart = new Cart();

$ticket1 = new Flight();
$ticket2 = new Flight();

$cart-> addticket($ticket1, 2);
$cart->addTicket($ticket2);

$cartData = $cart->getCart();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<header>
    <div class="topnav">
        <div class="commerce"> <!-- Include your commerce links here --></div>
        <div class="account"> <!-- Include your account links here --></div>
        <button class="nav-toggle">&#9776; Menu</button>
    </div>
</header>



<div class="container">
    <h2>Checkout</h2>
    <div class="main">
        <!-- Cart Summary Container -->
        <div class="cart-summary-container">
            <h3>Cart Summary</h3>
                <ul>
                    <?php foreach ($cartData as $ticketID => $item): ?>
                        <li><?php echo $item['ticket']->get_ticket_name() . ' - Quantity: ' . $item['quantity'] . ' - $' . $item['price']; ?></li>
                  <?php endforeach; ?>
             </ul>
        </div>

    </div>

        <form>
            <!-- Passenger Information -->
            <h3>Who's Travelling</h3>
            <div class="options-search-group">
                <div class="location-search-group">
                    <label for="passenger-first-name">First Name:</label>
                    <input type="text" id="passenger-first-name" name="passenger-first-name" required>
                </div>
                <div class="location-search-group">
                    <label for="passenger-middle-name">Middle Name:</label>
                    <input type="text" id="passenger-middle-name" name="passenger-middle-name">
                </div>
                <div class="location-search-group">
                    <label for="passenger-last-name">Last Name:</label>
                    <input type="text" id="passenger-last-name" name="passenger-last-name" required>
                </div>
            </div>

            <div class="location-search-group">
                <label for="passenger-dob">Date of Birth:</label>
                <input type="date" id="passenger-dob" name="passenger-dob" required>
            </div>

            <div class="location-search-group">
                <label for="passenger-phone">Phone Number:</label>
                <input type="tel" id="passenger-phone" name="passenger-phone" required>
            </div>

            <!-- Payment Information -->
            <h3>Payment Information</h3>

            <div class="location-search-group">
                <label for="card-holder-name">Name on Card:</label>
                <input type="text" id="card-holder-name" name="card-holder-name" required>
            </div>

            <div class="location-search-group">
                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" name="card-number" required>
            </div>

            <div id="dates" class="options-search-group">
                <div class="departure-date">
                    <label for="exp-date">Expiration Date (mm/yy):</label>
                    <input type="text" id="exp-date" name="exp-date" pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="MM/YY" required>
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

            <div class="checkboxButtonDiv">
                <button type="submit">Checkout</button>
            </div>
        </form>
    </div>
</div>

<footer>
    <div class="footer-container">
    </div>
</footer>

</body>
</html>
