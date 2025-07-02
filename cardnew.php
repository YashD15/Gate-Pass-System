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

<link rel="stylesheet" href="cardnew.css">
<div class="card-container">
    <div class="card">
      <div class="number"><span id="number"><?php echo $admin; ?></span></div>
      <div class="text">Total users</div>
    </div>
    <div class="card">
      <div class="number"><span id="tvisit"><?php echo $totalvisitors; ?></span></div>
      <div class="text">Total visitors</div>
    </div>
    <div class="card">
      <div class="number"><span id="vin"><?php echo $vin; ?></span></div>
      <div class="text">Visitors inside</div>
    </div>
    <div class="card">
      <div class="number"><span id="vout"><?php echo $vout; ?></span></div>
      <div class="text">Visitors outside</div>
    </div>
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
  