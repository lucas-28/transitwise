<!-- Code written by chatGPT, copilot, and consulted Tutorial Republic -->
<?php

    

        // Initialize the session
    session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }
    if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }



    if (isset($_SESSION['login_failed']) && $_SESSION['login_failed'] == true) {
        // Display error message
        $login_err = "Invalid email or password.";
        // Reset login_failed session variable
        $_SESSION['login_failed'] = false;
    }
    
    else {
        $login_err = "";
    }

    // Define variables and initialize with empty values
    $email = $password = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        }
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter email.";
        }
    }


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 80px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: auto;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        #login-error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="lp_login_handler.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="send" class="btn">Log In</button>
            <div class="form-group" id="login-error" >
                <p><?php echo $login_err; ?></p>
            </div>
            <div class="form-group">
                <p>Forgot your password? <a href="reset-password.php">Reset it here</a>.</p>
            </div>
            <div class="form-group">
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </div>

        </form>
    </div>
</body>
</html>
