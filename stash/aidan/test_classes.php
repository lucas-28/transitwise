<?php
include('../../classes/User.php');
include('../../classes/Ticket.php');
include('../../includes/connect.php');
$email = 'lpfeifer28@gmail.com';
$sql = "SELECT * FROM users
        INNER JOIN user_permission ON users.UPEID = user_permission.UPEID
        WHERE email = ?";
$stmt = $dbconn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();
$result['reservations'] = null;
$new_user = new User($result);

echo nl2br("---TESTING USER CLASS---\n");
var_dump($result);
echo nl2br("\n\nUPID: " . $new_user->get_UPID());
echo nl2br("\nFirst name: " . $new_user->get_f_name());
echo nl2br("\nMiddle name: " . $new_user->get_m_name());
echo nl2br("\nLast name: " . $new_user->get_l_name());
echo nl2br("\nEmail: " . $new_user->get_email());
echo nl2br("\nPhone: " . $new_user->get_phone());
echo nl2br("\nBirth date: " . $new_user->get_birth_date());
echo nl2br("\nAddress line 1: " . $new_user->get_address1());
echo nl2br("\nAddress line 2: " . $new_user->get_address2());
echo nl2br("\nCity: " . $new_user->get_city());
echo nl2br("\nState: " . $new_user->get_state());
echo nl2br("\nZip: " . $new_user->get_zipcode());
echo nl2br("\nPassword: " . $new_user->get_password());
echo nl2br("\nIs admin: " . $new_user->get_admin());
echo nl2br("\nIs employee: " . $new_user->get_employee());
echo nl2br("\nIs customer: " . $new_user->get_customer());
echo nl2br("\nReservations: " . $new_user->get_reservations());

echo nl2br("\n\n---TESTING TICKET CLASS---");
$sql = "SELECT * FROM tickets
        INNER JOIN reservations ON tickets.RSID = reservations.RSID
        WHERE UPID = ?";
$stmt = $dbconn->prepare($sql);
$upid = $new_user->get_UPID();
$stmt->bind_param("i", $upid);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();
$new_ticket = new Ticket($result);
echo nl2br("\nTKID: " . $new_ticket->get_TKID());
echo nl2br("\nRSID: " . $new_ticket->get_RSID());
echo nl2br("\nFirst name: " . $new_ticket->get_f_name());
echo nl2br("\nMiddle name: " . $new_ticket->get_m_name());
echo nl2br("\nLast name: " . $new_ticket->get_l_name());
echo nl2br("\nPhone number: " . $new_ticket->get_phone_number());
