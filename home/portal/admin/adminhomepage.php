<!DOCTYPE HTML>
<html lang="en">
<head>
<!--
    // Uriel Cruz
    // Transitwise
    // HTML and style section(css)
    // This is the home page for the admin.
    For php editor, 
  - Keep the admin login.
  - Grab the admin's email from database and display after "User:"

  - All buttons have href to link to other files, they are labeled
    as "placeholder" whenever those pages are finsihed. Home may need 
    to change as well to send user to home page.

  - Admin should be able to access the employee homepage and use their functions.

  - Employee management will view all employees and edit their profiles there.

  - Sign out button is under account info.

  - Script section left empty unless needed.

  Made by Uriel Cruz
    -->

<title>Admin Home page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">

</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>
<body>    
    
    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../../includes/leftnavadmin.php'); ?>

    <div class="container-white-box">

        <div class="profile">
            <!--Should display, Hello, Admin to know that this is the adimin page.-->
            <h2 class="greeting-user">Hello, Admin</h2>

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
                            <a href="usereditprofile.php"><button type="button">EDIT PROFILE</button></a>
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
                <div class="View-employee-page-square">
                    <!--Edit your profile square.-->
                    <div class="square-title"><label class="title">View employee page</label></div>
                    <div class="square-description">
                        <p class="description">View and access all employee functions.</p>
                        <div class="square-action">
                            <!--placeholder should be replace to go to an employee page.
                                Don't know if this is fine to do so they can use that homepage?
                                The issue would be to go back to the admin homepage besides clicking
                                the back arrow.
                            -->
                            <a href="../../portal/employee/employeehomepage.php"><button type="button">EMPLOYEE PAGE</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="view-financialreports-square">
                    <!--View the finance reports square.-->
                    <div class="square-title"><label class="title">Finance Reports</label></div>
                    <div class="square-description">
                        <p class="description">View the financial reports produced by the company.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <a href="financialsummary.php"><button type="button">VIEW REPORTS</button></a>
                        </div>
                    </div>
                </div>

                <div class="hr-line"></div>
                <div class="view-employeemanagement-square">
                    <!--Change your ticket info square.-->
                    <div class="square-title"><label class="title">Employee Management</label></div>
                    <div class="square-description">
                        <p class="description">View or change your employees here.</p>
                        <div class="square-action">
                            <!--placeholder should be replace with the location of the file.-->
                            <!--Needs Work: viewemployees.php-->
                            <a href="temp.php"><button type="button">EMPLOYEE MANAGEMENT</button></a>
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