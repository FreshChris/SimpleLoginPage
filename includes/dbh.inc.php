<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "webystem";

// Create connection
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}
?>