<?php 
$connected=false;
$admin=false;
session_start();
if(isset($_SESSION["emailutilisateur"])) {
	$connected=true;
	include_once("DAO/DataAccessUtilisateur.php");
	include_once("Services/ServiceUtilisateur.php");
	$daoSession = new DataAccessUtilisateur();
	$session = new ServiceUtilisateur($daoSession);
	if($session->selectGradeOf($_SESSION["emailutilisateur"]) == "admin") {
		$admin = true;
	} 
}


include_once("pSmQaL.php");
//include "DAO/ConectSql.php";
include_once("DAO/DataAccessActu.php");
include_once("DAO/DataAccessPrevention.php");
include_once("DAO/DataAccessStatistiques.php");
include_once("DAO/DataAccessAnimaux.php");
include_once("DAO/DataAccessTemoignages.php");
include_once("DAO/DataAccessAdoption.php");
include_once("DAO/DataAccessAssociation.php");
include_once("DAO/DataAccessUtilisateur.php");
include_once("Services/ServiceActu.php");
include_once("Services/ServicePrevention.php");
include_once("Services/ServiceStatistiques.php");
include_once("Services/ServiceAnimaux.php");
include_once("Services/ServiceTemoignages.php");
include_once("Services/ServiceUtilisateur.php");
include_once("Services/ServiceAdoption.php");
include_once("Services/ServiceAssociation.php");
include_once("fonctions/fonctions.php");



if($_POST) {
	if(isset($_POST["deconnexion"])) {
		session_destroy();
		header("location: index.php");
	}
}
	
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
  <!--  <link rel="stylesheet" type="text/css" href="api-pack.min.css" />
	<script type="text/javascript" src="api-pack.min.js"></script>-->
	<script src="https://kit.fontawesome.com/c24fee648d.js" crossorigin="anonymous"></script>
    <title>Adopte un animal</title>
  </head>
  <body>
    <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<!-- Optional JavaScript -->
	
	<div class="container-fluid container-size min-vh-100">



		<header class="row bg-secondary sticky-top fixed-top headbar">
			<div class="col-3  d-none d-sm-block">
				<div class="row align-items-center h-100  justify-content-center">
					<img src="IMG/logoMini.png" Alt="Adopte un animal"/>
				</div>
			</div>
			<div class="col-9">
				<div class="row d-none d-sm-block w-100">
					<div class="col-12">
						<!-- OPTION DORMANTE - POUR PLUS TARD
						<form class="form-inline my-0 my-lg-0">
							<div class="input-group input-group-sm mt-2 ml-2">
							<input type="search" placeholder="Search" id="search" aria-label="Search" />
							<button hidden type="submit">Search</button>
							</div>
						</form>-->
					</div>
				</div>
				<div class="row">
					<nav class="navbar navbar-expand-lg navbar-dark bg-secondary w-100">
						<a class="navbar-brand d-block d-sm-none" href="index.php"><img src="IMG/logoMini.png" Alt="Adopte un animal"/></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarText">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active">
						
									<a class="nav-link" href="index.php">Accueil</a>
								</li>
								<li class="nav-item">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adopter</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="adopter.php">Animaux à l'adoption</a>
										<a class="dropdown-item" href="sePreparer.php">Conseils pour l'adoption</a>
										<a class="dropdown-item" href="sePreparer.php#temoignages">Ils ont trouvé leur famille</a>
									</div>
								</li>
									<a class="nav-link" href="association.php">L'association</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nous aider</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<!-- LINKS ANCRES A PLACER ROMAIN -->
										<a class="dropdown-item" href="nous_aider.php#dons">Faire un Don</a>
										<a class="dropdown-item" href="nous_aider.php#adhesions">Adhérer</a>
										<a class="dropdown-item" href="nous_aider.php#legs">Faire un Legs</a>
										<a class="dropdown-item" href="benevoles.php">Devenir bénévole</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="benevoles.php?choice=2#ancre">Devenir famille d'accueil</a>
										<a class="dropdown-item" href="benevoles.php?choice=4#ancre">Suivis d'adoption</a>
										<a class="dropdown-item" href="benevoles.php?choice=1#ancre">Aider au refuge</a>
										<a class="dropdown-item" href="benevoles.php?choice=3#ancre">Participer aux collectes</a>
									</div>
								</li>
								<?php if($connected  && $admin) {
											 displayHeaderAdminDrop();
										  }  
									?>
							</ul>
							<span class="navbar-text">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item dropdown">
									<?php if($connected) {
											  displayHeaderFormConnected();
										  } 
										  else {
											  displayHeaderFormDisconnected();
										  }	  
									?>
								</li>
							</ul>
							</span>
						</div>
					</nav>
				</div>
			
		
			</div>
		</header>
		
