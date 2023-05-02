<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header("Location: index.php");
    }

    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $_SESSION['qNum'] = $_POST['qNum'];
    }
    else
    {
      $_SESSION['qNum'] = 0;
    }
    $qNum = intval($_SESSION['qNum']);
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
      <?php if($qNum > 0){?>
      <form action='createQuiz.php' method='POST'>
          <input type="text" placeholder="Enter quiz title..." name='quizTitle'>
          <input type="text" placeholder="Enter quiz description..." name='quizDescription'>
      <?php for($i = 1; $i <= $qNum; $i++){ ?>
        <br>
        <input type="text" placeholder="Enter question <?php echo $i ?> title..." name='question<?php echo $i ?>Title'>
        <input type="text" placeholder="Enter Option 1..." name='q<?php echo $i ?>option1'>
        <input type="text" placeholder="Enter Option 2..." name='q<?php echo $i ?>option2'>
        <input type="text" placeholder="Enter Option 3..." name='q<?php echo $i ?>option3'>
        <input type="text" placeholder="Enter Option 4..." name='q<?php echo $i ?>option4'>
        <input type="text" placeholder="Enter Correct answer..." name='q<?php echo $i ?>answer'>
      <?php } ?>
      <input type="submit" value="Submit">
      </form>
      <?php
      } else {
      ?> 
      <form action='create.php' method='post'>  
          <input type="text" placeholder="Enter number of questions..." name='qNum'>
          <input type='submit' value='Submit'>
      </form>
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