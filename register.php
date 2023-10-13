<?php
    // Initialize the session
    session_start();
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Create Account</title>
    <meta charset="utf-8">
    

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
    border: .2em solid #CCC;
    border-radius: 1em;
}

h1 {
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    padding: .2em 0;
}

.btn {
    margin: 1em;
    padding: 0.7em;
    border-radius: 0.5em;
    background: #eee;
    border: none;
    margin: 0 auto;
    
    font-weight: bold;
    cursor: pointer;
}

label {
    display: block;
    margin: 0.5em 0;
}

.btn:hover {
    background: #ccc;
}

.btn-holder {
    text-align: center;
    margin: 1em;
}

#error {
    color: red;
    font-weight: bold;
    text-align: center;
}

</style>

</head>
<body>
    <div id="body">
        <h1><a href="index.php">Transitwise</a></h1>
        

        <div class="form-group">

        <form id="register" action="handlers/register_handler.php" method="post"> 
        <h1>Create Account</h1>
        <p id="error" ><?php echo $error; ?></p>
        <p>* required fields</p>
        <fieldset>
            <legend>Personal Information</legend>
            <label>First Name *<br><input type="text" name="f_name"> <br></label>
            <label>Middle Name<br><input type="text" name="m_name"> <br></label>
            <label>Last Name *<br><input type="text" name="l_name"><br></label>
            <label>Email Address *<br><input type="text" name="email"><br><br> </label>
            <label>Phone Number *<br><input type="text" name="phone"><br><br> </label>
            <label>Date of Birth *<br><input type="date" name="birth_date"><br><br> </label>
        </fieldset>
        <fieldset>
            <legend>Address</legend>
            <label>Address 1 *<br><input type="text" name="address1"> <br></label>
            <label>Address 2<br><input type="text" name="address2"> <br></label>
            <label>City *<br><input type="text" name="city"> <br></label>
            <label>State *<br><input type="text" name="state"> <br></label>
            <label>Zip code *<br><input type="text" name="zipcode"> <br></label>
        </fieldset>
        <fieldset>
            <legend>Account Information</legend>
            <label>Password *<br><input type="password" name="password" autocomplete="new-password"><br></label>
            <label>Confirm Password *<br><input type="password" name="confirm"></label>
        </fieldset>
        <div class="btn-holder">
            <input class="btn" type="reset" name="reset" value="Clear Form">
            <input class="btn" type="submit" name="send" value="Submit">
            <p>Already have an account? <a href="lp_login.php">Login here</a>.</p>
        </div>

        </form>
        </div>
        

        <!-- This will need a css file for aestheic and organizing the layout.-->
    </div>
</body>
</html>
