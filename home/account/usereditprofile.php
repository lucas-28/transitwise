<?php
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    include ('../../includes/connect.php');
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        if(isset($_SESSION['user_data'])){
            //$user = new User($_SESSION['user_data']);
            $user = $_SESSION['user_data'];
            //var_dump($user);
        }
        else{
            echo 'User data not found. Please log out and log back in.';
        }
    }
    else {
        header("location: /transitwise/home/account/LP_login.php");
        exit();
    }
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
<meta name="viewport" content="width=device-width", intial-scale="1.0">

<link rel="stylesheet" href="/transitwise/css/style.css">
    
</head>
<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>

<body>
    
    <div id="body">
        <!--Creates the navigation side bar of links to edit/view account.-->
        <?php include ('../../includes/leftnavuser.php'); ?>

        <div class="form-group">
            <!--The action for the form below should probably change. -->
            <form id="register" action="handlers/register_handler.php" method="post"> 
                <h1>User Profile</h1>
                
                
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
