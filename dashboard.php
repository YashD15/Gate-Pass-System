<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "major";

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
//    header("Location: thank_you.php");
}
?>