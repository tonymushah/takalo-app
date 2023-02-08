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
		<div class="col-md-6">
			<h3>Recentes mise en ligne</h3>
			<div>
				<?php
					$i = 0;
					for($i = 0; $i < 10; $i++) {
						simple_objet_componnent1();
					};
				?>
			</div>
		</div>
		<div class="col-md-6">
			<h3>Recentes echanges</h3>
			<div></div>
		</div>
	</div>
</div>
