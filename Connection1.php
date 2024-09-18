<?php

// Database configuration
$db_host = 'localhost';    
$db_user = 'root';     
$db_password = ''; 
$db_name = 'admin';     

// Establish database connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
