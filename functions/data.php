<?php 

$plantid;

function data_page($db, $pageid)  {

	//Hämtar innehållet till index-sidan
	$query = "SELECT * FROM pages WHERE id = $pageid";
	$result = mysqli_query($db, $query);

	$data = mysqli_fetch_assoc($result);

	/*$page['body_nohtml'] = strip_tags($data['body']);
	if($page['body_formatted'] == $page['body_nohtml']) {
		$page['body_formatted'] = '<p>'.$data['body'].'</p>';
	}
	 else {
	 	$page['body_formatted'] = $data['body'];
	 }*/
	$page['header'] = $data['header']; 
	$page['body_formatted'] = '<p>'.$data['body'].'</p>';



	return $page;

}	


function login($db)  {
	if (isset($_POST['login_btn'])) {
		
		if(isset($_POST['username']) && isset($_POST['password'])){

			$username = mysqli_real_escape_string($db, $_POST['username']);
			$password = mysqli_real_escape_string($db, $_POST['password']);


			if(isset($_SESSION['username']) && $_SESSION['username']=='admin'){ 
					header("Location: ". 'index.php?page=8');
					return $data;
			}else {

				$password = md5($password);
				$sql = "SELECT id, username, email  FROM users WHERE username= '{$username}' AND password= '{$password}'";

				$result = mysqli_query($db, $sql);
				if(mysqli_num_rows($result) == 1){
					$data = mysqli_fetch_assoc($result);

					$_SESSION['username'] = $username;
					header("Location: ". 'index.php?page=7');

					return $data;
				}	
			}
		}
	}		
}

function logout()  {
	if(isset($_POST['logout_btn'])) {
		session_start();
		session_destroy();
		unset($_SESSION['username']);
		header("Location: ". 'index.php');
		exit;
	}

	echo $_SESSION['username'];
}


function registration($db)  {

	if(isset($_POST['register_btn'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($db, $sql);

		if(!($data = mysqli_fetch_array($result))) {

			if ($password == $password2) {

				$password = md5($password);
				$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
				$result = mysqli_query($db, $sql);

				$_SESSION['username'] = $username;
				header("Location: ". 'index.php?page=7');
				

				return $username;
				exit;
			} else {
				$_SESSION['message'] = "Lösenorden matchar inte varandra";
			}
		}
		else {
			echo "Användarnamnet är upptaget";
		}
	}

}




function plants($db)  {


	$query = "SELECT * FROM plants";
	$result = mysqli_query($db, $query);

	while($data = mysqli_fetch_assoc($result)){
		$data['id'];
		
		$plants[] = '<span class="listborder"><span class="listPage">'.'<a href="?page=11&id='.$data['id'].'">'.$data['image'].' '.'<span class="listName">'.ucfirst($data['name']).'</span>'.'<span class="listLatin">'.ucfirst($data['latin']).'</span>'.'</a>'.'</span>'.'</span>';
	}
	
	return $plants;
	
	$plantid = $_GET('id');
	
}


function plant($db)  {

	if (isset($_GET['id'])) {
		$plantid = $_GET['id'] ;  
		
		$query = "SELECT * FROM plants WHERE id = '$plantid'";
		$result = mysqli_query($db, $query);


		while($data = mysqli_fetch_assoc($result)){
			$plant['plant_data'] = '<div class="singlepage">'.'<div class="image">'.$data['image'].'</div>'.'<div class="singlepage_fakta">'.'<div class="fontstyle_singlepage">'.ucfirst($data['name']).'</div>'.'<div class="fontstyle_singlepage italic_font">'.ucfirst($data['latin']).'</div>'.'<div class="text">'.ucfirst($data['text']).'</div>'.'<div class="place">'.ucfirst($data['place']).'</div>'.'<div class="pruning">'.ucfirst($data['pruning']).'<div>'.'</div>'.'</div>'.'<br>';
		}
		
		return $plant;

		session_destroy();
		unset($_SESSION['plant_id']);
	}

}

//Skriver ut trädgårdens djur på sidan 
function animals($db)  {


	$query = "SELECT * FROM animals";
	$result = mysqli_query($db, $query);

	

	while($data = mysqli_fetch_assoc($result)){
		$data['id'];	


		$animals[] = '<span class="listPage">'.'<a href="?page=12&id='.$data['id'].'">'.'<span class="image">'.ucfirst($data['image']).'</span>'.' '.'<span class="listName">'.ucfirst($data['name']).'</span>'.'<span class="listLatin">'.ucfirst($data['latin']).'</span>'.'</a>'.'</span>';
	}

	return $animals;
	$animalid = $_GET('id');
}

function animal($db)  {

	if (isset($_GET['id'])) {
		$animalid = $_GET['id'] ;  
				
		$query = "SELECT * FROM animals WHERE id = '$animalid'";
		$result = mysqli_query($db, $query);


		while($data = mysqli_fetch_assoc($result)){

			$animal['animal_data'] = '<div class="singlepage">'.'<div class="image">'.$data['image'].'</div>'.'<div class="singlepage_fakta">'.'<div class="fontstyle_singlepage">'.ucfirst($data['name']).'</div>'.'<div class="fontstyle_singlepage italic_font">'.$data['latin'].'</div>'.'<div class="details">'.ucfirst($data['text']).'</div>'.'<div class="food">'.ucfirst($data['food']).'</div>'.'</div>'.'</div>'.'<br>';
		}
		
		return $animal;

		session_destroy();
		unset($_SESSION['animal_id']);
	}

}


//Skriver ut alla problem man kan läsa mer om
function problems($db)  {
	
	$query = "SELECT * FROM problems";
	$result = mysqli_query($db, $query);

	while($data = mysqli_fetch_assoc($result)){
		$data['id'];

		$problems[] = '<span class="listPage">'.'<a href="?page=13&id='.$data['id'].'">'.'<span class="image">'.$data['image'].'</span>'.' '.'<span class="listName">'.ucfirst($data['name']).'</span>'.'<span class="listLatin">'.ucfirst($data['latin']).'</span>'.'</a>'.'</span>';

	}
		
	return $problems;
	
}


function problem($db)  {

	if (isset($_GET['id'])) {
		$problemid = $_GET['id'] ;  
		
		//$query = "SELECT * FROM problems WHERE id = '2'";
		$query = "SELECT * FROM problems WHERE id = '$problemid'";
		$result = mysqli_query($db, $query);


		while($data = mysqli_fetch_assoc($result)){
			$problem['problem_data'] = '<div class="singlepage">'.'<div class="image">'.$data['image'].'</div>'.'<div class="singlepage_fakta">'.'<div class="fontstyle_singlepage">'.ucfirst($data['name']).'</div>'.'<div class="fontstyle_singlepage italic_font">'.ucfirst($data['latin']).'</div>'.'<div class="text">'.ucfirst($data['text']).'</div>'. '<div class="cure">'.ucfirst($data['cure']).'</div>'.'</div>'.'<br>';


			if (isset($_POST["username"])){
				
			
			} else {
				
				
			}


		}
		
		return $problem;

		session_destroy();
		unset($_SESSION['problem_id']);
	}

}


//Skriver ut mina blogg inlägg på sidan
function blogs($db)  {
	//$page = blog; 


	//$query = "SELECT * FROM blog ORDER BY id DESC";
	$query = "SELECT * FROM blog ORDER BY id DESC";
	$result = mysqli_query($db, $query);

	
	while($data = mysqli_fetch_assoc($result)){
		$blogs[]  = '<div class="blogPost">'.'<div class="heading">'.$data['heading'].'</div>'.' '.'<div class="date">'.$data['date'].'</div>'.' '.'<div class="subtitle">'.$data['subtitle'].'</div>'.''.'<div class="content">'.$data['content'].'</div>'.'</div>' ;
	}
	
	return $blogs;
}



//Sparar en användares anteckningar
function savenotes($db)  {
	if (isset($_POST["username"])){
		$username = $_SESSION['username'];

		$query = "SELECT id FROM users WHERE username = '$username'";
		$result = mysqli_query($db, $query);

		$data = mysqli_fetch_assoc($result);
		$userid = $data['id'];

			
		if(isset($_POST['save_btn'])) {

			$pagename = mysqli_real_escape_string($db, $_POST['pagename']);
			$text = mysqli_real_escape_string($db, $_POST['text']);
						
			$query = "INSERT INTO notes(userid, text, pagename) VALUES('$userid', '$text', '$pagename')";
			mysqli_query($db, $query);
		}
	}
}

//Visar en användares sparade anteckningar
function mynotes($db)  {
	
		$username = $_SESSION['username'];

		$query = "SELECT id FROM users WHERE username = '$username'";
		$result = mysqli_query($db, $query);

		$data = mysqli_fetch_assoc($result);
		$userid = $data['id'];
		
		$query = "SELECT * FROM notes WHERE userid = '$userid'";
		
		$result = mysqli_query($db, $query);
		
		if($data>0){	
			while($data = mysqli_fetch_assoc($result)){
				$mynotes[] = '<a href="?page=14&id='.$data['id'].'">'.$data['pagename'].'</a>'.'<br>';
			}
		}
	
		return $mynotes;
	
}


function mynote($db)  {

	if (isset($_GET['id'])) {
		$notesid = $_GET['id'] ;  
				
		$query = "SELECT * FROM notes WHERE id = '$notesid'";
		$result = mysqli_query($db, $query);


		while($data = mysqli_fetch_assoc($result)){

			$mynote['mynote_data'] = '<div class="singlepage">'.'<div class="noteName">'.$data['pagename'].'</div>'.'<div class="noteText">'.$data['text'].'</div>'.'<br>';

			/*$mynote['mynote_data'] = '<div class="singlepage">'.'<div class="image">'.$data['image'].'</div>'.'<div class="fontstyle_singlepage">'.$data['name'].'</div>'.'<div class="fontstyle_singlepage italic_font">'.$data['latin'].'</div>'.$data['text'].$data['cure'].'<br>';*/
		}
		
		return $mynote;

		session_destroy();
		unset($_SESSION['mynote_id']);
	}
}	


function saveblog($db)  {
	if (isset($_POST['blog_btn'])) {
			
		$heading = mysqli_real_escape_string($db, $_POST['heading']);
		$subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);
		$content = mysqli_real_escape_string($db, $_POST['content']);
		$date = mysqli_real_escape_string($db, $_POST['date']);
		$category = mysqli_real_escape_string($db, $_POST['category']);

					
		$query = "INSERT INTO blog(heading, subtitle, content, date, category) VALUES('$heading', '$subtitle', '$content', '$date', '$category')";
			mysqli_query($db, $query);
			
	}

}


function search($db)  {

	if (isset($_POST['search_btn'])) {
		//$searchtext = strtolower(setlocale($_POST['search'], 'UTF-8')); 
		$searchtext = $_POST['search']; 
		
		//$terms = explode(" ", $searchtext);
		//echo $terms;

		$query = "SELECT keywordstable.which_table, keywordstable.table_id  FROM keyword, keywordstable WHERE 
		keywordstable.keyword_id = keyword.id
		AND	keyword.word ='$searchtext'";

						
		$result = mysqli_query($db, $query);
		
		$num_rows = $result->num_rows;
		//echo $num_rows;	
		//for ($i=0; $i<$num_rows; $i++) {		//röda vinbär skrivs ut 2 gånger när allt är i denna loop

		//Här hamnar alla sökträffar, nu 2 st
			while($data = mysqli_fetch_assoc($result)){
				$table = $data['which_table'];
				$id = $data['table_id'];
			}
			
		//for ($i=0; $i<$num_rows; $i++) {		//tulpanen skrivs ut en gång, även utan denna skrivs tulpanen ut 1 gång
		//Denna fråga ska köras så många gånger som det finns träffar
			$query = "SELECT id, name, latin FROM $table WHERE 
			$table.id = $id";

		//}	
			$result = mysqli_query($db, $query);
			
			//Svaret på frågan ska läggas i en array som skrivs ut nedan
			//$num_rows = $result->num_rows;
					
			while($data = mysqli_fetch_assoc($result)){
				//echo $num_rows; ?><!-- resultat för--> <?php //echo $searchtext;*/
				if($table=='plants') {
					$search[] = '<div class="search-result">'.'<a href="?page=11&id='.$data['id'].'">'.'<span class="search-name">'.ucfirst($data['name']).'</span>'.' '.'<span class="search-latin">'.ucfirst($data['latin']).'</span>'.'</a>'.'</div>'.'<br>';
				}
				elseif($table=='animals') {
					$search[] = '<a href="?page=12&id='.$data['id'].'">'.ucfirst($data['name']).' '.ucfirst($data['latin']).'</a>'.'<br>';
				}
				else{
					$search[] = '<a href="?page=13&id='.$data['id'].'">'.ucfirst($data['name']).' '.ucfirst($data['latin']).'</a>'.'<br>';
				}
				
			}

			
			
		return $search;
		//return $num_rows;

		session_destroy();
		unset($_SESSION['search_id']);
	}
	
}

/*function seemynotes($db)  {

	echo $data['pagename'];
	echo $data['userid'];
	$query = "SELECT * FROM saved_pages WHERE userid = '$userid' AND pagename = '$pagename'";
	
	$result = mysqli_query($db, $query);
		
	while($data = mysqli_fetch_assoc($result)){
		//$seemynotes['seemynotes_data'] = $data['pagename'].'<br>';
		$mynotes['mynotes_data'] = '<a href="?page=11">'.$data['pagename'].'</a>'.'<br>';
		
	}

	return $seemynotes;
} */

//Användarnas favoritsidor
/*function savedpages($db)  {
	$username = $_SESSION['username'];

	//echo $userid. 'savedpages';

	$query = "SELECT id FROM users WHERE username = '$username'";
	$result = mysqli_query($db, $query);

	$data = mysqli_fetch_assoc($result);
	$userid = $data['id'];
	//echo $userid. 'savedpages';
	
	$query = "SELECT * FROM saved_pages WHERE userid='$userid'";
	$result = mysqli_query($db, $query);
	$data = mysqli_fetch_assoc($result);
	$pageid = $data['pageid'];	
	$category = $data['category'];
	//echo $pageid;
	//echo $category;

	$query = "SELECT name FROM plants, animals,problems,category WHERE pageid='$pageid' AND category = '$category'";
	$result = mysqli_query($db, $query);

	while($data = mysqli_fetch_assoc($result)){
		$savedpages['saved_data'] = $data['name'].'<br>';
	}
	
	return $savedpages;
}*/

?>