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
<link rel="stylesheet" href="/transitwise/css/leftnavbar.css">
</head>
<body>


  
<div id="mynavbaruser" class="navbaruser"> 
    <!--The link below is to close the side bar.-->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!--The links below are placeholder should be replace with the location of those file.-->
    <a href="../account/userhomepage.php">User home</a>

    <a href="../account/usereditprofile.php">Edit profile</a>

    <a href="../account/userchangepassword.php">Edit password</a>

    <a href="../account/userbilling.php">Edit payment info</a>

    <a href="../account/userviewtickets.php">View tickets</a>    
</div>

<span style="font-size:30px;cursor:pointer" class= "openbtn" onclick="openNav()">☰</span>
<script>
  <?php include ('../../js/leftnavbar.js'); ?>
</script>
</body>
</html> 