<?php

$servername = "localhost";
$login1="jmbooks";
$login2="";
$dbname = "my_jmbooks";

// Create connection
$conn = new mysqli($servername, $login1, $login2, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>