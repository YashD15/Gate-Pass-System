<?php
include('dashboard.php');

$query = "SELECT id FROM login ORDER BY id";  
$query_run = mysqli_query($conn, $query);
$admin = mysqli_num_rows($query_run);

    
$query = "SELECT id FROM visitor ORDER BY id";  
$query_run = mysqli_query($conn, $query);
$totalvisitors = mysqli_num_rows($query_run);

$query = "SELECT exittime FROM visitor WHERE exittime IS NULL;";  
    $query_run = mysqli_query($conn, $query);
    $vin = mysqli_num_rows($query_run);

    $query = "SELECT exittime FROM visitor WHERE exittime IS NOT NULL;";  
    $query_run = mysqli_query($conn, $query);
    $vout = mysqli_num_rows($query_run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">

  <title>Frontend Mentor | Four card feature section</title>
  <link rel="stylesheet" href="card1.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="maincontainer"></div>
  <div class="row1-container">
    <div class="box box-down cyan">
      <h2><span id="number"><?php echo $admin; ?></span></h2>
      <p>Total Users</p>
    </div>
    
  <div class="row2-container">
    <div class="box box-down cyan">
      <h2><span id="tvisit"><?php echo $totalvisitors; ?></span></h2>
      <p>Total Visitors</p>
    </div>
  <div class="row3-container">
    <div class="box box-down cyan">
      <h2><span id="vin"><?php echo $vin; ?></span></h2>
      <p>Visitors Inside</p>
    </div>
  <div class="row4-container">
    <div class="box box-down cyan">
      <h2><span id="vout"><?php echo $vout; ?></span></h2>
      <p>Visitors Out</p>
    </div>

<script>
// get the HTML element with the id "number"
const numberElement = document.getElementById("number");
// set its content to the value of the $row variable
numberElement.textContent = "<?php echo $admin; ?>";

const numberElement = document.getElementById("tvisit");
// set its content to the value of the $row variable
numberElement.textContent = "<?php echo $totalvisitors; ?>";

const numberElement = document.getElementById("vin");
// set its content to the value of the $row variable
numberElement.textContent = "<?php echo $vin; ?>";

const numberElement = document.getElementById("vout");
// set its content to the value of the $row variable
numberElement.textContent = "<?php echo $vout; ?>";
</script>
    
  </footer>
</body>

</html>