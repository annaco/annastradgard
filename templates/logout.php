<?php 
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	$_SESSION['message'] = "Du är nu utloggad";	
	header("location: ../index.php");
?>