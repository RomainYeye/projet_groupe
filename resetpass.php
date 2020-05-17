	<?php
		include __DIR__."/header.php";//NAVBAR
	?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10" id ="bloc-reset-pass">
					<div class="row justify-content-center">
						<h1 class="text-center mt-5 mb-5">Mot de passe oublié</h1>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<form method="post" action="form.php" name="resetpass" id="form-reset-pass">
								<div class="input-group mb-3" id="div-reset-pass">
									<input id="email-reset" type="email" class="form-control" maxlength="50" placeholder="Email" aria-label="Votre Email" required />
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">Nom.prenom@example.com</span>
									</div>
								</div>
														
						
								<div class="row justify-content-center">
									<div class="col-12">
										<button id="reset-pass-btn" name="reset-pass-btn" type="submit" class="btn btn-primary mb-2 w-100">Valider</button>
									</div>	
								</div>
							</form>
						</div>
					</div>
			
				</div>
			
		</section>


	<?php
		include __DIR__."/footer.php";
	?>
	
	
