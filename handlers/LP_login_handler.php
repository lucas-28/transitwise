<?php
// Author: Lucas Pfeifer
# Template from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php  
include ("../includes/connect.php");
$debug = "true";

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);


// Validate credentials
printf("validating credentials...");
    
    


// Prepare a select statement
$sql = "SELECT * 
FROM users 
INNER JOIN permissions ON users.UPEID = permissions.UPEID 
WHERE email = ?;";
printf("preparing statement...");
if($stmt = $dbconn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    printf("binding parameters...");
    var_dump($email);
    $stmt->bind_param("s", $param_email);
    $param_email= $email;
    // Attempt to execute the prepared statement
    printf("executing statement...");
    if($stmt->execute()){
        // Store result
        // printf("storing result...");
        // $stmt->store_result();
        
        // If ID exists, verify password
        printf("getting result...");
        $result = $stmt->get_result();
        // Start session
        session_status() === PHP_SESSION_ACTIVE ?: session_start();
        if($result->num_rows == 1){                   
            printf("fetching row...");
            if($fields = $result->fetch_assoc()){
                printf("verifying password...");
                
                
                if(password_verify($password, $fields["password"])){
                    // Password is correct, so start a new session
                    printf("password verified...");
                    // Store data in session variables
                    printf("storing session variables...");
                    $_SESSION["loggedin"] = true;
                    $_SESSION["email"] = $email;                            
                    $_SESSION["user_data"] = $fields;
                    $sql = "SELECT * FROM credit_cards WHERE UPID = " . $_SESSION["user_data"]["UPID"] . ";";
                    $result = $dbconn->query($sql);
                    $credit_cards = array();
                    while($row = $result->fetch_assoc()){
                        if ($row["is_active"] == 1) {
                            $_SESSION["user_data"]["card"] = $row;
                        }
                    }
                    // Redirect user to welcome page
                    printf("redirecting...");
                    header("Location: /transitwise/home/account/userhomepage.php");
                } else{
                    // Password is not valid, return to login page
                    $_SESSION["login_failed"] = true;
                    header("Location: /transitwise/home/account/login.php");
                }
            }
        } else{
            
            // email doesn't exist, display a generic error message
            $_SESSION["login_failed"] = true;
            header("Location: /transitwise/home/account/login.php");
        }
    } else{
        echo "We could not complete the request.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

mysqli_close($link);

?>

