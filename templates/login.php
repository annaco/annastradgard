<?php
	//Här lagras användarnamnet
	session_start();		
	//include '../config/setup';
	include('config/connection.php');

	/*
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		//kontrollerar om användaren klickat på login knappen
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$dbUserName = "admin";
		$dbPassword = "password";
		
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username= '{$username}' AND password= '{$password}'";
		$result = mysqli_query($db, $sql);
	

		//Kontrollerar om man bara hittar en användare
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "Du är nu inloggad";
			$_SESSION['username'] = $username;
			header("location: home.php");
		} elseif ($username == $dbUserName && $password == $dbPassword){
			$_SESSION['username'] = $username;
			header('Location: admin.php');
		} else {
			$_SESSION['message'] = "Användarnamnet eller lösenordet är felaktigt";
		}
	}	
	else {
		echo "Inloggningen misslyckades";
	}*/
?>

<div class="loginForm">
	<form method="post" action="" >
		<div class="loginUsername">
			<input type="text" name="username" placeholder="Username" class="textInput" />
		</div>
		<div class="loginPassword">
			<input type="password" name="password" placeholder="Password" class="textInput" />
		</div>
		<input type="submit" class="login_btn" value="Login" />
	</form>
</div>		