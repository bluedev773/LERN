<?php
    // connect to database
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="tma2_part2";
    $con=mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        //display error
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }

    //load xml file to database
    $affectedRow = 0;
    $xml = simplexml_load_file("CourseData.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $CourseID = $row->CourseID;
        $CourseName = $row->CourseName;
        $CourseDescription = $row->CourseDescription;

        $sql = "INSERT INTO course(CourseID,CourseName,CourseDescription) VALUES ('" . $CourseID . "','" . $CourseName . "','" . $CourseDescription . "')";
        $result = mysqli_query($con, $sql);
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }
    ?>
    <h2>Insert XML Data to MySql Table Output</h2>
<?php
    if ($affectedRow > 0) {
        $message = $affectedRow . " records inserted";
    } else {
        $message = "No records inserted";
    }
?>

<style>
body {
	max-width: 550px;
	font-family: Arial;
}

.affected-row {
	background: #cae4ca;
	padding: 10px;
	margin-bottom: 20px;
	border: #bdd6bd 1px solid;
	border-radius: 2px;
	color: #6e716e;
}

.error-message {
	background: #eac0c0;
	padding: 10px;
	margin-bottom: 20px;
	border: #dab2b2 1px solid;
	border-radius: 2px;
	color: #5d5b5b;
}
</style>
<div class="affected-row">
    <?php  echo $message; ?>
</div>
<?php if (! empty($error_message)) { ?>
<div class="error-message">
    <?php echo nl2br($error_message); ?>
</div>
<?php } ?>