<?php
   // HTML written by Uriel, PHP and CSS written by Lucas with GPT-4 and Copilot
   
   // NEED TO FIX JS TO VALIDATE FORM BEFORE SUBMITTING
    
    // Initialize the session
    session_start();
    if (isset($_SESSION["error"]) && $_SESSION["error"] == true) {
        $error_message = $_SESSION["error-message"];
        $error = true;
        echo '<style type="text/css">
         #error-message {
            
        }
        </style>';
    }
    unset($_SESSION['error']);
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: /transitwise/home/account/userhomepage.php");
        exit;
    }
    else {
        $error = false;
        
    }
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Create Account</title>
    <meta charset="utf-8">
    <link rel="icon" href="/transitwise/images/favicon.ico">
    

<style>
    
body,td,th {
    font-size: 0.9em;
    font-family: Arial, Helvetica, sans-serif;
    color: #333;
    margin: 1em;

}

form {
    width: 40em;
    margin: 0 auto;
    padding: 1em;
    border: .2em solid black;
    border-radius: 1em;
}

fieldset {
    border: none;
    padding: .8em 0;
    margin: 0;
    border-bottom: .2em solid #CCC;
}

h1 {
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    padding: .2em 0;
}



label {
    font: 1em Arial, Helvetica, sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: left;
    
}

input {
    flex: 1 1 auto;
    margin-left: 1em;
    margin-bottom: 1em;
    padding: 0.7em;
    border-radius: 0.5em;
    background: #eee;
    border: none;
    margin: 0;
    
}

.form-group {
    display: flex;
    flex-direction: column;
    margin: 1em 0;
    
}

.input-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 1em;
    margin: 0;
    padding: 1em 0;

}


.btn:hover {
    background: #003366;
    color: #fff;
}

.btn:active {
    background: #ccc;
    box-shadow: 0 0 0.5em #ccc;
    transform: scale(0.98);
}

.btn-holder {
    display: flex;
    text-align: center;
    padding: .6em 0;
    border-top: .2em solid #CCC;
}

#error-message {
    display: none;
    color: red;
    font-weight: bold;
    text-align: center;
}

#login {
    text-align: center;
    padding: .2em;
    margin: 0;
}

</style>

</head>

<body>
    <div id="body">
        

        <div class="form-group">

        <form id="register" action="/transitwise/handlers/register_handler.php" method="post"> 
        <?php include '../../includes/nav-icon.php'; ?>
        <h1>Create Account</h1>
        <?php if (isset($error)) echo ($error == true) ? '<p id="error-message" style = "display: block; color: red;" >' . $error_message . '</p>': ""; ?> 
        <p>* required fields</p>
        <p>Enter your name and contact information.</p>
        <fieldset class="input-group">
            <label for="f_name" >First Name *<br><input id="f_name" type="text" name="f_name" required> <br></label>
            <label>Middle Name<br><input type="text" name="m_name"> <br></label>
            <label>Last Name *<br><input type="text" name="l_name" required><br></label>
            <label>Email Address *<br><input type="text" name="email" required><br> </label>
            <label>Phone Number <br><input type="text" name="phone"></label>
            <label>Date of Birth *<br><input type="date" name="birth_date" min="1900-01-01" max="2005-12-10" required> </label>
            
        </fieldset>
        <p>Enter your address.</p>
        <fieldset class="input-group">
            
            <label>Address 1 *<br><input type="text" name="address1" required> <br></label>
            <label>Address 2<br><input type="text" name="address2"> <br></label>
            <label>City *<br><input type="text" name="city" required> <br></label>
            <label>State *<br><input type="text" name="state" required> <br></label>
            <label>Zip code *<br><input type="text" name="zipcode" required></label>
        </fieldset>
        <p>Enter a password for your account. Passwords must be at least 8 characters long and contain at least one number, one uppercase letter, and one lowercase letter.</p>
        <fieldset class="input-group">
            
            
            <label>Password *<br><input id="pw1" type="password" name="password" autocomplete="new-password"></label>
            <label>Confirm Password *<br><input id="pw2" type="password" name="confirm"></label>
            
        </fieldset>
        

        <div class="input-group">
            <input class="btn" type="reset" name="reset" value="Clear Form">
            <input id="submit" class="btn" type="submit" name="send" value="Submit">
            
        </div>
        
            <p id=login>Already have an account? <a href="/transitwise/home/account/login.php">Login here</a>.</p>

        </form>
        </div>
        

        <!-- This will need a css file for aestheic and organizing the layout.-->
    </div>
    <script src="/transitwise/js/validate.js"></script>
</body>
</html>
