<?php

include_once("Services/ServiceFavori.php");
include_once("DAO/DataAccessFavori.php");

session_start();
if(!isset($_SESSION["emailutilisateur"])) {
	session_destroy();
    header("location: index.php");
} else {
	session_abort();
}

include_once("header.php");//NAVBAR

?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10">

					<div class="row justify-content-center">
						<h1 class="text-center mt-5 mb-5">Mon compte</h1>
					</div>
					<div class="row justify-content-center text-center ">
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="mesFavoris.php">Mes favoris </a>
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="monTemoignage.php">Mon Témoignage</a>
					</div>
					<div id="display-favs">

					</div>
                    
				</div>
		</section>

<?php
	include("footer.php");
?>
	