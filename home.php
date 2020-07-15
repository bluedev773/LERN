
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

            function getLesson(id){
                $.ajax({
                    url: 'data/LessonDataParse.php',
                    type: "POST",
                    data: {id:id},
                    success: function(data){
                        $('#lesson').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert('Error Loading');
                    }
                });
                
            }

            function displayLesson() {
                var x = document.getElementById("lesson");
                if (x.style.display === "none") {
                    x.style.display = "block";
                }

                var y = document.getElementById("unitContent");
                if (y.style.display === "none") {
                    y.style.display = "block";
                }
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
                <h1>Welcome, <?php echo $_SESSION['name']; ?>, below are the courses you are currently enrolled in.</h1>
                <h1> Select a course to begin learning!</h1>
                <h2>My Courses</h2>
                
            </div>
            <div class = "wrapper" style= padding:0 >
                        <?php 
                        // 
                        $sql = "SELECT CourseID,CourseName FROM course";
                        $result = mysqli_query($con, $sql);
                        while($row = $result->fetch_assoc()){
                            echo '<div class = "card" onclick = "getCourse(' .$row["CourseID"]. '); getUnit(' .$row["CourseID"]. '); getLesson(' .$row["CourseID"]. '); displayLesson(); "  id = '.$row["CourseID"]. '>'.
                                                    '<p class = "cardText">'.$row["CourseName"].'</p>'.

                                                    '</div>';
                        };
                    
                        ?> 

            </div>

            <div class = "content" id = "courseContent">
                
            </div>

            <div class = "lessonContent" id = "lessonContent">
                
                <div class = "sidenav" id = "unitContent" style= "display:none;">
                
                </div>
                <div class = "content" id="lesson" style= "display:none;">
                <div>
            </div> 

    </body>
    
</html>

<script>
 $(document).on('click', '.accordion', function() {
  $(this).addClass('active').siblings().removeClass('active');
  var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
     }
});

</script>