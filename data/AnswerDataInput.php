<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("data/AnswerData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $AnswerID = $row->AnswerID;
        $QuestionID = $row->QuestionID;
        $AnswerText = $row->AnswerText;
        $AnswerCorrect = $row->AnswerCorrect;

  

        $sql = "INSERT INTO Answer(AnswerID,QuestionID,AnswerText,AnswerCorrect) VALUES ('" . $AnswerID . "','" . $QuestionID . "','" . $AnswerText . "','" . $AnswerCorrect . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>
