<?php

include_once("Services/ServiceUtilisateur.php");
include_once("Services/ServiceFavori.php");
include_once("DAO/DataAccessFavori.php");
include_once("fonctions/fonctions.php");

session_start();
$dAOUtilisateur=new DataAccessUtilisateur();
$serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
$dAOFavori = new DataAccessFavori();
$serviceFavori = new ServiceFavori($dAOFavori);

$idUtilisateur = $serviceUtilisateur->findIdByEmail($_SESSION["emailutilisateur"]);
$listeFavs = $serviceFavori->findFavsOfUser($idUtilisateur);

displayFavs($listeFavs);

function displayFavs($listeFavs) {
    
    echo '<div id="pagin">
            <div class="row justify-content-center mt-3">' ;
    $style = "radius-top";
    if ($listeFavs) {
        $iClass = "fas fa-heart fa-2x";
        foreach($listeFavs as $favori) {
            $favori["age_animal"] < 2 ? $anOrAns = "an" : $anOrAns = "ans";
            echo'
                <div class="col-lg-2 m-3 miniprofil line-content">
                <a class="linkMP" href="fiche_animal.php?animal=' . $favori["id_animal"] . '">
                    <div class="row">
                        <div class="col-12 miniprofil-div-photo">
                            ' . renderImage($favori["photo_animal"], $style) . '
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 miniprofil-infos">
                          
                            <h4 class="mt-3">' . $favori["nom_animal"] . '</h4>
                                Sexe : ' . $favori["sexe_animal"] . '<br />
                                Âge : ' . $favori["age_animal"] . ' ' . $anOrAns . '<br />
                                Race : ' . $favori["race"] . '<br />
                                Arrivé le ' . $favori["date_entree"] . ' à ' . $favori["nom_refuge"] . '
                        </div>
                    </div></a>	
                    <div id="fav">
                        <span class="fav" data-idanimal="' . $favori["id_animal"] . '">
                            <a href="" class="favLink"><i class="' . $iClass . '" ></i></a>
                        </span>
                    </div>					
                </div>';
        }
    } else {
        echo'<div class="alert alert-warning mt-5" role="alert">
                Vous n\'avez aucun animal dans votre liste de favoris.
             </div>';
    }
    echo '</div>
        </div>';
}

?>