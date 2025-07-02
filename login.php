<?php
session_start();
$_SESSION['test'] = 'false';

    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB','major');
    $con = mysqli_connect(HOST,USER,PASS,DB);
    $username=$_POST['username'];
    $_SESSION['user'] = $username;
    $password=$_POST['password'];

    if($con->connect_error) {
      die("Failed to connect ".$con->connect_error);
      }
    else {
      $stmt = $con->prepare("select * from login where username = ?");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $stmt_result = $stmt->get_result();
      if($stmt_result->num_rows > 0)
      {
        $data = $stmt_result->fetch_assoc ();
        if($data['password'] === $password)
        {
          $_SESSION['test'] = 'true';
          header("Location:home.php");
        }
        else  
        {
          echo '<script>';
          echo 'alert("Invalid Email or password");';
          echo 'window.location.href = "index.html";';
          echo '</script>';

        }
      }
      else
      {
        echo '<script>';
        echo 'alert("Invalid Email or password");';
        echo 'window.location.href = "index.html";';
        echo '</script>';
      }
    }

/*    if(mysqli_connect_errno($con))
    {
		echo 'Failed to connect';
    }    
    else{


    $query="select * from login where usermame='$username' and password='$password'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);

    if($count>0)
    {

    }
    else{
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }*/
    
?>