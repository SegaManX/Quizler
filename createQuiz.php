<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 // Create quiz table
    $username = $_SESSION['login_user'];
  $result = mysqli_query($db, "SELECT id FROM user WHERE username = '$username'");
  $result = $result->fetch_array();
  $authorID =  intval($result[0]);
    
  $quizTitle = $_POST['quizTitle'];
  $quizDescription = $_POST['quizDescription'];

  mysqli_query($db, "INSERT into quiz(authorID, title, description, dateCreated) Values('$authorID','$quizTitle','$quizDescription', '2023-04-27');");
  // Create Question, statistics tables
  $result = mysqli_query($db, "SELECT id FROM quiz ORDER BY id DESC Limit 1;");
  $result = $result->fetch_array();
  $quizID =  intval($result[0]);
  for($i = 1; $i <= $_SESSION['qNum']; $i++)
  {
    $questionName = $_POST['question'.$i.'Title'];
    $option1 = $_POST['q'.$i.'option1'];
    $option2 =  $_POST['q'.$i.'option2'];
    $option3 =  $_POST['q'.$i.'option3'];
    $option4 = $_POST['q'.$i.'option4'];
    $answer = $_POST['q'.$i.'answer'];
    mysqli_query($db, "INSERT into question(quizID,number,name,option1,option2,option3,option4,answer) Values('$quizID','$i','$questionName','$option1','$option2','$option3','$option4','$answer');");

    $result = mysqli_query($db, "SELECT id FROM question ORDER BY id DESC Limit 1;");
    $result = $result->fetch_array();
    $questionID =  intval($result[0]);
    mysqli_query($db, "INSERT into statistics(questionID,option1,option2,option3,option4) Values('$questionID',0,0,0,0);");
  }
}
?>