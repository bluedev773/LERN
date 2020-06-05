<?php

session_start();
//redirect to login if user is not logged in
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}

//connect to database
include("config.php");

include("data/CourseDataInsert.php");
include("data/AssignmentDataInsert.php");
include("data/UnitDataInput.php");
include("data/LessonDataInput.php");
include("data/QuizDataInput.php");
include("data/QuestionDataInput.php");
include("data/AnswerDataInput.php");

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>LERN</title>
        <link rel="stylesheet" href="../styles/style.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    </head>

    <body> 
        <nav class="navtop">
            <div>
                <a href ="home.php" class="logo">
                    <img src="images/logo.png" alt="LERN!" height = '70' width = '70' >
                </a>
                <h1 id = "title">LERN</h1>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
            <hr>
        </nav>

            <div class = "content">
                <p>Welcome, <?php echo $_SESSION['name']; ?> .</p>
            </div>
    </body>
</html>