<?php
  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // Username and password from form
    $myusername = mysqli_real_escape_string($db,$_POST['lusername']);
    $mypassword = mysqli_real_escape_string($db,$_POST['lpassword']);
    $result = mysqli_query($db, "SELECT admin FROM user WHERE username = '$myusername' and password = '$mypassword'");
    $result = $result->fetch_array();
    $admin = intval($result[0]);

    $_SESSION['loggedin'] = true;

    if(!$admin)
    {
      $_SESSION['login_user'] = $myusername;
      header("location: index.php");
    }
    else if($admin)
    {
      $_SESSION['login_user'] = $myusername;
      header("location: admin.php");
    }
    else
    {
      $error = "Your Login Name or Password is invalid";
    }
  }
?>