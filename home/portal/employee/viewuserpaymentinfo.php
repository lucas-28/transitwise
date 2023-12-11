<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'employeeCheck.php'; ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--
    // Uriel Cruz
    // Transitwise
    // HTML and style section(css)
    // This is the User billing page for the user.
-->
<title>User Billing Info</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>
<body>
    <!--Creates the navigation side bar of links to edit/view account.-->
        <?php include ('../../../includes/leftnav.php'); ?>
    <div id="body">
       
        <h3>View User's payment info</h3>
        <!--This section allows the user to pick a credit card if they added one before
            It should display a list of cards with the last 4 digits of their credit card.
        -->
        <form id="getUserInfo" method="post" action="placeholder.php">
            <select name="UserInfo" id="userInfo">
                <option value="usercard">Username:<label for="first-name"></label></option>
            </select>
            <input type="button" name="edit" value="Select">
        </form>
        <form id="getBillingInfo" method="post" action="placeholder.php">
            <select name="creditInfo" id="creditInfo">
                <option value="card">Debit Card ending in<label for="last-digits"></label></option>
            </select>
            <input type="button" name="edit" value="Edit">
        </form>

        <!--This form is to save a new credit card to the user.-->
        <h3>View their Credit Card</h3>
        
        <form id="new-credit-card" action="process_payment.php" method="post"> 

            <label for="cardholder_name">Cardholder Name:</label>
            <input type="text" id="cardholder_name" name="cardholder_name" required>
            
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" placeholder="xxxx-xxxx-xxxx-xxxx" maxlength="19" required>
    
            <div class="expiration-inputs">
                <div>
                    <label for="expiration_month">Expiration Month:</label>
                    <input type="text" id="expiration_month" name="expiration_month" placeholder="MM" maxlength="2" required>
                </div>
                <div>
                    <label for="expiration_year">Expiration Year:</label>
                    <input type="text" id="expiration_year" name="expiration_year" placeholder="YY" maxlength="2" required>
                </div>
            </div>
                    
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" placeholder="xxx" maxlength="3" required>

            <div class="btn-holder">
                <input class="btn" type="submit" name="send" value="Submit">
            </div>
        </form>
    
    </div>
    <script>
        <?php include ('../../js/registercreditcard.js'); ?>
    </script>

<!-- footer -->
<?php include ('../../../includes/footer.php'); ?>

</body>
</html>
