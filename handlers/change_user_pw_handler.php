<?php
    // Author: Lucas Pfeifer
    require_once("../includes/connect.php");
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $debug = "true";
    $oldPassword = trim($_POST["oldPassword"]);
    $newPassword = trim($_POST["newPassword"]);
    $email = $_SESSION["user_data"]["email"];
    var_dump ($_SESSION["user_data"]);
    echo $email;
    //echo $oldPassword;
    //echo $newPassword;
    $sql = "SELECT password FROM users WHERE email = ?;";
    
    echo 'preparing statement...';
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binding parameters...';
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){
            
            printf("getting result...");
        $result = $stmt->get_result();
        if($result->num_rows == 1){                   
            printf("fetching row...");
            if($fields = $result->fetch_assoc()){
                printf("verifying password...");
                    echo $fields["password"];
                    echo $oldPassword;
                    
                    if(password_verify($oldPassword, $fields["password"])){
                        echo 'password verified...';
                        $sql = "UPDATE users SET password = ? WHERE email = ?;";
                        if($stmt = mysqli_prepare($dbconn, $sql)){
                            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_email);
                            $param_password = password_hash($newPassword, PASSWORD_DEFAULT);
                            $param_email = $email;
                            if(mysqli_stmt_execute($stmt)){
                                $_SESSION["error"] = True;
                                $_SESSION["error-type"] = "success";
                                $_SESSION["error-message"] = "Password changed successfully.";
                                echo 'password changed successfully...';
                                header("location: /transitwise/home/account/change-password.php");
                            }
                            else {
                                printf("Something went wrong. Please try again later.");
                            }
                        }
                        else {
                            printf("Prepared statement failed.");
                        }
                    }
                    else {
                        $_SESSION["error"] = True;
                        $_SESSION["error-type"] = "incorrect-password";
                        $_SESSION["error-message"] = "Incorrect password.";
                        echo 'incorrect password...';
                        header("location: /transitwise/home/account/change-password.php");
                    }
                }
            }
            else {
                printf("Something went wrong. Please try again later.");
            }
        }
        else {
            printf("Something went wrong. Please try again later.");
        }
    }
    else {
        printf("Prepared statement failed.");
    }