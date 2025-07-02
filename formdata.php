<?php
session_start();
$name = $_SESSION['name'];

// Set database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "major";

$filename = 'data.txt';

if (file_exists($filename) && filesize($filename) > 0) {
    // The file exists and has text, so read the text and store it in a variable
    $text = file_get_contents($filename);
} else {
    // The file doesn't exist or is empty, so create a new file with text "AA001"
    $text = 'AA000';
    file_put_contents($filename, $text);
}

// Now the $text variable contains either the text from the file or "AA001" if the file didn't exist or was empty


function generateId($lastId) {
    $alphabet = range('A', 'Z');
    $idPrefix = substr($lastId, 0, 2);
    $idNumber = substr($lastId, 2);

    if ($idNumber == 999) {
        $idNumber = 0;
        if ($idPrefix == 'AZ') {
            $idPrefix = 'BA';
        } else {
            $index = array_search($idPrefix[1], $alphabet);
            $nextLetter = $alphabet[$index + 1];
            $idPrefix = ($nextLetter == null) ? 'AA' : $idPrefix[0] . $nextLetter;
        }
    } else {
        $idNumber++;
    }

    return $idPrefix . sprintf("%03d", $idNumber);
}

// Example usage
$newId = generateId($text);
file_put_contents($filename, $newId);

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input data
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$contact = $_POST['contactNumber'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$optionList = $_POST['optionList'];
$grp1 = $_POST['grp1'];
$number = $_POST['numberplate'];
$purpose = $_POST['purpose'];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./image/" . $filename;
$_SESSION['imgg'] = $folder;
$date = strtoupper(date('M')) . date('d');
$qrid = $date . $newId;

$_SESSION['qrid'] = $qrid;
date_default_timezone_set("Asia/Calcutta");    
$today = date('l',) .  ' ' .date("Y-m-d");


date_default_timezone_set("Asia/Kolkata");
$_SESSION['DATE'] = strtoupper(date("d-M-Y"));
$_SESSION['TIME'] = date("h:i:s A");
// $current_my = date('m/Y');
// Escape user input to prevent SQL injection
// $firstname = mysqli_real_escape_string($conn, $firstname);
// $lastname = mysqli_real_escape_string($conn, $lastname);
// $contact = mysqli_real_escape_string($conn, $contact);
// $email = mysqli_real_escape_string($conn, $email);
// $age = mysqli_real_escape_string($conn, $age);

// Insert user input data into database
$sql = "INSERT INTO visitor (qrid, fname, lname, contact, email, age, gender, visitperson, visitdep, noplate, purpose, photo, guard, chartday)
VALUES ('$qrid', '$firstname', '$lastname', '$contact', '$email', '$age', '$gender', '$optionList', '$grp1', '$number','$purpose', '$folder', '$name', '$today')";

// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
    echo '<script>alert("Image uploaded successfully!")</script>';
} else {
    echo '<script>alert("Failed to upload image.")</script>';
}

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Data inserted successfully!")</script>';
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
header("Location:id.php");
exit();

?>