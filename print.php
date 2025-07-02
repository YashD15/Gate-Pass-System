<html>
<body>
<?php
session_start();
$image_path = 'output.png';

// get the image type
$image_type = pathinfo($image_path, PATHINFO_EXTENSION);

// get the contents of the image file
$image_data = file_get_contents($image_path);

// create a base64 encoded string of the image data
$image_base64 = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);

// output the HTML code to display the image
echo '<img src="' . $image_base64 . '" alt="Image">';
// $print = $_SESSION['print'];
?>
<script>
    window.print();
    setTimeout(redirect, 5000);
    
    function redirect() {
    window.location.href = "form_data.php";
        
    }
</script>

</body>
</html>
