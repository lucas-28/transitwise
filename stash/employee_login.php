<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codenhal </title>
    <link rel="stylesheet" href="/transitwise/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="/transitwise/images/favicon.ico">
</head>

<header>
    <?php include ('../../includes/topnav.php'); ?>
</header>
<body>
<!--Creates the navigation side bar of links to edit/view account.-->
<?php include ('../../includes/leftnavuser.php'); ?>
    

<body>
    <div class="wrapper">
        <form action ="">
            <h1>Employee Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" 
                required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" 
                required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forget">
                <label><input type ="checkbox"> Remeber me</label>
                <a href="#">Forget password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
</body>

<footer>
    <div class="footer-container">
        <a href="/transitwise/home/portal/login.php">Transitwise Portal</a>
        <a href="contact.html">Contact</a>
        <a href="feedback.html">Feedback</a>
    </div>
</footer>
</body>
</html>