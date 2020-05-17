<?php

include_once __DIR__."/../DAO/DataAccessAdoption.php";
include_once __DIR__."/../Interfaces/InterfaceServiceAdoption.php";
include_once __DIR__."/../Interfaces/InterfaceDAOAdoption.php";

class ServiceAdoption implements InterfaceServiceAdoption {
    private $dAOAdoption;

    public function __construct(InterfaceDAOAdoption $dAO) {
        $this->dAOAdoption=$dAO;
    }

    public function selectAll() : ?array {
        $data=$this->dAOAdoption->selectAll();
        return $data;
    }

    public function adoptedByUtilisateur(int $idUtilisateur) : ?array {
        $data = $this->dAOAdoption->adoptedByUtilisateur($idUtilisateur);
        return $data;
    }

    public function adoptedByUtilisateur2(int $idUtilisateur) : ?array {
        $data = $this->dAOAdoption->adoptedByUtilisateur2($idUtilisateur);
        return $data;
    }

    public function findDateOfAdoption(int $idUtilisateur, int $idAnimal) : string {
        $data = $this->dAOAdoption->findDateOfAdoption($idUtilisateur, $idAnimal);
        return $data;
    }

    public function addAdoption($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val) && $val!="validAdoption") {  
                 $$post = $val;
              
             }	
         }
         $addadopt = $this->dAOAdoption->addAdoption($id_utilisateur, $id_animal, $date_adoption);
         return $addadopt;
     }
}