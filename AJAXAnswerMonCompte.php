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

if(isset($_POST["controlEmailAndPass"])) {
    $mail=$_POST["searchedEmail"];
    $pass=$_POST["searchedPass"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $mailStatus=$serviceUtilisateur->checkIfMailAlreadyUsed($mail);
    $passStatus=$serviceUtilisateur->passVerify($mail, $pass);

    $array=[$mailStatus, $passStatus];
    $json=json_encode($array);
    echo $json;

    if($mailStatus==true && $passStatus==true) {
        session_start();
        $_SESSION["emailutilisateur"] = $mail;
    }
}

if(isset($_GET["controlPass"])) {
    $mail=$_GET["email"];
    $pass=$_GET["givenPass"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $passStatus=$serviceUtilisateur->passVerify($mail, $pass);

    echo $passStatus;
}

if(isset($_POST["edit-tel"])) {
    $email=$_POST["mail"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $telephone=$serviceUtilisateur->editTelephone($_POST["telephone"], $email);

    echo $telephone;
}

if(isset($_POST["edit-adresse"])) {
    $email=$_POST["mail"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $arrayAdresse=$serviceUtilisateur->editAdresse($_POST, $email);
}

if(isset($_POST["edit-mail"])) {
    $newMail=$_POST["new-mail"];
    $currentMail=$_POST["current-mail"];
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $newMail=$serviceUtilisateur->editMail($newMail, $currentMail);
    session_start();
    $_SESSION["emailutilisateur"]=$newMail;

    echo $newMail;
}

if(isset($_POST["edit-password"])) {
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $serviceUtilisateur->editPassword($_POST["new-pass-confirmed"], $_POST["mail"]);
}

if(isset($_GET["telOf"])) {
    $dAOUtilisateur=new DataAccessUtilisateur();
    $serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
    $telephone=$serviceUtilisateur->selectTelOf($_GET["telOf"]);

    echo $telephone;
}

?>