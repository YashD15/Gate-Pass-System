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
    $qrid = $_COOKIE['qr'];
    $sql = "UPDATE visitor SET exittime = NOW() WHERE qrid = '$qrid';";
    mysqli_query($conn, $sql);
}
mysqli_close($conn);
echo '<script>';
echo 'alert("Thank you for your visit!");';
echo 'window.location.href = "qrpage.php";';
echo '</script>';
exit();
?>