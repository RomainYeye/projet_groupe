		<section class="row borderBotom">
			<div id="carouselControls" class=" carousel-aua carousel slide carousel-fade w-100" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselControls" data-slide-to="0" class="active"></li>
									<?php
										$selectPrevention = new ServicePrevention();
										$prev = $selectPrevention->getId();
										//var_dump($actu);
										foreach ($prev as $key) {
											foreach ($key as $col => $value) {
												echo'<li data-target="#carouselControls" data-slide-to="'.$value.'"></li>';
											}
												
										}							
										?>
				</ol>
				<div class="carousel-aua carousel-inner">
					<div class="carousel-aua carousel-item active">
					<?php
						$firstPrev = $selectPrevention->getFirstPrev();
							echo'
								'. renderImage($firstPrev["photo_prevention"]). '
								<div class="carousel-caption caption mb-4" >
									<h5>'.$firstPrev["nom_prevention"].'</h5>
									<p class="description descarousel d-block d-sm-none">Lire</p>
									<article class="text-center mx-2 d-none d-sm-block">'.$firstPrev["texte_prevention"].'</article>
								</div>';
					?>
				</div>
					<?php
						$prevs = $selectPrevention->getPrevs();
						foreach ($prevs as $key) {
							echo '<div class="carousel-aua carousel-item">										
									'. renderImage($key["photo_prevention"]) .'
									<div class="carousel-caption caption mb-4" >
										<h5>'.$key["nom_prevention"].'</h5>
										<p class="description descarousel d-block d-sm-none">Lire</p>
										<article class="text-center mx-2 d-none d-sm-block">'.$key["texte_prevention"].'</article>
									</div>
								</div>';
						}
					?>
				</div>
				<a class="carousel-aua carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-aua carousel-control-next" href="#carouselControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
					
		</section>