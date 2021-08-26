<?php
	 session_start();

	//if not logged in redirect to login page
	if(!isset($_SESSION['loggedin'])){
		header('Location: login.html');
		exit;
	}
	include("config.php");
	
	$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
	//Using account ID to get info
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($password,$email);
	$stmt->fetch();
	$stmt->close();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>LERN</title>
        <link rel="stylesheet" href="./styles/style.css" type="text/css">
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

        <div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
    </body>
</html>
