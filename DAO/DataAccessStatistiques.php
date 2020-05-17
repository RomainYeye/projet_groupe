<?php

class DataAccessStatistiques extends ConectSql {
    private $table = 'statistique';

    public function getAll() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT id_statistique, DATE_FORMAT(derniere_edition_statistique, '%d/%m/%Y') as derniere_edition_statistique, nom_statistique, chiffres_statistique, type_gestion_statistique, afficher_statistique FROM $this->table");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function getNombre() {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT count(*) FROM $this->table");
        $data = $result->fetch_row();
        $result->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }
    // a refaire avec la bonne requete
    public function getNombreSearch(string $offset) :array {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT count(*) FROM $this->table where nom_statistique like ? ");
        $result->bind_param("s", $offset);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function getByPage(int $premiere, int $nombreParPage) : array {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT * FROM $this->table order by id_statistique desc LIMIT ?, ?");
        $result->bind_param("ii", $premiere, $nombreParPage);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function getBySearch( string $offset) : array {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT  id_statistique, DATE_FORMAT(derniere_edition_statistique, '%d/%m/%Y') as derniere_edition_statistique, nom_statistique, chiffres_statistique, type_gestion_statistique, afficher_statistique  FROM $this->table where nom_statistique like ? order by id_statistique desc");
        $result->bind_param("s", $offset);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function getIndex(int $limit) {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT nom_statistique, chiffres_statistique FROM $this->table where afficher_statistique='1' order by rand() limit $limit");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        //var_dump($data);
        return $data;
    }

    public function addStats(string $derniere_edition_statistique, string $nom_statistique, float $chiffres_statistique, string $type_gestion_statistique, string $afficher_stats) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("INSERT INTO $this->table values (NULL,?,?,?,?,?)");
        $result->bind_param("ssdss", $derniere_edition_statistique, $nom_statistique, $chiffres_statistique, $type_gestion_statistique, $afficher_stats);
        $result->execute();
        $bdd->close();
        return;
    }
    public function majStats(string $post, string $val,int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("UPDATE $this->table set $post= ? where id_statistique=?");
        $result->bind_param("si", $val, $id);
        $result->execute();
        $bdd->close();
        return;
    }
    public function delStats(int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("DELETE FROM $this->table where id_statistique=? and type_gestion_statistique=1");
        $result->bind_param("i", $id);
        $result->execute();
        $bdd->close();
        return;
    }

}
?>