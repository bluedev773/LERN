<?php
include("../config.php");
$id = $_POST['id'];
 $sql = "SELECT LessonID, UnitID, LessonName, Introduction, Objective, KeyTerm, Reading FROM lesson WHERE UnitID = $id;";
 $result = mysqli_query($con, $sql);

 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<button class="accordion" id = "accordion"> Lesson: '.$row["LessonID"]. '   ' .$row["LessonName"]. '</button>';
    echo '<div class="panel"> <p>' .$row["Introduction"]. '</p> <p>' .$row["Objective"]. '</p> <p>' .$row["KeyTerm"]. '</p> <p>' .$row["Reading"]. '</p> </div>';
   }
  //  echo ' <script type="text/javascript">
  //           var acc = document.getElementsByClassName("accordion");
  //           var i;

  //           for (i = 0; i < acc.length; i++) {
  //           acc[i].addEventListener("click", function() {


  //               this.classList.toggle("active");
  //               var panel = this.nextElementSibling;
  //               if (panel.style.maxHeight) {
  //               panel.style.maxHeight = null;
  //               } else {
  //               panel.style.maxHeight = panel.scrollHeight + "px";
  //               } 


  //           });
  //         }
  //       </script>';
   
 } else {
   echo "0 results";
 }
 $con->close();
 ?>