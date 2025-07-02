<?php
    session_start();
    $test = $_SESSION['test'];
    if($test!="true") {
        header("Location:index.html");
    }
        $user = $_SESSION['user'];
?>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gate-App | Dashboard</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<!-- Import Icon Scripts -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>     
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- Import Camera Script -->
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<div class="container">
  <div class="nav">
    <ul>
      <li>
        <a href="home.html">
          <span class="title" class="gateapp">Gate App</span>
        </a>
      </li>
      <li>
        <a href="home.php">
          <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Dashboard</span>
        </a>
      </li>         
      <li>
        <a href="form_data.php">
          <span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
            <span class="title">Create New ID</span>
        </a>
      </li>                
      <li>
        <a href="database_view.php">
          <span class="icon"><ion-icon name="document-text-outline"></ion-icon></span>
            <span class="title">Visitors DB</span>
        </a>
      </li>

      <li>
        <a href="qrpage.php">
          <span class="icon"><ion-icon name="camera"></ion-icon></span>
            <span class="title">Scan QR</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
            <span class="title">Logout</span>
        </a>
      </li>
    </ul>
  </div>        
  <div class="main">
  <style>
    /* CSS for the top bar */
    @import url('https://fonts.googleapis.com/css2?family=Ubantu:wght@300;400;500;700&display=swap');
    .top-bar {
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 50px;
      padding: 0 20px;
    }        
    /* CSS for the logo */
    .logo {
      width: 50px;
      height: 50px;
      margin-bottom: 10px;
    }
    /* CSS for the user icon */
    .user-icon {
      font-size: 20px;
      margin-right: 5px;
      color: black;      
    }
    /* CSS for the user name */
    .user-name {
      font-size: 18px;
      color: black;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      border: 2px solid #333;
      margin: 10px;
      padding: 10px;
    }
    th, td {
      width: 50%;
      height: 50px;
      font-family: 'ubantu', sans-serif;
      font-size: 25px;
      border: 2px solid #333;
      text-align: center;
    }
    th {
      background: linear-gradient(90deg, #43cea2, #185a9d);
      color: #fff;
      font-size: 35px;
    }
    td input[type="number"] {
      width: 50%;
      height: 30px;
      font-size: 18px;
      border: 1px solid #333;
      border-radius: 5px;
      padding: 5px;
    }
    td button, input[type="submit"] {
      width: 25%;
      height: 30px;
      font-size: 18px;
      background: linear-gradient(90deg, #43cea2, #185a9d);
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
<body>
  <div class="top-bar">
    <div class="logo">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
    </div><h2>
    <span class="user-name">    
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
        else {
          $sql = "SELECT name FROM login WHERE username = '$user';";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $name = $_SESSION['name'] = $row["name"];
              echo $name;
            }
          } 
          else {
            echo "No results found.";
          }
        }
      ?>
    </span>
      </h2>
  </div>
  <div><br><br><br><br>
  <table>
    <tr>
      <th colspan="3">Update Exit time of Visitor</th>
    </tr>
    <tr>
      <td>
        <h4>Scan QR Code</h4>
      </td>
      <td>
        <h4>Enter ID Manually</h4>
      </td>
    </tr>
    <tr>
      <td>
        <video id="preview"></video>
      </td>
      <td rowspan="2">
        <form action="exit.php" method="POST">
          <label>Enter ID Manually Here: </label><br><br>
          <input type="number" name="id" placeholder="Enter ID"><br><br>
          <input type="submit" value="Submit">         
        </form>  
      </td>
    </tr>
    <tr>
      <td>
        <button onclick="scanqr()">Scan QR Code</button>
      </td>
      <td>
      </td>  
    </tr>  
  </table>
  <script>
    function scanqr() {
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        var myVariable=content;
        alert(myVariable);
        document.cookie='qr='+myVariable;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        window.location.href = "scan.php";
    });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });}
    </script>
  </div>
</body>
</html>
  </div>
  <script>
  let toggle = document.querySelector('.toggle');
  let nav = document.querySelector('.nav');
  let main = document.querySelector('.main');
  let topbar = document.querySelector('.topbar');
  let gateapp = document.querySelector('.gateapp');
  toggle.onclick = function () {
    nav.classList.toggle('active');
    main.classList.toggle('active');
    topbar.classList.toggle('active');
    gateapp.classList.toggle('active');
  }
  let list = document.querySelectorAll('.nav li');
  function activelink() {
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
  }
  list.forEach((item) =>
  item.addEventListener('mouseover', activelink));
  </script>
</body>
</html>