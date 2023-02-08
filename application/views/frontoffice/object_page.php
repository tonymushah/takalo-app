<?php
	$nom_objet = "nom objet";
	$prix = 124324;
	$nombre_demande = 124;
	$top_image= "/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg";
	$description =" Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, beatae eligendi. Debitis, repudiandae mollitia culpa nesciunt neque soluta ad blanditiis odit vitae enim inventore eius sit minima libero. Ullam, sapiente! ";
?>
<div class="container mt-5">
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<div class="card">
				<img class="card-img" src="<?php
					echo $top_image;
				?>"/>
			</div>
		</div>
		<div class="col-sm-4 col-md-9">
			<h2><?php
				echo $nom_objet;
			?></h2>
			<h2>Prix : <?php
				echo $prix;
			?></h2>
			<h2>Nombre de demandes: <?php
				echo $nombre_demande;
			?></h2>
		</div>
	</div>
	<div class="row">
		<h3>Description</h3>
		<p class="mt-0"><?php
			echo $description;
		?></p>
	</div>
	<div class="row">
		<h3>Gallerie</h3>
		<div>
			
		</div>
	</div>
	<div class="row">
		<h3>Demandes</h3>
		<div class="col">
			<div class="row">
				<?php
					for ($i=0; $i < 10; $i++) { 
						echo "<div class='col-6 col-md-6 col-lg-4'>";
						simple_objet_componnent1();
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>
