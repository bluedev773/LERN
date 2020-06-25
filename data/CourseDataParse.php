<?php
include("../config.php");
$id = $_POST['id'];
 $sql = "SELECT CourseID, CourseName, CourseDescription FROM course WHERE CourseID = $id;";
 $result = mysqli_query($con, $sql);

 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h2>".$row["CourseName"]."</h2>";
    echo "<h3> Course Description:".$row["CourseDescription"]."</h3>";
   }
 } else {
   echo "0 results";
 }
 $con->close();
 ?>