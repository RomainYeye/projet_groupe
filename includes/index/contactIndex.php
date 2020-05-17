		<section class="row justify-content-center borderBotom paddingBotom" id="contact">
				<div class="col-lg-10">
					<div class="row justify-content-center">
						<h1 class="text-center mt-5 mb-5">Contact</h1>
					</div>
					<div class="row justify-content-center TuileUrgence-slide">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1263.7196767792166!2d3.1575257148635396!3d50.69323095179824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1582033147037!5m2!1sfr!2sfr" width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="row mt-5">
								<div class="col-lg-6" id="nousEcrire">
									<h5>Nous écrire</h5>
									<?php
									$dAOAssociation = new DataAccessAssociation();
									$serviceAssociation = new ServiceAssociation($dAOAssociation);
									$data = $serviceAssociation->getAll();
									
									echo'<form id="contactForm" method="post" action="">
										<input id="nomContact" name="nom" type="text" class="form-control mt-3" placeholder="Nom" />
										<div id="nom-feedback" class="invalid-feedback"></div>
										<input id="prenomContact" name="prenom" type="text" class="form-control mt-3" placeholder="Prénom" />
										<div id="prenom-feedback" class="invalid-feedback"></div>
										<input id="emailContact" name="email" type="email" class="form-control mt-3" placeholder="Votre@adresse.mail" />
										<div id="email-feedback" class="invalid-feedback"></div>
										<input id="sujetContact" name="sujet" type="text" class="form-control mt-3" placeholder="Sujet" />
										<div id="sujet-feedback" class="invalid-feedback"></div>
										<textarea id="messageContact" name="message" rows="6" class="form-control mt-3" placeholder="Message"></textarea>
										<div id="message-feedback" class="invalid-feedback"></div>
										<div class="row justify-content-center">
											<div class="col-12">
												<button id="contactBTN" name="contactBTN" type="submit" class="btn btn-primary mt-3">Envoyer</button>
											</div>	
										</div>
									</form>';
									?>
								</div>
								<div class="col-lg-6 text-center">
									<h5>Adresse</h5>
									<?php echo $data["adresse"] ?><br/>
									<br />
									<h5>Téléphone</h5>
									<?php echo $data["telephone"]?><br />
									<br />
									<h5>Horaires d'ouverture</h5>
									Du <?php echo $data["jours_ouverts"]?><br />
									de<br />
									<?php echo $data["horaires_am"] ?><br />
									et de<br /><?php echo $data["horaires_pm"] ?>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>
		
