<?php
include_once __DIR__."/../DAO/ConectSql.php";
class DataAccessActu extends ConectSql {
    private $table = 'actualite';

    public function getAll() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_actualite, date_ajout_actualite, photo_actualite, nom_actualite, texte_actualite FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        var_dump($data);
    return $data;
    }

    public function getId() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_actualite FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);0
    return $data;
    }

    public function getFirstActu() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_actualite, date_ajout_actualite, photo_actualite, nom_actualite, texte_actualite FROM $this->table order by id_actualite DESC limit 1 offset 0");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
       // var_dump($data);
    return $data;
    }

    public function getActus() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT photo_actualite, nom_actualite, texte_actualite FROM $this->table order by id_actualite ASC");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
    return $data;
    }
}
?>