<?php

include_once("Services/ServiceAssociation.php");
include_once("DAO/DataAccessAssociation.php");

if(isset($_POST["edit-titre-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedTitre = $serviceAssociation->editTitre($_POST["titre"]);

    echo $updatedTitre;
}

if(isset($_POST["edit-chapo-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedChapo = $serviceAssociation->editChapo($_POST["chapo"]);

    echo $updatedChapo;
}

if(isset($_POST["edit-mission-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedMission = $serviceAssociation->editMission($_POST["mission"]);

    echo $updatedMission;
}

if(isset($_POST["edit-mail-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedMail = $serviceAssociation->editMail($_POST["mail"]);

    echo $updatedMail;
}

if(isset($_POST["edit-facebook-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedFacebook = $serviceAssociation->editFacebook($_POST["facebook"]);

    echo $updatedFacebook;
}

if(isset($_POST["edit-telephone-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedTelephone = $serviceAssociation->editTelephone($_POST["telephone"]);

    echo $updatedTelephone;
}

if(isset($_POST["edit-adresse-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedAdresse = $serviceAssociation->editAdresse($_POST["adresse"]);

    echo $updatedAdresse;
}

if(isset($_POST["edit-jours-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedJours = $serviceAssociation->editJours($_POST["jours"]);

    echo $updatedJours;
}

if(isset($_POST["edit-am-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedAm = $serviceAssociation->editAm($_POST["am"]);

    echo $updatedAm;
}

if(isset($_POST["edit-pm-association"])) {
    $dAOAssociation = new DataAccessAssociation();
    $serviceAssociation = new ServiceAssociation($dAOAssociation);
    $updatedPm = $serviceAssociation->editPm($_POST["pm"]);

    echo $updatedPm;
}

?>