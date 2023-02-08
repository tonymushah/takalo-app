<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Front office login</title>
	<link rel="stylesheet" href="/assets/bootstrap-5.2.3-dist/css/bootstrap.css" />
	<link rel="stylesheet" href="/assets/MDB5-STANDARD/css/mdb.min.css" />
	<link rel="stylesheet" href="/assets/css/fronoffice/login-page.css" />
	<script src="/assets/bootstrap-5.2.3-dist/js/bootstrap.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 d-none d-md-block">
				<div>
					<div class=" mt-5 text-center">
						<h2>
							Takalo
						</h2>
						<p>Echanger vos objet qui ne servent pas</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container">
					<div class="row">
						<div class="container text-center">
							<div class="row mt-4 mb-4">
								<div class="cyan-bg rounded">
									<h2 class="p-2">Takalo App</h2>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<?php
								if (isset($error) == true) {
									echo "<div class='alert alert-danger' role='alert'>";
									echo $error;
									echo "</div>";
								}
								?>
							</div>
							<div class=" row cyan2-bg rounded-4">
								<ul class="nav nav-tabs rounded-4" id="myTab" role="tablist">
									<li class="nav-item rounded-4" role="presentation">
										<button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="sign-in" aria-selected="true">Login</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="sign-in-tab" data-bs-toggle="tab" data-bs-target="#sign-in" type="button" role="tab" aria-controls="sign-in" aria-selected="false">Inscription</button>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
										<div class="container">
											<form method="post" action="<?php echo base_url('frontoffice/validate_credentials'); ?>">
												<div class="row mt-3">
													<div class="mb-3">
														<label for="exampleFormControlInput1" class="form-label">
															Nom
														</label>
														<input type="text" class="form-control" name="nom" id="exampleFormControlInput1" placeholder="" required>
													</div>
													<div class="mb-3">
														<label for="exampleFormControlInput1" class="form-label">
															Mot de Passe
														</label>
														<input type="password" class="form-control" name="mot_de_passe" id="exampleFormControlInput1" placeholder="" required>
													</div>
													<div class="mt-4 mb-4 text-center">
														<button type="submit" class="btn btn-success">Se
															connecter</button>
													</div>
												</div>
											</form>
											<div class="mt-4 mb-4 text-center">
												<p>
													Pas de compte, <span onclick="to_sign_in()" class=" text-info">inscriver-vous</span>
												</p>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="sign-in" role="tabpanel" aria-labelledby="sign-in-tab" tabindex="1">
										<form method="post" action="<?php
																	echo base_url('frontoffice/register_user')
																	?>">
											<div class="row">
												<div class="mb-3">
													<label for="nom" class="form-label">Nom</label>
													<input type="text" name="nom" class="form-control" id="nom" required>
												</div>
											</div>
											<div class="mb-3">
												<label for="mot-de-passe-1" class="form-label">Mot de passe</label>
												<input type="password" name="mot_de_passe" class="form-control" id="mot-de-passe-1" required>
											</div>
											<div class="mb-4 mt-4 text-center">
												<button type="submit" class="btn btn-success">S'inscrire</button>
											</div>
										</form>
										<div class="mt-4 mb-4 text-center">
											<p>
												Deja un compte??, <span onclick="to_login()" class=" text-info">connecter-vous</span>
											</p>
										</div>
									</div>
								</div>
								<script>
									const login_trigger = document.querySelector('#login-tab');
									const sign_in_trigger = document.querySelector('#sign-in-tab');

									function to_login() {
										bootstrap.Tab.getInstance(login_trigger).show();
									}

									function to_sign_in() {
										bootstrap.Tab.getInstance(sign_in_trigger).show();
									}
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
