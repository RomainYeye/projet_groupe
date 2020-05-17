<?php		
$temoignage = new ServiceTemoignages();
$temoignageIndex = $temoignage->getIndexAllowed();
if($temoignageIndex) {
	echo'
		<section class="row justify-content-between borderBotom">
			<div class="col-lg-5">
				<h1 class="mt-5 ml-5">'.$temoignageIndex["nom_animal_temoignage"].'</h1>
				<h5 class="ml-5">Adopté le '.$temoignageIndex["date_adoption"].' par ' . $temoignageIndex["prenom"] . '</h5>
						<p class="mt-5 ml-5">"'.$temoignageIndex["message_temoignage"].'"</p>
			</div>
			<div class="col-lg-6 pr-0 pl-0">
				'.renderImage($temoignageIndex["photo_animal"]).'
			</div>
		</section>';
}
?>
		
