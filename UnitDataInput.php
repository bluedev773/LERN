<?php
 //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("UnitData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $UnitID = $row->UnitID;
        $CourseID = $row->CourseID;
        $UnitName = $row->UnitName;
        $UnitDescription = $row->UnitDescription;

        $sql = "INSERT INTO Unit(UnitID,CourseID,UnitName,UnitDescription) VALUES ('" . $UnitID . "','" . $CourseID . "','" . $UnitName . "','" . $UnitDescription . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>