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
    <div class="container">
        <div class="nav">
            <ul>
                <li>
                    <a href="home.html">
                    <span class="icon"><ion-icon name=""></ion-icon></span>
                    <span class="title" class="gateapp">Gate App</span>
                    </a>
                </li>

                <li>
                    <a href="home.php">
                    <span class="icon"><ion-icon name="home"></ion-icon></span>
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
                        <span class="icon"><ion-icon name="camera-outline"></ion-icon></span>
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
            <!-- <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <div class="user">
                    <ion-icon class="avatar" name="person-outline"></ion-icon>
                    <span class="username">Username</span>
                    
                    <!-- <div class="usericon">
                <ion-icon name="person-outline"></ion-icon>                
            </div> -->
            <!-- <div class="username">hello user</div> 
        </div> -->
        <style>
            /* CSS for the top bar */
            .top-bar {
                background-color: #ffffff;
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
                background-color: #fff;
                margin-right: 10px;
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
            

            
            </style>
  </head>
  <body>
      <div class="top-bar">
          <div class="logo">
              <div class="toggle">
                  <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
      <div>  <h2 class="loguser">                  
    <span class="user-name">
        <!-- <ion-icon style=' font-size: 30px'  position:relative top: 0' name="person-circle-outline"></ion-icon>     -->
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
            else{
                $sql = "SELECT name FROM login WHERE username = '$user';";
                $result = mysqli_query($conn, $sql);
                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {

                        $name = $_SESSION['name'] = $row["name"];
                        echo $name;
                    }
                  } else {
                    echo "No results found.";
                  }
                  
                
            }
            ?>
        </span>
        </h2>
      </div>
    </div>
    <div>

            <centre>
            <br>
            <br>
            <br>

            <?php
                include('stats.php');
                
            ?>
            </centre>
            
            
            
            
                
            </div>
    </div>
  </body>
</html>

        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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