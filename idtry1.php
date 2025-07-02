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


$sql = "SELECT * FROM visitor ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $fullname =  ucwords($row["fname"]) . " " . ucwords($row["lname"]);
    $contact = $row["contact"];
    $visitdepartment = $row["visitdep"];
    $visitperson = $row["visitperson"];
    $qrid = $row["qrid"];
    $date = $_SESSION["DATE"];
    $time = $_SESSION["TIME"];
    //echo"data retrieved<br>";
  }
} else {
  echo"<script>alert('no result found');</script>";
}

// Close connection
$conn->close();
// Load the original image
$original_image = imagecreatefrompng('idtamp.png');

// Create a new image resource from the original image
$new_image = imagecreatetruecolor(imagesx($original_image), imagesy($original_image));
imagecopy($new_image, $original_image, 0, 0, 0, 0, imagesx($original_image), imagesy($original_image));

// Set the font and text color
//$font = 'C:\xampp\htdocs\major\Montserrat-Black.ttf';
$font = 'C:\xampp\htdocs\major\helvetica-rounded-bold-5871d05ead8de.otf';
$text_color = imagecolorallocate($new_image, 0, 0, 0);

// Add text to the image
imagettftext($new_image, 14, 0, 30, 230, $text_color, $font, "Name:-    " . $fullname);
imagettftext($new_image, 14, 0, 30, 255, $text_color, $font, "Contact:-    " . $contact);
imagettftext($new_image, 14, 0, 30, 280, $text_color, $font, "Department:-    " . $visitdepartment);
imagettftext($new_image, 14, 0, 30, 305, $text_color, $font, "Person to visit:-    " . $visitperson);
imagettftext($new_image, 14, 0, 30, 305, $text_color, $font, "Person to visit:-    " . $visitperson);

imagettftext($new_image, 12, 0, 295, 120, $text_color, $font, "Visited on");
imagettftext($new_image, 10, 0, 284, 140, $text_color, $font, $date);
imagettftext($new_image, 10, 0, 292, 160, $text_color, $font, $time);

// Save the modified image to a new file
imagepng($new_image, 'modified_image.png');
//echo"image done";
// Free up memory

?>

<?php
// Include the QR Code library
include 'phpqrcode/phpqrcode.php';
// Load the background image  
$bgImage = imagecreatefrompng('modified_image.png');

// The data to be encoded in the QR code
$data = $qrid;

// Set up the QR code configuration options
$qrCodeConfig = [
    'errorCorrectionLevel' => 'Q',
    'margin' => 10,
    'version' => 1,
    'size' => 8, // Set the QR code size to 180 pixels
];

// Generate the QR code
ob_start();
QRcode::png($data, null, QR_ECLEVEL_H, $qrCodeConfig['size'], 1);
$qrCode = ob_get_contents();
ob_end_clean();

// Load the QR code image
$qrCodeImage = imagecreatefromstring($qrCode);

// Get the size of the QR code image
$qrCodeWidth = imagesx($qrCodeImage);
$qrCodeHeight = imagesy($qrCodeImage);

// Calculate the position to place the QR code on the background image
$bgImageWidth = imagesx($bgImage);
$bgImageHeight = imagesy($bgImage);
$qrCodePosX = $bgImageWidth - $qrCodeWidth - 10;
$qrCodePosY = $bgImageHeight - $qrCodeHeight - 10;

// Add the QR code image to the background image
imagecopy($bgImage, $qrCodeImage, 110, 387, 0, 0, $qrCodeWidth, $qrCodeHeight);

// Output the resulting image to the browser
//echo"<br>print done";
imagepng($bgImage, 'qr_image_with_id.png');
// Clean up the images from memory
imagedestroy($bgImage);
imagedestroy($qrCodeImage);
// set the path to the image file
?>

<?php

$bgImage = imagecreatefrompng('qr_image_with_id.png');
$filename = "idtamp.png";
$image_s = imagecreatefromstring(file_get_contents($filename));
$width = imagesx($image_s);
$height = imagesy($image_s);

$newwidth = 130;
$newheight = 130;

$image = imagecreatetruecolor($newwidth, $newheight);
imagealphablending($image,true);
imagecopyresampled($image, $image_s,0,0,0,0,$newwidth,$newheight,$width,$height);

$mask = imagecreatetruecolor($newwidth,$newheight);

$transparent = imagecolorallocate($mask,255,0,0);
imagecolortransparent($mask,$transparent);

imagefilledellipse($mask,$newwidth/2,$newheight/2,$newwidth,$newheight,$transparent);

$red = imagecolorallocate($mask,0,0,0);
imagecopymerge($image,$mask,0,0,0,0,$newwidth,$newheight,100);
imagecolortransparent($image,$red);
imagefill($image,0,0,$red);



imagecopy($bgImage, $image, 34, 53, 0, 0, $qrCodeWidth, $qrCodeHeight);
imagepng($bgImage, 'output.png');

imagedestroy($image);
imagedestroy($mask);

$image_path = 'output.png';

// get the image type
$image_type = pathinfo($image_path, PATHINFO_EXTENSION);

// get the contents of the image file
$image_data = file_get_contents($image_path);

// create a base64 encoded string of the image data
$image_base64 = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);

// output the HTML code to display the image
echo '<img src="' . $image_base64 . '" alt="Image">';
//header("location:print.php");

?>
<br><br>
<button onclick="go()">PRINT</button>
<script>
  function go()
  {
    window.location.href="print.php";
  }
</script>