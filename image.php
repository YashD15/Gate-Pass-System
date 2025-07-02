<?php

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "major");

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo '<script>alert("Image uploaded successfully!")</script>';
	} else {
		echo '<script>alert("Failed to upload image.")</script>';
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>

</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
    <img id="preview">
  
  <script>
    const fileInput = document.getElementById("uploadfile");
    const preview = document.getElementById("preview");
  
    fileInput.addEventListener("change", function(event) {
      const reader = new FileReader();
  
      reader.onload = function(event) {
        preview.src = event.target.result;
      };
  
      reader.readAsDataURL(event.target.files[0]);
    });
  </script>
  <style>
    #preview {
      width: 300px;
      height: 200px;
      object-fit: contain;
    }
  </style>
</body>

</html>
