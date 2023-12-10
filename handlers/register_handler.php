<?php
    // Author: Lucas Pfeifer
    require_once("../includes/connect.php");
    //require_once "includes/session.php";
    //require_once "includes/functions.php";
    //require_once "includes/header.php";
    //require_once "includes/footer.php";
    //require_once "includes/redirect.php";
    //require_once "includes/redirect_admin.php";
    //require_once "includes/redirect_user.php";

    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    $debug = "true";
    $UPEID = 4;
    $f_name = trim($_POST["f_name"]);
    $m_name = trim($_POST["m_name"]);
    $l_name = trim($_POST["l_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $birth_date = trim($_POST["birth_date"]);
    $address1 = trim($_POST["address1"]);
    $address2 = trim($_POST["address2"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $zipcode = trim($_POST["zipcode"]);
    $password = trim($_POST["password"]);

    var_dump($_POST);

    if($m_name == "") {
        $m_name = NULL;
    }
    if($address2 == "") {
        $address2 = NULL;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    var_dump($password);

    
    printf("validating credentials...");
    
    $sql = "SELECT email FROM users WHERE email = ?;";
    if($stmt = mysqli_prepare($dbconn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) >= 1){
                printf("Email already exists.");
                $_SESSION["error"] = true;
                $_SESSION["error-type"] = "duplicate-email";
                $_SESSION["error-message"] = "An account with this email already exists.";
                $_SESSION["duplicate-email"] = $param_email;
                header("location: /transitwise/home/account/register.php");
                exit;
            }
        }
    }
    $stmt = mysqli_stmt_init($dbconn);
    printf("inserting into database...");
    $sql = "INSERT INTO `users`(`UPEID`,`f_name`,`m_name`,`l_name`,`email`,`phone`,`birth_date`,`address1`,`address2`,`city`,`state`,`zip`,`password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
    

    
    printf("preparing statement...");
    if($stmt = mysqli_prepare($dbconn, $sql)){
        printf("statement prepared...");
        printf("binding parameters...");
        mysqli_stmt_bind_param($stmt, "issssssssssss", $UPEID, $f_name, $m_name, $l_name, $email, $phone, $birth_date, $address1, $address2, $city, $state, $zipcode, $password);
        //var_dump($stmt);
        printf("executing statement...");
        if(mysqli_stmt_execute($stmt)){ 
            
                   
            
            // Redirect user to login
            printf("redirecting...");
            header("location: /transitwise/home/account/login.php");
        }
        else {
            echo "Something went wrong. Please try again later.";
        }
    }
    else {
        printf("Prepared statement failed.");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
?>





