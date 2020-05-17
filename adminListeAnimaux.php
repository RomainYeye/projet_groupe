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
		 include __DIR__."/header.php";//NAVBAR
	?>
	<section class="MVIEW row justify-content-center paddingBotom borderBotom ">
				<div class="col-lg-10">
					<div class="row justify-content-center ">
						<h1 class="text-center mt-5 mb-5">Liste des animaux</h1>
					</div>
					<div class="row justify-content-center text-center ">
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="monCompte.php"> Mon compte </a>
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="adminListeAnimaux.php">Administration des animaux</a>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 p-0">
						<div class="input-group input-group-sm">
								<input type="search" placeholder="Recherche par nom" id="searchAnimaux" class="border border-secondary mt-3" aria-label="Search" />
							</div>
						</div>
					</div>
					<div class="row justify-content-left">
						<div class="col-1 mt-3 p-0 ml-0">
							<form action="" id="addAnimalForm" name="addAnimalForm" method="post">
								<button type="submit" id="addAnimal" name="addAnimal" class="btn btn-secondary" value="addAnimal">+</button>
							</form>
						</div>
					</div>
					<div class="row justify-content-md-center" id="tableauAnimauxAdmin">

					</div>				
								
									
				</div>
		</section>
<section class="row justify-content-center paddingBotom">
	<div class="col-lg-10">
		<div class="row justify-content-center ">
			<h1 class="text-center mt-5">Gestion des adoptions</h1>
		</div>
		<div class="row justify-content-center ">
			<h6 class="mb-5">Espace de gestion des animaux adoptés. Créer un compte à l'adoptant pour enregistrer l'adoption.</h6>
		</div>

		<div class="row justify-content-center" id="gestionAdoption">
			<div class="col-3 ">	
				<input type="text" id="animauxListSearch" name="animauxListSearch" placeholder="Chercher un animal">
				<div class="row">
					<div class="col-7 m-3" hidden id="animauxListResults">
						
					</div>
				</div>
			</div>
			<div class="col-2">
				<h6 id="phraseAdoption">Adopté(e) ce jour par Mme/M :</h6>
			</div>
			<div class="col-3">
			<input type="text" id="usersListSearch" name="usersListSearch" placeholder="Chercher un adoptant">
				<div class="row">
					<div class="col-7 m-3" hidden id="userListSearch">
		
					
					</div>
				</div>
	 		</div>
		</div>	

		<div class="row justify-content-center">
			<div class="col-1"><button class="btn btn-warning" hidden id="resetAdoption">Reset</button></div>
			<div class="col-1"><button class="btn btn-success" hidden id="validerAdoption">Valider</button></div>
		</div>

	</div>
</section>

	<?php
		include __DIR__."/footer.php";
	} else {
		header("location:index.php");
	}
	?>
	
	
	