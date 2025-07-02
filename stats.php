<?php
include('dashboard.php');
include('cardnew.php');
?>


<html>
  <link rel="stylesheet" href="styles.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
    rel="stylesheet">
    
  </html>
<?php
    $today = date("l Y-m-d");
    


// get today's date
date_default_timezone_set("Asia/Calcutta");



global $dayarr;
// display the previous 6 dates
for ($i = 6; $i >= 0; $i--) {
  $date = date("Y-m-d", strtotime("-$i day"));

  $dayOfWeek = date('l', strtotime($date));
//echo $dayOfWeek . ' ' . $date . '<br>';
  
  $dayarr[$i] = $dayOfWeek . ' ' . $date;
  
}
$day = $dayarr[0];
$day1 = $dayarr[1];
$day2 = $dayarr[2];
$day3 = $dayarr[3];
$day4 = $dayarr[4];
$day5 = $dayarr[5];
$day6 = $dayarr[6];

$query = "SELECT * FROM visitor WHERE chartday = '$day';";  
$query_run = mysqli_query($conn, $query);
$row1 = mysqli_num_rows($query_run);
$query = "SELECT * FROM visitor WHERE chartday = '$day1';";  
$query_run = mysqli_query($conn, $query);
$row2 = mysqli_num_rows($query_run);
$query = "SELECT * FROM visitor WHERE chartday = '$day2';";  
$query_run = mysqli_query($conn, $query);
$row3 = mysqli_num_rows($query_run);
$query = "SELECT * FROM visitor WHERE chartday = '$day3';";  
$query_run = mysqli_query($conn, $query);
$row4 = mysqli_num_rows($query_run);
$query = "SELECT * FROM visitor WHERE chartday = '$day4';";  
$query_run = mysqli_query($conn, $query);
$row5 = mysqli_num_rows($query_run);
$query = "SELECT * FROM visitor WHERE chartday = '$day5';";  
$query_run = mysqli_query($conn, $query);
$row6 = mysqli_num_rows($query_run);
$query = "SELECT * FROM visitor WHERE chartday = '$day6';";  
$query_run = mysqli_query($conn, $query);
$row7 = mysqli_num_rows($query_run);
//echo $row1;

//print_r($dayarr);
// Define the data for the chart
$data = array(
  array('Week Day', 'Visits'),
  array($dayarr[0], $row1),
  array($dayarr[1], $row2),
  array($dayarr[2], $row3),
  array($dayarr[3], $row4),
  array($dayarr[4], $row5),
  array($dayarr[5], $row6),
  array($dayarr[6], $row7),
);

// Load the Google Charts API
echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
echo '<script type="text/javascript">';
echo 'google.charts.load("current", {"packages":["corechart"]});';
echo 'google.charts.setOnLoadCallback(drawChart);';

// Define the callback function to draw the chart
echo 'function drawChart() {';
echo 'var data = google.visualization.arrayToDataTable(' . json_encode($data) . ');';
echo 'var options = {title: "Weekly Visits"};';
echo 'var chart = new google.visualization.BarChart(document.getElementById("chart_div"));';
echo 'chart.draw(data, options);';
// echo 'legend:{';
// echo "position: 'none'";
// echo '},';
// echo "orientation:'vertical'";
echo '}';
echo '</script>';

// Display the chart in a div tag
echo "<center>";
echo '<div id="chart_div" style="width: 1000px; height: 700px;"></div>';
echo "</center>";

?>

    