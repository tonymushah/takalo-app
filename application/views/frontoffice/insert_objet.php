<div class="container">
	<div class="row">
		<div class="card">
			<div class=" card-header">
				<h2>
					Inserer un objet
				</h2>
			</div>
			<form action="#" method="post" class="needs-validation" novalidate>
				<div class=" card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="nom" class="form-label">Nom de l'objet</label>
									<input type="text" class="form-control" id="nom" placeholder="" required>
									<div class="invalid-feedback">
										Nom invalide
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="prix" class="form-label">Prix de l'objet</label>
									<input type="number" class="form-control" id="prix" placeholder="" required>
									<div class="invalid-feedback">
										Prix invalid
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="categorie" class="form-label">Categorie</label>
									<select class="form-select" aria-label="Default select example" required id="categorie">
										<option selected>Veuiller choisir s'il vous plait</option>
										<option value="1">Bricolage</option>
										<option value="2">Cuisine</option>
										<option value="3">Jardinage</option>
									</select>
									<div class="invalid-feedback">
										Categorie invalide
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col">
								<label for="description" class="form-label">Description</label>
								<textarea class="form-control" id="description" rows="3" required></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success">Inserer</button>
				</div>
			</form>
		</div>
	</div>
</div>
