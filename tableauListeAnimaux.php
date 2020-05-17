<?php

include_once("DAO/ConectSql.php");
include_once("Model/Animal.php");
include_once("Services/ServiceAnimaux.php");
include_once("DAO/DataAccessAnimaux.php");
include_once("fonctions/fonctions.php");

$dAOAnimal = new DataAccessAnimaux();
$serviceAnimal=new ServiceAnimaux($dAOAnimal);
//$ListeSQL = $serviceAnimal->getAll();
if(isset($_GET["searchAnimaux"]) && !is_null($_GET["searchAnimaux"])) {
    //echo $_GET["searchAnimaux"];
    $tab = array("searchAnimaux" => "","nom_animal" => $_GET["searchAnimaux"]);
  //  echo $tab;
    $ListeSQLs = $serviceAnimal->getBySearch($tab); 
} else {
   //echo $_GET["searchAnimaux"];
   // $ListeSQL = $serviceAnimal->getBySearch($tab); 
   $tab = array("searchAnimaux" => "","nom_animal" => "");
   $ListeSQLs = $serviceAnimal->getBySearch($tab); 
}

?>

    <div class="col-lg-12 mt-3 p-0 ml-0 d-none d-sm-block" id="pagin">
        <table class="table table-striped table-hover table-sm text-center listeAnimaux">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Espèce</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Naissance</th>
                    <th scope="col">Âge</th>
                    <th scope="col">Race</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Refuge</th>
                    <th scope="col">Description</th>
                    <th scope="col">Hand</th>
                    <th scope="col">Urg</th>
                    <th scope="col">Entrée</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($ListeSQLs as $ListeSQL) {
                //for($i=0; $i<count($ListeSQL); $i++) {
                    echo '	<tr class="line-content">
                                <th name="id-animal" scope="row">'.$ListeSQL["id_animal"].'</th>
                                <td name="espece" value="' . $ListeSQL["id_espece"] . '">'.$ListeSQL["espece"].'</td>
                                <td name="nom-animal">'.$ListeSQL["nom_animal"].'</td>
                                <td name="photo-animal">'.renderImageParticularRedim($ListeSQL["photo_animal"]).'</td>
                                <td name="date-naissance-animal">'.$ListeSQL["date_naissance_animal"].'</td>
                                <td name="age-animal">'.$ListeSQL["age_animal"].'</td>
                                <td name="race">'.$ListeSQL["race"].'</td>
                                <td name="sexe-animal">'.$ListeSQL["sexe_animal"].'</td>
                                <td name="id-refuge">'.$ListeSQL["id_refuge"].'</td>
                                <td name="description-animal">'.$ListeSQL["description_animal"].'</td>
                                <td name="handicap-animal">'.$ListeSQL["handicap_animal"].'</td>
                                <td name="urgence-animal">'.$ListeSQL["urgence_animal"].'</td>
                                <td name="date-entree-animal">'.$ListeSQL["date_entree"].'</td>
                                <td name="delete">
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                            </tr>'
                        ;
                }
            
          
                
                ?>
                                        
                        <form id="form-admin-animal" enctype="multipart/form-data">

                        </form>
                            <tr id="row-form-admin-animal" style="display:none">
                                <td colspan="2">
                                <select class="form-control form-control-sm" id="select-espece" name="espece" form="form-admin-animal">

                                </select>
                                </td>
                                <td>
                                <input type="text" class="form-control form-control-sm" id="nom" name="nom" maxlength="25" form="form-admin-animal" required/>
                                </td>
                                <td>
                                <div class="custom-file">
                                    <label for="photo" class="btn-primary p-1"> + photo </label>
                                    <input type="file" class="form-control form-control-sm custom-file-input" id="photo" name="photo" form="form-admin-animal" accept="image/png, image/jpeg" required/>
                                </div>
                                </td>
                                <td >
                                <input type="date" class="form-control form-control-sm " id="naissance" name="date-naissance" form="form-admin-animal" style="width:140px;"/>
                                </td>
                                <td>
                                <input type="number" cols="2" class="form-control form-control-sm" id="age" name="age"  maxlength="2" form="form-admin-animal"  style="width:50px;" required/>
                                </td>
                                <td>
                                <select class="form-control form-control-sm" id="select-race" name="id-race" form="form-admin-animal">

                                </select>
                                </td>
                                <td>
                                <select class="form-control form-control-sm" id="sexe" name="sexe" form="form-admin-animal" style="width:70px;">
                                    <option value="Mâle">Mâle</option>
                                    <option value="Femelle">Femelle</option>
                                </select>
                                </td> 
                                <td>
                                <select class="form-control form-control-sm" id="select-refuge" name="id-refuge" form="form-admin-animal" style="width:85px;">
                                
                                </select></td>
                                <td><textarea id="description" name="description" minlength="50" maxlength="1500" form="form-admin-animal"></textarea></td>
                                <td><input class="form-check-input" type="checkbox" id="handicap" name="handicap" form="form-admin-animal"/></td>
                                <td><input class="form-check-input" type="checkbox" id="urgence" name="urgence" form="form-admin-animal"/></td>
                                <td><input type="date" class="form-control form-control-sm" id="entree" name="date-entree"  style="width:140px;" form="form-admin-animal" required/></td>
                            </tr>
                </tbody>
                    
    </table>


<!-- version mobile -->


        </div>

        <?php


echo' <div class="col-12 mt-3 p-0 ml-0 inline-block d-sm-none" id="haut justify-content-md-center">';

foreach ($ListeSQLs as $key) {

      
echo'<table class="table table-striped table-hover table-sm text-center">
    <thead class="thead-dark" > 
        <tr>
            <th name="id-animal">N° '.$key["id_animal"].'</th>
            <th name="date-entree-animal" id="'.$key["id_animal"].'">Entrée '.$key["date_entree"].'</th>
            <th name="delete" id="'.$key["id_animal"].'">
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </th>
        </tr>
    </thead>
    <tr>
        <td name="photo-animal" id="'.$key["id_animal"].'">
        '.renderImageParticularRedim($key["photo_animal"]).'
        </td>
        <td colspan="2" id="'.$key["id_animal"].'">
            <table width="100%" class="table table-borderless">
                <tr>
                    <td name="nom-animal" colspan="2" id="'.$key["id_animal"].'">
                        '.$key["nom_animal"].'
                    </td>
                </tr>
                <tr>
                    <td name="date-naissance-animal" id="'.$key["id_animal"].'">
                        Naissance : '.$key["date_naissance_animal"].'
                    </td>
                    <td name="date-naissance-animal" id="'.$key["id_animal"].'">
                    '.$key["age_animal"].' ans
                     </td>
                </tr>             
               
            </table>
        </td>
    </tr>
    <tr>
        <td name="espece" value="' . $ListeSQL["id_espece"] . '" id="'.$key["id_animal"].'">
            '.$key["espece"].'    
        </td>
        <td name="race" colspan="2" id="'.$key["id_animal"].'">
            '.$key["race"].'     
        </td>
    </tr>
    <tr>
        <td name="handicap-animal" id="'.$key["id_animal"].'">
            '.$key["handicap_animal"].'    
        </td>
        <td name="sexe-animal" colspan="2" id="'.$key["id_animal"].'">
            '.$key["sexe_animal"].'   
        </td>
    </tr>
    <tr>
        <td name="id-refuge" id="'.$key["id_animal"].'">
            '.$key["id_refuge"].'     
        </td>
        <td name="urgence-animal" colspan="2" id="'.$key["id_animal"].'">
            '.$key["urgence_animal"].'  
        </td>
    </tr>
    <tr>
        <td name="description-animal" colspan="3" id="'.$key["id_animal"].'">
            '.$key["description_animal"].'   
        </td>
    </tr>
    </table>';

}


           
echo '</div><div id="pagin"></div>';


           
echo '</div>';
