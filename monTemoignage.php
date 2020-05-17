	<?php
		session_start();
		if(!isset($_SESSION["emailutilisateur"])) {
			session_destroy();
			header("location: index.php");
		} else {
			session_abort();
		}
		include __DIR__."/header.php";//NAVBAR

		$dAOUtilisateur = new DataAccessUtilisateur();
		$serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);
		$dAOAdoption = new DataAccessAdoption();
		$serviceAdoption = new ServiceAdoption($dAOAdoption);

		$idUtilisateur = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
		$data = $serviceAdoption->adoptedByUtilisateur($idUtilisateur);

	?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10">
					<div class="row justify-content-center ">
						<h1 class="text-center mt-5 mb-5">Mon témoignage</h1>
					</div>
					<div class="row justify-content-center text-center ">
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="mesFavoris.php">Mes favoris </a>
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="monCompte.php">Mon compte</a>
					</div>
					<div class="row justify-content-center w-100">
						<div class="col-lg-12 p-0 text-center mt-3" id="affichage-temoignage-parent">
							<!-- 16 -->
							<div id="affichage-temoignage">

								<?php 
								
								if($data) {
									echo ' 
										<form action="" id="AddTemoignageForm" name="AddTemoignageForm" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-4">
													<select class="form-control form-control-sm" id="select-animal-adopte" name="animal-adopte">
														
													</select>
													<div class="row">
														<div class="col-auto">
															<div class="custom-file mt-3">
																<input type="file" class="custom-file-input" id="photo_adoption" name="photo_adoption" accept="image/png, image/jpeg" required />
																<label class="custom-file-label text-left auto" for="photo_adoption" >Une jolie photo</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<textarea class="form-control mt-3 w-100" id="texte_prevention" placeholder="Votre témoignage" name="texte_temoignage" minlength="50" maxlength="1500" ></textarea>
											<button type="submit" id="add-temoignage" name="add-temoignage" class="btn btn-primary btn-sm mt-3" value="AddTemoignage">Envoyer</button>
											<input type="hidden" name="add-temoignage"/>
										</form>';
								} else {
									echo '
										<div class="alert alert-warning" role="alert">
											Vous n\'avez jamais adopté d\'animal chez nous.
										</div>';
								}

								?>  

							</div>
						</div>
					</div>
				
				</div>
			
		</section>


	<?php
		include __DIR__."/footer.php";
	?>
	
	
