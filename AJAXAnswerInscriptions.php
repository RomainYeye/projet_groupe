<?php

include_once("Model/Utilisateur.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");

if(isset($_POST["post-inscription"])) {
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $user=Utilisateur::buildUtilisateur($_POST);
    $serviceUtilisateur->add($user);
    session_start();
    $_SESSION["emailutilisateur"]=$_POST["mail"];
    echo true;
}

if(isset($_GET["checkMail"])) {
    $mail=$_GET["checkMail"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $bool=$serviceUtilisateur->checkIfMailAlreadyUsed($mail);

    echo $bool;
}