<?php

include_once("Services/ServiceAssociation.php");
include_once("DAO/DataAccessAssociation.php");		
include __DIR__."/header.php";//NAVBAR

$dAOAssociation = new DataAccessAssociation();
$serviceAssociation = new ServiceAssociation($dAOAssociation);
$infosAsso = $serviceAssociation->getAll();

?>

<section class="row justify-content-center mt-5 borderBotom">
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-auto text-center">
                <h1><?php echo $infosAsso["titre"] ?></h1>
            </div>
        </div>
        <div class="row justify-content-left m-5">
            <div class="col-lg-10 text-justify">
                <p><?php echo $infosAsso["chapo"] ?></p>
            </div>
        </div>
</section>


<section class="row justify-content-between borderBotom">
			<div class="col-lg-5">
				
				<?php
					$temoignage = new ServiceTemoignages();
					$temoignageIndex = $temoignage->getIndex();
						echo '<h1 class="mt-5 ml-5">Notre mission</h1>
								<p class="mt-5 ml-5">'.$infosAsso["mission"].'</p>
								</div>
								<div class="col-lg-6 pr-0 pl-0">
									<img src="IMG/deux_chiens.jpg" class="photo-cover" alt="...">
								</div>';		
				?>
			</section>


<section class="row justify-content-around borderBotom paddingBotom">

<div class="col-12">
            <div class="row mt-5 mb-3 text-center">
                <div class="col-12">
                    <h1>L'association en chiffres</h1>
                </div> 
            </div>
        
        <div class="row justify-content-center">
            <?php
            $statistiques = new ServiceStatistiques();
            $statsIndex = $statistiques->getIndex(10);

			foreach($statsIndex as $key) {
				echo '<div class="col-lg-2 text-center m-3">
				<span class="h1">'.$key["chiffres_statistique"].'</span><br />
				<span class="p">'.$key["nom_statistique"].'</span>
				</div>';
			}
	        
            ?>
</div>
</section>


<?php

include __DIR__."/footer.php";

?>