	<?php
		include __DIR__."/header.php";//NAVBAR
		include("pSmQaL.php");
	?>
	<section class="MVIEW row justify-content-between borderBotom min-vh-100">
		<div class="col-lg-5">
				<?php
					if(!isset($_GET["t"]) || $_GET["t"] == "1") {
						echo '<h1 class="m-5">Se préparer à l\'adoption</h1>
				<p class="m-5">BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLAs
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA</p>';
					} elseif($_GET["t"] == "2") {
						echo '<h1 class="m-5">Pourquoi la stérilisation</h1>
				<p class="m-5">BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLAs
				BLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLABLA BLA</p>';
					}
				
				
				?>
				
			</div>
			<div class="col-lg-6 pr-0 pl-0">
				<img src="IMG/slide3.jpg" class="photo-cover" alt="...">
			</div>
	
	</section>
	<section class="row justify-content-center paddingBotom borderBotom w-100% mt-5" >
		<div class="col-lg-8">
			
			<!-- ici on pourrai faire un systeme qui fait varier les tuiles, les photo et les rubriques en fonction de la page ou l'on est -->
			<div class="row justify-content-around text-center">
				<a class="col-lg-5 border border-secondary tuile_benevoles text-decoration-none text-dark" href="?t=1">Se préparer à l'adoption</a>
				<a class="col-lg-5 border border-secondary tuile_benevoles tuiles_benevoles_photo" href=""><img src="IMG/slide2.jpg" class="photo-cover" alt="..."></a>
			</div>
			<div class="row justify-content-around text-center mt-5">
				<a class="col-lg-5 border border-secondary tuile_benevoles tuiles_benevoles_photo" href="#"><img src="IMG/slide4.jpg" class="photo-cover" alt="..."></a>
				<a class="col-lg-5 border border-secondary tuile_benevoles text-decoration-none text-dark" href="?t=2">Pourquoi la stérilisation</a>
			</div>
		</div>
	</section>
	<section class="row borderBotom paddingBotom min-vh-100" id="temoignages">
			<div class="col">
				<h1 class="text-center mt-5">Leurs témoignages</h1>
				<!--tentative carousel -->
				<div id="carouselDA" class=" col-12 text-dark carousel slide w-100" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row justify-content-center">
							<div class="col-9">
								<div class="row justify-content-around temoignage-slide mt-5 mb-2">

									<?php
									$temoignage = new ServiceTemoignages();
									$temoignageIndex = $temoignage->getIndexAllowed();
									if($temoignageIndex) {
										echo '  <div class="col-lg-8 miniprofil">
													<div class="row">
														<div class="col-12 temoignage-div-photo">
															'.renderImage($temoignageIndex["photo_animal"], "radius-top").'
														</div>
													</div>
													<div class="justify-content-left row miniprofil-info ">
														<div class="col-12">
															<h4>'.$temoignageIndex["nom_animal_temoignage"].'</h4>
															Adopté le : '.$temoignageIndex["date_adoption"].' par ' . $temoignageIndex["prenom"] . '
															<br /><br />
															"'.$temoignageIndex["message_temoignage"].'"
														</div>
													</div>									
												</div>	';
									}
									?>
								</div>
							</div>
						</div>
					</div>
									
									<?php
										$temoignage = new ServiceTemoignages();
										$temoignageIndex = $temoignage->getAllAllowed();
										if($temoignageIndex) {
											foreach($temoignageIndex as $temoignageI) {
												echo ' <div class="carousel-item">
															<div class="row justify-content-center">
																<div class="col-9">
																	<div class="row justify-content-around temoignage-slide mt-5 mb-2">
																		<div class="col-lg-8 miniprofil">
																			<div class="row">
																				<div class="col-12 temoignage-div-photo">
																					'.renderImage($temoignageI["photo_animal"], "radius-top").'
																				</div>
																			</div>
																			<div class="justify-content-left row miniprofil-info ">
																				<div class="col-12">
																					<h4>'.$temoignageI["nom_animal_temoignage"].'</h4>
																					Adopté le : '.$temoignageI["date_adoption"].' par ' . $temoignageI["prenom"] . '
																						
																					<br /><br />
																					"'.$temoignageI["message_temoignage"].'"
																				</div>
																			</div>									
																		</div>	
																	</div>
																</div>
															</div>
														</div>';
											}
										}
									?>
								
				
				
				</div>
				<a class="carousel-control-prev" href="#carouselDA" role="button" data-slide="prev">
					<span class="carousel2-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselDA" role="button" data-slide="next">
					<span class="carousel2-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
					
				
				
				
				
		
		</section>

	<?php
		include __DIR__."/footer.php";
	?>
	
	
