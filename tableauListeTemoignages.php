<?php
include_once "DAO/ConectSql.php";
include_once "Services/ServiceTemoignages.php";
include_once "DAO/DataAccessTemoignages.php";
include_once("fonctions/fonctions.php");

$temoignages = new ServiceTemoignages();
//$temoinAdmin = $temoignages->getAll();
if(isset($_POST["searchTemoignages"])) {
    $temoinAdmin = $temoignages->getBySearch($_POST["searchTemoignages"]); 
} else {
    $temoinAdmin = $temoignages->getAll();
}
?>

        
<?php
      
echo'<div class="col-12 mt-3 p-0 ml-0 d-none d-sm-block">
<table class="table table-striped table-hover table-sm text-center" >
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date d\'adoption</th>
            <th scope="col">Nom de l\'animal</th>
            <th scope="col">Photo</th>
            <th scope="col">Message</th>            
            <th scope="col">Afficher</th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>';

            foreach ($temoinAdmin as $key) {
                
                    $TGSD = '<button type="button" class="close" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>';
                
                if ($key["afficher"] == 0) {
                    $TGA = "AFFICHER";
                } else {
                    $TGA = "MASQUER";
                }
            echo '<tr class="line-content">
                    <th class="Manuelle" scope="row" name="id_temoignage" id="id_trmoignage">'.$key["id_temoignage"].'</th>
                    <td class="Manuelle" name="date_adoption" id="'.$key["id_temoignage"].'">'.$key["date_adoption"].'</td>
                    <td class="Manuelle" name="nom_animal_temoignage" id="'.$key["id_temoignage"].'">'.$key["nom_animal_temoignage"].'</td>
                    <td class="" name="photo_animal" id="'.$key["id_temoignage"].'">'.renderImageParticularRedim($key["photo_animal"]).'</td>
                    <td class="Manuelle" name="message_temoignage" id="'.$key["id_temoignage"].'">'.$key["message_temoignage"].'</td>
                    <td class="Manuelle" name="afficher" id="'.$key["id_temoignage"].'">'.$TGA.'</td>
                    <td class="Manuelle" name="delete" id="'.$key["id_temoignage"].'">'.$TGSD.'</td>
                </tr>';
            }
            
            ?>
            
    </tbody>
            

                                    <?php
                                 

         
?>		
</table>
</div><div id="pagin"></div>


<!-- version mobile -->



<?php


echo' <div class="col-12 mt-3 p-0 ml-0 inline-block d-sm-none" id="haut justify-content-md-center">';

foreach ($temoinAdmin as $key) {

        $TGSD = '<button type="button" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>';
    
    if ($key["afficher"] == 0) {
        $TGA = "AFFICHER";
    } else {
        $TGA = "MASQUER";
    }

echo'<table class="table table-striped table-hover table-sm text-center">
    <thead class="thead-dark" > <tr><th colspan="2" class="Manuelle" name="date_adoption" id="'.$key["id_temoignage"].'">N° '.$key["id_temoignage"].' - Date d\'adoption : '.$key["date_adoption"].'</th></tr></thead>
    <tr><td colspan="2" class="Manuelle" name="nom_animal_temoignage" id="'.$key["id_temoignage"].'">'.$key["nom_animal_temoignage"].'</td></tr>
    <tr><td colspan="2" class="Manuelle" name="message_temoignage" id="'.$key["id_temoignage"].'">'.$key["message_temoignage"].'</td></tr>
    <tr>
    <td class="Manuelle" name="afficher" id="'.$key["id_temoignage"].'">'.$TGA.'</td>
    <td class="Manuelle" name="delete" id="'.$key["id_temoignage"].'">'.$TGSD.'</td>
    </tr>
    </table>';

}


           
echo '</div><div id="pagin"></div>';

if(isset($_POST["majTemoignages"])) {
    $temoinAdmin = $temoignages->majTemoignages($_POST);
   return $temoinAdmin;
}
//DEL DE temoignages
if(isset($_POST["delTemoignages"])) {
    $temoinAdmin = $temoignages->delTemoignages($_POST);
   return $temoinAdmin;
}

?>

