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
        height: 100vh;
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
</style>
</head>
<body>


  
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
                "Employee Page" => "/transitwise/home/portal/employee/employeehomepage.php",
                "View Reports" => "/transitwise/home/portal/admin/financialsummary.php",
                "View Employees" => "/transitwise/home/portal/admin/viewemployees.php"
            );
            if($_SESSION["user_data"]["is_admin"] == 1){
                $counter = 0;
                foreach ($adminLeftNav as $i => $link) {
                    echo ($counter == 0) ?  '<li><a class="nav-group-head nav-text" href="' . $adminLeftNav[$i] . '"><span>' . $i . '</span></a></li>' 
                    : '<li><a class="nav-text" href="' . $adminLeftNav[$i] . '"><span>' . $i . '</span></a></li>';
                    $counter++;
                }
            }
    echo "</ul>";
    echo "<ul class='leftnav-list'>";
    $employeeLeftNav = array(
                "Employee Home" => "/transitwise/home/portal/employee/employeehomepage.php",
                "Timecard" => "/transitwise/home/portal/employee/timecard.php",
                "Edit Password" => "/transitwise/home/portal/employee/userchangepassword.php",
                "View Customers" => "/transitwise/home/portal/employee/viewuserinfo.php",
                "View User's Payment Info" => "/transitwise/home/portal/employee/viewuserpaymentinfo.php",
                "View User's Tickets" => "/transitwise/home/portal/employee/viewusertickets.php",
                "Manage Flights" => "/transitwise/home/portal/employee/manageflights.php"
            );
            if($_SESSION["user_data"]["is_employee"] == 1){
                $counter = 0;
                foreach ($employeeLeftNav as $i => $link) {
                    echo ($counter == 0) ?  '<li><a class="nav-group-head nav-text" href="' . $employeeLeftNav[$i] . '"><span>' . $i . '</span></a></li>' 
                    : '<li><a class="nav-text" href="' . $employeeLeftNav[$i] . '"><span>' . $i . '</span></a></li>';
                    
                    $counter++;
                }
            }
            echo "</ul>";
            echo "<ul class='leftnav-list'>";
    $customerLeftNav = array(
                "User Home" => "/transitwise/home/account/userhomepage.php",
                "Edit Profile" => "/transitwise/home/account/usereditprofile.php",
                "Edit Password" => "/transitwise/home/account/userchangepassword.php",
                "Edit Payment Info" => "/transitwise/home/account/userbilling.php",
                "View tickets" => "/transitwise/home/account/userviewtickets.php"
            );
            if($_SESSION["user_data"]["is_customer"] == 1){
            $counter = 0;
            foreach ($customerLeftNav as $i => $link) {
                echo ($counter == 0) ?  '<li><a class="nav-group-head nav-text" href="' . $customerLeftNav[$i] . '"><span>' . $i . '</span></a></li>' 
                : '<li><a class="nav-text" href="' . $customerLeftNav[$i] . '"><span>' . $i . '</span></a></li>';
                $counter++;
            }
            echo "</ul>";
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
      //document.body.style.marginLeft = "18%";

    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
      document.getElementById("mynavbaruser").style.width = "0";
      document.getElementById("mynavbaruser").style.paddingRight = "0";
      document.getElementById("mynavbaruser").style.paddingLeft = "0";
      //document.body.style.marginLeft = "0%";
    }
  </script>
</body>
</html> 