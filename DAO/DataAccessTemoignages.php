<?php
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessTemoignages extends ConectSql {
    private $table = 'temoignage';

    public function getAll() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_temoignage, DATE_FORMAT(date_adoption, '%d/%m/%Y') as date_adoption, animal.nom_animal as nom_animal_temoignage, temoignage.photo_animal, utilisateur.prenom,
                               message_temoignage, afficher, temoignage.id_utilisateur 
                               FROM $this->table 
                               INNER JOIN animal ON animal.id_animal = temoignage.id_animal
                               INNER JOIN utilisateur ON utilisateur.id_utilisateur = temoignage.id_utilisateur");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function getAllAllowed() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_temoignage, DATE_FORMAT(date_adoption, '%d/%m/%Y') as date_adoption, animal.nom_animal as nom_animal_temoignage, temoignage.photo_animal, utilisateur.prenom,
                               message_temoignage, afficher, temoignage.id_utilisateur 
                               FROM $this->table 
                               INNER JOIN animal ON animal.id_animal = temoignage.id_animal
                               INNER JOIN utilisateur ON utilisateur.id_utilisateur = temoignage.id_utilisateur 
                               WHERE $this->table.afficher = 1");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);
        return $data;
    }

    public function getOneIndex() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_temoignage, DATE_FORMAT(date_adoption, '%d/%m/%Y') as date_adoption, animal.nom_animal as nom_animal_temoignage, temoignage.photo_animal, utilisateur.prenom,
                               message_temoignage 
                               FROM $this->table 
                               INNER JOIN animal ON animal.id_animal = temoignage.id_animal 
                               INNER JOIN utilisateur ON utilisateur.id_utilisateur = temoignage.id_utilisateur 
                               ORDER BY rand() LIMIT 1");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $data;
    }

    public function getOneIndexAllowed() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_temoignage, DATE_FORMAT(date_adoption, '%d/%m/%Y') AS date_adoption, animal.nom_animal AS nom_animal_temoignage, temoignage.photo_animal, utilisateur.prenom, 
                               message_temoignage 
                               FROM $this->table 
                               INNER JOIN animal ON animal.id_animal = temoignage.id_animal
                               INNER JOIN utilisateur ON utilisateur.id_utilisateur = temoignage.id_utilisateur 
                               WHERE $this->table.afficher = 1
                               ORDER BY rand() LIMIT 1");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $data;
    }

    public function getId() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_temoignage FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);0
    return $data;
    }

    public function getBySearch(string $offset) : array {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT id_temoignage, DATE_FORMAT(date_adoption, '%d/%m/%Y') as date_adoption, animal.nom_animal as nom_animal_temoignage, temoignage.photo_animal, 
                                 message_temoignage, afficher, id_utilisateur 
                                 FROM $this->table 
                                 INNER JOIN animal ON animal.id_animal = temoignage.id_animal where message_temoignage like ? order by id_temoignage desc");
        $result->bind_param("s", $offset);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function majTemoignages(string $post, string $val,int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("UPDATE $this->table set $post= ? where id_temoignage=?");
        $result->bind_param("si", $val, $id);
        $result->execute();
        $bdd->close();
        return;
    }
    public function delTemoignages(int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("DELETE FROM $this->table where id_temoignage=? ");
        $result->bind_param("i", $id);
        $result->execute();
        $bdd->close();
        return;
    }
    
    public function add(Temoignage $temoignage) : void {
        $bdd = $this->bddCo();
        $dateAdoption=$temoignage->getDateAdoption()?$temoignage->getDateAdoption():null;
        $photoAnimal=$temoignage->getPhotoAnimal()?$temoignage->getPhotoAnimal():null;
        $messageTemoignage=$temoignage->getMessageTemoignage()?$temoignage->getMessageTemoignage():"null";
        $afficher=$temoignage->getAfficher();
        $idUtilisateur=$temoignage->getIdUtilisateur()?$temoignage->getIdUtilisateur():null;
        $idAnimal=$temoignage->getIdAnimal()?$temoignage->getIdAnimal():null;
        $stmt=$bdd->prepare("INSERT INTO temoignage (id_temoignage, date_adoption, photo_animal, message_temoignage, afficher, id_utilisateur, id_animal) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiii", $dateAdoption, $photoAnimal, $messageTemoignage, $afficher, $idUtilisateur, $idAnimal);
        $stmt->execute();
        $bdd->close();
    }

}


?>