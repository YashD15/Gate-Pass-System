<?php
session_start();
$name = $_SESSION['name'];
?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gate-App | Dashboard</title>
    <link rel="stylesheet" href="home.css" type="text/css">
</head>

<body>
<style>

body {
  background-attachment: fixed;
  background-origin: inital;
  background-repeat: no repeat;
  height: 100%;
}

form {
  width: 700px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid lightgray;
  border-radius: 10px;
  background: linear-gradient(90deg, #43cea2, #185a9d);

}

input[type="text"],
input[type="tel"],
input[type="email"],
input[type="number"] {
  padding: 10px;
  width: 100%;
  margin-bottom: 20px;
  border: 1px solid lightgray;
  border-radius: 5px;
  font-size: 16px;
}

.numplate {
  display: none;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: lightblue;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: blue;
}

input[type="radio"] {
  margin-right: 10px;
  font-size: 16px;
}
</style>
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
                    <a href="qr.html">
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
      
      <div>                    
        <span class="user-name">
          <?php
            echo $name;
          ?>
        </span>
      </div>
    </div>
<div>
<br>
<br>
<br>
<br>
<form name="myform" method="post" action="formdata.php" enctype="multipart/form-data">
  <div>
    <input type="text" id="firstName" name="firstName" placeholder="First Name">
    <input type="text" id="lastName" name="lastName" placeholder="Last Name">
  </div>
  <div>
    <input type="tel" id="contactNumber" name="contactNumber" placeholder="Contact Number">
  </div>
  <div>
    <input type="number" id="age" name="age" placeholder="Age">
  </div>
  <div>
    <input type="email" id="email" name="email" placeholder="Email">
  </div>
  <hr><b><br>
    <div>
      <label style="font-family:verdana">Gender
        ?</label>&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;
      <input type="radio" id="male" name="gender" value="male">
      <label style="font-family:verdana" for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female">
      <label style="font-family:verdana" for="female">Female</label>
    </div>
    <br>
    <hr>
    <br>

    <div>
      <div id="radio" name="radio">
        <label for="travel">Do you have a car with you :</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="travel" id="travel" onChange=show()>Yes
        <input type="radio" name="travel" id="travel" onChange=hide()>No

      </div>
      <div class="numplate" name="vehicle" id="vehicle">
        <br>
        <input type="text" name="numberplate" id="numberplate" placeholder="Number Plate" />
      </div>
      <br>
      <hr>
      <br>

      Select Department : &nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="grp1" value="CO" checked="true" onclick="modifyList(this.value)"> CO
      <input type="radio" name="grp1" value="IF" onclick="modifyList(this.value)"> IF
      <input type="radio" name="grp1" value="EJ" onclick="modifyList(this.value)"> EJ
      <br><br>
      <select id="myList" name="optionList" onchange="modifyList()">
        <option disabled> ---Choose Faculty--- </option>
        <option value="Vijay Patil">Vijay Patil
        <option value="Manisha Pokharkar">Manisha Pokharkar
        <option value="Prasad Koyande">Prasad Koyande
      </select>
      <br>
      <br>
      <hr>
      <div>

        <input type="file" accept="image/*" id="fileInput" name="uploadfile">
        <!DOCTYPE html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <button  class="btn btn-primary" data-toggle="modal" data-target="#captureModal">Capture Image</button>

    <!-- Modal -->
    <div class="modal fade" id="captureModal" tabindex="-1" role="dialog" aria-labelledby="captureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="captureModalLabel">Capture Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="video-wrap">
                        <video id="video" playsinline autoplay></video>
                    </div>

                    <div class="controller">
                        <button id="snap" class="btn btn-primary">Capture</button>
                    </div>

                    <canvas id="canvas" width="640" height="480"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        'use strict';

        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('snap');
        const errorMsgElement = document.getElementById('ErrorMsg');

        const constraints = {
            video: {
                width: 1200,
                height: 720
            }
        };

        async function init() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccess(stream);
            } catch (e) {
                errorMsgElement.innerHTML = `navigator.getUserMedia.error: ${e.toString()}`;
            }
        }

        function handleSuccess(stream) {
            window.stream = stream;
            video.srcObject = stream;
        }

        init();

        snap.addEventListener('click', function() {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert canvas to data URL and download
            const dataUrl = canvas.toDataURL('image/png');
            const link = document.createElement('a');
            link.download = 'captured-image.png';
            link.href = dataUrl;
            link.click();
        });
    </script>
</body>

        <br>
        <br>
        <centre><img id="preview" height="100" width="100"></centre>
        <br>
        <br>
        <input style="color:black" type="submit" value="Submit">



        <script>
          function modifyList(x) {
            with (document.forms.myform) {
              if (x == "CO") {
                optionList[0].text = " ---Choose Faculty--- ";
                optionList[0].value = 1;
                optionList[0].disabled;
                optionList[1].text = "Vijay Patil";
                optionList[1].value = "Vijay Patil";
                optionList[2].text = "Manisha Pokharkar";
                optionList[2].value = "Manisha Pokharkar";
                optionList[3].text = "Prasad Koyande";
                optionList[3].value = "Prasad Koyande";
              }
              if (x == "IF") {
                optionList[0].text = " ---Choose Faculty--- ";
                optionList[0].value = 1;
                optionList[0].disabled;
                optionList[1].text = "Yogita Jore";
                optionList[1].value = "Yogita Jore";
                optionList[2].text = "Sarvesh Gupta";
                optionList[2].value = "Sarvesh Gupta";
                optionList[3].text = "Shridevi Patil";
                optionList[3].value = "Shridevi Patil";
              }
              if (x == "EJ") {
                optionList[0].text = " ---Choose Faculty--- ";
                optionList[0].value = 1;
                optionList[0].disabled;
                optionList[1].text = "Anjum Mujawar";
                optionList[1].value = "Anjum Mujawar";
                optionList[2].text = "Sandhya Kumar";
                optionList[2].value = "Sandhya Kumar";
                optionList[3].text = "Rohit Sharma";
                optionList[3].value = "Rohit Sharma";
              }
            }
          }
          function show() {

            document.getElementById('vehicle').style.display = 'block'

          }
          function hide() {
            document.getElementById('vehicle').style.display = 'none'

          }

          //photo part
          const fileInput = document.getElementById("fileInput");
          const preview = document.getElementById("preview");

          fileInput.addEventListener("change", function (event) {
            const reader = new FileReader();

            reader.onload = function (event) {
              preview.src = event.target.result;
            };

            reader.readAsDataURL(event.target.files[0]);
          });
    //photo part end
          
        </script>
      </div>
      <br>
  </b>
</form>
</div>
  </body>

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