<?php

include_once __DIR__."/../Interfaces/InterfaceDAOEspece.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessEspece extends ConectSql implements InterfaceDAOEspece {

    public function selectAll() : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select * from espece");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function select(string $choice) : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select $choice from espece");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function selectNomEspeceWhereIdIs(int $idEspece) : string {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("SELECT espece FROM espece WHERE id_espece = ?");
        $stmt->bind_param("i", $idEspece);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data["espece"];
    }

}

?>