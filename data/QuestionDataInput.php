<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("data/QuestionData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $QuestionID = $row->QuestionID;
        $QuizID = $row->QuizID;
        $QuestionText = $row->QuestionText;

  

        $sql = "INSERT INTO Question(QuestionID,QuizID,QuestionText) VALUES ('" . $QuestionID . "','" . $QuizID . "','" . $QuestionText . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>
