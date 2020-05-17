<?php

include_once __DIR__."/../Interfaces/InterfaceDAOFavori.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessFavori extends ConectSql implements InterfaceDAOFavori {
    private $table = 'favoris';

    public function selectAll() : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select * from favoris");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function add(Favori $favori) : void {
        $bdd = $this->bddCo();
        $idAnimal = $favori->getIdAnimal();
        $idUtilisateur = $favori->getIdUtilisateur();
        $stmt = $bdd->prepare("INSERT INTO $this->table (id_animal, id_utilisateur) VALUES (?, ?)");
        $stmt->bind_param("ii", $idAnimal, $idUtilisateur);
        $stmt->execute();
        $bdd->close();
    }

    public function remove(Favori $favori) : void {
        $bdd = $this->bddCo();
        $idAnimal = $favori->getIdAnimal();
        $idUtilisateur = $favori->getIdUtilisateur();
        $stmt = $bdd->prepare("DELETE FROM favoris WHERE id_animal = ? and id_utilisateur = ?");
        $stmt->bind_param("ii", $idAnimal, $idUtilisateur);
        $stmt->execute();
        $bdd->close();
    }

    public function isFav(int $idAnimal, int $idUtilisateur) : bool {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("SELECT * FROM favoris WHERE id_animal = ? AND id_utilisateur = ?");
        $stmt->bind_param("ii", $idAnimal, $idUtilisateur);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data ? true : false;
    }

    public function findFavsOfUser(int $idUtilisateur) : ?array {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("SELECT e.id_animal, photo_animal, nom_animal, age_animal, race, a.id_race, sexe_animal, date_format(date_entree, '%d/%m/%Y') as date_entree,date_format(date_naissance_animal, '%d/%m/%Y') as date_naissance_animal, nom_refuge, espece, description_animal
                               FROM animal AS a
                               INNER JOIN race AS b ON a.id_race = b.id_race 
                               INNER JOIN espece AS c ON b.id_espece = c.id_espece 
                               INNER JOIN refuge AS d ON a.id_refuge = d.id_refuge
                               INNER JOIN favoris AS e ON a.id_animal = e.id_animal 
                               WHERE e.id_utilisateur = ?");
        $stmt->bind_param("i", $idUtilisateur);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }
}

?>