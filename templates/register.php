<?php
	session_start();
	include 'header.php';

	//Databas koppling
	$db = mysqli_connect("localhost", "root", "", "annastradgard");

	if(isset($_POST['register_btn'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
	
		if ($password == $password2) {
			$password = md5($password);
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "Du är nu inloggad";
			$_SESSION['username'] = $username;
			header("location: home.php");
		} else {
			$_SESSION['message'] = "Lösenorden matchar inte varandra";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrering</title>
</head>
<body>
	<div class="header">
		<h1>Registrering</h1>
	</div>
	<div class="registerForm">
		<form method="post" action="register.php"> 
			Username:<input type="text" name="username" class="textInput"><br>
			Email:<input type="email" name="email" class="textInput"><br>
			Password:<input type="password" name="password" class="textInput"><br>
			Password again:<input type="password" name="password2" class="textInput"><br>
			<input type="submit" name="register_btn" class="Register">
		</form>	
	</div>	
</body>
</html>
