<?php

include_once("Services/ServiceAdoption.php");
include_once("DAO/DataAccessAdoption.php");
include_once("fonctions/fonctions.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");
include_once("Services/ServiceAnimaux.php");
include_once("DAO/DataAccessAnimaux.php");

if(isset($_GET["adoptedBy"])) {
    $dAOAdoption = new DataAccessAdoption();
    $serviceAdoption = new ServiceAdoption($dAOAdoption);
    $data=$serviceAdoption->adoptedByUtilisateur2($_GET["adoptedBy"]);
    $json=json_encode($data);
    echo $json;
}

if(isset($_POST["searchUsers"])) {    
    $dAOUtilisateur=new DataAccessUtilisateur();
    $users = new ServiceUtilisateur($dAOUtilisateur);
    
    $usersAdmin = $users->getBySearch($_POST["searchUsers"]); 
    foreach ($usersAdmin as $user) {

        echo '<div class="row resultAdoptionSearchUser" id="'.$user["id_utilisateur"].'">
                <div class="resultAdoptionSearchUser col-12" title="'.$user["numero"].' '.$user["rue"].' '.$user["codePostal"].' '.$user["ville"].'" id="'.$user["id_utilisateur"].'">'.$user["nom"].' '.$user["prenom"].' - '.$user["telephone"].'</div>       
              </div>';
     }
} 

if(isset($_GET["searchAnimaux"])){
    $dAOAnimal = new DataAccessAnimaux();
    $serviceAnimal=new ServiceAnimaux($dAOAnimal);
    $tab = array("searchAnimaux" => "","nom_animal" => $_GET["searchAnimaux"]);
    $ListeSQLs = $serviceAnimal->getBySearch($tab); 
    foreach ($ListeSQLs as $animal) {

        echo '<div class="row resultAdoptionSearch" id="'.$animal["id_animal"].'">
                <div class="resultAdoptionSearch col-5"  id="'.$animal["id_animal"].'">'.renderImageParticularRedim($animal["photo_animal"]).'</div>
              <div class=" resultAdoptionSearch col-5"  id="'.$animal["id_animal"].'"> '.$animal["nom_animal"].'</div>
        </div>';
     }
} 

if(isset($_POST["validAdoption"])) {
    $dAOAdoption = new DataAccessAdoption();
    $adopte = new ServiceAdoption($dAOAdoption);
    $addAdoption = $adopte->addAdoption($_POST); 
    var_dump($addAdoption);
}

?>
