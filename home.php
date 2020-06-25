

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
        <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script>
            function getCourse(id){

                 $.ajax({
                     url: 'data/CourseDataParse.php',
                     type: "POST",
                     data: {id:id},
                    success: function(data){
                        $('#courseContent').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert('Error Loading');
                    }
                });

            }
            function getUnit(id){

                $.ajax({
                     url: 'data/UnitDataParse.php',
                     type: "POST",
                     data: {id:id},
                    success: function(data){
                        $('#unitContent').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert('Error Loading');
                    }
                });
            }

        
             
        </script>
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
                <h3>Welcome, <?php echo $_SESSION['name']; ?> .</h3>
                <h2>My Courses</h2>
                
            </div>
            <div class = "wrapper" style= padding:0 >
                        <?php 
                        // 
                        $sql = "SELECT CourseID,CourseName FROM course";
                        $result = mysqli_query($con, $sql);
                        while($row = $result->fetch_assoc()){
                            echo '<div class = "box" onclick = "getCourse(' .$row["CourseID"]. '); getUnit(' .$row["CourseID"]. ') " style = "border-style: groove; " id = '.$row["CourseID"]. '>'.
                                                    '<h3>'.$row["CourseName"].'</h3>'.
                                                    '</div>';
                        };
                    
                        ?> 

            </div>


            <div class = "content" id = "courseContent">
                
            </div>
            <div class = "content" id = "unitContent">
                
            </div>


    </body>
</html>