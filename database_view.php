<?php
    session_start();
    $test = $_SESSION['test'];
    if($test!="true") {
        header("Location:index.html");
    }
        $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<form method="post" action="database_view.php">
    <label for="date">Select a date:</label>
    <input type="date" id="date" name="date">
    <input type="text" id="fullname" name="fullname" placeholder="fname lname">
    <button type="submit" name="submit">Submit</button>
    <button class="btn" id="opencam"type="button"onclick="window.location.href='home.php'" >back</button>
</form>
  <style>
    .btn {
			display: inline-block;
			padding: 10px 20px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			transition: all 0.3s ease;
      position:absolute;
      top: 10;
      right: 0;
      margin-right: 10px;

		}

		.btn:hover {
			background-color: #0069d9;
		}

  </style>
<html>
<head>
  <title>Visitors Database</title>
</head>
<body>

<style>
table{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  border-color: black;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
  border-color: black;
  border-width: 2px;
}

tr:nth-child(even){
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#16a085;
  border-color: black;
  color: white;
}
</style>

  <h1><center>Visitors Database</center></h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Unique ID</th>
      <th>Fullname</th>
      <th>Contact</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Visited To</th>
      <th>Visited Dept.</th>
      <th>Purpose</th>
      <th>Car Number</th>
      <th>Entry Time</th>
      <th>Exit Time</th>
      <th>Guard</th>
    </tr>
<?php

// Connect to the database
      $host = "localhost";
      $username = "root";
      $password = "";
      $database = "major";
      global $firstn;
      global $lastn;
      global $datesearch;
      global $selected_date;  
      if (isset($_POST['submit'])) {

      $fullname = $_POST['fullname'];
      if($fullname != ""){
      $name_parts = explode(" ", $fullname);
      $firstn = $name_parts[0];
          if(isset($name_parts[1])) {
        $lastn = $name_parts[1];
    } else {
        $lastn = null;
    }
  }
    $selected_date = $_POST['date'];
    if($selected_date != ""){
      $day = date("l", strtotime($selected_date));
      $datesearch = $day." ".$selected_date;
      
    }
    $conn = mysqli_connect($host, $username, $password, $database);
    if($selected_date=="" and $fullname ==""){

      $query = "SELECT * FROM visitor ;";
      $result = mysqli_query($conn, $query);
    }
    elseif($selected_date!="" and $fullname==""){
      echo "SHOWING RESULTS FOR $datesearch";

      $query = "SELECT * FROM visitor WHERE chartday = '$datesearch';";
      $result = mysqli_query($conn, $query);
    }
    elseif($selected_date=="" and $fullname!=""){

      if($firstn !="" and $lastn ==""){
         echo "SHOWING RESULTS FOR Firstname: $firstn";

        $query = "SELECT * FROM visitor WHERE fname = '$firstn';";
        $result = mysqli_query($conn, $query);
      }
      elseif($firstn =="" and $lastn !=""){
        echo "SHOWING RESULTS FOR Lastname: $lastn ";

        $query = "SELECT * FROM visitor WHERE lname = '$lastn';";
        $result = mysqli_query($conn, $query);
      }
      else{
        echo "SHOWING RESULTS FOR Fullname: $firstn $lastn";

        $query = "SELECT * FROM visitor WHERE fname = '$firstn' and lname = '$lastn';";
        $result = mysqli_query($conn, $query);
      }
    }
    else{
      if($firstn !="" and $lastn ==""){
        echo "SHOWING RESULTS FOR Firstname: $firstn and Date: $datesearch";

        $query = "SELECT * FROM visitor WHERE chartday = '$datesearch' and fname = '$firstn';";
        $result = mysqli_query($conn, $query);
        // echo"executed 1";
      }
      elseif($firstn =="" and $lastn !=""){
        echo "SHOWING RESULTS FOR Lastname: $lastn and Date: $datesearch";

        $query = "SELECT * FROM visitor WHERE chartday = '$datesearch' and lname = '$lastn';";
        $result = mysqli_query($conn, $query);
      }
      else{
        echo "SHOWING RESULTS FOR Fullname: $firstn $lastn and Date: $datesearch";

        $query = "SELECT * FROM visitor WHERE chartday = '$datesearch' and fname = '$firstn' and lname = '$lastn';";
        $result = mysqli_query($conn, $query);
      }
    }
      while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["qrid"] . "</td>";
              echo "<td>" . $row["fname"] . " " .$row["lname"] ."</td>";
              echo "<td>" . $row["contact"] . "</td>";
              echo "<td>" . $row["age"] . "</td>";
              echo "<td>" . $row["gender"] . "</td>";
              echo "<td>" . $row["visitperson"] . "</td>";
              echo "<td>" . $row["visitdep"] . "</td>";
              echo "<td>" . $row["purpose"] . "</td>";
              echo "<td>" . $row["noplate"] . "</td>";
              echo "<td>" . $row["entry"] . "</td>";
              echo "<td>" . $row["exittime"] . "</td>";
              echo "<td>" . $row["guard"] . "</td>";
              echo "</tr>";
            }
          }
          else{
            $conn = mysqli_connect($host, $username, $password, $database);

            $query = "SELECT * FROM visitor ";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["qrid"] . "</td>";              
              echo "<td>" . $row["fname"] . " " .$row["lname"] ."</td>";
              echo "<td>" . $row["contact"] . "</td>";
              echo "<td>" . $row["age"] . "</td>";
              echo "<td>" . $row["gender"] . "</td>";
              echo "<td>" . $row["visitperson"] . "</td>";
              echo "<td>" . $row["visitdep"] . "</td>";
              echo "<td>" . $row["purpose"] . "</td>";
              echo "<td>" . $row["noplate"] . "</td>";
              echo "<td>" . $row["entry"] . "</td>";
              echo "<td>" . $row["exittime"] . "</td>";
              echo "<td>" . $row["guard"] . "</td>";
              echo "</tr>";
            }
          }
            // Close the database connection
        
    ?>
  </table>
</body>
</html>