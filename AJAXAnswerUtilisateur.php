<?php

include_once("Model/Utilisateur.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");

if(isset($_GET["idUser"])) {
    session_start();
    if(isset($_SESSION["emailutilisateur"])) {
        $dAOUtilisateur = new DataAccessUtilisateur();
        $serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);
        $idUtilisateur = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
        
        echo $idUtilisateur;
    }

}