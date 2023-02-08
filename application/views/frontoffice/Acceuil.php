<?php
	$nbechange = 0;
?>
<div class="container">
	<div class="row text-center">
		<div class="mt-4 mb-4">
			<h2>
				Bienvenue dans Takalo
			</h2>
		</div>
		<div class="mb-4">
			<p>Echanger vos object avec les autres utilisateurs.<br/>
			Plus de <?php
				echo $nbechange;
			?> ont ete echange</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h3>Recentes mise en ligne</h3>
			<div>
				<div class="row">
					<?php
						for($i = 0; $i < count($recent_uploads); $i++) {
							$to_use = $recent_uploads[$i];
							echo "<div class='col-6 col-md-6 col-lg-3'>";
								simple_objet_componnent1($to_use["proprietaire"]["nom"], "#", $to_use["nom"]);
							echo "</div>";
						};
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<h2 class="text-center mb-3 mt-3">Decouvrer nos categories</h2>
		<div class="container">
			<div class="row">
				<?php
					for ($i=0; $i < 2; $i++) { 
						echo "<div class='col-md-6'>";
							categorie_componnent1($categories_data[$i]["nom_categorie"], $categories_data[$i]["objets"]);
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
	<div class="row">
		<h2 class="text-center mb-3 mt-3">Nos utilisateurs</h2>
		<div class="container">
			<div class="row">
				<?php
					for ($i=0; $i < count($users); $i++) { 
						$to_use = $users[$i];
						echo "<div class='col-md-6 col-lg-4'>";
							utilisateur_componnent1($to_use->nomUtilisateur, $to_use->id);
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>
