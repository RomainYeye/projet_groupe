<?php

include_once __DIR__."/../Interfaces/InterfaceDAOAdoption.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessAdoption extends ConectSql implements InterfaceDAOAdoption {

    public function selectAll() : ?array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select * from adoption");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function adoptedByUtilisateur(int $idUtilisateur) : ?array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("SELECT animal.id_animal, espece.espece, espece.id_espece, nom_animal, photo_animal, DATE_FORMAT(date_naissance_animal, '%d/%m/%Y') as date_naissance_animal, 
                             age_animal, race.race, sexe_animal, description_animal, handicap_animal, urgence_animal,  DATE_FORMAT(date_entree, '%d/%m/%Y') as date_entree, animal.id_refuge, nom_refuge 
                             FROM animal 
                             INNER JOIN race on animal.id_race = race.id_race 
                             INNER JOIN espece on race.id_espece = espece.id_espece 
                             INNER JOIN refuge on animal.id_refuge = refuge.id_refuge
                             INNER JOIN adoption on animal.id_animal = adoption.id_animal
                             WHERE adoption.id_utilisateur = ?");
        $stmt->bind_param("i", $idUtilisateur);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function adoptedByUtilisateur2(int $idUtilisateur) : ?array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("SELECT animal.id_animal, espece.espece, espece.id_espece, nom_animal, DATE_FORMAT(date_naissance_animal, '%d/%m/%Y') as date_naissance_animal, 
                             age_animal, race.race, sexe_animal, description_animal, handicap_animal, urgence_animal,  DATE_FORMAT(date_entree, '%d/%m/%Y') as date_entree, animal.id_refuge, nom_refuge 
                             FROM animal 
                             INNER JOIN race on animal.id_race = race.id_race 
                             INNER JOIN espece on race.id_espece = espece.id_espece 
                             INNER JOIN refuge on animal.id_refuge = refuge.id_refuge
                             INNER JOIN adoption on animal.id_animal = adoption.id_animal
                             WHERE adoption.id_utilisateur = ?");
        $stmt->bind_param("i", $idUtilisateur);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function findDateOfAdoption(int $idUtilisateur, int $idAnimal) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("SELECT date_adoption FROM adoption WHERE id_utilisateur = ? AND id_animal = ?");
        $stmt->bind_param("ii", $idUtilisateur, $idAnimal);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data["date_adoption"];
    }

    public function addAdoption(int $id_utilisateur, int $id_animal, string $date_adoption) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("INSERT INTO `adoption` VALUES (?,?,?)");
        $result->bind_param("iis", $id_animal, $id_utilisateur, $date_adoption);
        $result->execute();
        $bdd->close();
        return;
    }

}


?>