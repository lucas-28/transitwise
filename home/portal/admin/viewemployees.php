<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'adminCheck.php';
include '../../../includes/connect.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--
    // Uriel Cruz
    // Transitwise
    // HTML
    // This is the View employess page for the admin.

    This should pull down a list of employees and reveal their information to
    the admin, including their id and basic information like the user.
    -->
<title>View Employee Info</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="stylesheet" href="/transitwise/css/add-employee.css">
<link rel="icon" href="/transitwise/images/favicon.ico">

</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>
<body>
    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../../includes/leftnav.php'); ?>
    <div id="body">
       
        <h2>View Employees</h2>

        <!-- Select an employee from a selection list. -->
        <select name="EmployeeInfo" id="employeeInfo" onchange="addInput()">
            <option selected="selected" value="default">Employee</option>
                <?php 
                    //This should pull down a list of employees and reveal their information to
                    //the admin, including their id.
                    
                    $sql = "SELECT * FROM employees";
                    $result = $dbconn->query($sql);
                    while($row = $result->fetch_assoc()){
                        $employee_id = $row['EMID'];
                        $f_name = $row['f_name'];
                        $l_name = $row['l_name'];

                        echo '<option value="' . $employee_id . '">'. $employee_id . ': ' .$f_name . ' ' . $l_name . '</option>';
                    }
                ?>

                
            
            
            
        </select>

        <!-- This will send the admin to another page to add an employee. -->
        <!--
        <div class="btn-holder">
            <a href="#"><button class="add-button" type="button">View Employee</button></a> 
        </div>
        
                -->
        
        <form  action="/transitwise/handlers/add_employee_handler.php" method="post"> 
            <div id ="newAdd">
                <h2>Add Employee: </h2>
                <!--Their basic information. -->
                <div class="form-group edit-employee">
                    <fieldset class="flex-box">
                        <label>Employee ID:<br><input type="number" name="employee_id" required><br></label>
                        <label>First Name: <br><input type="text" name="f_name" required> <br></label>
                        <label>Middle Name: <br><input type="text" name="m_name"> <br></label>
                        <label>Last Name: <br><input type="text" name="l_name" required><br></label>
                        <label>Email Address: <br><input type="email" name="email" required><br> </label>
                        <label>Phone Number: <br><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx " min="1900-01-02" max="2008-01-02" required></label><br>
                        <label>Hire Date: <br><input type="date" name="hire_date" required></label>
                        <label>Salary: <br><input type="text" name="salary" required></label>
                        
                    </fieldset>
                    <fieldset class="flex-box">
                        <!--Their Address and password. -->
                        <label>Address 1: <br><input type="text" name="address1" required> <br></label>
                        <label>Address 2: <br><input type="text" name="address2"> <br></label>
                        <label>City: <br><input type="text" name="city" required> <br></label>
                        <label>State: <br><input type="text" name="state" required> <br></label>
                        <label>Zip code: <br><input type="text" name="zip" required></label>
                        <label>Birth Date: <br><input type="date" name="birth_date" pattern="/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/" required></label>
                        <label>Password: <br><input type="password" name="password" required></label>
                    </fieldset>
                </div>
               
                <div class="btn-holder">
                    <input class="btn" type="submit" name="send" value="Submit">
                </div>
            </div>
        </form>
    </div>
    <script>
        <?php include ('../../js/registercreditcard.js'); ?>
    </script>

<!-- footer -->
<?php include('../../../includes/footer.php'); ?>

</body>
</html>
