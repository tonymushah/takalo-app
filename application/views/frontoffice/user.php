<?php
	$nom_utilisateur = "nom utilisateur";
	$pseudo = "pseudo";
	$nombre_d_echange = 10;
	$nombre_d_objet = 134;
?>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-6"><img width="200px" src="/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg"/></div>
				<div class="col-6">	
					<h2><?php echo $nom_utilisateur;?></h2>
					<h2><?php echo $pseudo;?></h2> 
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h3>Nombre d'echanges: <?php
				echo $nombre_d_echange;
			?></h3>
			<h3>Nombre d'objet: <?php
				echo $nombre_d_objet;
			?></h3>
		</div>
	</div>
	<div class="row">
		<h2>Objets</h2>
		<div class="container">
			<div class="row">
				<div class="col-5 col-sm-4 col-md-3">
					<?php
						add_objet_componnent();
					?>
				</div>
				<?php
					for ($i=0; $i < 10; $i++) { 
						echo "<div class='col-5 col-sm-4 col-md-3'>";
							simple_objet_componnent3();
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>
