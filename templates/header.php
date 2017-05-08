<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'Annas Trädgård';?></title>
	<!--meta charset="UTF-8"--> 

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="apple-touch-icon" sizes="57x57" href="image/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="image/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="image/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="image/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="image/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="image/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="image/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="image/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="image/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="image/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="image/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="image/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="image/favicon/favicon-16x16.png">
	<link rel="manifest" href="image/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>
	<div class="wrapper">
	<header>
		<div class="header">
			<!--div class="logga"-->
				<img src="image/logga.png" alt="Logga">
			
			
			
				<div class="title">
					<a href="index.php?page=1">Annas Trädgård</a>

				</div>
				<div class="slogan">
					Allt en trädgårdsamatör behöver veta
				</div>
			<!--/div-->

			<!--div class="loginbox"-->
				<!--a id="i-nav" href="#">
					<img src="image/menu.png" alt="Hamburgermeny">
				</a-->
				<?php

				// Om inte inloggad visa formulär, annars logga ut-länk 
				if (!isset($_SESSION['username'])){

					?>
					<div class="login">
						<a href="index.php?page=10">Logga in</a>
					</div>	
					
					<div class="newUser">
						<a href="index.php?page=9">Registrera dig</a>
					</div>
				<?php
				} else {
			   ?>	

				<div class="logout">
					<a href="templates/logout.php">Logout</a>
				</div>
				<div class="myPage">
					<a href="index.php?page=7">Min sida</a>
				</div>
				<?php	
				}
				?>


				<div class="search">
					<form action='?page=15' method='post'>
						<input type='text' name='search' class="search-box" >
						<input type='submit' name="search_btn" value='Sök' class="search-btn">
					</form>
				</div>
			<!--/div-->	
		</div>


		<?php include 'menu.php' ?>
		
	</header>
	<div class="innerwrapper">
