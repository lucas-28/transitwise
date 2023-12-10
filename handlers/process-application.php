<?php
//Author: Jonathan Farnham and Lucas Pfeifer
//TransitWise
//Application processor
$debug = "true";
include ("../includes/connect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //collects form data
    $position = $_POST["position"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $resume = $_POST["resume"];

    echo "post received";

    // Saves data to text file at the recomendation of GPT 3.5
    // $applicationData = "Position: $position\nName: $name\nEmail: $email\nPhone: $phone\n";
    // file_put_contents("../../docs/Applications.txt", $applicationData . "\n\n", FILE_APPEND);

    // Prepared statement to insert data into database
    $sql = "INSERT INTO applications (position, name, email, phone, resume) VALUES (?, ?, ?, ?, ?)";
    echo 'preparing statement...';
    $stmt = mysqli_prepare($dbconn, $sql);
    echo 'binding...';
    mysqli_stmt_bind_param($stmt, "ssssb", $position, $name, $email, $phone, $resume );
    echo 'executing...';
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    var_dump($resume);
    echo 'closing connection...';
    mysqli_close($dbconn);
    $_SESSION["application"] = "true";
    $_SESSION["applicationMessage"] = "Thank you for your application! We will be in touch soon.";
    var_dump($_SESSION["applicationMessage"]);
    //Brings user to thank you page
    //header("location: /transitwise/home/info/application-form.php");

    exit();
}
?>