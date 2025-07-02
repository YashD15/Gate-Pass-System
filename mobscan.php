<?php
// Get the POST parameters
$qrcodeData = $_POST['qrcode_data'];
$qrcodeData = str_replace("http://", "", $qrcodeData);


// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "major";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to insert the QR code data and current date into the database
$sql = "UPDATE visitor SET exittime = NOW() WHERE qrid = '$qrcodeData';";

if ($conn->query($sql) === TRUE) {
    echo "Exit time updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
