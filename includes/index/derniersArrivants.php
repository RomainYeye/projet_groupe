<?php
include_once("Services/ServiceFavori.php");
include_once("DAO/DataAccessFavori.php");

if(isset($_SESSION["emailutilisateur"])) {
	$dAOUtilisateur = new DataAccessUtilisateur();
	$serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);

    $idUtilisateur = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
}
?>

<section class="row justify-content-center borderBotom paddingBotom slide d-none d-sm-block" id="Last">
			<div class="col">
				<h1 class="text-center mt-5">Derniers arrivants</h1>
				<!--carousel LG-->
				<div id="carouselDA" class=" col-12 text-dark carousel  w-100" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row justify-content-center">
							<div class="col-9">
								<div class="row justify-content-around miniprofil-slide mt-5 mb-2">
								<?php
									$dAOAnimal = new DataAccessAnimaux();
									$arrivants = new ServiceAnimaux($dAOAnimal);
									$dAOFavori = new DataAccessFavori();
									$serviceFavori = new ServiceFavori($dAOFavori);
									$offset = "ORDER BY id_animal DESC LIMIT 3 OFFSET 0";
									$cnt = 3;
									$style = "radius-top";
									$lastFirst = $arrivants->getCarouselIndex($offset);
									foreach($lastFirst as $key) {
										$key["age_animal"] < 2 ? $anOrAns = "an" : $anOrAns = "ans";
										$iClass = "far fa-heart fa-2x";
										if(isset($_SESSION["emailutilisateur"])) {
											if($serviceFavori->isFav($key["id_animal"], $idUtilisateur)) {
												$iClass = "fas fa-heart fa-2x";
											}
										}
										echo '	<div class="col-3 miniprofil">
										<a class="linkMP" href="fiche_animal.php?animal='.$key["id_animal"].'">
													<div class="row">
														<div class="col-12 miniprofil-div-photo">
															'.renderImage($key["photo_animal"], $style).'
														</div>
													</div>
												<div class="row ">
													<div class="col-12 miniprofil-infos">
														<h4>'.$key["nom_animal"].'</h4>
														Sexe : '.$key["sexe_animal"].'<br />
														Âge : '.$key["age_animal"].' ' . $anOrAns . '<br />
														Race : '.$key["race"].'<br /><br />
														Description : '.$key["description_animal"].'
													</div>
												</div>	</a>
											<div id="fav"><span class="fav" data-idanimal="' . $key["id_animal"] . '"><a href="" class="favLink"><i class="' . $iClass . '" ></i></a></span></div>					
											</div>	';
										}
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
					while($cnt <= 9) {
					?>
					<div class="carousel-item">
						<div class="row justify-content-center">
							<div class="col-9">
								<div class="row justify-content-around miniprofil-slide mt-5 mb-2">				
									<?php									
										$offset = "ORDER BY id_animal DESC LIMIT 3 OFFSET $cnt";
										$cnt += 3;
										$lastFirst = $arrivants->getCarouselIndex($offset);
										$style = "radius-top";
										foreach($lastFirst as $key) {
											$key["age_animal"] < 2 ? $anOrAns = "an" : $anOrAns = "ans";
											$iClass = "far fa-heart fa-2x";
											if(isset($_SESSION["emailutilisateur"])) {
												if($serviceFavori->isFav($key["id_animal"], $idUtilisateur)) {
													$iClass = "fas fa-heart fa-2x";
												}
											}
											echo '	<div class="col-3 miniprofil">
												<a class="linkMP" href="fiche_animal.php?animal='.$key["id_animal"].'">
														<div class="row">
															<div class="col-12 miniprofil-div-photo">
																'.renderImage($key["photo_animal"], $style).'
															</div>
														</div>
														<div class="row ">
															<div class="col-12 miniprofil-infos">
															
																<h4>'.$key["nom_animal"].'</h4>
																Sexe : '.$key["sexe_animal"].'<br />
																Âge : '.$key["age_animal"].' ' . $anOrAns .'<br />
																Race : '.$key["race"].'<br /><br />
																Description : '.$key["description_animal"].'
															</div>
														</div></a>	
													<div id="fav"><span class="fav" data-idanimal="' . $key["id_animal"] . '"><a href="" class="favLink"><i class="' . $iClass . '" ></i></a></span></div>		
													</div>	';
										}
									?>
						
                        		</div>
							</div>
						</div>
					</div>
					
					<div class="modal" style="display: none">
						<div class="modal_contents">
							<div class="modal_close-bar">
								<span><i class="fas fa-times"></i></span>
							</div>
							Vous devez être connecté pour ajouter des favoris.
						</div>
					</div>
						
					<?php
					}
					?>
					</div>
						<!-- POSENT PROBLEMES, APPARAISSENT SUR LE CAROUSSEL DE PREVENTION (ANCIEN CAROUSSEL ACTU)
						<a class="carousel-control-prev" href="#carouselDA" role="button" data-slide="prev">
							<span class="carousel2-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselDA" role="button" data-slide="next">
							<span class="carousel2-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>-->
					</div>
					</div>
		</section>
<!-- new carousel xq -->
		<section class="row borderBotom paddingBotom inline-block d-sm-none">
            <div class="col">
				<h1 class="text-center mt-5">Derniers arrivants</h1>
					<div id="carouselDA" class=" col-12 text-dark carousel  slide  w-100" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row justify-content-around mt-5 mb-2">
                                         <?php
										 	$dAOAnimal = new DataAccessAnimaux();
											$arrivants = new ServiceAnimaux($dAOAnimal);
											$style = "radius-top";
											$offset = "ORDER BY id_animal DESC LIMIT 1 OFFSET 0";
											$cnt = 1;
											$lastFirst = $arrivants->getCarouselIndex($offset);
											foreach($lastFirst as $key) {
												$key["age_animal"] < 2 ? $anOrAns = "an" : $anOrAns = "ans";
												$iClass = "far fa-heart fa-2x";
												if(isset($_SESSION["emailutilisateur"])) {
													if($serviceFavori->isFav($key["id_animal"], $idUtilisateur)) {
														$iClass = "fas fa-heart fa-2x";
													}
												}
												echo '	<div class="col-9 miniprofil">
												<a class="linkMP" href="fiche_animal.php?animal='.$key["id_animal"].'">
															<div class="row">
																<div class="col-12 miniprofil-div-photo">
																	'.renderImage($key["photo_animal"], $style).'
																</div>
															</div>
															<div class="row ">
																<div class="col-12 miniprofil-infos">
																
																	<h4>'.$key["nom_animal"].'</h4>
																	Sexe : '.$key["sexe_animal"].'<br />
																	Âge : '.$key["age_animal"].' ' . $anOrAns . '<br />
																	Race : '.$key["race"].'<br /><br />
																	Description : '.$key["description_animal"].'
																</div>
															</div></a>	
															<div id="fav"><span class="fav" data-idanimal="' . $key["id_animal"] . '"><a href="" class="favLink"><i class="' . $iClass . '" ></i></a></span></div>	
														</div>	';
											}
                                         ?>
                                        </div>
                                    </div>
                                </div>
							</div>
							<?php
								$dAOAnimal = new DataAccessAnimaux();
								$arrivants = new ServiceAnimaux($dAOAnimal);
								$offset = "ORDER BY id_animal DESC LIMIT 12 OFFSET 1";
								$cnt = 1;
								$style = "radius-top";
								$lastFirst = $arrivants->getCarouselIndex($offset);
								foreach($lastFirst as $key) {
									$key["age_animal"] < 2 ? $anOrAns = "an" : $anOrAns = "ans";
									$iClass = "far fa-heart fa-2x";
									if(isset($_SESSION["emailutilisateur"])) {
										if($serviceFavori->isFav($key["id_animal"], $idUtilisateur)) {
											$iClass = "fas fa-heart fa-2x";
										}
									}
									echo '<div class="carousel-item">
											<div class="row justify-content-center">
												<div class="col-12">
													<div class="row justify-content-around mt-5 mb-2">
														<div class="col-9 miniprofil">
														<a class="linkMP" href="fiche_animal.php?animal='.$key["id_animal"].'">
															<div class="row">
																<div class="col-12 miniprofil-div-photo">
																	'.renderImage($key["photo_animal"], $style).'
																</div>
															</div>
															<div class="row ">
																<div class="col-12 miniprofil-infos">
																<a href="fiche_animal.php?animal='.$key["id_animal"].'">Lire plus ...</a>
																	<h4>'.$key["nom_animal"].'</h4>
																	Sexe : '.$key["sexe_animal"].'<br />
																	Âge : '.$key["age_animal"].' ' . $anOrAns . '<br />
																	Race : '.$key["race"].'<br /><br />
																	Description : '.$key["description_animal"].'
																</div>
															</div></a>	
															<div id="fav"><span class="fav" data-idanimal="' . $key["id_animal"] . '"><a href="" class="favLink"><i class="' . $iClass . '" ></i></a></span></div>	
														</div>	
													</div>
												</div>
											</div>
										</div>';
								}
                            ?>
                            </div>
                    	</div>
					</section>