
<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("data/CourseData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $CourseID = $row->CourseID;
        $CourseName = $row->CourseName;
        $CourseDescription = $row->CourseDescription;

        $sql = "REPLACE INTO course(CourseID,CourseName,CourseDescription) VALUES ('" . $CourseID . "','" . $CourseName . "','" . $CourseDescription . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>



