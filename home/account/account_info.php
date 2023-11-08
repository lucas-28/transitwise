<!-- Some aspects of code written with assistance of ChatGPT -->

<?php
// PERSONAL NOTE - when changing user info  update session

// Implement database connection
include('../../includes/connect.php');

// Initialize session
session_start();

$email = "apc@gmail.com";

// Check if user is logged in, if not redirect to login page
if (!isset($email)) {
    header('LP_login.php');
}

// Prepare rows from 'users' database table and corresponding rows in 'user_login' table
$stmt = $dbconn->prepare("SELECT * FROM users INNER JOIN user_login ON users.ULID = user_login.ULID WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if result contains more than 0 rows, if true display data from associated row array
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo nl2br("\nUsername: " . $row['username']);
    echo nl2br("\nFirst Name: " . $row['f_name']);
    echo nl2br("\nMiddle Name: " . $row['m_name']);
    echo nl2br("\nLast Name: " . $row['l_name']);
    echo nl2br("\nEmail: " . $row['email']);
    echo nl2br("\nPhone: " . $row['phone']);
    echo nl2br("\nBirth Date: " . $row['birth_date']);
    echo nl2br("\nAddress (Line 1): " . $row['address1']);
    echo nl2br("\nAddress (Line 2): " . $row['address2']);
    echo nl2br("\nCity: " . $row['city']);
    echo nl2br("\nState: " . $row['state']);
    echo nl2br("\nZip: " . $row['zip']);
} else {
    echo nl2br("User not found.");
}
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>View/Edit Account Info</title>
</head>

<body>
    <center>
        <!---Data form for user to update account information via submit_form.php-->
        <h1>Edit Account Information</h1>
        <form action="submit_form.php" method="post">
            <label for="f_name">First Name: </label>
            <input type="text" id="f_name" name="f_name"><br>
            <label for="m_name">Middle Name: </label>
            <input type="text" id="m_name" name="m_name"><br>
            <label for="l_name">Last Name: </label>
            <input type="text" id="l_name" name="l_name"><br>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email"><br>
            <label for="phone">Phone Number: </label>
            <input type="text" id="phone" name="phone"><br>
            <label for="birth_date">Date of Birth: </label>
            <input type="date" id="birth_date" name="birth_date"><br>
            <label for="address1">Address (Line 1): </label>
            <input type="text" id="address1" name="address1"><br>
            <label for="address2">Address (Line 2): </label>
            <input type="text" id="address2" name="address2"><br>
            <label for="city">City: </label>
            <input type="text" id="city" name="city"><br>
            <label for="state">State: </label>
            <input type="text" id="state" name="state"><br>
            <label for="zip">Zip Code: </label>
            <input type="text" id="zip" name="zip"><br>
            <input type="submit" name="submit_data" value="Submit">
        </form>
    </center>
</body>

</html>