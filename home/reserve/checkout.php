<!DOCTYPE html>
<html>
<head>
<style>
    /* centers page */
    .center 
    {
        margin: auto;
        width: 50%;
        padding: 10px;
        font-family: Garamond, serif;
        color: white;
    }

    /* imports background image */
    body 
    {
        background-image: url('checkout_background.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    /* Creates transparrent background box */
    form 
    {
        background-color: rgba(80, 80, 80, 0.7);
        padding: 20px;
        border-radius: 10px;
    }

    fieldset 
    {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    /* submit button style */
    input[type="submit"] 
    {
        display: block;
        width: 30%;
        margin: auto;
        padding: 10px;
        background-color: lightblue;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-family: Garamond, serif;
    }

    .title-container
    {
        background-color: rgba(80, 80, 80,.7);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }


    /* Checkout Style*/
    h1
    {
        text-align: center;
        color: lightblue;
        font-family: Garamond, serif;
        font-size: 100px;
        font-weight: bold;
    }
</style>
</head>
<body>

<!-- Checkout Title -->
<div class = "title-container">
    <h1>Thank You For Choosing Transitwise</h1>
</div>

<!-- Checkout Form-->
<div class="center">
    <form id="checkoutForm" action="../../handlers/checkout_handler.php" method="post">

        <!-- Who's Travelling -->
        <fieldset>
            <legend>Who's Travelling?</legend>
            First Name: <input type="text" name="first_name"><br><br>
            Middle Name: <input type="text" name="middle_name"><br><br>
            Last Name: <input type="text" name="last_name"><br><br>
            Email: <input type="email" name="email"><br><br>
            Phone Number: <input type="tel" name="phone"><br><br>
            Date of Birth: <input type="date" name="dob"><br><br>
        </fieldset>

        <br>

        <!-- Card Information -->
        <fieldset>
            <legend>Card Information</legend>
            Name on Card: <input type="text" name="card_name"><br><br>
            Card Number: <input type="num" name="card_number" maxlength="16"><br><br>
            Expiration Date: <input type="date" name="expiration_date"><br><br>
            CVV: <input type="text" name="cvv" maxlength="3"><br><br>
        </fieldset>

        <br>

        <!-- Billing Adress -->

        <fieldset>
            <legend>Billing Address</legend>
            Billing Address Line 1: <input type="text" name="billing_address_1"><br><br>
            Billing Address Line 2: <input type="text" name="billing_address_2"><br><br>
            City: <input type="text" name="city"><br><br>
            State: <input type="text" name="state" maxlength="2"><br><br>
            Zip Code: <input type="text" name="zip" maxlength="5"><br><br>
        </fieldset>

        <br>

        <!-- Book flight -->
        <input type="submit" value="Book Flight">
    </form>
</div>

</body>
</html>
