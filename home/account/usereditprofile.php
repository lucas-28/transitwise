<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
include('../../includes/connect.php');
include 'userCheck.php';;
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--
    // Uriel Cruz
    // Transitwise
    // HTML
    // This is the User profile page for the user.

    For php editor, 
  - Keep the user login.
  - Grab the user's data and have it loaded in the input box. If it is modified,
  then it will submit the data to the database and refreshes the page with 
  new data. If it doesn't meet certain conditions like the year of date or birth
  is in the future then it should come out as an error.

  - The sidebar buttons have href to link to other files, they are labeled
    as "placeholder" whenever those pages are finsihed. The home button goes to
    the user's home page.

  - Script section left empty unless needed.

  - Note, I reused register.php that was in github and modified for this case.
    -->
    <title>User Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" , intial-scale="1.0">

    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link rel="icon" href="/transitwise/images/favicon.ico">

    <style>
        .editProfile {
            display: flex;
            flex-direction: row;
        }
    </style>


</head>
<header>
    <?php include('../../includes/topnav.php'); ?>
</header>

<body>
    <?php include('../../includes/leftnav.php'); ?>
    <div>
        <!--Creates the navigation side bar of links to edit/view account.-->

        <div class="editProfile">

            <!--This section will display the user's current profile information.-->
            <div class="container profile-info">
                <h2>Current Profile Information</h2>
                <div class="two-column-grid">

                    
                    <?php
                    $data_names = array(
                        "f_name" => "First Name",
                        "m_name" => "Middle Name",
                        "l_name" => "Last Name",
                        "email" => "Email Address",
                        "phone" => "Phone Number",
                        "birth_date" => "Date of Birth",
                        "address1" => "Address 1",
                        "address2" => "Address 2",
                        "city" => "City",
                        "state" => "State",
                        "zip" => "Zip Code"
                    );

                    foreach ($_SESSION['user_data'] as $key => $value) {
                        if ($key == "password") {
                            continue;
                        }
                        if ($key == "birth_date") {
                            $value = date("m/d/Y", strtotime($value));
                        }
                        if (isset($data_names[$key]) && $data_names[$key] != NULL) {
                            echo '<span class="data-name">' . $data_names[$key] . ': </span><span>' . $value . '</span>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="container">
                <!--The action for the form below should probably change. -->
                <h1>Edit Profile</h1>
                <p>Please fill in any fields you wish to change. Empty fields will not be changed.</p>
                <?php include('../../includes/error-message.php'); ?>
                <form class="flex-row" action="/transitwise/handlers/edit_user_handler.php" method="post">


                    <fieldset class="flex-row">
                        <!--Each input box should have the original data that the User have when
                            they created their account. For example, in this case the user's f_name
                            should be filled with their first name from the database. All inputs,
                            except for the middle name if not filled in, should have data of the
                            user.
                        -->
                        <label for="f_name">First Name <br><input id="f_name" type="text" name="f_name"> <br></label>
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
                        <label>Zip code <br><input type="text" name="zip"></label>
                        <div class="btn-holder">
                            <input class="btn" type="submit" name="send" value="Submit">
                        </div>
                    </fieldset>


                </form>
            </div>
        </div>

    </div>
    <?php include "../../includes/footer.php" ?>
</body>

</html>