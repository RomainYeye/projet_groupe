<?php
$connected=false;
session_start();
if(isset($_SESSION["emailutilisateur"])) {
	$connected=true;
	session_abort();
}
if($connected) {
	include_once("header.php");//NAVBAR
	include_once("Services/ServiceUtilisateur.php");


	$dAOUtilisateur=new DataAccessUtilisateur();
	$serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
	$data=$serviceUtilisateur->selectAllWhereMailIs($_SESSION["emailutilisateur"]); // select all pour affecter aux champs des formulaires la bonne value


?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10">
					<div class="row justify-content-center">
						<h1 class="text-center mt-5 mb-5">Mon compte</h1>
					</div>
					<div class="row justify-content-center text-center ">
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="mesFavoris.php">Mes favoris </a>
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="monTemoignage.php">Mon Témoignage</a>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-10 col-sm-12 col-12">
							<!-- 9 -->
							<div class="row">
								<h3 class="mt-3">Mes infos</h3>
							</div>
							<div class="row mt-3">
									<?php echo $data["nom"] . " " . $data["prenom"]?>
							</div>
							<div id="display-adresse">

							</div>
							<div id="div-telephone" class="row mt-4 mb-4">
								<div class="col-auto col-sm-4 col-md-4 col-lg-4 p-0">
									<h5>Téléphone : </h5>
								</div>
								<div class="col">
									<!--<form id="form-telephone" method="post" action="monCompte.php">-->
										<div class="row">
											<div class="col-auto">
												<p class="p-0" id="p-tel"><?php echo $data["telephone"]?></p>
											</div>
											<div class="col-auto" id="col-btn-edit-tel">
												
											</div>
										</div>
									<!--</form>-->
								</div>
							</div>
							<div id="div-email" class="row mt-4 mb-4">
								<div class="col-auto col-sm-4 col-md-4 col-lg-4 p-0">
									<h5>Email : </h5>
								</div>
								<div class="col">
									<!--<form  method="post" action="monCompte.php" id="form-email" name="editMailForm">-->
										<input id ="current-mail" type="hidden" value="<?php echo $data["mail"]?>"/>
										<div class="row">
											<div class="col-auto">
												<p class="p-0" id="p-mail"><?php echo $data["mail"]?></p>
											</div>
											<div class="col-auto" id="col-btn-edit-mail">
												
											</div>
										</div>
									<!--</form>-->
								</div>
							</div>
						</div>
					</div>
						
							<!-- 9 11 24 17 -->
							<div class="row justify-content-center">
								<div class="col-12 text-center">
									<button id="display-form-password" class="btn btn-primary">Changer de mot de passe</button>
								</div>
								<div class="col-7">
									<form  method="post" id="form-password" action="monCompte.php" name="EditPassForm" style="display:none">
										<div class="row mt-3">
											<div class="col-lg-12">
												<div class="row mt-3">
													<div class="col-lg-4 col-md-6 col-12">
														<label class="mb-1" for="current-pass">Mot de passe actuel : </label>
													</div>
													<div class="col">
														<input id="current-pass" name="current-pass" maxlength="20" minlength="" type="password" class="form-control w-100" placeholder="Votre mot de passe actuel" aria-label="Votre mot de passe actuel" aria-describedby="Votre mot de passe actuel" required />
														<div id="current-pass-feedback" class="invalid-feedback"></div>
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-lg-4 col-md-6 col-12">
														<label class="mb-1" for="new-pass">Nouveau mot de passe : </label>
													</div>
													<div class="col">
														<input id="new-pass" name="new-pass" maxlength="20" minlength=""  type="Password" class="form-control w-100" placeholder="Votre nouveau mot de passe" aria-label="Votre nouveau mot de passe" aria-describedby="Votre nouveau mot de passe" required />
														<div id="new-pass-feedback" class="invalid-feedback"></div>
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-lg-4 col-md-6 col-12">
														<label class="mb-1" for="new-pass-confirmed">Confirmation : </label>
													</div>
													<div class="col" id="editPassFormRow">
														<input id="new-pass-confirmed" name="new-pass-confirmed" maxlength="20" minlength=""  type="Password" class="form-control w-100" placeholder="Confirmez votre nouveau mot de passe" aria-label="Confirmez votre nouveau mot de passe" aria-describedby="Confirmez votre nouveau mot de passe" required />
														<div id="new-pass-confirmed-feedback" class="invalid-feedback"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="row justify-content-end mx-auto">
											<input type="submit" class="btn btn-primary btn-sm mt-3" value="Valider"/>
											<input type="hidden" name="edit-password"/>
										</div>
									</form>
								</div>
							</div>
				
				</div>
			
		</section>

<?php
	include("footer.php");
} else {
	header("location: inscriptions.php?error=1");
}

?>
	
	
