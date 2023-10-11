<?php
    # Code written by Lucas Pfeifer      
    include ("includes/connect.php");

    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($debug="true") {
        echo "received POST<br />";
    }

    $sql = "INSERT INTO user_login(`username`,`password`) VALUES ('$username','$password')";
    if ($dbconn->query($sql)) {
        printf("Record inserted successfully.<br />");
    }

    if ($dbconn->errno) {
        printf("Could not insert record into table: %s<br />", $dbconn->error);
    }
    
    // Close connection
    printf("closing");
    $dbconn->close();
?>

