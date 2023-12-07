<!DOCTYPE html>
<html lang="en">
<head>
<!--// Uriel Cruz
// Transitwise
// php
// This is for the left nav bar for 
// admin
-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Left Nav Bar Admin</title>
<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="stylesheet" href="/transitwise/css/leftnavbar.css">
</head>
<body>


  
<div id="mynavbaruser" class="navbaruser"> 
    <!--The link below is to close the side bar.-->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!--The links below are placeholder should be replace with the location of those file.-->
    <a href="../../portal/admin/adminhomepage.php">Admin home</a>

    <a href="../../portal/admin/usereditprofile.php">Edit profile</a>

    <a href="../../portal/admin/userchangepassword.php">Edit password</a>

    <a href="../../portal/employee/employeehomepage.php">Employee page</a>

    <a href="../../portal/admin/financialsummary.php">View Reports</a> <!--Z-reports? --> 

    <!--Needs Work: viewemployees.php-->
    <a href="../../portal/admin/temp.php">View employees</a>  
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