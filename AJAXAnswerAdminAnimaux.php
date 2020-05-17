<?php

include_once("Model/Espece.php");
include_once("Services/ServiceEspece.php");
include_once("DAO/DataAccessEspece.php");
include_once("Model/Race.php");
include_once("Services/ServiceRace.php");
include_once("DAO/DataAccessRace.php");
include_once("Model/Animal.php");
include_once("Services/ServiceAnimaux.php");
include_once("DAO/DataAccessAnimaux.php");
include_once("Services/ServiceRefuge.php");
include_once("DAO/DataAccessRefuge.php");

    if(isset($_GET["especes"])) {
        $dAOEspece=new DataAccessEspece();
        $serviceEspece=new ServiceEspece($dAOEspece);
        $data=$serviceEspece->selectAll();
        $json=json_encode($data);
        echo $json;
    }

    if(isset($_GET["racesOfEspece"])) {
        $dAORace=new DataAccessRace();
        $serviceRace=new ServiceRace($dAORace);
        $data=$serviceRace->selectAllWhereEspeceIs($_GET["racesOfEspece"]);
        $json=json_encode($data);
        echo $json;
    }

    //ajoute de la recherche de refuges
    if(isset($_GET["refuges"])) {
        $dAORefuge=new DataAccessRefuge();
        $serviceRefuge=new ServiceRefuge($dAORefuge);
        $data=$serviceRefuge->selectAll();
        $json=json_encode($data);
        echo $json;
    }

    if(isset($_POST["add-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $animal=Animal::buildAnimal($_POST);
        $animal->setPhoto(file_get_contents($_FILES['photo']['tmp_name']));
        $serviceAnimal->add($animal);
    }

    if(isset($_POST["edit-nom-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newNom = $serviceAnimal->editNom($_POST["nom_animal"], $_POST["id_animal"]);
        echo $newNom;
    }

    if(isset($_POST["edit-sexe-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newSexe = $serviceAnimal->editSexe($_POST["new_value"], $_POST["id_animal"]);
        echo $newSexe;
    }

    if(isset($_POST["edit-handicap-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newHandicap = $serviceAnimal->editHandicap($_POST["new_value"], $_POST["id_animal"]);
        echo $newHandicap;
    }

    if(isset($_POST["edit-urgence-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newUrgence = $serviceAnimal->editUrgence($_POST["new_value"], $_POST["id_animal"]);
        echo $newUrgence;
    }

    if(isset($_POST["edit-date-naissance-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newDateNaissance = $serviceAnimal->editDateNaissance($_POST["date_naissance_animal"], $_POST["id_animal"]);
        echo $newDateNaissance;
    }

    if(isset($_POST["edit-age-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $age = intval($_POST["age_animal"]);
        $newAge = $serviceAnimal->editAge($age, $_POST["id_animal"]);
        echo $newAge;
    }

    if(isset($_POST["edit-description-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newDescription = $serviceAnimal->editDescription($_POST["description_animal"], $_POST["id_animal"]);
        echo $newDescription;
    }

    if(isset($_POST["edit-date-entree-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newDateEntree = $serviceAnimal->editDateEntree($_POST["date_entree"], $_POST["id_animal"]);
        echo $newDateEntree;
    }

    if(isset($_POST["edit-photo-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newPhoto = $serviceAnimal->editPhoto($_POST["photo_animal"], $_POST["id_animal"]);
        echo $newPhoto;
    }

    if(isset($_POST["edit-refuge-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $newRefugeId = $serviceAnimal->editRefuge($_POST["refuge_animal"], $_POST["id_animal"]);
        echo $newRefugeId;
    }

    if(isset($_POST["edit-race-animal"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $dAORace = new DataAccessRace();
        $serviceRace = new ServiceRace($dAORace);
        $newRaceId = $serviceAnimal->editRace($_POST["race"], $_POST["id_animal"]);
        $newRaceNom = $serviceRace->selectNomRaceWhereIdIs($newRaceId);
        echo $newRaceNom;
    }

    if(isset($_POST["edit-espece-animal"])) {
        $dAOEspece = new DataAccessEspece();
        $serviceEspece = new ServiceEspece($dAOEspece);
        $newEspeceNom = $serviceEspece->selectNomEspeceWhereIdIs($_POST["espece"]);
        echo $newEspeceNom;
    }

    if(isset($_GET["delete"])) {
        $dAOAnimal = new DataAccessAnimaux();
        $serviceAnimal=new ServiceAnimaux($dAOAnimal);
        $serviceAnimal->delete($_GET["delete"]);
    }



