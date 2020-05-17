	<?php
	$connected=false;
	$admin=false;
	session_start();
	if(isset($_SESSION["emailutilisateur"])) {
		include_once("DAO/DataAccessUtilisateur.php");
		include_once("Services/ServiceUtilisateur.php");
		$connected=true;
		$daoSession = new DataAccessUtilisateur();
		$session = new ServiceUtilisateur($daoSession);
		if($session->selectGradeOf($_SESSION["emailutilisateur"]) == "admin") {
			$admin = true;
		} 
	
	}
	 if($connected  && $admin) {
		session_abort();
		include __DIR__."/header.php";
	?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10">
					<div class="row justify-content-center ">
						<h1 class="text-center mt-5 mb-5">Liste des Temoignages</h1>
					</div>
					<div class="row justify-content-center text-center ">
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="monCompte.php"> Mon compte </a>
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="adminListeAnimaux.php">Administration des animaux</a>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 p-0">
							<div class="input-group input-group-sm">
								<input type="search" placeholder="Recherche par message" id="searchTemoignages" class="border border-secondary mt-3" aria-label="Search" />
							</div>
						</div>
					</div>
					
					<?php
							$pageActuelle = (isset($_GET["page"]))?intval($_GET["page"]):1;
							echo '<div class="row justify-content-md-center" id="tableauTemoignageAdmin">';
							?>
					<!-- debut tableau-->
					

						<!-- debut du tableau a decouper -->

			

						<!--fin tableau a decouper-->
					</div>
					
					</div>
				
					<!--fin tableau-->				
				</div>
			
		</section>


	<?php
		include __DIR__."/footer.php";
	} else {
		header("location:index.php");
	}
	?>
	
	
