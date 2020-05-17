<?php
include_once "DAO/ConectSql.php";
include_once "Services/ServiceStatistiques.php";
include_once "DAO/DataAccessStatistiques.php";

$statistiques = new ServiceStatistiques();
//$statsAdmin = $statistiques->getAll();
if(isset($_POST["searchStats"])) {
    $statsAdmin = $statistiques->getBySearch($_POST["searchStats"]); 
} else {
    $statsAdmin = $statistiques->getAll(); 
}
?>

        
<?php
      
echo'<div class="col-12 mt-3 p-0 ml-0 d-none d-sm-block">
<table class="table table-striped table-hover table-sm text-center" >
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Derniére edition</th>
            <th scope="col">Denomination de la statistique</th>
            <th scope="col">Chiffres</th>
            <th scope="col">Type de gestion</th>            
            <th scope="col">Afficher</th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>';

            foreach ($statsAdmin as $keyStats) {
                if ($keyStats["type_gestion_statistique"] == 0) {
                    $TGS = "Automatique";
                    $TGSD = "";
                } else {
                    $TGS = "Manuelle";
                    $TGSD = '<button type="button" class="close" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>';
                }
                if ($keyStats["afficher_statistique"] == 0) {
                    $TGA = "AFFICHER";
                } else {
                    $TGA = "MASQUER";
                }
            echo '<tr class="line-content">
                    <th class="'.$TGS.'" scope="row" name="id_statistique" id="id_statistique">'.$keyStats["id_statistique"].'</th>
                    <td class="'.$TGS.'" name="derniere_edition_statistique" id="'.$keyStats["id_statistique"].'">'.$keyStats["derniere_edition_statistique"].'</td>
                    <td class="Manuelle" name="nom_statistique" id="'.$keyStats["id_statistique"].'">'.$keyStats["nom_statistique"].'</td>
                    <td class="'.$TGS.'" name="chiffres_statistique" id="'.$keyStats["id_statistique"].'">'.$keyStats["chiffres_statistique"].'</td>
                    <td class="'.$TGS.'" name="type_gestion_statistique" id="'.$keyStats["id_statistique"].'">'.$TGS.'</td>
                    <td class="Manuelle" name="afficher_statistique" id="'.$keyStats["id_statistique"].'">'.$TGA.'</td>
                    <td class="'.$TGS.'" name="delete" id="'.$keyStats["id_statistique"].'">'.$TGSD.'</td>
                </tr>';
            }
            
            ?>
            
    </tbody>
            

                                    <?php
                                    // RG BACK RG10 RG14 RG16
if(isset($_POST["addStats"]) || isset($_POST["editStats"])) {
    
                echo '<tr>
                <td> </td>
                
                <td><input type="date" class="form-control form-control-sm " id="derniere_edition_statistique" name="derniere_edition_statistique" style="width:140px;"/></td>
                <td><input type="text" class="form-control form-control-sm" id="nom_statistique" name="nom_statistique" maxlength="150" required /></td>
                <td><input type="number" class="form-control form-control-sm" id="chiffres_statistique" name="chiffres_statistique" required /></td>
                <td><select class="form-control form-control-sm" id="type_gestion_statistique" name="type_gestion_statistique">
                          <option value="1">Manuelle</option>
                          <option value="0">Automatique</option>
                </select>
                </td>
                <td><input type="checkbox" id="afficher_stats" name="afficher_stats" value="1" aria-label="Afficher"></td>
                
                
                ';
                if(isset($_POST["addStats"])) {
                    ?>
                    <td colspan="2"><button id="sendNewStat" name="sendNewStat" class="btn btn-success">Ajouter</button></td>
                <?php
                } 
                echo '</form></tr>';
            }

         
?>		
</table>
</div><div id="pagin"></div>


<!-- version mobile -->



<?php


echo' <div class="col-12 mt-3 p-0 ml-0 inline-block d-sm-none" id="haut justify-content-md-center">';

foreach ($statsAdmin as $keyStats) {
    if ($keyStats["type_gestion_statistique"] == 0) {
        $TGS = "Automatique";
        $TGSD = "";
    } else {
        $TGS = "Manuelle";
        $TGSD = '<button type="button" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>';
    }
    if ($keyStats["afficher_statistique"] == 0) {
        $TGA = "AFFICHER";
    } else {
        $TGA = "MASQUER";
    }

echo'<table class="table table-striped table-hover table-sm text-center">
    <thead class="thead-dark" > <tr><th colspan="2" class="'.$TGS.'" name="derniere_edition_statistique" id="'.$keyStats["id_statistique"].'">N° '.$keyStats["id_statistique"].' - Derniere edition : '.$keyStats["derniere_edition_statistique"].'</th></tr></thead>
    <tr><td colspan="2" class="Manuelle" name="nom_statistique" id="'.$keyStats["id_statistique"].'">'.$keyStats["nom_statistique"].'</td></tr>
    <tr><td colspan="2" class="'.$TGS.'" name="chiffres_statistique" id="'.$keyStats["id_statistique"].'">'.$keyStats["chiffres_statistique"].'</td></tr>
    <tr>
    <td class="Manuelle" name="afficher_statistique" id="'.$keyStats["id_statistique"].'">'.$TGA.'</td>
    <td class="'.$TGS.'" name="delete" id="'.$keyStats["id_statistique"].'">'.$TGSD.'</td>
    </tr>
    </table>';

}


           
echo '</div><div id="pagin"></div>';

if(isset($_POST["sendNewStat"])) {
    $statsAdmin = $statistiques->addStats($_POST);
   return $statsAdmin;
}

   //AJOUT DE STATSAnimaux
if(isset($_POST["majStats"])) {
    $statsAdmin = $statistiques->majStats($_POST);
   return $statsAdmin;
}
//DEL DE STATS
if(isset($_POST["delStats"])) {
    $statsAdmin = $statistiques->delStats($_POST);
   return $statsAdmin;
}

?>

