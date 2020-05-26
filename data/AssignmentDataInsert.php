<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("data/AssignmentData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $AssignmentID = $row->AssignmentID;
        $CourseID = $row->CourseID;
        $AssignmentDescription = $row->AssignmentDescription;

        $sql = "INSERT INTO assignment(AssignmentID,CourseID,AssignmentDescription) VALUES ('" . $AssignmentID . "','" . $CourseID . "','" . $AssignmentDescription . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>

