<?php
class DataAccessPrevention extends ConectSql {
    private $table = 'prevention';

    public function getAll() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_prevention, DATE_FORMAT(date_ajout_prevention, '%d/%m/%Y') as  date_ajout_prevention, photo_prevention, nom_prevention, texte_prevention FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function getOneIndex() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_prevention, DATE_FORMAT(date_ajout_prevention, '%d/%m/%Y') as date_ajout_prevention, photo_prevention, nom_prevention, texte_prevention FROM $this->table prevention order by rand() limit 1");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $data;
    }

    public function getId() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_prevention FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);0
    return $data;
    }

    public function getFirstPrev() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_prevention, DATE_FORMAT(date_ajout_prevention, '%d/%m/%Y') as date_ajout_prevention, photo_prevention, nom_prevention, texte_prevention FROM $this->table order by id_prevention DESC limit 1 offset 0");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
       // var_dump($data);
    return $data;
    }

    public function getPrevs() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT photo_prevention, nom_prevention, texte_prevention FROM $this->table order by id_prevention ASC");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
    return $data;
    }

    public function getBySearch( string $offset) : array {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT id_prevention, DATE_FORMAT(date_ajout_prevention, '%d/%m/%Y') as date_ajout_prevention, photo_prevention, nom_prevention, texte_prevention FROM $this->table where texte_prevention like ? order by id_prevention desc");
        $result->bind_param("s", $offset);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function majPreventions(string $post, string $val,int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("UPDATE $this->table set $post= ? where id_prevention=?");
        $result->bind_param("si", $val, $id);
        $result->execute();
        $bdd->close();
        return;
    }
    public function delPreventions(int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("DELETE FROM $this->table where id_prevention=? ");
        $result->bind_param("i", $id);
        $result->execute();
        $bdd->close();
        return;
    }

    public function addPrevention(string $date_ajout_prevention, string $nom_prevention, string $photo_prevention, string $texte_prevention) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("INSERT INTO $this->table values (NULL,?,?,?,?)");
        $result->bind_param("ssss", $date_ajout_prevention, $nom_prevention, $photo_prevention, $texte_prevention);
        $result->execute();
        $bdd->close();
        return;
    }

}


?>