<?php

include_once("Services/ServiceUtilisateur.php");
session_start();
$dAOUtilisateur=new DataAccessUtilisateur();
$serviceUtilisateur=new ServiceUtilisateur($dAOUtilisateur);
$data=$serviceUtilisateur->selectAllWhereMailIs($_SESSION["emailutilisateur"]);

if(isset($_POST["edit-adresse"])) {
    $email=$_POST["mail"];
    $data=$serviceUtilisateur->editAdresse($_POST, $email);
}

display($data);

function display($data) {		
    echo '<div id="div-adresse" class="row mt-4 mb-4">
                <div class="col-auto col-sm-4 col-md-4 col-lg-4 p-0">
                    <h5>Adresse : </h5>
                </div>
                <div class="col" id="parent-form">
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-row">
                                <div class="col-auto">
                                    <p id="p-numero">' . $data["numero"] . '</p>
                                </div>
                                <div class="col-auto">
                                    <p id="p-rue">' . $data["rue"] . '</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-auto">
                                    <p id="p-codePostal">' . $data["codePostal"] . '</p>	
                                </div>
                                <div class="col-auto">	
                                    <p id="p-ville">' . $data["ville"] . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto" id="col-btn-edit-adresse">

                        </div>
                    </div>
                </div>
          </div>';
}

?>