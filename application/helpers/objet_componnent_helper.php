<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if (!function_exists("simple_objet_componnent1")) {
		function simple_objet_componnent1(){
			$utilisateur = "utilisateur";
			$image_src = "/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg";
			$title = "Object title";
			$object_link = "#";
			echo "<div class=' card m-1'>";
				echo "<div class=' card-header text-center'>$utilisateur</div>";
				echo "<img class=' card-img' src='$image_src'/>";
				echo "<div class=' card-body m-0 p-1 text-center'> ";
				echo "<div class=' card-title'>$title</div>";
				echo "</div>";
				echo "<div class=' card-footer text-center'> <a href='$object_link'><button type='button' class='btn btn-success'>Echanger</button></a> </div>";
			echo "</div>";
		}
	}
	if (!function_exists("simple_objet_componnent2")) {
		function simple_objet_componnent2(){
			$utilisateur = "utilisateur";
			$image_src = "/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg";
			$title = "Object title";
			$object_link = "#";
			echo "<div class=' card mt-1 mb-1'>";
				echo "<img class=' card-img' src='$image_src'/>";
				echo "<div class=' card-body m-0 p-1 text-center'> ";
				echo "<div class=' card-title'><a href='$object_link'> $title</a></div>";
				echo "</div>";
				echo "<div class=' card-footer text-center'>$utilisateur</div>";
			echo "</div>";
		}
	}
	if (!function_exists("echange_componnent1")) {
		function echange_componnent1(){
			$utilisateur1 = "utilisateur1";
			$objet_util1 = "casquette";
			$utilisateur2 = "utilisateur2";
			$objet_util2 = "brique";
			echo "<div class='card mt-1 mb-1'>";
				echo "<div class=' card-body'>Echange d'objet entre <strong>$utilisateur1</strong> avec son objet \"$objet_util1\" et de <strong>$utilisateur2</strong> avec son objet \"$objet_util2\"</div>";
			echo "</div>";
		}
	}
	if (!function_exists("categorie_componnent1")) {
		function categorie_componnent1(){
			$nom_categorie = "Nom categorie";
			$object_inside = [];
			echo "<div class='card'>";
				echo "<div class='card-header text-center'><h2>$nom_categorie</h2></div>";
				echo "<div class='card-body'>";
					echo "<div class='container'>";
						echo "<div class='row'>";
							for($i=0; $i < 3; $i++){
								echo "<div class='col-6 col-lg-4'>";
									simple_objet_componnent2();
								echo "</div>";
							}
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	}
	if (!function_exists("utilisateur_componnent1")) {
		function utilisateur_componnent1(){
			$nom_utilisateur = "Nom utilisateur";
			$image_src = "/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg";
			$nombre_echange = 13;
			$nombre_d_objet = 26;
			echo "<div class='card mt-1 mb-1'>";
				echo "<div class='row g-0'>";
					echo "<div class='col-lg-4'>";
						echo "<img class='img-fluid rounded-start mt-lg-4 pt-lg-1' src='$image_src'/>";
					echo "</div>";
					echo "<div class='col-lg-8'>";
						echo "<div class='card-body'>";
							echo "<h5 class='card-title'>";
								echo $nom_utilisateur;
							echo "</h5>";
							echo "<p class='card-text'>Nombre d'echanges : $nombre_echange</p>";
							echo "<p class='card-text'>Nombre d'echanges : $nombre_d_objet</p>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	}
	if (!function_exists("simple_objet_componnent3")) {
		function simple_objet_componnent3(){
			$image_src = "/assets/imgs/namroud-gorguis-FZWivbri0Xk-unsplash.jpg";
			$title = "Object title";
			$object_link = "#";
			$nombre_demande = 100;
			echo "<div class=' card m-1'>";
				echo "<img class=' card-img' src='$image_src'/>";
				echo "<div class=' card-body m-0 p-1 text-center'> ";
				echo "<div class=' card-title'>$title</div>";
					echo "<div classs='row'>";
						echo "<p class='text-center card-text'>Nombre de demande: </p>";
						echo "<h3 class='text-center card-text'>$nombre_demande</h3>";
					echo "</div>";
				echo "</div>";
				echo "<div class=' card-footer text-center'> <a href='$object_link'><button type='button' class='btn btn-success'>Details</button></a> </div>";
			echo "</div>";
		}
	}
	if (!function_exists("add_objet_componnent")) {
		function add_objet_componnent(){
			$title = "Ajouter un objet";
			$object_link = "#";
			echo "<a href='$object_link'> <div class=' card m-1'>";
				echo "<div style='height: 100px;' class=' card-img fas fa-plus'></div>";
				echo "<div class=' card-body m-0 p-1 text-center'> ";
				echo "<div class=' card-title'>$title</div>";
				echo "</div>";
			echo "</div></a>";
		}
	}
	if (!function_exists("demande_element1")) {
		function demande_element1(){
			$nom_utilisateur = "Nom utilisateur";
			$nom_objet_envoye = "Objet a envoye";
			$nom_objet_recue = "Objet a recevoir";
			echo "<div class='card'>";
				echo "<div class='card-header'>";
					echo $nom_utilisateur;
				echo "</div>";
				echo "<div class='card-body'>";
					echo "<div class='container'>";
						echo "<div class='row'>";
							echo "<div class='col-6'>";
								echo "<p>$nom_objet_envoye</p>";
							echo "</div>";
							echo "<div class='col-6'>";
								echo "<p>$nom_objet_recue</p>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	}
	if (!function_exists("demande_element2")) {
		function demande_element2(){
			$nom_utilisateur = "Nom utilisateur";
			$nom_objet_envoye = "Objet a envoye";
			$nom_objet_recue = "Objet a recevoir";
			echo "<div class='card'>";
				echo "<div class='card-header'>";
					echo $nom_utilisateur;
				echo "</div>";
				echo "<div class='card-body'>";
					echo "<div class='container'>";
						echo "<div class='row'>";
							echo "<div class='col-6'>";
								echo "<p>$nom_objet_envoye</p>";
							echo "</div>";
							echo "<div class='col-6'>";
								echo "<p>$nom_objet_recue</p>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
				echo "<div class='card-footer text-center'>";
					echo "<div class='btn-group' role='group' aria-label='Accept or decline'>";
						echo "<button type='button' class='btn btn-success'>Accepter</button>";
						echo "<button type='button' class='btn btn-danger'>Refuser</button>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	}
?>
