<?php

include_once("Model/Utilisateur.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");

if(isset($_GET["checkMail"])) {
    $mail=$_GET["checkMail"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $mailAlreadyUsed=$serviceUtilisateur->checkIfMailAlreadyUsed($mail);

    echo $mailAlreadyUsed;
}

if(isset($_POST["reset-pass"])) {
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $newPass = $serviceUtilisateur->generateRandomString(8);
    $serviceUtilisateur->editPassword($newPass, $_POST["mail"]);
    
    $to=$_POST["mail"];
    $subject = "Réinitialisation de votre mot de passe";
    $message = "Votre nouveau mot de passe est le suivant : $newPass.";
    $headers = "From: adopteunanimal.asso.@gmail.com";
    
    mail(
        $to,
        $subject,
        $message,
        $headers
    );

    echo "resetPass";
}