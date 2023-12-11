<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); include 'userCheck.php'; ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--
    // Uriel Cruz
    // Transitwise
    // HTML and style section(css)
    // This is the User billing page for the user.

    For php editor, 
  - Keep the user login.
  - Grab the user's data and have it loaded in the input boxes. This info should
    not be modifed and have the option to delete it. They will have the option to
    save a new credit card with billing info.

  - The sidebar buttons have href to link to other files, they are labeled
    as "placeholder" whenever those pages are finsihed. The home button goes to
    the user's home page.

  - Script section left empty unless needed.

  - Note, I reused checkoutpagetest.php that was in github and modified it for this case.
    -->
<title>User Billing Info</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="icon" href="/transitwise/images/favicon.ico">
<style>
    #new-credit-card-info {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 10px;
        align-items: center;
        background-color: #fff;
    }
    #body {
        min-width: 800px;

    }
    #success {
        color: green;
    }

    .billingForm {
        display:flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        border: 3px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    .billingForm > input[type="submit"]{
        width: 50%;
    }

    .main-content {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: space-evenly;
        background-color: #fff;
        min-height: 100vh;
        gap: 50px;
    }

</style>
</head>
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>
<body>
    <!--Creates the navigation side bar of links to edit/view account.-->
        <?php include ('../../includes/leftnav.php'); ?>
    <div class="main-content">
        
        <div class="container">
        <div>
        
        <h3>Choose Card</h3>
        <!--This section allows the user to pick a credit card if they added one before
            It should display a list of cards with the last 4 digits of their credit card.
        -->
        <p id='success'><?php echo (isset($_SESSION["is_card_selected"]) && $_SESSION["is_card_selected"] == true ) ? "Card selected ending in ..." .$_SESSION["card_selected"]."." : "";  ?></p>
        <form class="billingForm" id="getBillingInfo" method="post" action="/transitwise/handlers/choose_card.php">
            <select name="creditInfo" id="creditInfo">
                <option value="card">Debit Card ending in<label for="last-digits"></label></option>
                <?php 
                include ('../../includes/connect.php');
                $sql = "SELECT * FROM credit_cards WHERE UPID = ?";
                echo 'preparing...';
                $stmt = $dbconn->prepare($sql);
                echo 'binding...';
                $stmt->bind_param("i", $_SESSION["user_data"]["UPID"]);
                echo 'executing statement...';
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["last_four"] . "'>Card ending in ..." . $row["last_four"] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="send" value="Submit">
        </form>
        </div>
    
        <!--This form is to save a new credit card to the user.-->
        <div>
        <h3>Add a Credit Card</h3>
        
        <form class="billingForm" id="new-credit-card" action="/transitwise/handlers/add_card.php" method="post"> 
        <p id='success'><?php echo (isset($_SESSION["is_card_added"]) && $_SESSION["is_card_added"] == true ) ? "Card added ending in ..." .$_SESSION["card_added"]."." : ""; unset($_SESSION["is_card_added"]); ?></p>
        <div id="new-credit-card-info">
            <label for="cardholder_name">Cardholder Name</label>
            <input type="text" id="cardholder_name" name="cardholder_name" required>
            
            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" placeholder="xxxx-xxxx-xxxx-xxxx" maxlength="19" required>
    
            
            <label for="expiration_month">Expiration Month</label>
            <input type="text" id="expiration_month" name="expiration_month" placeholder="MM" maxlength="2" required>
        
            <label for="expiration_year">Expiration Year</label>
            <input type="text" id="expiration_year" name="expiration_year" placeholder="YY" maxlength="2" required>
            
            <label for="billing1">Billing Address 1</label>
            <input type="text" id="billing1" name="billing1" required>

            <label for="billing2">Billing Address 2</label>
            <input type="text" id="billing2" name="billing2" required>

            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
            
            <label for="state">State</label>
            <input type="text" id="state" name="state" required>

            <label for="zip">Zip</label>
            <input type="text" name="zip" id="zip" required>
        </div>   
            

            
            <input class="btn" type="submit" name="send" value="Submit">
            
        </form>
        </div>
    
        </div>
    </div>
    <script>
        <?php include ('../../js/registercreditcard.js'); ?>
    </script>

<footer>
    <div class="footer-container">
        <a href="/transitwise/home/portal/login.php">Transitwise Portal</a>
        <a href="contact.html">Contact</a>
        <a href="feedback.html">Feedback</a>
    </div>
</footer>

</body>
</html>
