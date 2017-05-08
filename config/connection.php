<?php
	$db = mysqli_connect("localhost", "root", "", "annastradgard") OR die('Ingen kontakt med databasen');
	mysqli_query($db, "SET NAMES utf8");
?>	