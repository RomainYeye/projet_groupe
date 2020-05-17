<?php

include_once("Model/Favori.php");
include_once("Services/ServiceFavori.php");
include_once("DAO/DataAccessFavori.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");

session_start();

if(isset($_GET["is-connected"])) {
    if(isset($_SESSION["emailutilisateur"])) {
        echo "connected";
    } else {
        echo "not connected";
    }
}

if(isset($_POST["add-favori"])) {
    $dAOUtilisateur = new DataAccessUtilisateur();
    $serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);
    $dAOFavori = new DataAccessFavori();
    $serviceFavori = new ServiceFavori($dAOFavori);

    $idUser = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
    $idAnimal = $_POST["id-animal"];
    $favori = Favori::buildFavori(["id_animal" => $idAnimal, "id_utilisateur" => $idUser]);
    $serviceFavori->add($favori);
}

if(isset($_POST["remove-favori"])) {
    $dAOUtilisateur = new DataAccessUtilisateur();
    $serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);
    $dAOFavori = new DataAccessFavori();
    $serviceFavori = new ServiceFavori($dAOFavori);

    $idUser = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
    $idAnimal = $_POST["id-animal"];
    $favori = Favori::buildFavori(["id_animal" => $idAnimal, "id_utilisateur" => $idUser]);
    $serviceFavori->remove($favori);

    $favs = $serviceFavori->findFavsOfUser($idUser);
    if(!$favs) {
        echo "noMoreFavs";
    }
}

?>