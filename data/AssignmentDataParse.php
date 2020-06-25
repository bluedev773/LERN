<?php
  $id = $_GET['CourseID'];
  echo alert("test");
  $sql = "SELECT CourseID, CourseName, CourseDescription FROM course WHERE CourseID = 2";
  $result = mysqli_query($con, $sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Course ID: " . $row["CourseID"]. "  Course Name: " . $row["CourseName"]. "Course Description: " . $row["CourseDescription"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $con->close();
?>