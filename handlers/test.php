<?php 
session_start();

$_SESSION["reservation"]["tickets"] = array();
$_SESSION["reservation"]["tickets"]["1"] = array("FFID" => 1, "f_name" => "lucas");
$_SESSION["reservation"]["tickets"]["2"] = array("FFID" => 2, "f_name" => "bob");

foreach ($_SESSION["reservation"]["tickets"] as $ticket) {
    $FFID = $ticket["FFID"];
    $f_name = $ticket["f_name"];
    echo $FFID;
    echo $f_name;
}