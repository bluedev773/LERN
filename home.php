<?php

session_start();
//redirect to login if user is not logged in
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}

//connect to database
include("config.php");
include("CourseDataInsert.php");
include("AssignmentDataInsert.php");
include("UnitDataInput.php");
include("LessonDataInput.php");
include("QuizDataInput.php");
include("QuestionDataInput.php");

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>LERN</title>
        <link rel="stylesheet" href="styles/style.css" type="text/css">
    </head>

    <body> 
        <div class="topnav">
            <a href ="index.html" class="logo">
                <img src="images/logo.png" alt="LERN!" height = '100' width = '100' >
            </a>
            <a class="active button" href="index.html">Home</a>
            <div class="topnav-right">
              <a class="button" href="profile.html">Profile</a>
              <a class="button" href="logout.php">Logout</a>
            </div>
          </div>

            <div class = "content">
                <p>Welcome, <?php echo $_SESSION['name']; ?> .</p>
            </div>
    </body>
</html>