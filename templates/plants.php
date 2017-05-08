<?php

include 'header.php';
include 'connection.php';
?>
<h1>Växter</h1>
<?php
$query = "
	SELECT * 
	FROM plants 
";

if($result = $mysqli->query($query)){
	
	while($row = $result->fetch_assoc()){

		echo "{$row['name']} {$row['latin']}</a>";

	}

}else{
	echo $mysqli->error;
}
?>

include 'footer.php';
?>