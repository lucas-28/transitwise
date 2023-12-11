<?php
// Author: Lucas Pfeifer
# Template from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php  
include ("../includes/connect.php");
$debug = "true";

$EMID = intval(trim($_POST["EMID"]));
$input_password = trim($_POST["password"]);
var_dump($_POST["EMID"]);
var_dump($_POST["password"]);
var_dump($EMID);

// Validate credentials
printf("validating credentials...");
    
    
// start session
session_status() === PHP_SESSION_ACTIVE ?: session_start();

// Prepare a select statement
$sql = "SELECT * 
FROM employees 
INNER JOIN permissions ON employees.UPEID = permissions.UPEID 
WHERE EMID = ?;";
printf("preparing statement...");
if($stmt = $dbconn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    printf("binding parameters...");
    var_dump($EMID);
    $stmt->bind_param("i", $param_EMID);
    $param_EMID = $EMID;
    // Attempt to execute the prepared statement
    printf("executing statement...");
    if($stmt->execute()){
        // Store result
        // printf("storing result...");
        // $stmt->store_result();
        var_dump($sql);
        // If ID exists, verify password
        printf("checking if ID exists...");
        printf("getting result...");
        $result = $stmt->get_result();

        printf("checking if num_rows == 1...");
        
        if($result->num_rows == 1){                   
            printf("fetching row...");
            if($fields = $result->fetch_assoc()){
                printf("verifying password...");
                // Start session
                session_status() === PHP_SESSION_ACTIVE ?: session_start();
                if(password_verify($input_password, $fields["password"])){
                    // Password is correct, so start a new session
                    printf("password verified...");
                    // Store data in session variables
                    printf("storing session variables...");
                    $_SESSION["loggedin"] = true;
                    $_SESSION["EMID"] = $EMID;
                    $_SESSION["user_data"] = $fields;                            
                    
                    // Redirect user to welcome page
                    printf("redirecting...");
                    
                    if($fields["is_admin"] == 1) {
                        printf("redirecting to admin dashboard...");
                        header("Location: /transitwise/home/portal/admin/dashboard.php");
                        exit;
                    } else if ($fields["is_employee"] == 1) {
                        printf("redirecting to employee dashboard...");
                        header("Location: /transitwise/home/portal/employee/dashboard.php");
                        exit;
                    } else {
                        printf("redirecting to login page...");
                        $_SESSION["error"] = true;
                        $_SESSION["error-message"] = "You are not authorized to access this page.";
                        header("Location: /transitwise/home/portal/login.php");
                        exit;
                    }
                    printf("Something wrong happened.");
                } else{
                    // Password is not valid, return to login page
                    $_SESSION["error"] = true;
                    $_SESSION["error-message"] = "Invalid password.";
                    header("Location: /transitwise/home/portal/login.php");
                }
            }
        } else{
            
            // ID doesn't exist or is not unique
            $_SESSION["error"] = true;
            $_SESSION["error-message"] = "No account associated with this ID.";
            header("Location: /transitwise/home/portal/login.php");
        }
    } else{
        echo "We could not complete the request.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

mysqli_close($dbconn);

?>