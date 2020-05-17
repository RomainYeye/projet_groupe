<?php

include_once("Services/ServiceTemoignages.php");
include_once("DAO/DataAccessTemoignages.php");
include_once("Model/Temoignage.php");
include_once("Services/ServiceAdoption.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessAdoption.php");
include_once("DAO/DataAccessUtilisateur.php");

if(isset($_POST["add-temoignage"])) {
    session_start();
    $dAOUtilisateur = new DataAccessUtilisateur();
    $serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);
    $dAOAdoption = new DataAccessAdoption();
    $serviceAdoption = new ServiceAdoption($dAOAdoption);
    $serviceTemoignage = new ServiceTemoignages();

    $idUtilisateur = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
    $dateAdoption = $serviceAdoption->findDateOfAdoption($idUtilisateur, $_POST["animal-adopte"]);
    $temoignage = Temoignage::buildTemoignage($_POST, $dateAdoption, $idUtilisateur);
    $temoignage->setPhotoAnimal(file_get_contents($_FILES['photo_adoption']['tmp_name']));
    $serviceTemoignage->add($temoignage);

    echo true;
}

?>