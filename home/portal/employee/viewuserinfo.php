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
    // This is the User billing page for the user.

    For php editor, 
  - Keep the user login.
  - Grab the user's data and have it loaded in the input boxes. This info should
    not be modifed and have the option to delete it. They will have the option to
    save a new credit card with billing info.

  - The sidebar buttons have href to link to other files, they are labeled
    as "placeholder" whenever those pages are finsihed. The home button goes to
    the user's home page.

  - Script section left empty unless needed.

  - Note, I reused checkoutpagetest.php that was in github and modified it for this case.
    -->
<title>User Billing Info</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width", intial-scale="1.0">
<link rel="stylesheet" href="/transitwise/css/style.css">
<link rel="icon" href="/transitwise/images/favicon.ico">

</head>
<header>
    <?php include ('../../../includes/topnav.php'); ?>
</header>
<body>
    <!--Creates the navigation side bar of links to edit/view account.-->
    <?php include ('../../../includes/leftnav.php'); ?>
    <div id="body">
       
        <h3>View User's Payment Info</h3>

        <form id="getUserInfo" method="post" action="placeholder.php">
            <select name="UserInfo" id="userInfo">
                <option value="usercard">Username:<label for="first-name"></label></option>
            </select>
            <input type="button" name="edit" value="Select">
        </form>

        <!--Check to see if this works using this action below for this form. -->
        <form id="register" action="handlers/register_handler.php" method="post"> 
                <h2>User: </h2>
                
                <fieldset class="flex-box">
                    <!--Each input box should have the original data that the User have when
                        they created their account. For example, in this case the user's f_name
                        should be filled with their first name from the database. All inputs,
                        except for the middle name if not filled in, should have data of the
                        user.
                    -->
                    <label for="f_name" >First Name <br><input id="f_name" type="text" name="f_name"> <br></label>
                    <label>Middle Name<br><input type="text" name="m_name"> <br></label>
                    <label>Last Name <br><input type="text" name="l_name"><br></label>
                    <label>Email Address <br><input type="text" name="email"><br> </label>
                    <label>Phone Number <br><input type="text" name="phone"></label>
                    <label>Date of Birth <br><input type="date" name="birth_date"> </label>
                    
                </fieldset>
                <fieldset class="flex-box">
                    <!--Each input box should have the original data that the User have when
                        they created their account. For example, in this case the user's address1
                        should be filled with their first adress from the database. All inputs
                        should have data of the user.
                    -->
                    <label>Address 1 <br><input type="text" name="address1"> <br></label>
                    <label>Address 2<br><input type="text" name="address2"> <br></label>
                    <label>City <br><input type="text" name="city"> <br></label>
                    <label>State <br><input type="text" name="state"> <br></label>
                    <label>Zip code <br><input type="text" name="zipcode"></label>

                </fieldset>
            
                <div class="btn-holder">
                    <input class="btn" type="submit" name="send" value="Submit">
                </div>
            </form>
    </div>
    <script>
        <?php include ('../../js/registercreditcard.js'); ?>
    </script>

<!-- footer -->
<?php include ('../../../includes/footer.php'); ?>

</body>
</html>
