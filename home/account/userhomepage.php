<!DOCTYPE HTML>
<html lang="en">
<head>
<!--
    // Uriel Cruz
    // Transitwise
    // HTML and style section(css)
    // This is the home page for the user.
    For php editor, 
  - Keep the user login.
  - Grab the user's first name from database and display after "Hello,"
  - Grab the user's email from database and display after "User:"

  - All buttons have href to link to other files, they are labeled
    as "placeholder" whenever those pages are finsihed. Home may need 
    to change as well to send user to home page.

  - Sign out button is under account info.

  - Script section left empty unless needed.

    -->

    <title>User Home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", intial-scale="1.0">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    
</head>
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>
<body>
    <!--This code is the user homepage.
        It should display the user's basic info and allows the user to press a button to 
        edit there account.
    -->
    <h1 class="Company-name">Transitwise</h1>

    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../includes/leftnavuser.php'); ?>

    <!--
        This next part is the middle section of the page that does the same thing
        as the sidebar section but with some description of what it does.
    -->
    <div class="container-white-box">

        <div class="profile">
            <!--Should display the user's first name after the Hello,.-->
            <h2 class="greeting-user">Hello, </h2><label class="user-firstname"></label>

            <!--Creates the navigation side bar of links to edit/view account.-->
            <div class="content">
                <div class="account-info">
                    <!-- Add the email of the user of the account after user.-->
                    <div class="square-title"><label class="email">User:</label></div>
                    <div class="sign-out">
                        <a href="placeholder"><button class="signout-button" type="button">Sign out</button></a>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="edit-profile-square">
                    <!--Edit your profile square.-->
                    <div class="square-title"><label class="title">Edit profile</label></div>
                    <div class="square-description">
                        <p class="description">View and edit your account information here.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="placeholder"><button type="button">EDIT PROFILE</button></a>
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
                            <a href="placeholder"><button type="button">CHANGE PASSWORD</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="edit-paymentinfo-square">
                    <!--Change your payment info square.-->
                    <div class="square-title"><label class="title">Payment info</label></div>
                    <div class="square-description">
                        <p class="description">View or change your payment info.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="placeholder"><button type="button">VIEW PAYMENT INFO</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="view-tickets-square">
                    <!--Change your ticket info square.-->
                    <div class="square-title"><label class="title">Ticket info</label></div>
                    <div class="square-description">
                        <p class="description">View or change your airline tickets that have been purchased.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="placeholder"><button type="button">VIEW TICKETS</button></a>
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
