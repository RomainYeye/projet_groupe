<?php

include_once __DIR__."/../Interfaces/InterfaceDAORace.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessRace extends ConectSql implements InterfaceDAORace {

    public function selectAll() : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("select * from race");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function selectAllWhereEspeceIs(int $idEspece) : array {
        $bdd=$this->bddCo();
        #$stmt=$bdd->prepare("SELECT * FROM race AS a INNER JOIN espece AS b on a.id_espece = b.id_espece WHERE b.espece = '$espece'");
        $stmt=$bdd->prepare("SELECT * FROM race AS a INNER JOIN espece AS b on a.id_espece = b.id_espece WHERE b.id_espece = ?");
        $stmt->bind_param("i",$idEspece);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function selectRacesWhereEspeceIs(int $idEspece) : array {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("SELECT a.race FROM race AS a INNER JOIN espece AS b on a.id_espece = b.id_espece WHERE b.id_espece = ?");
        $stmt->bind_param("i",$idEspece);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function selectNomRaceWhereIdIs(int $idRace) : string {
        $bdd=$this->bddCo();
        $stmt=$bdd->prepare("SELECT race FROM race WHERE id_race = ?");
        $stmt->bind_param("i", $idRace);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data["race"];
    }

}

?>