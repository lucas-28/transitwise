<?php 
// Author: Lucas Pfeifer
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'adminCheck.php';
$data = $_SESSION["user_data"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Form</title>
    <link rel="stylesheet" href="/transitwise/css/add-employee.css">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>
<body>
    
    <div class="container">
    <div class="header">
        <h1>Add Employee</h1>
    </div>
    <?php include ('../../../includes/error-message.php'); ?>
    <form class=edit-employee action="/transitwise/handlers/add_employee_handler.php" method="post">
        <div class="form-group">
            <label for="f_name">First Name:</label>
            <input type="text" id="f_name" name="f_name">
        </div>
        <div class="form-group">
            <label for="m_name">Middle Name:</label>
            <input type="text" id="m_name" name="m_name">
        </div>
        <div class="form-group">
            <label for="l_name">Last Name:</label>
            <input type="text" id="l_name" name="l_name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" id="position" name="position">
        </div>
        <div class="form-group">
            <label for="hire_date">Hire Date:</label>
            <input type="date" id="hire_date" name="hire_date">
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary">
        </div>
        <div class="form-group">
            <label for="address1">Address Line 1:</label>
            <input type="text" id="address1" name="address1">
        </div>
        <div class="form-group">
            <label for="address2">Address Line 2:</label>
            <input type="text" id="address2" name="address2">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" id="state" name="state">
        </div>
        <div class="form-group">
            <label for="zip">Zip:</label>
            <input type="text" id="zip" name="zip">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="submit" style="opacity: 0;" > ...</label>
            <button type="submit">Submit</button>
        </div>
    </form>
    </div>

</body>
</html>
