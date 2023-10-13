var form;
    function init() {
        console.log("init");
        form = document.getElementById('register');//place holder
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
        console.log("checkSubmit");
        //Trim the values
        form['email'].value=form['email'].value.trim();
        form['f_name'].value=form['f_name'].value.trim();
        form['m_name'].value=form['m_name'].value.trim();
        form['l_name'].value=form['l_name'].value.trim();
        form['address1'].value=form['address1'].value.trim();
        form['address2'].value=form['address2'].value.trim();
        form['city'].value=form['city'].value.trim();
        form['state'].value=form['state'].value.trim();
        form['zipcode'].value=form['zipcode'].value.trim();
        form['phone'].value=form['phone'].value.trim();

        //Check required fields
        if(!form['email'].value)
            error.push('Missing Email Address');
        if(!form['f_name'].value)
            error.push('Missing First Name');
        if(!form['l_name'].value)
            error.push('Missing Last Name');
        if(!form['address1'].value)
            error.push('Missing Address');
        if(!form['city'].value)
            error.push('Missing City');
        if(!form['state'].value)
            error.push('Missing State');
        if(!form['zipcode'].value)
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
        if(!form['zipcode'].value.match(pattern))
            error.push('Invalid Zip Code');

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

    } 
    function checkReset() {
        return confirm("This will clear the form data");
    }