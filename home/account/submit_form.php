<?php
// Database connection
include('../../includes/connect.php');

// New variable names assigned for updated data
$new_f_name = $_POST['f_name'];
$new_m_name = $_POST['m_name'];
$new_l_name = $_POST['l_name'];
$new_email = $_POST['email'];
$new_phone = $_POST['phone'];
$new_birth_date = $_POST['birth_date'];
$new_address1 = $_POST['address1'];
$new_address2 = $_POST['address2'];
$new_city = $_POST['city'];
$new_state = $_POST['state'];
$new_zip = $_POST['zip'];

// Update user's row in 'users' datatable with new data
$sql = "UPDATE users SET f_name='$new_f_name',m_name='$new_m_name',l_name='$new_l_name',email='$new_email',phone='$new_phone',birth_date='$new_birth_date',address1='$new_address1',address2='$new_address2',city='$new_city',state='$new_state',zip='$new_zip' WHERE email='apc@gmail.com'";

// Check if changes were made to datatable row
if ($dbconn->query($sql) === TRUE) {
    echo nl2br("Record updated successfully.");
} else {
    echo nl2br("Error!" . $dbconn->error);
}

// Close database connection
$dbconn->close();
