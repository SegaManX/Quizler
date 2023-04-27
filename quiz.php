<?php 
    session_start();
    include("config.php");
    if(isset($_POST['button'])) {
    $_SESSION['QuizId'] = $_POST['button'];
    $_SESSION['questionNum'] = 1;
    $_SESSION['numCorrect'] = 0;
    } else {

      $QuestionNumber = $_SESSION['questionNum'];
      $QuizID = $_SESSION['QuizId'];
      $result = mysqli_query($db, "SELECT answer FROM question WHERE quizID = '$QuizID'and number = '$QuestionNumber'");
      $result = $result->fetch_array();
      $correctAnswer = intval($result[0]);

      if($correctAnswer == $_POST['answer'])
      {
        $_SESSION['numCorrect'] +=1;
      } 
      
      $userAnswer = $_POST['answer'];
      $result = mysqli_query($db, "SELECT id FROM question WHERE quizID = '$QuizID'and number = '$QuestionNumber'");
      $result = $result->fetch_array();
      $questionID = intval($result[0]);

      $result = mysqli_query($db, "SELECT option$userAnswer FROM statistics WHERE questionID = '$questionID'");
      $result = $result->fetch_array();
      $optionStat = intval($result[0]);

      $optionStat +=1;
      mysqli_query($db, "UPDATE statistics SET option$userAnswer=$optionStat WHERE questionID = '$questionID'");

    
      $_SESSION['questionNum'] +=1;

    }

    $QuestionNumber = $_SESSION['questionNum'];
    $QuizID = $_SESSION['QuizId'];
    $numCorrect = $_SESSION['numCorrect'];

    $chk_query = "SELECT * FROM question WHERE quizID = '$QuizID' and number = '$QuestionNumber'";
    $chk_res = mysqli_query($db, $chk_query);

    if(mysqli_num_rows($chk_res) > 0){

    $result = mysqli_query($db, "SELECT title FROM quiz WHERE id = '$QuizID'");
    $result = $result->fetch_array();
    $quizTitle = $result[0];

    $result = mysqli_query($db, "SELECT name FROM question WHERE quizID = '$QuizID'and number = '$QuestionNumber'");
    $result = $result->fetch_array();
    $questionTitle = $result[0];

    $result = mysqli_query($db, "SELECT option1 FROM question WHERE quizID = '$QuizID' and number = '$QuestionNumber'");
    $result = $result->fetch_array();
    $option1 = $result[0];

    $result = mysqli_query($db, "SELECT option2 FROM question WHERE quizID = '$QuizID' and number = '$QuestionNumber'");
    $result = $result->fetch_array();
    $option2 = $result[0];

    $result = mysqli_query($db, "SELECT option3 FROM question WHERE quizID = '$QuizID' and number = '$QuestionNumber'");
    $result = $result->fetch_array();
    $option3 = $result[0];

    $result = mysqli_query($db, "SELECT option4 FROM question WHERE quizID = '$QuizID' and number = '$QuestionNumber'");
    $result = $result->fetch_array();
    $option4 = $result[0];
    } 
    else
    {
    }

    
?>
<html>
  <head>
    <title>Quizler</title>
    <link rel="stylesheet" href="main.css">
  </head>

  <body>
    <audio autoplay loop>
        <source src="audio/music.mp3" type="audio/mpeg">
    </audio>
  <?php
    include "header.php"
  ?>
  <div class="Middle">
    <div class="Center">
        <?php
        $chk_query = "SELECT * FROM question WHERE quizID = '$QuizID' and number = '$QuestionNumber'";
        $chk_res = mysqli_query($db, $chk_query);
    
        if(mysqli_num_rows($chk_res) > 0){
            ?>

        <h1><?php echo $quizTitle ?></h1>
        <div class="Question">
            <form action="quiz.php" method="post">
            <h2><?php echo $questionTitle ?></h2>
            <table>
                <tr>
                    <th><button type="submit" name='answer' value="1"> <?php echo $option1 ?></button></th>
                    <th><button type="submit" name='answer' value="2"> <?php echo $option2 ?></button></th>
                </tr>
                <tr>
                    <th><button type="submit" name='answer' value="3"> <?php echo $option3 ?></button></th>
                    <th><button type="submit" name='answer' value="4"> <?php echo $option4 ?></button></th>
                </tr>
            </table>
            </form>
        </div>
        <?php } else{ 
          $QuestionNumber -=1;
          echo "Correct - $numCorrect/$QuestionNumber"
          ?>

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