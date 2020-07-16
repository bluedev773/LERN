<?php
include("../config.php");
$id = $_POST['id'];
 $sql = "SELECT UnitID, UnitName, UnitDescription FROM unit WHERE CourseID = $id;";
 $result = mysqli_query($con, $sql);

 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<button class= "dropdown-btn" onclick = getLesson('.$row["UnitID"].') id = > Unit: '.$row["UnitID"]. '   ' .$row["UnitName"]. '</button>';
    echo '<div class="dropdown-container"> <a href="#">Link 1</a> <a href="#">Link 2</a> <a href="#">Link 3</a>  </div>';
 
   }
 } else {
   echo "0 results";
 }
 $con->close();
 ?>