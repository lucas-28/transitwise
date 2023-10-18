<?php
$path = '/includes';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once('connect.php');
include_once('topnav.php');
//include_once('functions.php');
//include_once('footer.php');
include_once('flight_card.php');


?>