<?php 
session_start();
include("config.php");

if(isset($_POST['username'])) {
  $username = $_POST['username'];
  $result = mysqli_query($db, "SELECT id FROM user WHERE username = '$username'");
  $result = $result->fetch_array();
  $userID = intval($result[0]);

  mysqli_query($db, "DELETE FROM user WHERE id = '$userID'");
}
if(isset($_POST['qID'])) {
  $qID = $_POST['qID'];
  mysqli_query($db, "DELETE FROM quiz WHERE id = '$qID'");
}

?>
<html>
  <head>
    <title>Quizler</title>
    <link rel="stylesheet" href="main.css">
  </head>

  <body>
  <?php
    include "header.php"
  ?>
  <div class="Middle">
    <div class="Center">
      <form action='admin.php' method='post'>
        <input type="text" name="username" placeholder="Enter username...">
        <input type="submit" value="Delete">
      </form>
      <form action='admin.php' method='post'>
        <input type="text" name="qID" placeholder="Enter Quiz ID...">
        <input type="submit" value="Delete">
      </form>
    </div>
  </div>
  <?php
    include "footer.php"
  ?>
  </body>
  <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
</html>