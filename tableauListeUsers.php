<?php
include_once "DAO/ConectSql.php";
include_once "Services/ServiceUtilisateur.php";
include_once "DAO/DataAccessUtilisateur.php";
$dAOUtilisateur=new DataAccessUtilisateur();
$users = new ServiceUtilisateur($dAOUtilisateur);
//$statsAdmin = $statistiques->getAll();
if(isset($_POST["searchUsers"])) {
    $usersAdmin = $users->getBySearch($_POST["searchUsers"]); 
} else {
    $usersAdmin = $users->selectAll(); 
}
?>

        
<?php
      
echo'<div class="col-12 mt-3 p-0 ml-0 d-none d-sm-block">
<table class="table table-striped table-hover table-sm text-center" >
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>          
            <th scope="col">Telephone</th>
              <th scope="col">Grade</th>
        </tr>
    </thead>
    <tbody>';

            foreach ($usersAdmin as $key) {
                if ($key["grade"] == "user") {
                    $TGA = "Nommer Admin";
                } else {
                    $TGA = "Nommer User";
                }
            echo '<tr class="line-content" title="'.$key["numero"].' '.$key["rue"].' '.$key["codePostal"].' '.$key["ville"].'">
                    <th scope="row" name="id_statistique" id="id_statistique">'.$key["id_utilisateur"].'</th>
                    <td name="nom" id="'.$key["id_utilisateur"].'">'.$key["nom"].'</td>
                    <td  name="prenom" id="'.$key["id_utilisateur"].'">'.$key["prenom"].'</td>
                    <td  name="telephone" id="'.$key["id_utilisateur"].'">'.$key["telephone"].'</td>
                    <td class="Manuelle" name="grade" id="'.$key["id_utilisateur"].'">'.$TGA.'</td>
                   
                </tr>';
            }
            
            ?>
            
    </tbody>
            

                                    <?php
                                    // RG BACK RG10 RG14 RG16

?>		
</table>
</div><div id="pagin"></div>


<!-- version mobile -->



<?php


echo' <div class="col-12 mt-3 p-0 ml-0 inline-block d-sm-none" id="haut justify-content-md-center">';

foreach ($usersAdmin as $key) {
  
        if ($key["grade"] == "user") {
            $TGA = "Nommer Admin";
        } else {
            $TGA = "Nommer User";
        }

echo'<table class="table table-striped table-hover table-sm text-center" title="'.$key["numero"].' '.$key["rue"].' '.$key["codePostal"].' '.$key["ville"].'">
    <thead class="thead-dark" > <tr><th colspan="2" id="'.$key["id_utilisateur"].'"> '.$key["nom"].' '.$key["prenom"].'</th></tr></thead>
    <tr><td colspan="2"  name="telephone" id="'.$key["id_utilisateur"].'">'.$key["telephone"].'</td></tr>
    <tr>
    <td class="Manuelle" name="grade" id="'.$key["id_utilisateur"].'">'.$TGA.'</td>
    </tr>
    </table>';

}


           
echo '</div><div id="pagin"></div>';



   //AJOUT DE STATSAnimaux
if(isset($_POST["majUsers"])) {
    $usersAdmin = $users->majUsers($_POST);
   return $usersAdmin;
}


?>

