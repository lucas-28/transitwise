<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'employeeCheck.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Employee Time card</title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
        <!--This should grab the data of when they clocked in and clocked out from
          the database. This should not be edited because it will mess up the total
          hours and total pay since it will continously monitor the total hours and
          keep on adding up.

          The employee will be able to view their timecard but they should not
          be able to edit it.
        -->
    <link rel="icon" href="/transitwise/images/favicon.ico">
    </head>
    <header>
        <?php include ('../../../includes/topnav.php'); ?>
    </header>       
<body>
<?php include ('../../../includes/leftnav.php'); ?>
<!-- This could be called by a reference link to all user base.-->
<div id="contnent">
    <!--Creates the navigation side bar of links to edit/view account.-->
    

    <form id="timecard" action="holder.php" method="post"> 

        <table border="1">
            <!--Name, ID, Wage, and Overtime should be filled out with 
                and cannot be changed by the employee.
                Overtime should be calculated by 1.5 times the wage and should auto dill.
            -->
            <tr>
                <td colspan="7">
                    <table>
                        <tr>
                            <!--Name of the employee, should grab from database.-->
                            <td>
                                Name:
                            </td>
                            <td>
                                <input type="text" id="employee_name">
                            </td>
                        </tr>
                        <tr>
                            <!--ID of the employee, should grab from database.-->
                            <td>
                                Employee ID:
                            </td>
                            <td>
                                <input type="number" id="employee_id">
                            </td>
                        </tr>
                        <tr>
                            <!--Wage of the employee, should grab from database.-->
                            <td>
                                Wage:
                            </td>
                            <td>
                                <input type="number" id="pay_rate">
                            </td>
                        </tr>
                        <tr>
                            <!--Overtime pay of the employee, should be calculated from wage.-->
                            <td>
                                Overtime:
                            </td>
                            <td>
                                <input type="number" id="overtime_hour_cost">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!--Labels for the cells below.-->
            <tr>
                <td>
                    Date
                </td>
                <td>
                    Start
                </td>
                <td>
                    End
                </td>
                <td>
                    Hours
                </td>
                <td>
                    Hour Type
                </td>
                <td>
                    Wage
                </td>
                <td>
                    Total
                </td>
            </tr>

            <tr>
                <td>
                    <input type="date" id="date_1">
                </td>
                <td>
                    <input type="time" id="start_1" onchange="re_compute()">
                </td>
                <td>
                    <input type="time" id="end_1" onchange="re_compute()">
                </td>
                <td>
                    <input type="number" id="hours_1" onchange="re_compute()">
                </td>
                <td>
                    <select id="type_1" onchange="re_compute()">
                        <option value="Normal" selected>Normal</option>
                        <!--Overtime should not be selected unless it goes pass 40hrs.-->
                        <option value="Extra">Overtime</option>
                    </select>
                </td>
                <td id="cost_1">

                </td>
                <td id="total_1">

                </td>

            </tr>

            <tr>
                <td>
                    <input type="date" id="date_2">
                </td>
                <td>
                    <input type="time" id="start_2" onchange="re_compute()">
                </td>
                <td>
                    <input type="time" id="end_2" onchange="re_compute()">
                </td>
                <td>
                    <input type="number" id="hours_2" onchange="re_compute()">
                </td>
                <td>
                    <select id="type_2" onchange="re_compute()">
                        <option value="Normal" selected>Normal</option>
                        <!--Overtime should not be selected unless it goes pass 40hrs.-->
                        <option value="Extra">Overtime</option>
                    </select>
                </td>
                <td id="cost_2">

                </td>
                <td id="total_2">

                </td>

            </tr>

            <tr>
                <td>
                    <input type="date" id="date_3">
                </td>
                <td>
                    <input type="time" id="start_3" onchange="re_compute()">
                </td>
                <td>
                    <input type="time" id="end_3" onchange="re_compute()">
                </td>
                <td>
                    <input type="number" id="hours_3" onchange="re_compute()">
                </td>
                <td>
                    <select id="type_3" onchange="re_compute()">
                        <option value="Normal" selected>Normal</option>
                        <!--Overtime should not be selected unless it goes pass 40hrs.-->
                        <option value="Extra">Overtime</option>
                    </select>
                </td>
                <td id="cost_3">

                </td>
                <td id="total_3">

                </td>

            </tr>

        </tr>

        <tr>
            <td>
                <input type="date" id="date_4">
            </td>
            <td>
                <input type="time" id="start_4" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_4" onchange="re_compute()">
            </td>
            <td>
                <input type="number" id="hours_4" onchange="re_compute()">
            </td>
            <td>
                <select id="type_4" onchange="re_compute()">
                    <option value="Normal" selected>Normal</option>
                    <!--Overtime should not be selected unless it goes pass 40hrs.-->
                    <option value="Extra">Overtime</option>
                </select>
            </td>
            <td id="cost_4">

            </td>
            <td id="total_4">

            </td>

        </tr>

        <tr>
            <td>
                <input type="date" id="date_5">
            </td>
            <td>
                <input type="time" id="start_1" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_1" onchange="re_compute()">
            </td>
            <td>
                <input type="number" id="hours_5" onchange="re_compute()">
            </td>
            <td>
                <select id="type_5" onchange="re_compute()">
                    <option value="Normal" selected>Normal</option>
                    <!--Overtime should not be selected unless it goes pass 40hrs.-->
                    <option value="Extra">Overtime</option>
                </select>
            </td>
            <td id="cost_5">

            </td>
            <td id="total_5">

            </td>

        </tr>

            <tr>
                <td colspan="4">
                </td>
                <td>
                    Total Hours
                </td>
                <td>
                    Total Overtime Hours
                </td>
                <td>
                    Total Cost
                </td>
            </tr>

            <tr>
                <td colspan="4">
                </td>
                <td id="total_hours">

                </td>
                <td id="total_overtime_hours">
                    
                </td>
                <td id="total_cost">

                </td>
            </tr>
            
        </table>
    </form>
</div>
    <!-- footer -->
    <?php include ('../../../includes/footer.php'); ?>
</body>
</html>