<?php
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);
  $myemail = mysqli_real_escape_string($db,$_POST['email']);

  $chk_query = "SELECT * FROM user WHERE username='$myusername'";
  $chk_res = mysqli_query($db, $chk_query);

  if(mysqli_num_rows($chk_res) > 0){
    $error = "Error: Username already exists in the database.";
  }
  else
  {
    $chk_query = "SELECT * FROM user WHERE username='$myusername'";
    $chk_res = mysqli_query($db, $chk_query);
    If(mysqli_num_rows($chk_res) > 0)
    {
      $error = "Error: Email already exists in the database.";
    }
    else
    {
      $sql = "INSERT INTO user (username, password, email, admin) VALUES ('$myusername', '$mypassword','$myemail', 0)";

    if (mysqli_query($db, $sql))
    {
      header("Location: index.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    }
  }
  mysqli_close($db);
}
?>