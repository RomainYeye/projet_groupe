<?php

include("header.php");//NAVBAR
include_once("Model/Utilisateur.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");

?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10 mt-5">
					<?php
						if(isset($_GET["error"]) && $_GET["error"] == 1) {

							echo '<div class="row justify-content-center ">
									<div class="alert alert-warning" role="alert"> Vous devez posséder un compte pour accéder à cette page. </div>
								  </div>';
						}
					?>
					<div class="row justify-content-center">						
						<h1 class="text-center mb-5">Créer un compte</h1>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<form id="form-inscription" method="post" action="inscriptions.php" name="inscriptions">
								<label for="identite"><h5>Comment vous appelez-vous ?</h5></label>
								<div class="form-row identite mb-2">
									<div class="col">
										<input id="nom" name="nom" type="text" class="form-control mb-1" maxlength="25" placeholder="Nom" aria-label="Votre Nom" required />
									</div>
									<div class="col">
										<input id="prenom" name="prenom" type="text" class="form-control mb-1" maxlength="25" placeholder="Prénom" aria-label="Votre Prenom" required />
									</div>
								</div>
								<div class="form-group">
									<label><h5>Où habitez-vous ?</h5></label>
									<div class="form-row mb-1">
										<div class="col-auto">
											<input type="text" class="form-control" name="numero" placeholder="Numéro" required>
										</div>
										<div class="col">
											<input type="text" class="form-control" name="rue" placeholder="Nom de voie" required>
										</div>
									</div>	
									<input type="text" class="form-control mb-1" name="ville" placeholder="Ville" maxlength="50" required>
									<input type="text" class="form-control" name="codePostal" placeholder="Code postal" maxlength="5" required>
								</div>
								<div class="form-group">
									<label><h5>Comment vous contacter ?</h5></label>
									<input type="text" class="form-control mb-1" name="telephone" placeholder="N° de téléphone" required>
									<div class="mb-1" id="divemailinscription">
										<input id="inputemailinscription" type="email" class="form-control" name="mail" maxlength="50" placeholder="Email" aria-label="Votre Email" required />
									</div>
								</div>
								<div class="form-group">
									<label><h5>Choix du mot de passe</h5></label>
									<input type="password" id="password" class="form-control mb-1" name="password"  maxlength="20" placeholder="Mot de passe" aria-label="Votre Mot de pass" required />
									<input type="Password" id="confirmPassword" class="form-control" name="confirmPassword" maxlength="20" placeholder="Confirmation du mot de passe" aria-label="Confirmation de votre Mot de passe" required />
								</div>
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="Newsletters" name="Newsletters" />
										<label class="form-check-label" for="Newsletters">
											Newsletters
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="CGU" name="CGU" required />
										<label class="form-check-label" for="CGU">
											<a href="cgu.php" target="blank_">J'accepte les Conditions Générales d'Utilisation (C.G.U)</a>
										</label>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-12">
										<button id="inscription-btn" name="inscription-btn" type="submit" class="btn btn-primary mb-2">Valider</button>
										<input type="hidden" name="post-inscription"/>	
									</div>	
								</div>
							</form>
						</div>
					</div>
				</div>
			
		</section>


<?php

	include("footer.php");
	
?>

	
	
	
