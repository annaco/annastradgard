<!-- https://www.youtube.com/watch?v=5g2uAnCXwjE-->

<nav class="navbar" role="navigation">

	<div class="container">
		<ul class="menu-item">
			<li <?php if($pageid == 2) {echo 'class="active"';}?>>
				<a href="index.php?page=2">Växter</a>
			</li>
			<li <?php if($pageid == 3) {echo 'class="active"';}?>>
				<a href="index.php?page=3">Djur</a>
			</li>
			<li <?php if($pageid == 4) {echo 'class="active"';}?>>
				<a href="index.php?page=4">Problem</a>
			</li>
			<li <?php if($pageid == 6) {echo 'class="active"';}?>>
				<a href="index.php?page=6">Annas rader</a>
			</li>
						
		</ul>	

		<a id="i-nav" href="#">
			<img src="image/menu.png" alt="Hamburgermeny">
		</a>
	</div>
</nav>
