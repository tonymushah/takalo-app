<div class="container">
	<div class="row">
		<h2>Liste des demandes recues</h2>
	</div>
	<div class="row">
		<?php
			for ($i=0; $i < 10; $i++) { 
				echo "<div class='col-lg-3 mb-1'>";
					demande_element2();
				echo "</div>";
			}
		?>
	</div>
</div>
