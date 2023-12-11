<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include 'employeeCheck.php'; ?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--
    // Uriel Cruz
    // Transitwise
    // HTML and style section(css)
    // This is the home page for the employee
    For php editor, 
  - Keep the employee login.
  - Grab the user's email from database and display after "User:"

  - All buttons have href to link to other files, they are labeled
    as "placeholder" whenever those pages are finsihed. Home may need 
    to change as well to send user to home page.

  - Sign out button is under account info.

  - Script section left empty unless needed.

    -->

    <title>Employee Home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" , intial-scale="1.0">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">

</head>
<header>
    <?php include('../../../includes/topnav.php'); ?>
</header>

<body>
    <!--This code is the user homepage.
        It should display the user's basic info and allows the user to press a button to 
        edit there account.
    -->

    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include('../../../includes/leftnav.php'); ?>


    <!--
        This next part is the middle section of the page that does the same thing
        as the sidebar section but with some description of what it does.
    -->
    <div class="container-white-box">
        <div class="profile">
            <!--Should display the user's first name after the Hello,.-->
            <h2 class="greeting-user">Hello, Employee</h2><label class="user-firstname"></label>

            <!--Creates the navigation side bar of links to edit/view account.-->
            <div class="content">
            <div class="create-timestamp-square">
                    <!--Save timestamp to clock in/clock out.-->
                    <div class="square-title"><b><label class="title">Create a Timestamp</label></b></div>
                    <div class="square-description">
                        <p class="description">View your timestamp and wage summary or create a timestamp to clock-in/clock-out.</p>
                        <div class="square-action">
                            <a href="timestamp.php"><button type="button">TIMESTAMPS & WAGE SUMMARY</button></a>
                        </div>
                    </div>
                </div>    
            

                <br>

                <div class="hr-line"></div>
                <div class="View-timecard-square">
                    <!--View your timecard square.-->
                    <div class="square-title"><b><label class="title">View Timecard</label></b></div>
                    <div class="square-description">
                        <p class="description">View your timecard.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="timecard.php"><button type="button">VIEW TIMECARD</button></a>
                        </div>
                    </div>
                </div>

                <br>

                <div class="hr-line"></div>
                <div class="edit-password-square">
                    <!--Change your password square.-->
                    <div class="square-title"><b><label class="title">Password</label></b></div>
                    <div class="square-description">
                        <p class="description">Change your password here to keep it anonymous but the user.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="userchangepassword.php"><button type="button">CHANGE PASSWORD</button></a>
                        </div>
                    </div>
                </div>

                <br>

                <div class="hr-line"></div>
                <div class="ViewUser-info-square">
                    <!--View User's profile data info square.-->
                    <div class="square-title"><b><label class="title">User's Profile info</label></b></div>
                    <div class="square-description">
                        <p class="description">View or change user's profile info.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="viewuserinfo.php"><button type="button">VIEW USER'S INFO</button></a>
                        </div>
                    </div>
                </div>

                <br>

                <div class="hr-line"></div>
                <div class="ViewUser-paymentinfo-square">
                    <!--View or change user's payment info square.-->
                    <div class="square-title"><b><label class="title">User's Payment info</label></b></div>
                    <div class="square-description">
                        <p class="description">View or change user's payment info.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="viewuserpaymentinfo.php"><button type="button">VIEW USER'S PAYMENT INFO</button></a>
                        </div>
                    </div>
                </div>

                <br>

                <div class="hr-line"></div>
                <div class="ViewUser-ticketinfo-square">
                    <!--View or change user's ticket info square.-->
                    <div class="square-title"><b><label class="title">User's Ticket info</label></b></div>
                    <div class="square-description">
                        <p class="description">View or change the user's airline tickets that have been purchased.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a id="VT" href="#VT"><button type="button">VIEW USER'S TICKETS</button></a>
                        </div>
                    </div>
                </div>

                <br>

                <div class="hr-line"></div>
                <div class="Flight-Management-square">
                    <!--View or change user's ticket info square.-->
                    <div class="square-title"><b><label class="title">Flight Management</label></b></div>
                    <div class="square-description">
                        <p class="description">View and manage flights.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a id="MF" href="#MF"><button type="button">MANAGE FLIGHTS</button></a>
                        </div>
                    </div>
                </div>

                <br>

                <div class="hr-line"></div>
                

                <div class="account-info">
                    
                    <!-- Add the email of the user of the account after user.-->
                    <div class="square-title"><label class="email">User:</label></div>
                    <div class="sign-out">
                        <a href="../logout.php"><button class="signout-button" type="button">Sign out</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../../../includes/footer.php'); ?>
</body>

</html>