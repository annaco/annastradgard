

<?php

$mysqli = new mysqli("localhost","root","","annastradgard");

$search = $_POST['search'];

$query = "

	SELECT plants.name  FROM keyword, plants, plantskeyword WHERE keyword.word LIKE'%$search%' and plantskeyword.plants_id = plants.id and plantskeyword.keyword_id = keyword.id
	";

if($result = $mysqli->query($query)){
	
	while($row = $result->fetch_assoc()){

		echo "{$row['name']} {$row['latin']}</a>";

	}

}else{
	echo $mysqli->error;
}
/*
<?php


$output = NULL;

if(isset($_POST['submit'])) {
	include_once("connection.php");

	$search = $db->real_escape_string($_POST['search']);

	$result = $db->query("SELECT * FROM plants WHERE name = '%$search%'");

	if($result->num_rows > 0) {
		while($rows = $result->fetch_assoc())
		{
			$sn = $rows['sn'];
			$name = $rows[name];

			$output = " $name<br>" ;
		}	
	}else {
		$output = "Hittar inget";
	}
}

?>

<form method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Sök">
</form>*/