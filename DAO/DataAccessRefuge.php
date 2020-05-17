<?php

include_once __DIR__."/../Interfaces/InterfaceDAORefuge.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessRefuge extends ConectSql implements InterfaceDAORefuge {

    public function selectAll() : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select * from refuge");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function select(string $choice) : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select $choice from refuge");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

}

?>