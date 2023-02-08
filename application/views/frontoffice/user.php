<?php
	$nom_utilisateur = $current_user["nom"];
	$nombre_d_objet = count($current_user_objects);
?>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-6"><img width="200px" src="/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg"/></div>
				<div class="col-6">	
					<h2><?php echo $nom_utilisateur;?></h2>
				</div>
			</div>
		</div>
		<div class="col-md-6">
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
						if($_SESSION["id"] === $current_user["id"]){
							add_objet_componnent();
						}
					?>
				</div>
				<?php
					for ($i=0; $i < count($current_user_objects); $i++) { 
						$to_use = $current_user_objects[$i];
						echo "<div class='col-5 col-sm-4 col-md-3'>";
							simple_objet_componnent3($to_use->nomObjet, "", $to_use->prixObjet);
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>
