<?php
include_once "DAO/ConectSql.php";
include_once "Services/ServicePrevention.php";
include_once "DAO/DataAccessPrevention.php";
include_once( "fonctions/fonctions.php");

$preventions = new ServicePrevention();
if(isset($_POST["searchPreventions"])) {
    $prevAdmin = $preventions->getBySearch($_POST["searchPreventions"]); 
} else {
    $prevAdmin = $preventions->getAll();
}
?>

        
<?php
      
echo'<div class="col-12 mt-3 p-0 ml-0 d-none d-sm-block">
<table class="table table-striped table-hover table-sm text-center" >
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date d\'ajout</th>
            <th scope="col">Titre de l\'article</th>
            <th scope="col">Photo</th>
            <th scope="col">Article</th>            
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>';

            foreach ($prevAdmin as $key) {
                
                    $TGSD = '<button type="button" class="close" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>';
                
              
            echo '<tr class="line-content">
                    <th class="Manuelle" scope="row" name="id_prevention" id="id_prevention">'.$key["id_prevention"].'</th>
                    <td class="Manuelle" name="date_ajout_prevention" id="'.$key["id_prevention"].'">'.$key["date_ajout_prevention"].'</td>
                    <td class="Manuelle" name="nom_prevention" id="'.$key["id_prevention"].'">'.$key["nom_prevention"].'</td>
                    <td class="" name="photo_prevention" id="'.$key["id_prevention"].'">' . renderImageParticularRedim($key["photo_prevention"]). '</td>
                    <td class="Manuelle" name="texte_prevention" id="'.$key["id_prevention"].'">'.$key["texte_prevention"].'</td>
                    <td class="Manuelle" name="delete" id="'.$key["id_prevention"].'">'.$TGSD.'</td>
                </tr>';
            }
            
            ?>
            
    </tbody>
            


    <?php
                                    // RG BACK RG10 RG14 RG16
                                    /***
                                     * 
                                     *  <div class="custom-file">
               <label for="photo_prevention" class="btn-secondary m-1"> Une photo!! </label>
                <input type="file" class="form-control form-control-sm custom-file-input" id="photo_prevention" name="photo_prevention" required/>
                </div>
                                     */
if(isset($_POST["addPrevention"])) {
    
                echo '<form id="form-admin-prevention" enctype="multipart/form-data">
                <tr>
                <td> </td>
                
                <td><input type="date" class="form-control form-control-sm " id="date_ajout_prevention" name="date_ajout_prevention" form="form-admin-prevention" style="width:140px;"/></td>
                <td><input type="text" class="form-control form-control-sm" id="nom_prevention" name="nom_prevention" form="form-admin-prevention" maxlength="150" required /></td>
                <td> <div class="custom-file">
                <label for="photo_prevention" class="btn-primary p-1"> + photo </label>
                 <input type="file" class="form-control form-control-sm custom-file-input" id="photo_prevention" name="photo_prevention" form="form-admin-prevention" accept="image/png, image/jpeg" required/>
                 </div></td>
                <td><input type="textarea" class="form-control form-control-sm" id="texte_prevention" name="texte_prevention" form="form-admin-prevention" required /></td>
                <input type="hidden" name="sendNewPreventions" form="form-admin-prevention"/>
              
                
                
                ';
                if(isset($_POST["addPrevention"])) {
                    ?>
                    <td colspan="2"><button id="sendNewPreventions" name="sendNewPreventions" class="btn btn-success">Ajouter</button></td>
                <?php
                } 
                echo '</tr>';
            }

         
?>	
</table>
</div><div id="pagin"></div>


<!-- version mobile -->



<?php


echo' <div class="col-12 mt-3 p-0 ml-0 inline-block d-sm-none" id="haut justify-content-md-center">';

foreach ($prevAdmin as $key) {

        $TGSD = '<button type="button" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>';


echo'<table class="table table-striped table-hover table-sm text-center">
    <thead class="thead-dark" > <tr><th colspan="2" class="Manuelle" name="date_ajout_prevention" id="'.$key["id_prevention"].'">N° '.$key["id_prevention"].' - Date d\'ajout : '.$key["date_ajout_prevention"].'</th></tr></thead>
    <tr><td colspan="2" class="Manuelle" name="nom_prevention" id="'.$key["id_prevention"].'">'.$key["nom_prevention"].'</td></tr>
    <tr><td colspan="2" class="Manuelle" name="texte_prevention" id="'.$key["id_prevention"].'">'.$key["texte_prevention"].'</td></tr>
    <tr>
    <td class="Manuelle" name="delete" id="'.$key["id_prevention"].'">'.$TGSD.'</td>
    </tr>
    </table>';

}


           
echo '</div><div id="pagin"></div>';

if(isset($_POST["sendNewPreventions"])) {
    $prevAdmin = $preventions->addPrevention($_POST);
   return $prevAdmin;
}

if(isset($_POST["majPreventions"])) {
    $preventionsAdmin = $preventions->majPreventions($_POST);
   return $preventionsAdmin;
}
//DEL DE preventions
if(isset($_POST["delPreventions"])) {
    $preventionsAdmin = $preventions->delpreventions($_POST);
   return $preventionsAdmin;
}

?>

