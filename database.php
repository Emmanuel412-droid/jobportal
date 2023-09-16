<?php
$hostname     = "localhost"; // enter your hostname
$username     = "emmanuel";  // enter your table username
$password     = "@EmmanuelJr234";   // enter your password
$databasename = "employme";  // enter your database

// Create connection 
$conn = new mysqli($hostname, $username, $password,$databasename);

 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }
?>





