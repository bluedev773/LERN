<?php
include("../config.php");
$id = $_POST['id'];
 $sql = "SELECT UnitID, UnitName, UnitDescription FROM unit WHERE CourseID = $id;";
 $result = mysqli_query($con, $sql);

 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "<h3>".$row["UnitID"]. ": " .$row["UnitName"]. "</h3>";
    // echo "<h3> Unit Description:".$row["UnitDescription"]."</h3>";
    echo '<button class="accordion lessonAccordion" onclick = getLesson('.$row["UnitID"].') id = "accordion"> Unit: '.$row["UnitID"]. '   ' .$row["UnitName"]. '</button>';
    echo '<div class="panel"> <p>' .$row["UnitDescription"]. '</p>  </div>';
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

  //        </script>';
 } else {
   echo "0 results";
 }
 $con->close();
 ?>