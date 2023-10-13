<?php
    // NEED TO FIX JS TO VALIDATE FORM BEFORE SUBMITTING
    
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
    border: .2em solid black;
    border-radius: 1em;
}

fieldset {
    border: none;
    padding: .8em 0;
    margin: 0;
    border-top: .2em solid #CCC;
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
    margin: 0 auto;
    width: 20em;
}

.flex-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.btn {
    flex: 1 1 auto;
    margin: 0 1em;
    padding: 0.7em;
    border-radius: 0.5em;
    background: #ee580f;
    border: none;
    font-weight: bold;
    cursor: pointer;
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

#error {
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
        <h1><a href="index.php">Transitwise</a></h1>
        

        <div class="form-group">

        <form id="register" action="handlers/register_handler.php" method="post"> 
        <h1>Create Account</h1>
        <p id="error" ><?php echo $error; ?></p>
        <p>* required fields</p>
        <fieldset class="flex-box">
            
                
                <label for="f_name" >First Name *<br><input id="f_name" type="text" name="f_name"> <br></label>
                <label>Middle Name<br><input type="text" name="m_name"> <br></label>
                <label>Last Name *<br><input type="text" name="l_name"><br></label>
                <label>Email Address *<br><input type="text" name="email"><br> </label>
                <label>Phone Number <br><input type="text" name="phone"></label>
                <label>Date of Birth *<br><input type="date" name="birth_date"> </label>
            
        </fieldset>
        <fieldset class="flex-box">
            
            <label>Address 1 *<br><input type="text" name="address1"> <br></label>
            <label>Address 2<br><input type="text" name="address2"> <br></label>
            <label>City *<br><input type="text" name="city"> <br></label>
            <label>State *<br><input type="text" name="state"> <br></label>
            <label>Zip code *<br><input type="text" name="zipcode"></label>
        </fieldset>
        <fieldset class="flex-box">
            
            <label>Password *<br><input type="password" name="password" autocomplete="new-password"></label>
            <label>Confirm Password *<br><input type="password" name="confirm"></label>
        </fieldset>
        

        <div class="btn-holder">
            <input class="btn" type="reset" name="reset" value="Clear Form">
            <input class="btn" type="submit" name="send" value="Submit">
            
        </div>
        
        <p id=login>Already have an account? <a href="lp_login.php">Login here</a>.</p>

        </form>
        </div>
        

        <!-- This will need a css file for aestheic and organizing the layout.-->
    </div>
</body>
</html>
