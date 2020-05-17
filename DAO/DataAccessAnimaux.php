<?php

include_once __DIR__."/../Interfaces/InterfaceDAOAnimaux.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessAnimaux extends ConectSql implements InterfaceDAOAnimaux {
    private $table = 'animal';

    public function getAll(){
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_animal, espece.espece, espece.id_espece, nom_animal, photo_animal, DATE_FORMAT(date_naissance_animal, '%d/%m/%Y') as date_naissance_animal, age_animal, race.race, sexe_animal, description_animal, handicap_animal, urgence_animal,  DATE_FORMAT(date_entree, '%d/%m/%Y') as date_entree, animal.id_refuge, nom_refuge FROM $this->table inner join race on animal.id_race = race.id_race inner join espece on race.id_espece = espece.id_espece inner join refuge on animal.id_refuge = refuge.id_refuge  and id_animal not in (select id_animal from adoption)");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
    return $data; 
    }

    public function getFrom(string $colonne, string $table) : array {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select $colonne from $table");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function getFirstArrivant($offset) {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_animal, nom_animal, photo_animal, sexe_animal, age_animal, race.race, description_animal,  DATE_FORMAT(date_entree, '%d/%m/%Y') as date_entree FROM $this->table inner join race on animal.id_race = race.id_race   and id_animal not in (select id_animal from adoption) $offset");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $data;
    }
   
    public function add($animal) : void {
        $bdd = $this->bddCo();
        $nom=$animal->getNom()?$animal->getNom():null;
        $photo=$animal->getPhoto()?$animal->getPhoto():null;
        $dateNaissance=$animal->getDateNaissance()?$animal->getDateNaissance():"null";
        $age=$animal->getAge()?$animal->getAge():null;
        $sexe=$animal->getSexe()?$animal->getSexe():null;
        $description=$animal->getDescription()?$animal->getDescription():null;
        $handicap=$animal->getHandicap()?1:0;
        $urgence=$animal->getUrgence()?1:0;
        $dateEntree=$animal->getDateEntree()?$animal->getDateEntree():null;
        $refuge=$animal->getIdRefuge()?$animal->getIdRefuge():null;
        $race=$animal->getIdRace()?$animal->getIdRace():null;
        $stmt=$bdd->prepare("INSERT INTO animal (id_animal, nom_animal, photo_animal, date_naissance_animal, age_animal, sexe_animal, description_animal, handicap_animal, urgence_animal, date_entree, id_refuge, id_race) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissiisii", $nom, $photo, $dateNaissance, $age, $sexe, $description, $handicap, $urgence, $dateEntree, $refuge, $race);
        $stmt->execute();
        $bdd->close();
    }

    public function delete(int $id) : void {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("DELETE FROM ANIMAL WHERE id_animal = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $bdd->close();
    }

    public function editNom(string $nom, int $id) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("UPDATE animal SET nom_animal = ? where id_animal = ?");
        $stmt->bind_param("si", $nom, $id);
        $stmt->execute();
        $bdd->close();
        return $nom;
    }

    public function editSexe(string $sexe, int $id) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("UPDATE animal SET sexe_animal = ? where id_animal = ?");
        $stmt->bind_param("si", $sexe, $id);
        $stmt->execute();
        $bdd->close();
        return $sexe;
    }

    public function editHandicap(int $handicap, int $id) : int {
       $bdd = $this->bddCo();
       $stmt = $bdd->prepare("UPDATE animal SET handicap_animal = ? where id_animal = ?");
       $stmt->bind_param("ii", $handicap, $id);
       $stmt->execute();
       $bdd->close();
       return $handicap;
    }

    public function editUrgence(int $urgence, int $id) : int {
       $bdd = $this->bddCo();
       $stmt = $bdd->prepare("UPDATE animal SET urgence_animal = ? where id_animal = ?");
       $stmt->bind_param("ii", $urgence, $id);
       $stmt->execute();
       $bdd->close();
       return $urgence;
    }

    public function editDateNaissance(string $dateNaissance, int $id) : string {
       $bdd = $this->bddCo();
       $stmt = $bdd->prepare("UPDATE animal SET date_naissance_animal = ? where id_animal = ?");
       $stmt->bind_param("si", $dateNaissance, $id);
       $stmt->execute();
       $bdd->close();
       return $dateNaissance;
    }

    public function editDateEntree(string $dateEntree, int $id) : string {
       $bdd = $this->bddCo();
       $stmt = $bdd->prepare("UPDATE animal SET date_entree = ? where id_animal = ?");
       $stmt->bind_param("si", $dateEntree, $id);
       $stmt->execute();
       $bdd->close();
       return $dateEntree;
    }

    public function editAge(int $age, int $id) : int {
       $bdd = $this->bddCo();
       $stmt = $bdd->prepare("UPDATE animal SET age_animal = ? where id_animal = ?");
       $stmt->bind_param("ii", $age, $id);
       $stmt->execute();
       $bdd->close();
       return $age;
    }
   
    public function editDescription(string $description, int $id) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("UPDATE animal SET description_animal = ? where id_animal = ?");
        $stmt->bind_param("si", $description, $id);
        $stmt->execute();
        $bdd->close();
        return $description;
    }

    public function editPhoto(string $photo, int $id) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("UPDATE animal SET photo_animal = ? where id_animal = ?");
        $stmt->bind_param("si", $photo, $id);
        $stmt->execute();
        $bdd->close();
        return $photo;
    }

    public function editRefuge(int $idRefuge, int $id) : int {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("UPDATE animal SET id_refuge = ? where id_animal = ?");
        $stmt->bind_param("ii", $idRefuge, $id);
        $stmt->execute();
        $bdd->close();
        return $idRefuge;
    }

    public function editRace(int $idRace, int $id) : int {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("UPDATE animal SET id_race = ? where id_animal = ?");
        $stmt->bind_param("ii", $idRace, $id);
        $stmt->execute();
        $bdd->close();
        return $idRace;
    }

    public function getBySearch($cond, $type, $values) {
        $bdd = $this->bddCo();       
        $result = $bdd->prepare("SELECT id_animal, photo_animal, nom_animal, age_animal, race, animal.id_race, sexe_animal, date_format(date_entree, '%d/%m/%Y') as date_entree,date_format(date_naissance_animal, '%d/%m/%Y') as date_naissance_animal, nom_refuge, espece, description_animal, urgence_animal, handicap_animal, animal.id_refuge as id_refuge, refuge.id_refuge as idRefuge, espece.id_espece as id_espece, race.id_espece as idEspece
        FROM $this->table 
        inner join race on animal.id_race = race.id_race 
        inner join espece on race.id_espece = espece.id_espece 
        inner join refuge on animal.id_refuge = refuge.id_refuge $cond and id_animal not in (select id_animal from adoption)");
       
       //where Champ LIKE ? and champ like ? and like
        //var_dump($values);
        $result->bind_param($type, ...array_values($values));
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;      
    }   


    //pagination
    public function getNombre() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT count(*) FROM $this->table");
        $data = $result->fetch_row();
        $result->free();
        $bdd->close();
        //var_dump($data);
        return $data;
    }

    public function getByPage(int $premiere, int $nombreParPage) : array {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT * FROM $this->table order by id_animal desc LIMIT ?, ?");
        $result->bind_param("ii", $premiere, $nombreParPage);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
        return $data;
    }


}
?>