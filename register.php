<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Create Account</title>
    <meta charset="utf-8">
    <script type="text/javascript">

    var form;
        function init() {
            form = document.getElementById('holder.php');//place holder
            form.addEventListener("submit", checkSubmit, false);// Submits the data and verifies using checkSubmit() method.
            form.addEventListener("reset", checkReset, false);// Resets the data on the page.


            form['name'].focus();
        }
        String.prototype.trim=function() {
            return this.replace(/^\s+1\s+$/g, '');
        }
        function whichButton(name) {
            var buttons=document.getElementsByName(name);
            for (var i in buttons) {
                if(buttons[i].checked) return buttons[i].value
            }
            return false;
        }
        
        function checkSubmit() {
            error = new Array();
            //Fill the array with the error value.

            form['email'].value=form['email'].value.trim();
            form['f_name'].value=form['f_name'].value.trim();
            form['m_name'].value=form['m_name'].value.trim();
            form['l_name'].value=form['l_name'].value.trim();
            form['address1'].value=form['address1'].value.trim();
            form['address2'].value=form['address2'].value.trim();
            form['city'].value=form['city'].value.trim();
            form['state'].value=form['state'].value.trim();
            form['zip'].value=form['zip'].value.trim();
            form['phone'].value=form['phone'].value.trim();

            //Check required fields
            if(!form['email'].value)
                error.push('Missing Email Address');
            if(!form['fname'].value)
                error.push('Missing First Name');
            if(!form['lname'].value)
                error.push('Missing Last Name');
            if(!form['address1'].value)
                error.push('Missing Address');
            if(!form['city'].value)
                error.push('Missing City');
            if(!form['state'].value)
                error.push('Missing State');
            if(!form['zip'].value)
                error.push('Missing Zipcode');
            if(!form['phone'].value)
                error.push('Missing Phone Number');

            if(!form['password'].value)
                error.push('Missing Password');
            if(form['password'].value.length < 8)
                error.push('Password is too short, it must be 8 characters long.');

            //Checks if it is a valid email address
            var pattern=/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+(\.[a-zA-Z]{2,4})$/;
            if(!form['email'].value.match(pattern))
                error.push('Invalid Email Address');


            //Check Post Code has 5 digits
            var pattern=/^\d{5}$/;
            if(!form['postcode'].value.match(pattern))
                error.push('Invalid Post Code');

            //Check password matches confirmation
            
            if(!form['passwordConfirm'].value.match(password)){
                error.push("Passwords don't match");
            }

            console.log(form['confirm'].value);
            console.log(form['password'].value);
            if(!form['confirm'].value.match(form['password'].value)){
                error.push('Passwords do not match');
            }

            //Check that "Other" field is filled
            
            if(error.length) { // if there are errors
            alert(error.join("\n"))
            return false;
            }
            else return true;

            return confirm("This will submit the form"); //Temporary placeholder
                                                         //to return data.
        } 
        function checkReset() {
            return confirm("This will clear the form data");
        }
    </script>

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

</style>

</head>
<body>
    <div id="body">
        <h1><a href="index.php">Transitwise</a></h1>
        <h1>Create Account</h1>
        <form action="holder.php" method="post"> 
        <fieldset>

            <label>First Name *<br><input type="text" name="first name"> <br></label>
            <label>Middle Name<br><input type="text" name="middle name"> <br></label>
            <label>Last Name *<br><input type="text" name="last name"><br></label>
            <label>Email Address *<br><input type="text" name="email"><br><br> </label>
        </fieldset>
        <fieldset>
            <label>Address 1 *<br><input type="text" name="street"> <br></label>
            <label>Address 2<br><input type="text" name="street"> <br></label>
            <label>City *<br><input type="text" name="city"> <br></label>
            <label>State *<br><input type="text" name="state"> <br></label>
            <label>Zip code *<br><input type="text" name="zip"> <br></label>
        </fieldset>
        <fieldset>
            <label>Password *<br><input type="password" name="password"><br></label>
            <label>Confirm Password *<br><input type="password" name="confirm"></label>
        </fieldset>
        <div class="btn-holder">
            <input class="btn" type="reset" name="reset" value="Clear Form">
            <input class="btn" type="submit" name="send" value="Submit">
            <p>Already have an account? <a href="lp_login.php">Login here</a>.</p>
        </div>
        </form>
        

        <!-- This will need a css file for aestheic and organizing the layout.-->
    </div>
</body>
</html>
