<?php 
session_start();
include("config.php");

if(isset($_GET['search']))
{
$query = $_GET['search'];
}
else
{
$query = "";
}
$results = mysqli_query($db, "SELECT id FROM quiz WHERE title LIKE '%$query%' OR description LIKE '%$query%'");

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
    
      <?php while($result = $results->fetch_array()){
      $qID =  $result[0];
      
      //title
      $resultU = mysqli_query($db, "SELECT title FROM quiz WHERE id = '$qID'");
      $resultU = $resultU->fetch_array();
      $title =  $resultU[0];
      //description
      $resultU = mysqli_query($db, "SELECT description FROM quiz WHERE id = '$qID'");
      $resultU = $resultU->fetch_array();
      $description =  $resultU[0];
      ?>

      <div class="Quiz" >
        <div class="QuizTop">
          <h2><?php echo $title?></h2>
          <?php if($_SESSION['admin']){?>
          <h2><?php echo 'ID:'.$qID?></h2>
          <?php } ?>
        </div>
          <p><?php echo $description ?></p>
        <form action="quiz.php" method="post">
          <button type="submit" name="button" value="<?php echo $qID?>">Play</button>
        </form>
      </div>

      <?php } ?>
      

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