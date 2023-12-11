<?php
    // Author: Lucas Pfeifer
    require_once("../includes/connect.php");
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $debug = "true";
    $oldPassword = trim($_POST["oldPassword"]);
    $newPassword = trim($_POST["newPassword"]);
    $EMID = $_SESSION["user_data"]["EMID"];
    var_dump ($_SESSION["user_data"]);
    echo $EMID;
    //echo $oldPassword;
    //echo $newPassword;
    $sql = "SELECT password FROM employees WHERE EMID = ?;";
    
    echo 'preparing statement...';
    if($stmt = mysqli_prepare($dbconn, $sql)){
        echo 'binding parameters...';
        mysqli_stmt_bind_param($stmt, "i", $param_EMID);
        $param_EMID = $EMID;
        echo 'executing statement...';
        if(mysqli_stmt_execute($stmt)){
            
            printf("getting result...");
        $result = $stmt->get_result();
        if($result->num_rows == 1){                   
            printf("fetching row...");
            if($fields = $result->fetch_assoc()){
                printf("verifying password...");
                    if(password_verify($oldPassword, $hashed_password)){
                        $sql = "UPDATE employees SET password = ? WHERE EMID = ?;";
                        if($stmt = mysqli_prepare($dbconn, $sql)){
                            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_EMID);
                            $param_password = password_hash($newPassword, PASSWORD_DEFAULT);
                            $param_EMID = $EMID;
                            if(mysqli_stmt_execute($stmt)){
                                $_SESSION["error"] = True;
                                $_SESSION["error-type"] = "success";
                                $_SESSION["error-message"] = "Password changed successfully.";
                                header("location: /transitwise/home/portal/employee/change-password.php");
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
                        header("location: /transitwise/home/portal/employee/change-employee-pw.php");
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