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
</head>
<body>


  
<div id="mynavbaruser" class="navbaruser"> 
<?php
    $adminLeftNav = array(
                "Admin Home" => "/transitwise/home/portal/admin/adminhomepage.php",
                "Edit Profile" => "/transitwise/home/portal/admin/usereditprofile.php",
                "Edit Password" => "/transitwise/home/portal/admin/userchangepassword.php",
                "Employee Page" => "/transitwise/home/portal/employee/employeehomepage.php",
                "View Reports" => "/transitwise/home/portal/admin/financialsummary.php",
                "View Employees" => "/transitwise/home/portal/admin/viewemployees.php"
            );
            if($SESSION["user_data"]["is_admin"] == 1){
                foreach ($adminLeftNav as $i => $link) {
                    echo '<li><a href="' . $adminLeftNav[$i] . '">' . $i . '</a></li>';
                }
            }
    $employeeLeftNav = array(
                "Employee Home" => "/transitwise/home/portal/employee/employeehomepage.php",
                "Timecard" => "/transitwise/home/portal/employee/timecard.php",
                "Edit Password" => "/transitwise/home/portal/employee/userchangepassword.php",
                "View User's Info" => "/transitwise/home/portal/employee/viewuserinfo.php",
                "View User's Payment Info" => "/transitwise/home/portal/employee/viewuserpaymentinfo.php",
                "View User's Tickets" => "/transitwise/home/portal/employee/viewusertickets.php",
                "Manage Flights" => "/transitwise/home/portal/employee/manageflights.php"
            );
            if($SESSION["user_data"]["is_employee"] == 1){
                foreach ($employeeLeftNav as $i => $link) {
                    echo '<li><a href="' . $employeeLeftNav[$i] . '">' . $i . '</a></li>';
                }
            }
    $userLeftNav = array(
                "User Home" => "/transitwise/home/account/userhomepage.php",
                "Edit Profile" => "/transitwise/home/account/usereditprofile.php",
                "Edit Password" => "/transitwise/home/account/userchangepassword.php",
                "Edit Payment Info" => "/transitwise/home/account/userbilling.php",
                "View tickets" => "/transitwise/home/account/userviewtickets.php"
            );
            
            if($SESSION["user_data"]["is_user"] == 1){
                foreach ($userLeftNav as $i => $link) {
                    echo '<li><a href="' . $userLeftNav[$i] . '">' . $i . '</a></li>';
                }
            }
  ?>
</div>

<span style="font-size:30px;cursor:pointer" class= "openbtn" onclick="openNav()">☰</span>
<script>
    /* Set the width of the side navigation to 20% */
    function openNav() {
      document.getElementById("mynavbaruser").style.width = "10%";
      document.getElementById("mynavbaruser").style.paddingRight = "4%";
      document.getElementById("mynavbaruser").style.paddingLeft = "4%";
      document.body.style.marginLeft = "18%";

    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mynavbaruser").style.width = "0";
      document.getElementById("mynavbaruser").style.paddingRight = "0";
      document.getElementById("mynavbaruser").style.paddingLeft = "0";
      document.body.style.marginLeft = "0%";
    }
  </script>
</body>
</html> 