<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST["card_number"];
    $expiration_month = $_POST["expiration_month"];
    $expiration_year = $_POST["expiration_year"];
    $cvv = $_POST["cvv"];
    $cardholder_name = $_POST["cardholder_name"];

    // Displays payment succesful screen, I still have to figure out how to simulate valdidating user payment info
    echo "Payment Successful!<br>";
    echo "Card Number: $card_number<br>";
    echo "Expiration Month: $expiration_month<br>";
    echo "Expiration Year: $expiration_year<br>";
    echo "CVV: $cvv<br>";
    echo "Cardholder Name: $cardholder_name<br>";
}
?>
