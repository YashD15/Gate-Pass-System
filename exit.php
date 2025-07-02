<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "major";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    $id = $_POST['id'];
    $sql = "UPDATE visitor SET exittime = NOW() WHERE id = '$id';";
    mysqli_query($conn, $sql);
    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Record updated successfully")';
        echo '</script>';
    } 
    else {
        echo "Error updating record: " . $conn->error;
    }
}
mysqli_close($conn);
echo '<script>';
echo 'window.location.href="qrpage.php";';
echo '</script>';
exit();
?>