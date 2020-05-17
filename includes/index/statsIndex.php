		<section class="row justify-content-around borderBotom mt-5 paddingBotom"  id="stats">
			<?php
			$statistiques = new ServiceStatistiques();
			$statsIndex = $statistiques->getIndex(4);
			foreach($statsIndex as $key) {
				echo '<div class="col-lg-2 text-center m-3">
				<span class="h1">'.$key["chiffres_statistique"].'</span><br />
				<span class="p">'.$key["nom_statistique"].'</span>
				</div>';
			}
	        ?>
		</section>
		
		
