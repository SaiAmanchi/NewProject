<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="tech request evaluation system";

// Create connection
$connection = new mysqli($servername, $username, $password, $db);
// Check connection

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
?>