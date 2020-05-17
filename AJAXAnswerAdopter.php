<?php

include_once("Services/ServiceAnimaux.php");
include_once("DAO/DataAccessAnimaux.php");
include_once("Services/ServiceUtilisateur.php");
include_once("DAO/DataAccessUtilisateur.php");
include_once("Services/ServiceFavori.php");
include_once("DAO/DataAccessFavori.php");
include_once("fonctions/fonctions.php");

session_start();

$dAOAnimal = new DataAccessAnimaux();
$serviceAnimaux = new ServiceAnimaux($dAOAnimal);
$listeAnimaux = $serviceAnimaux->getBySearch($_POST);
$dAOUtilisateur = new DataAccessUtilisateur();
$serviceUtilisateur = new ServiceUtilisateur($dAOUtilisateur);
$dAOFavori = new DataAccessFavori();
$serviceFavori = new ServiceFavori($dAOFavori);
$style = "radius-top";

if(isset($_SESSION["emailutilisateur"])) {
    $idUtilisateur = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
}

echo'<div class="row justify-content-around w-100">';

foreach ($listeAnimaux as $animal) {
    $animal["age_animal"] < 2 ? $anOrAns = "an" : $anOrAns = "ans";
    $iClass = "far fa-heart fa-2x";
    if(isset($_SESSION["emailutilisateur"])) {
        if($serviceFavori->isFav($animal["id_animal"], $idUtilisateur)) {
            $iClass = "fas fa-heart fa-2x";
        }
    }
    
 echo'<div class="col-lg-2 m-3 miniprofil line-content">
 <div class="row">
 <a class="linkMP" href="fiche_animal.php?animal='.$animal["id_animal"].'">
     <div class="col-12 miniprofil-div-photo">
        ' . renderImage($animal["photo_animal"], $style) . '
     </div>
 </div>
 <div class="row ">
     <div class="col-12 miniprofil-infos">
    
         <h4 class="mt-3">'.$animal["nom_animal"].'</h4>
         Sexe : '.$animal["sexe_animal"].'<br />
         Âge : '.$animal["age_animal"].' ' . $anOrAns . '<br />
         Race : '.$animal["race"].'<br />
         Arrivé le '.$animal["date_entree"].' à '.$animal["nom_refuge"].'.
     </div>
 </div>	</a>
 <div id="fav"><span class="fav" data-idanimal="' . $animal["id_animal"] . '"><a href="" class="favLink"><i class="' . $iClass . '" ></i></a></span></div>					
</div>	

';


}

echo'</div><div class="row justify-content-md-center" id="pagin"></div>';

?>