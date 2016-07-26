<?php
$dbHost = "localhost"; 
$dbUsername = "Your_DB_Username";
$dbPassword = "Your_DB_password";
$dbDatabase = "Your_DB_name";

$mysql = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase) or die("Error connecting.<br />File: ".__FILE__);
?>
