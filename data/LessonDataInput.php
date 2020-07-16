<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("data/LessonData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $LessonID = $row->LessonID;
        $UnitID = $row->UnitID;
        $LessonName = $row->LessonName;
        $Introduction = $row->Introduction;
        $Objective = $row->Objective;
        $KeyTerm = $row->KeyTerm;
        $Reading = $row->Reading;

        $sql = "REPLACE INTO Lesson(LessonID,UnitID,LessonName,Introduction,Objective,KeyTerm,Reading) VALUES ('" . $LessonID . "','" . $UnitID . "','" . $LessonName . "','" . $Introduction . "','" . $Objective . "','" . $KeyTerm . "','" . $Reading . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>

