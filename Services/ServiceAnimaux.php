<?php

include_once __DIR__."/../DAO/DataAccessAnimaux.php";
include_once __DIR__."/../Interfaces/InterfaceServiceAnimaux.php";
include_once __DIR__."/../Interfaces/InterfaceDAOAnimaux.php";

class ServiceAnimaux implements InterfaceServiceAnimaux {
    private $dAOAnimaux;

    public function __construct(InterfaceDAOAnimaux $dAO) {
        $this->dAOAnimaux=$dAO;
    }

    public function getAll() : array {
        $array=$this->dAOAnimaux->getAll();
        return $array;
    }

    public function getFrom(string $colonne, string $table) : array {
        $array=$this->dAOAnimaux->getFrom($colonne, $table);
        return $array;
    }

    public function getFirstArrivant($offset) {
        $data=$this->dAOAnimaux->getFirstArrivant($offset);
        return $data;
    }

    public function add($object) : void {
        $this->dAOAnimaux->add($object);
    }

    public function delete(int $id) : void {
        $this->dAOAnimaux->delete($id);
    }

    public function editNom(string $nom, int $id) : string {
        $newNom = $this->dAOAnimaux->editNom($nom, $id);
        return $newNom;
    }

    public function editSexe(string $sexe, int $id) : string {
        $newSexe = $this->dAOAnimaux->editSexe($sexe, $id);
        return $newSexe;
    }

    public function editHandicap(int $handicap, int $id) : int {
        $newHandicap = $this->dAOAnimaux->editHandicap($handicap, $id);
        return $newHandicap;
    }

    public function editUrgence(int $urgence, int $id) : int {
        $newUrgence = $this->dAOAnimaux->editUrgence($urgence, $id);
        return $newUrgence;
    }

    public function editDateNaissance(string $dateNaissance, int $id) : string {
        $newDateNaissance = $this->dAOAnimaux->editDateNaissance($dateNaissance, $id);
        return $newDateNaissance;
    }

    public function editDateEntree(string $dateEntree, int $id) : string {
        $newDateEntree = $this->dAOAnimaux->editDateEntree($dateEntree, $id);
        return $newDateEntree;
    }

    public function editAge(int $age, int $id) : int {
        $newAge = $this->dAOAnimaux->editAge($age, $id);
        return $newAge;
    }

    public function editDescription(string $description, int $id) : string {
        $newDescription = $this->dAOAnimaux->editDescription($description, $id);
        return $newDescription;
    }

    public function editPhoto(string $photo, int $id) : string {
        $newPhoto = $this->dAOAnimaux->editPhoto($photo, $id);
        return $newPhoto;
    }

    public function editRefuge(int $idRefuge, int $id) : int {
        $newRefugeId = $this->dAOAnimaux->editRefuge($idRefuge, $id);
        return $newRefugeId;
    }

    public function editRace(int $idRace, int $id) : int {
        $newRaceId = $this->dAOAnimaux->editRace($idRace, $id);
        return $newRaceId;
    }

    public function getCarouselIndex($offset) {
        $listActu = $this->dAOAnimaux->getFirstArrivant($offset);
        return $listActu;
    }

    public function getBySearch($array) {
  
        $cnt = 0;
        $cond = "";
        $values = array();
        $type = "";
      // Récupération des variables POST
      foreach ( $array as $post => $val )  {   
          if (!empty($val)) { 
              $cnt++;
              if ($cnt == 1) {
                    //coder les conditions en fonctions des champs
                    if ($post == "age_animal" && is_numeric($val)) {
                        $cond = $cond ." where animal.age_animal <= ?";
                        array_push($values, $val);
                        $type = $type ."d";
                    } elseif(is_numeric($val))  {
                        $cond = $cond ." where $post = ?";
                        array_push($values, $val);
                        $type = $type ."d";
                    } else {
                        $cond = $cond ." where $post LIKE ?";
                        array_push($values, "%".$val."%");
                        $type = $type ."s";
                    } 

                           
              } elseif ($cnt>1) {
                   //coder les conditions en fonctions des champs
                   if ($post == "age_animal" && is_numeric($val)) {
                        $cond = $cond ." and animal.age_animal <= ?";
                        array_push($values, $val);
                        $type = $type ."d";
                    } elseif(is_numeric($val))  {
                        $cond = $cond ." and $post = ?";
                        array_push($values, $val);
                        $type = $type ."d";
                    } else {
                        $cond = $cond ." and $post LIKE ?";
                        array_push($values, $val."%");
                        $type = $type ."s";
                    } 
              } 
          }	
      } 

      if ($cnt != 0) {
        $listBySearch = $this->dAOAnimaux->getBySearch($cond, $type, $values);
        return $listBySearch; 
      } else {
        $allAnimals = $this->dAOAnimaux->getAll();
        return $allAnimals; 
      }
    }



}
?>