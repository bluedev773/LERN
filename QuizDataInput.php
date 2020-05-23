<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("QuizData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $QuizID = $row->QuizID;
        $UnitID = $row->UnitID;
        $QuizName = $row->QuizName;

  

        $sql = "INSERT INTO Quiz(QuizID,UnitID,QuizName) VALUES ('" . $QuizID . "','" . $UnitID . "','" . $QuizName . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>
