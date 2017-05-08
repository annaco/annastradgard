<?php
	//session_start();
	include 'header.php';
	include_once('connection.php');
	
	//Om man inte är inloggad skickas man till index.php
	if(!isset($_SESSION['username'])){
		header('Location: index.php');
	}

?>
<!--?php

	if(isset($_GET['page'])){
		echo $_GET['page'];

		$id = $_GET['q'];

		$year = $_GET['year'];

		$sql = "INSERT INTO saved_sides(userid, pageid) VALUES('$username', '$id') ;  //userid = '{$id}'";
		if(mysqli_query($mysqli, $sql)){
			echo 'Sidan är nu sparad';
		}else {
			echo 'Error updating record: ' . mysqli_error(mysqli);
		}


	}
?-->	

<!DOCTYPE html>
<html>
<head>
	<title>Annas trädgård</title>
</head>
<body>
	<div class="header">
		<h1><?php echo $_SESSION['username']; ?>s sida</h1>
	</div>

	<h1>Home</h1>
	<div>
		<h4>Välkommen <?php echo $_SESSION['username']; ?></h4>
	</div>

	<!--div class="mySavedPages">
	Mina sparade sidor:
	<br>
		<a href="page.php?page=1">Test</a>
	</div-->
	<div>
		<a href="logout.php">Logga ut</a>
	</div>	
</body>
</html>
