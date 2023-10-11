<?php
    # Template from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php  
    include ("includes/connect.php");
    $debug = "true";



    
    
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    



    // Validate credentials
    printf("validating credentials...");
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT UPID, email, password FROM users WHERE email = ?;";
        printf("preparing statement...");
        if($stmt = mysqli_prepare($dbconn, $sql)){
            // Bind variables to the prepared statement as parameters
            printf("binding parameters...");
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            printf("executing statement...");
            if(mysqli_stmt_execute($stmt)){
                // Store result
                printf("storing result...");
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                printf("checking if email exists...");
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    printf("binding result variables...");
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    printf("fetching result...");
                    if(mysqli_stmt_fetch($stmt)){
                        printf("verifying password...");
                        // Start session
                        session_start();
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            printf("password verified...");
                            // Store data in session variables
                            printf("storing session variables...");
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            printf("redirecting...");
                            header("Location: welcome.php");
                        } else{
                            // Password is not valid, return to login page
                            $_SESSION["login_failed"] = true;
                            header("Location: lp_login.php");
                        }
                    }
                } else{
                    session_start();
                    // email doesn't exist, display a generic error message
                    $_SESSION["login_failed"] = true;
                    header("Location: lp_login.php");
                }
            } else{
                echo "We could not complete the request.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        }
    mysqli_close($link);

?>

