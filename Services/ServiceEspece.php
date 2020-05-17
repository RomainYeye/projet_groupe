<?php

include_once __DIR__."/../DAO/DataAccessEspece.php";
include_once __DIR__."/../Interfaces/InterfaceServiceEspece.php";
include_once __DIR__."/../Interfaces/InterfaceDAOEspece.php";

class ServiceEspece implements InterfaceServiceEspece {
    private $dAOEspece;

    public function __construct(InterfaceDAOEspece $dAO) {
        $this->dAOEspece=$dAO;
    }

    public function selectAll() : array {
        $data=$this->dAOEspece->selectAll();
        return $data;
    }

    public function select(string $option) : array {
        $data=$this->dAOEspece->select($option);
        return $data;
    }    

    public function selectNomEspeceWhereIdIs(int $idEspece) : string {
        $nomEspece = $this->dAOEspece->selectNomEspeceWhereIdIs($idEspece);
        return $nomEspece;
    }

}

?>