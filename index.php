<?php 
	session_start();
	include 'config/setup.php';
	include 'templates/header.php';


?>

	<div class="container">
			
			<div class="headline"><?php echo $page['header']; ?></div>

					

			<div class="pagecontent"><?php echo $page['body_formatted']; ?></div>
		

		<?php
		if($pageid == 1) {
						
		}

		//Växt galleriet
		elseif($pageid == 2){
		?>
			<div class="column1">
				<div class="listbox">
					<?php
	 				foreach ($plants as $plant => $objects)
					{
						echo $objects;
					}
					?>	
				</div>	
			</div>
		<?php
		}

		//Djur galleriet
		elseif($pageid == 3) {
		?>	
			<div class="column1">
				<div class="listbox">
					<?php 

						foreach ($animals as $animal => $objects)
						{
							echo $objects;
						}
					?>	
				</div>	
			</div>	
		<?php	
		}

		//Problem galleriet
		elseif($pageid == 4) {
		?>	
			<div class="column1">
				<div class="listbox">
					<?php
						foreach ($problems as $problem => $objects)
						{
							echo $objects;
						}
					?>	
				</div>	
			</div>	
		<?php	
		}

		//Utskrft av bloggen
		elseif($pageid == 6) {
		?>	
			<div class="column1">
			<?php
				foreach ($blogs as $blog => $objects)
				{
					echo $objects;
				}
				
			?>	
			</div>	
		<?php	
		}

		//Användarnas personliga sida
		elseif($pageid == 7) {
			
			?>
			<div class="mycolumn">
				<div class="column2">
							
				<div class="welcome">Välkommen <?php echo ucfirst( $_SESSION['username']);?></div>
			
				<form class="textarea" method="post" action="">
					<div class="noteTitle">
						Titel: <input type="text" name="pagename">
					</div>
					<textarea class="tinymce" name="text"></textarea>
					<input type="submit" name="save_btn" value="Spara">
				</form>
			</div>
			<div class="column3">
				<div class="mynotes">
					<div class="notes">Dina sparade anteckningar:</div>
			
					<div class="yournotes"><a href="index.php?page=11">
					<?php	

					foreach ($mynotes as $mynote => $objects)
					{
						echo $objects;
					}
					?>
				
					</div>
				</div>	
			</div><?php 
		}	

		//Administratör sida
		elseif($pageid == 8) {
			?>	
			<div class="column1">

			<form class="textarea" method="post" action="">
					<div class="blogTitle">
						Titel: <input type="text" name="heading">
					</div>
					<div class="blogSubTitle">
						Undertitel: <input class="textarea-input" type="text" name="subtitle">
					</div>
					
					<textarea class="tinymce" name="content"></textarea>
					
					<div class="date">
						Datum: <input type="text" name="date">
					</div>
					<div class="category">
						Kategori: <input type="text" name="category">
					</div>
					<input type="submit" name="blog_btn" value="Spara">
				</form>

				
			<?php
				
			?>	
			</div>	
		<?php	
		}

		//Registrera ny användare
		elseif($pageid == 9) {
			?>
						
			<div class="column1">

				<div class="grid">

					<div class="grid-left">
					</div>
					<div class="grid-middle">
						<div class="registerForm">
					<form method="post" action=""> 
						<div class="registerstyle">
							
							<span class="inputbox">
								<div class="inputbox-row">
								Username:<br>
									<input type="text" name="username" class="textInput">
								</div>	
								<div class="inputbox-row">
								Email:<br>
									<input type="text" name="email" class="textInput">
								</div>	
							
								<div class="inputbox-row">
								Password:<br>
									<input type="password" name="password" class="textInput">
								</div>	
								<div class="inputbox-row">	
								Password again:<br>
									<input type="password" name="password2" class="textInput">
								</div>	
							</span>	
						</div>
						<input type="submit" name="register_btn" value="Registrera mig" class="Register">
						
					</form>	
				</div>
		
					</div>
					<div class="grid-right">
						
					</div>
				</div>		
			</div>
		<?php
			
		}

		//Inloggning av användare och administratör
		elseif($pageid == 10) {

			?>
			<div class="column1">	

				<div class="grid">

					<div class="grid-left">
					</div>
					<div class="grid-middle">
						<div class="loginForm">
							<form method="post" action="" >
								<div class="loginUsername">
									<input type="text" name="username" placeholder="Username" class="textInput" />
								</div>
								<div class="loginPassword">
									<input type="password" name="password" placeholder="password" class="textInput" />
								</div>
								<input type="submit" name="login_btn" class="login_btn" value="Login" />
							</form>
						</div>				
					</div>
					<div class="grid-right">
						
					</div>
				</div>		

			</div>
				
			<?php
		}

		//Växt galleri
		elseif($pageid == 11) {
			echo $plant['plant_data'];
		}

		//Djur galleri
		elseif($pageid == 12) {
			echo $animal['animal_data'];
		}

		//Problem galleri
		elseif($pageid == 13) {
			echo $problem['problem_data'];
		}	

		//Utsktift av en viss anteckning
		elseif($pageid == 14) {
			echo $mynote['mynote_data'];
		}

		//Utskrift av sökfesultat
		elseif($pageid == 15) {

			foreach ($searches as $search => $objects)
			{
				echo $objects;
			}
				
		}


?>
	</div>	
	</div>	
</div>
<div class="column4">
<?php include 'templates/footer.php' ?>
</div>