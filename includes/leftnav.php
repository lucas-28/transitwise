<!DOCTYPE html>
<html lang="en">
<head>
<!--// Uriel Cruz
// Transitwise
// php
// This is for the left nav bar for 
// users, employees, and admin
-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Left Nav Bar User</title>

<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="stylesheet" href="/transitwise/css/leftnavbar2.css">
<style>
    .navbaruser {
        top: 78px;
        padding-top: 0;
        max-height: 90vh;
    }
    .nav-text {
        text-align: center;
        width: -webkit-fill-available;
    }
    .leftnav-list {
        list-style-type: none;
        padding: 0;
        margin: 20px 0;
    }
    .nav-group-head {
        font-weight: bold;
        text-align: center;
        margin-top: 40px;
    }

    .nav-text {
        padding: 20px;
    }
</style>
</head>
<body>


<span class= "leftnav-openbtn" onclick="openNav()">☰</span>
<div id="mynavbaruser" class="navbaruser"> 

<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<?php
    (session_status() == PHP_SESSION_NONE) ? session_start() : "";
    //var_dump($_SESSION["user_data"]);
    
    echo "<ul class='leftnav-list'>";
    $adminLeftNav = array(
                "Admin Home" => "/transitwise/home/portal/admin/adminhomepage.php",
                "Edit Profile" => "/transitwise/home/portal/admin/usereditprofile.php",
                "Edit Password" => "/transitwise/home/portal/admin/userchangepassword.php",
                
                "View Reports" => "/transitwise/home/portal/admin/financialsummary.php",
                "View Employees" => "/transitwise/home/portal/admin/viewemployees.php"
            );
            if($_SESSION["user_data"]["is_admin"] == 1){
                $counter = 0;
                foreach ($adminLeftNav as $i => $link) {
                    echo ($counter == 0) ?  '<li><a class="nav-group-head nav-text" href="' . $adminLeftNav[$i] . '"><span class="nav-text">' . $i . '</span></a></li>' 
                    : '<li><a href="' . $adminLeftNav[$i] . '"><span class="nav-text">' . $i . '</span></a></li>';
                    $counter++;
                }
            }
    echo "</ul>";
    echo "<ul class='leftnav-list'>";
    $employeeLeftNav = array(
                "Employee Home" => "/transitwise/home/portal/employee/employeehomepage.php",
                "Timestamps" => "/transitwise/home/portal/employee/timestamp.php",
                "Timecard" => "/transitwise/home/portal/employee/timecard.php",
                "Edit Password" => "/transitwise/home/portal/employee/userchangepassword.php",
                "View Customers" => "/transitwise/home/portal/employee/viewuserinfo.php",
                "View User's Payment Info" => "/transitwise/home/portal/employee/viewuserpaymentinfo.php",
                "View User's Tickets" => "/transitwise/home/portal/employee/employeehomepage.php",
                "Manage Flights" => "#"
            );
            if($_SESSION["user_data"]["is_employee"] == 1){
                $counter = 0;
                foreach ($employeeLeftNav as $i => $link) {
                    echo ($counter == 0) ?  '<li><a class="nav-group-head nav-text" href="' . $employeeLeftNav[$i] . '"><span class="nav-text">' . $i . '</span></a></li>' 
                    : '<li><a href="' . $employeeLeftNav[$i] . '"><span class="nav-text">' . $i . '</span></a></li>';
                    
                    $counter++;
                }
            }
            echo "</ul>";
            echo "<ul class='leftnav-list'>";
    $customerLeftNav = array(
                "User Home" => "/transitwise/home/account/userhomepage.php",
                "Edit Profile" => "/transitwise/home/account/usereditprofile.php",
                "Edit Password" => "/transitwise/home/account/change-password.php",
                "Edit Payment Info" => "/transitwise/home/account/userbilling.php",
                "View Reservations" => "/transitwise/home/account/reservations.php"
            );
            if($_SESSION["user_data"]["is_customer"] == 1){
            $counter = 0;
            foreach ($customerLeftNav as $i => $link) {
                echo ($counter == 0) ?  '<li><a class="nav-group-head nav-text" href="' . $customerLeftNav[$i] . '"><span class="nav-text">' . $i . '</span></a></li>' 
                : '<li><a href="' . $customerLeftNav[$i] . '"><span class="nav-text">' . $i . '</span></a></li>';
                $counter++;
            }
            echo "</ul>";
        }
    
  ?>
</div>


<script src=/transitwise/js/leftnavbar.js>

  </script>
</body>
</html> 