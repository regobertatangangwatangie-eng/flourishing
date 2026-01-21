<?php 
session_start(); 
$servername = "localhost:3306";
$username = "c2715086c_batje_noel";
$password = "Usart@2580";
$dbname = "c2715086c_mybank";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
