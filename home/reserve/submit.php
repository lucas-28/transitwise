<!DOCTYPE html>
<html>
<head>
<style>
    /* Centering the content on the page */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        margin: 0;
        background-image: url('checkout_background.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    /* Styles for the title container */
    .title-container {
        background-color: rgba(80, 80, 80,.7);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Styles for the title text */
    h1 {
        text-align: center;
        color: lightblue;
        font-family: Garamond, serif;
        font-size: 40px;
        font-weight: bold;
    }

    /* Styles for the thank you message box */
    .thank-you-box {
        text-align: center;
        padding: 30px;
        background-color: rgba(80, 80, 80,.7);
        border-radius: 10px;
        color: white;
    }

    /* Styles for the thank you message text */
    .thank-you-text {
        font-family: Garamond, serif;
        font-size: 24px;
    }
</style>

</head>
<body>

<!-- Checkout Title -->
<div class="title-container">
    <h1>Thank You for Choosing Transitwise</h1>
</div>

<!-- purchase succesful -->
<div class="thank-you-box">
    <p class="thank-you-text">Your purchase was succesful. Your ticket information will appear in your account.</p>
</div>

</body>
</html>
