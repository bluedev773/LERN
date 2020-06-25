<?php
include("../config.php");
$id = $_POST['id'];
 $sql = "SELECT UnitID, UnitName, UnitDescription FROM unit WHERE CourseID = $id;";
 $result = mysqli_query($con, $sql);

 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h3>".$row["UnitID"]. ": " .$row["UnitName"]. "</h3>";
    echo "<h3> Unit Description:".$row["UnitDescription"]."</h3>";
   }
 } else {
   echo "0 results";
 }
 $con->close();
 ?>