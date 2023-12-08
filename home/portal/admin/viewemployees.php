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

</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>
<body>
    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../../includes/leftnavadmin.php'); ?>
    <div id="body">
       
        <h3>View Employee's info</h3>

        <!-- Select an employee from a selection list. -->
        <select name="EmployeeInfo" id="employeeInfo" onchange="addInput()">
            <option selected="selected" value="default">
                <label>Default:</label>
                <label for="last-name">last name</label>
                <label for="first-name">, first name</label>
                <label for="employee-id">, ID:</label>
            </option>
            <!-- The next option should be the employees data and have it keep going 
                 for as long as it list all employees
                -->
            <option id="employeecard" value="1">
                <label for="last-name"></label>
                <label for="first-name">, </label>
                <label for="employee-id">, ID:</label>
            </option>
        </select>

        <!-- This will send the admin to another page to add an employee. -->
        <div class="btn-holder">
            <a href="add-employee.php"><button class="add-button" type="button">Add Employee</button></a> 
        </div>
        <!--Check to see if this works using this action below for this form. 
            After selecting an option above,  have the information below all filled out with 
            the employee's information.
        -->
        
        <form id="register" action="handlers/register_handler.php" method="post"> 
            <div id ="newAdd">
                <h2>Employee: </h2>
                <!--Their basic information. -->
                <fieldset class="flex-box">
                    <label>Employee ID:<br><input type="number" name="employee_id"><br></label>
                    <label>First Name: <br><input type="text" name="f_name"> <br></label>
                    <label>Middle Name: <br><input type="text" name="m_name"> <br></label>
                    <label>Last Name: <br><input type="text" name="l_name"><br></label>
                    <label>Email Address: <br><input type="email" name="email"><br> </label>
                    <label>Phone Number: <br><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"></label><br>
                    <label>Hire Date: <br><input type="date" name="hire_date"></label>
                    <label>Salary: <br><input type="text" name="salary"></label>
                    
                </fieldset>
                <fieldset class="flex-box">
                    <!--Their Address and password. -->
                    <label>Address 1: <br><input type="text" name="address1"> <br></label>
                    <label>Address 2: <br><input type="text" name="address2"> <br></label>
                    <label>City: <br><input type="text" name="city"> <br></label>
                    <label>State: <br><input type="text" name="state"> <br></label>
                    <label>Zip code: <br><input type="text" name="zipcode"></label>
                    <label>Birth Date: <br><input type="date" name="birth_date"></label>
                    <label>Password: <br><input type="password" name="password"></label>
                </fieldset>
               
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
