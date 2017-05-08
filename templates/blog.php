<?php
include 'header.php';

include_once("../config/connection.php");

$page = blog; 

$sql = "SELECT * FROM blog ORDER BY id DESC";
$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$subtitle = $row['subtitle'];
	$content = $row['content'];
	$date = $row['date'];
	$category = $row['category'];

?>
	<div class="blogPost">
		<div class="date"><?php echo $date; ?></div>
		<div class="title"><?php echo $title; ?> </div>
		<div class="subtitle"><?php echo $subtitle; ?></div>
		<div class="blogContent"><?php echo $content; ?></div>
		<hr />
	</div>
<?php

}
?>	

<a href="admin.php">Admin</a>
