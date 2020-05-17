<?php

include_once __DIR__."/../DAO/DataAccessRace.php";
include_once __DIR__."/../Interfaces/InterfaceServiceRace.php";
include_once __DIR__."/../Interfaces/InterfaceDAORace.php";

class ServiceRace implements InterfaceServiceRace {
    private $dAORace;

    public function __construct(InterfaceDAORace $dAO) {
        $this->dAORace=$dAO;
    }

    public function selectAll() : array {
        $data=$this->dAORace->selectAll();
        return $data;
    }
    
    public function selectAllWhereEspeceIs(int $idEspece): array {
        $data=$this->dAORace->selectAllWhereEspeceIs($idEspece);
        return $data;
    }

    public function selectRacesWhereEspeceIs(int $idEspece) : array {
        $data=$this->dAORace->selectRacesWhereEspeceIs($idEspece);
        return $data;
    }

    public function selectNomRaceWhereIdIs(int $idRace) : string {
        $nomRace = $this->dAORace->selectNomRaceWhereIdIs($idRace);
        return $nomRace;
    }

}

?>