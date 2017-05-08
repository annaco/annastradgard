<?php 
	//Databaskopplingen
	include 'connection.php';

	//Funktioner
	include 'functions/data.php';
	

	//Om page har ett värde visa den sidan annars visa indexsidan

	if(isset($_GET['page'])) {
		$pageid = $_GET['page'];
	} else {
		$pageid = 1;
	}


	
	$page = data_page($db, $pageid);
	$savenotes = savenotes($db);
	//$savedpages = savedpages($db);
	$data = login($db);
	//$user = data_user($db, $username);
	$plants = plants($db);
	$plant = plant($db);
	$animals = animals($db);
	$animal = animal($db);
	$problems = problems($db);
	$problem = problem($db);

	$blogs = blogs($db);
	$saveblog = saveblog($db);
	$login = login($db);
	//$logout = logout();
	$registration = registration($db);
	//$user = user_data($db);
	$mynotes = mynotes($db);	//skriver ut på indexsidan
	$mynote = mynote($db);
	$searches = search($db);
	$num_rows = search($db);
	//$seemynotes = seemynotes($db);
	//$savedpages = savedpages($db);
		
	//$user = user_data( $username, $password);

	//$home = home($db);
	//$admin = admin($db);
	
	
	

	//$user = data_user($db, $_SESSION['username']);

	/*if($pageid = 2) {
		$query = "SELECT name, latin FROM plants";
	}


	if($result = $mysqli->query($query)){
	
	while($row = $result->fetch_assoc()){

		echo "{$row['name']} {$row['latin']}</a>";

	}

	}else{
		echo $mysqli->error;
}*/
?>