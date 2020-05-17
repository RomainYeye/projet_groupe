		<section class="row justify-content-around borderBotom paddingBotom  d-none d-sm-block" id="urgences">
			<h1 class="text-center mt-5">Animaux en urgence d'adoption</h1>
			<div id="carouselDURG" class="text-dark carousel slide w-100 mt-5 mb-5" data-ride="carousel">
				<div class="carousel-inner">
				
				<div class="carousel-item active">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<div class="row justify-content-center mb-5 TuileUrgence-slide w-100">
								<?php		
								$dAOAnimal = new DataAccessAnimaux();
								$arrivants = new ServiceAnimaux($dAOAnimal);
								$offset = "Where urgence_animal='1' and id_animal not in (select id_animal from adoption) ORDER BY id_animal DESC LIMIT 2 OFFSET 0";
								$cnt = 2;
								$style = "radius-all";
								$lastFirst = $arrivants->getCarouselIndex($offset);
								foreach($lastFirst as $key) {
									echo '	<div class="col-3 TuileUrgence offset-1 w-100 px-0">
									<a href="fiche_animal.php?animal='.$key["id_animal"].'" class="tip">
												<span>'.$key["nom_animal"].' est un '.$key["race"].' de '.$key["age_animal"].' ans qui est arrivé chez nous le '.$key["date_entree"].'</span>								
												'.renderImage($key["photo_animal"], $style).'					
											</a></div>';
								}
								?>
								</div>
								<div class="row justify-content-center mb-5 TuileUrgence-slide w-100 ">
								<?php
								$offset = "Where urgence_animal='1' and id_animal not in (select id_animal from adoption) ORDER BY id_animal DESC LIMIT 2 OFFSET $cnt";
								$cnt += 2;
								$style = "radius-all";
								$lastFirst = $arrivants->getCarouselIndex($offset);
								foreach($lastFirst as $key) {
									echo '	<div class="col-3 TuileUrgence offset-1 w-100 px-0">
									<a href="fiche_animal.php?animal='.$key["id_animal"].'" class="tip">
												<span>'.$key["nom_animal"].' est un '.$key["race"].' de '.$key["age_animal"].' ans qui est arrivé chez nous le '.$key["date_entree"].'</span>								
												'.renderImage($key["photo_animal"], $style).'						
											</a></div>';
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<?php
					while ($cnt < 12) {	
						echo'<div class="carousel-item">
								<div class="row justify-content-center">
									<div class="col-lg-8">
										<div class="row justify-content-center mb-5 TuileUrgence-slide w-100">';
					$offset = "Where urgence_animal='1' ORDER BY id_animal DESC LIMIT 2 OFFSET $cnt";
					$cnt += 2;
					$style = "radius-all";
					$lastFirst = $arrivants->getCarouselIndex($offset);
					foreach($lastFirst as $key) {
						echo '<div class="col-3 TuileUrgence offset-1 w-100 px-0">
						<a href="fiche_animal.php?animal='.$key["id_animal"].'" class="tip">
								<span>'.$key["nom_animal"].' est un '.$key["race"].' de '.$key["age_animal"].' ans qui est arrivé chez nous le '.$key["date_entree"].'</span>								
								'.renderImage($key["photo_animal"], $style).'						
							</a></div>';
					}
					?>
					</div>
					<div class="row justify-content-center mb-5 TuileUrgence-slide w-100 ">
					<?php
					$offset = "Where urgence_animal='1' and id_animal not in (select id_animal from adoption) ORDER BY id_animal DESC LIMIT 2 OFFSET $cnt";
					$cnt += 2;
					$style = "radius-all";
					$lastFirst = $arrivants->getCarouselIndex($offset);
					foreach($lastFirst as $key) {
						echo '	<div class="col-3 TuileUrgence offset-1 w-100 px-0">
						<a href="fiche_animal.php?animal='.$key["id_animal"].'" class="tip">
									<span>'.$key["nom_animal"].' est un '.$key["race"].' de '.$key["age_animal"].' ans qui est arrivé chez nous le '.$key["date_entree"].'</span>								
									'.renderImage($key["photo_animal"], $style).'						
								</a></div>';
					}
					?>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>	
					</div>
					<a class="carousel-control-prev" href="#carouselDURG" role="button" data-slide="prev">
						<span class="carousel2-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselDURG" role="button" data-slide="next">
						<span class="carousel2-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
		
				
			
		</section>
		<!-- mobile version-->
		<section class="row justify-content-around borderBotom paddingBotom  inline-block d-sm-none">
			<h1 class="text-center mt-5">Animaux en urgence d'adoption</h1>
			<div id="carouselDURG" class="text-dark carousel slide w-100 mt-5 mb-5" data-ride="carousel"  data-interval="3000">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<div class="row justify-content-center mb-5 TuileUrgence-slide w-100">
								<?php	
									$dAOAnimal = new DataAccessAnimaux();
									$arrivants = new ServiceAnimaux($dAOAnimal);
									$offset = "Where urgence_animal='1' and id_animal not in (select id_animal from adoption) ORDER BY id_animal DESC LIMIT 1 OFFSET 0";
									$cnt = 1;
									$style = "radius-all";
									$lastFirst = $arrivants->getCarouselIndex($offset);
									foreach($lastFirst as $key) {
										echo '<div class="col-8 TuileUrgence offset-1 w-100 px-0">
												<a href="'.$key["id_animal"].'">
												'.renderImage($key["photo_animal"], $style).'							
											</a></div>';
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<?php
					while ($cnt < 12) {	
						echo'<div class="carousel-item">
						<div class="row justify-content-center">
							<div class="col-lg-8">
								<div class="row justify-content-center mb-5 TuileUrgence-slide w-100">';
								
					//$arrivants = new ServiceAnimaux();
					$offset = "Where urgence_animal='1' and id_animal not in (select id_animal from adoption) ORDER BY id_animal DESC LIMIT 1 OFFSET $cnt";
					$cnt += 1;
					$lastFirst = $arrivants->getCarouselIndex($offset);
					$style = "radius-all";
					foreach($lastFirst as $key) {
						echo '<div class="col-8 TuileUrgence offset-1 w-100 px-0">
								<a href="'.$key["id_animal"].'">
								'.renderImage($key["photo_animal"], $style).'
								</a>							
							</div>';
					}
					?>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>	
				</div>
			</div>
		</section>
		
