<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'employeeCheck.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
            Aidan Callan
            Transitwise
            Employee timestamp creation page
        -->
    <title>Employee Timestamp Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1.0">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>

<!-- Display top nav -->
<header><?php include('../../../includes/topnav.php'); ?></header>

<body style="justify-content:flex-start;">
    <!--Allow for side nav bar to appear upon opening page-->
    <?php include('../../../includes/leftnav.php'); ?>

    <!--Submit form button to trigger process of save_timestamp.php in order to create timestamp and save it in database-->
    <div class="container">
        <form action="save_timestamp.php" method="post">
            <input type="submit" value="SAVE TIMESTAMP">
        </form>

        <!--This will echo whether or not the timestamp creation succeeded then will unset the variable to prevent the page from showing that a timestamp was created when re-entered later-->
        <?php
        if (isset($_SESSION["timestamp_status"])) {
            echo $_SESSION["timestamp_status"];
        }
        unset($_SESSION["timestamp_status"]);
        ?>
    </div>
    <div class="container">
        <!--Display the date, the employee's clock-in times, clock-out times, duration between the two, and the wage earned from working that shift-->
        <h2>Timestamp & Wage Summary</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Clock-In Time</th>
                    <th>Clock-Out Time</th>
                    <th>Hours</th>
                    <th>Wage</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                //Include connection to transitwise database
                include('../../../includes/connect.php');

                //Display all rows from database timecard table associated with the logged-in employee via ID
                $sql = "SELECT * FROM timecard INNER JOIN employees on timecard.EMID = employees.EMID WHERE employees.EMID = ? ORDER BY start_time DESC";

                //Prepare statement to prevent injection attack, bind parameters, then execute
                $stmt = $dbconn->prepare($sql);
                $stmt->bind_param("i", $_SESSION["user_data"]["EMID"]);
                $stmt->execute();

                //Row variables populate in result array
                $result = $stmt->get_result();
                //If the employee already has past timestamps saved in the database, generate table with variables accordingly; else, display that data is not present in database
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['start_time'] . "</td>";
                        echo "<td>" . $row['end_time'] . "</td>";
                        echo "<td>" . $row['hours'] . "</td>";
                        if ($row['wage'] != null) {
                            $wage_string = "$" . $row['wage'];
                        } else {
                            $wage_string = $row['wage'];
                        }
                        echo "<td>" . $wage_string . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Data could not be found</td></tr>";
                }
                //Close prepared statement and database connection
                $stmt->close();
                $dbconn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>