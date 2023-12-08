<?php
//Jonathan Farnham
//TransitWise
//Application processor

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //collects form data
    $position = $_POST["position"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $resume = $_POST["resume"];

    //Validates form data
    if (empty($position) || empty($name) || empty($email)) 
    {
        echo "Please fill out all required fields.";
        exit;
    }

    // Saves data to text file at the recomendation of GPT 3.5
    $applicationData = "Position: $position\nName: $name\nEmail: $email\nPhone: $phone\n";
    file_put_contents("../../docs/Applications.txt", $applicationData . "\n\n", FILE_APPEND);


    //Brings user to thank you page
    header("/application-thank-you.php");

    exit();
}
?>