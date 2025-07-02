<?php
    session_start();
    $test = $_SESSION['test'];
    if($test!="true") {
        header("Location:index.html");
    }
        $user = $_SESSION['user'];
?>

<?php
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
		.container {
		}
		#image {
			display: none;
		}
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
  margin-bottom: 15px;
  border: 1px solid lightgray;
  border-radius: 5px;
  font-size: 16px;
}
select {
  padding: 10px;
  width: 49%;
  margin-bottom: 10px;
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
                        <span class="icon"><ion-icon name="duplicate"></ion-icon></span>
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
        <h2>                   
        <span class="user-name">
          <?php
            echo $name;
          ?>
        </span>
        </h2>
      </div>
    </div>
<div>

<form name="myform" method="post" action="formdata.php" enctype="multipart/form-data">
  <div>
                  <span  class="validation" id="fnerror"></span>
  <input type="text" id="firstName" name="firstName" placeholder="First Name" onkeyup="fname()">
                <span class="validation" id="lnerror"></span>
  <input type="text" id="lastName" name="lastName" placeholder="Last Name" onkeyup="lname()">
  </div>
  <div>
                <span class="validation" id="cnerror"></span>
  <input type="tel" id="contactNumber" name="contactNumber" placeholder="Contact Number" onkeyup="cnumber()">
  </div>
  <div>
                <span class="validation" id="agerror"></span>
  <input type="number" id="age" name="age" placeholder="Age" onkeyup="agev()">
  </div>
  <div>
                <span class="validation" id="emerror"></span>
  <input type="email" id="email" name="email" placeholder="Email" onkeyup="emailv()">
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
        <span id="vnerror"> </span>
        <input type="text" name="numberplate" id="numberplate" placeholder="Number Plate" onkeyup="vnvalid()" class="validation" />
      </div>
      <br>
      <hr>
      <br>

      Select Department : &nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="grp1" value="CO" checked="true" onclick="modifyList(this.value)"> CO
      <input type="radio" name="grp1" value="IF" onclick="modifyList(this.value)"> IF
      <input type="radio" name="grp1" value="EJ" onclick="modifyList(this.value)"> EJ
      <br><br>
      <select id="myList" name="optionList" onchange="modifyList()" class="select">
                  <option selected hidden disabled> --Choose Faculty-- </option>
                  <option value="Vijay Patil">Vijay Patil</option>
                  <option value="Manisha Pokharkar">Manisha Pokharkar</option>
                  <option value="Prasad Koyande">Prasad Koyande</option>
                  <option value="Sudhir Lawand">Sudhir Lawand</option>
                  <option value="Sheetal Shelar">Sheetal Shelar</option>
                  <option value="Supriya Kadam">Supriya Kadam</option>
                  <option value="Sneha Patange">Sneha Patange</option>
      </select>
      <br>
      <br><hr><br>
      <label for="purpose">Purpose:</label>
                    <select id="purpose" name="purpose">
                    <option value="Other" hidden selected disabled>Select a purpose</option>
                    <option value="Personal">Personal</option>
                    <option value="Official">Official</option>
                </select><br><br>
      <hr>
      <div>

        <div class="container">
      <br>
      <br>
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
            vertical-align: middle;

		}

		.btn:hover {
			background-color: #0069d9;
		}

		.file-btn {
			display: inline-block;
			padding: 10px 20px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
            vertical-align: middle;

		}

		.file-btn input[type="file"] {
			position: absolute;
			font-size: 100px;
			right: 0;
			top: 0;
			opacity: 0;
			cursor: pointer;
		}

		.file-btn:hover {
			background-color: #0069d9;
		}

		.file-btn:hover::before {
			transform: scaleX(1);
		}

		.file-btn::before {
			content: "Upload File";
			display: block;
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			transition: all 0.3s ease;
			transform: scaleX(0);
			transform-origin: left;
			z-index: -1;
		}
	</style>
</head>
<body><center>
	<button class="btn" id="opencam"type="button"onclick="openCameraPopup()" >Open camera</button>
	<label class="file-btn">
		<span>Select File</span>
		<input class="upload"type="file" accept="image/id/*" id="fileInput" name="uploadfile" >
	</label>
  
  <br>
  <br>
  <img id="preview" height="100" width="100">
  </center>
<br>
        <br>
        <input style="color:black" type="submit" value="Submit">



        <script>
         var fnerror = document.getElementById('fnerror');
                        var lnerror = document.getElementById('lnerror');
                        var cnerror = document.getElementById('cnerror');
                        var agerror = document.getElementById('agerror');
                        var emerror = document.getElementById('emerror');
                        var vnerror = document.getElementById('vnerror');

                        function fname() {
                          var firstName = document.getElementById('firstName').value;
                          if (!firstName.match(/^[A-Z][a-z]*$/)) {
                            fnerror.innerHTML = '*Enter Valid Name.';
                            return false;
                          }
                          fnerror.innerHTML = ' ';
                          return true;
                        }

                        function lname() {
                          var lastName = document.getElementById('lastName').value;
                          if (!lastName.match(/^[A-Z][a-z]*$/)) {
                            lnerror.innerHTML = '*Enter Valid Name.';
                            return false;
                          }
                          lnerror.innerHTML = ' ';
                          return true;
                        }

                        function cnumber() {
                          var contactNumber = document.getElementById('contactNumber').value;
                          if (!contactNumber.match(/^[6-9]\d{9}$/)) {
                            cnerror.innerHTML = '*Enter Valid Contact Number';
                            return false;
                          }
                          cnerror.innerHTML = ' ';
                          return true;
                        }

                        function agev() {
                          var age = document.getElementById('age').value;
                          if (!age.match(/^(0?[1-9]|[1-9][0-9]|[1][1-2][1-5])$/)) {
                            agerror.innerHTML = '*Enter Valid Age.';
                            return false;
                          }
                          agerror.innerHTML = ' ';
                          return true;
                        }

                        function emailv() {
                          var email = document.getElementById('email').value;
                          if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)) {
                            emerror.innerHTML = '*Enter Valid E-mail.';
                            return false;
                          }
                          emerror.innerHTML = ' ';
                          return true;
                        }

                        function vnvalid() {
                          var numberplate = document.getElementById('numberplate').value;
                          if (!numberplate.match(/^[A-Z]{2}\s[0-9]{2}\s[A-Z]{2}\s[0-9]{4}$/) && !numberplate.match(/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/)) {
                            vnerror.innerHTML = '*Enter Valid Car Number.';
                            return false;
                          }
                          vnerror.innerHTML = ' ';
                          return true;
                        }
function openCameraPopup() {
    window.open("camera1.php", "CameraPopup", "width=320,height=320");
  }

  function displayImage(imageData) {
    var imageElement = document.getElementById('preview');
    imageElement.src = imageData;
    imageElement.style.display = "block";
    var link = document.createElement("a");
    link.download = "new.png";


    link.href = imageData;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);



  }

  function modifyList(x) {
                          with(document.forms.myform) {
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
                              optionList[4].text="Sudhir Lawand";
                              optionList[4].value="Sudhir Lawand";
                              optionList[5].text="Sheetal Shelar";
                              optionList[5].value="Sheetal Shelar";
                              optionList[6].text="Supriya Kadam";
                              optionList[6].value="Supriya Kadam";
                              optionList[7].text="Sneha Patange";
                              optionList[7].value="Sneha Patange";
                            }
                            if (x == "IF") {
                              optionList[0].text = " ---Choose Faculty--- ";
                              optionList[0].value = 1;
                              optionList[0].disabled;
                              optionList[1].text = "Yogita Jore";
                              optionList[1].value = "Yogita Jore";
                              optionList[2].text = "Ketan Bagade";
                              optionList[2].value = "Ketan Bagade";
                              optionList[3].text = "Sridevi Taradi";
                              optionList[3].value = "Sridevi Taradi";
                              optionList[4].text="Sushama Pawar";
                              optionList[4].value="Sushama Pawar";
                              optionList[5].text="Shonal Vaz";
                              optionList[5].value="Shonal Vaz";
                              optionList[6].text="Sunil Dodake";
                              optionList[6].value="Sunil Dodake";
                              optionList[7].text="Samidha Chavan";
                              optionList[7].value="Samidha Chavan";
                            }
                            if (x == "EJ") {
                              optionList[0].text = " ---Choose Faculty--- ";
                              optionList[0].value = 1;
                              optionList[0].disabled;
                              optionList[1].text = "Anjum Mujawar";
                              optionList[1].value = "Anjum Mujawar";
                              optionList[2].text = "Sandhya Kumar";
                              optionList[2].value = "Sandhya Kumar";
                              optionList[3].text = "M. Madhavi";
                              optionList[3].value = "M. Madhavi";
                              optionList[4].text="Imran Sayyed";
                              optionList[4].value="Imran Sayyed";
                              optionList[5].text="Kirti Gupta";
                              optionList[5].value="Kirti Gupta";
                              optionList[6].text="Pratik Tawde";
                              optionList[6].value="Pratik Tawde";
                              optionList[7].text="Pranesh Naik";
                              optionList[7].value="Pranesh Naik";
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