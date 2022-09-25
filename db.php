<?php

session_start();

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "db_sprint_3";

// Create connection
$conn = mysqli_connect($hostName, $userName, $password, $databaseName);
// Check connection
if (!$conn) {
  die("Connection failed: ");
}
?>