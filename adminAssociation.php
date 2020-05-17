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
    include_once("Services/ServiceAssociation.php");
    include_once("DAO/DataAccessAssociation.php");		
    include __DIR__."/header.php";//NAVBAR

    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $infosAsso = $serviceAssociation->getAll();

?>
	<section class="MVIEW row justify-content-center paddingBotom">
				<div class="col-lg-10">
					<div class="row justify-content-center ">
						<h1 class="text-center mt-5 mb-5">L'association</h1>
					</div>
					<div class="row justify-content-center text-center ">
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="#"> Mon compte </a>
						<a class="col-6 border border-secondary p-3 text-decoration-none text-dark" href="adminListeAnimaux.php">Liste des animaux</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-12">
                            <div class="row mt-3">
                                <div class="col-12 p-0">
                                    <h6>Titre </h6> 
                                    <p class="admin-association" name="titre-association"><?php echo $infosAsso['titre']?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Chapô</h6>
                                    <p class="admin-association" name="chapo-association"><?php echo $infosAsso['chapo']?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Mission</h6>
                                    <p class="admin-association" name="mission-association"><?php echo $infosAsso['mission']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-auto col-12 offset-lg-1">
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Email</h6>
                                    <p class="admin-association" name="mail-association"><?php echo $infosAsso['mail']?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Facebook</h6>
                                    <p class="admin-association" name="facebook-association"><?php echo $infosAsso['facebook']?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Téléphone</h6>
                                    <p class="admin-association" name="telephone-association"><?php echo $infosAsso['telephone']?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Adresse</h6>
                                    <p class="admin-association" name="adresse-association"><?php echo $infosAsso['adresse']?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 p-0 text-break">
                                    <h6>Horaires</h6>
                                    <p class="admin-association m-0" name="jours-association"><?php echo $infosAsso['jours_ouverts']?></p>
                                    <p class="admin-association m-0" name="am-association"><?php echo $infosAsso['horaires_am']?></p>
                                    <p class="admin-association m-0" name="pm-association"><?php echo $infosAsso['horaires_pm']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			
	</section>


	<?php
		include __DIR__."/footer.php";
    
 } else {
     header("location:index.php");
 }
    ?>