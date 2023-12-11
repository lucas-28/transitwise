<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); include 'userCheck.php'; ?>
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
    <meta name="viewport" content="width=device-width" , intial-scale="1.0">
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    <style> 
    .profile {
        width: 80%;
    }
    .description {
        font-size: 1.2rem;
        
        margin-top: 30px;
        margin-bottom: 0px;
        
    }
    </style>

</head>
<header>
    <?php include('../../includes/topnav.php');
    include('../../includes/connect.php');
    
    
    ?>
    
</header>

<body>

    <!--This code is the user homepage.
        It should display the user's basic info and allows the user to press a button to 
        edit there account.
    -->


    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include('../../includes/leftnav.php'); ?>

    <!--
        This next part is the middle section of the page that does the same thing
        as the sidebar section but with some description of what it does.
    -->
    <div class="main-content">
    <div class="container profile">
        

        <div class="profile">
            <!--Should display the user's first name after the Hello,.-->
            <h2 class="greeting-user">Hello, <?php echo $_SESSION["user_data"]["f_name"]; ?>.</h2><label class="user-firstname"></label>

            <!--Creates the navigation side bar of links to edit/view account.-->
            <div class="content">
                <div class="account-info">
                    <!-- Add the email of the user of the account after user.-->
                    
                    
                </div>

                <div class="hr-line"></div>
                <div class="edit-profile-square">
                    <!--Edit your profile square.-->
                    
                    <div class="square-description">
                        <p class="description">View and edit your account information here.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="../account/usereditprofile.php"><button type="button">EDIT PROFILE</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="edit-password-square">
                    <!--Change your password square.-->
                    
                    <div class="square-description">
                        <p class="description">Change your password here.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="../account/change-password.php"><button type="button">CHANGE PASSWORD</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="edit-paymentinfo-square">
                    <!--Change your payment info square.-->
                    
                    <div class="square-description">
                        <p class="description">View or change your payment info.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="../account/userbilling.php"><button type="button">VIEW PAYMENT INFO</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="view-tickets-square">
                    <!--Change your ticket info square.-->
                    
                    <div class="square-description">
                        <p class="description">View or change your airline tickets that have been purchased.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="/transitwise/home/account/reservations.php"><button type="button">VIEW RESERVATIONS</button></a>
                        </div>
                    </div>
                </div>
                <div class="sign-out">
                    <p class="description">Log out from your account.</p>
                    <a href="logout.php"><button class="signout-button" type="button">SIGN OUT</button></a>
                </div>

            </div>
        </div>
    </div>
    </div>
    <?php include('../../includes/footer.php'); ?>
</body>

</html>