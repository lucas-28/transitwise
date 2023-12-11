<?php
session_start();
if( !isset($_SESSION["user_data"]) || $_SESSION["user_data"]["is_employee"] != 1){
    printf("You are not authorized to view this page.<br>");
    header("location: /transitwise/home/portal/login.php");
    exit;
}
$data = $_SESSION["user_data"];

?>
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
    <meta name="viewport" content="width=device-width", intial-scale="1.0">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    
</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>
<body>
    <!--This code is the user homepage.
        It should display the user's basic info and allows the user to press a button to 
        edit there account.
    -->

    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../../includes/leftnav.php'); ?>


    <!--
        This next part is the middle section of the page that does the same thing
        as the sidebar section but with some description of what it does.
    -->
    <div class="container-white-box">
        <div class="profile">
            <!--Should display the user's first name after the Hello,.-->
            <h2 class="greeting-user">Hello, <?php echo $data['f_name']; ?></h2><label class="user-firstname"></label>

            <!--Creates the navigation side bar of links to edit/view account.-->
            <div class="content">
                <div class="account-info">
                    <!-- Add the email of the user of the account after user.-->
                    <div class="square-title"><label class="email">User:</label></div>
                    <div class="sign-out">
                        <a href="../logout.php"><button class="signout-button" type="button">Sign out</button></a>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="View-timecard-square">
                    <!--View your timecard square.-->
                    <div class="square-title"><label class="title">View Timecard</label></div>
                    <div class="square-description">
                        <p class="description">View your timecard.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="timecard.php"><button type="button">VIEW TIMECARD</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="edit-password-square">
                    <!--Change your password square.-->
                    <div class="square-title"><label class="title">Password</label></div>
                    <div class="square-description">
                        <p class="description">Change your password here to keep it anonymous but the user.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="userchangepassword.php"><button type="button">CHANGE PASSWORD</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="ViewUser-info-square">
                    <!--View User's profile data info square.-->
                    <div class="square-title"><label class="title">User's Profile info</label></div>
                    <div class="square-description">
                        <p class="description">View or change user's profile info.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="viewuserinfo.php"><button type="button">VIEW USER'S INFO</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="ViewUser-paymentinfo-square">
                    <!--View or change user's payment info square.-->
                    <div class="square-title"><label class="title">User's Payment info</label></div>
                    <div class="square-description">
                        <p class="description">View or change user's payment info.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="viewuserpaymentinfo.php"><button type="button">VIEW USER'S PAYMENT INFO</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="ViewUser-ticketinfo-square">
                    <!--View or change user's ticket info square.-->
                    <div class="square-title"><label class="title">User's Ticket info</label></div>
                    <div class="square-description">
                        <p class="description">View or change the user's airline tickets that have been purchased.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="viewusertickets.php"><button type="button">VIEW USER'S TICKETS</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="Flight-Management-square">
                    <!--View or change user's ticket info square.-->
                    <div class="square-title"><label class="title">Flight Management</label></div>
                    <div class="square-description">
                        <p class="description">View and manage flights.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="manageflights.php"><button type="button">MANAGE FLIGHTS</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <a href="/transitwise/home/portal/login.php">Transitwise Portal</a>
            <a href="contact.html">Contact</a>
            <a href="feedback.html">Feedback</a>
        </div>
    </footer>
</body>
</html>
