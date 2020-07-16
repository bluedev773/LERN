<?php
include("../config.php");
$id = $_POST['id'];
 $sql = "SELECT lesson.UnitID, lesson.LessonID, lesson.LessonName, lesson.Introduction, lesson.Objective, lesson.KeyTerm, lesson.Reading FROM unit INNER JOIN lesson ON unit.UnitID = lesson.UnitID WHERE unit.UnitID = $id  ";
 $result = mysqli_query($con, $sql);

 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<button class="accordion" id = "accordion"> <b>Lesson: '.$row["LessonID"].  '</b>   ' .$row["LessonName"]. '</button>';
    echo '<div class="panel"> <p><b>Introduction: </b>' .$row["Introduction"]. '</p> <p><b>Objective:</b>' .$row["Objective"]. '</p> <p><b>Key-Terms: </b>' .$row["KeyTerm"]. '</p> <p><b>Reading:</b>' .$row["Reading"]. '</p> </div>';
   }

   
 } else {
   echo "0 results";
 }
 $con->close();
 ?>
