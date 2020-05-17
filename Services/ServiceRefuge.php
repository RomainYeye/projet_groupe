<?php

include_once __DIR__."/../DAO/DataAccessRefuge.php";
include_once __DIR__."/../Interfaces/InterfaceServiceRefuge.php";
include_once __DIR__."/../Interfaces/InterfaceDAORefuge.php";

class ServiceRefuge implements InterfaceServiceRefuge {
    private $dAORefuge;

    public function __construct(InterfaceDAORefuge $refugeService) {
        $this->dAORefuge=$refugeService;
    }

    public function selectAll() : array {
        $data=$this->dAORefuge->selectAll();
        return $data;
    }

    public function select(string $option) : array {
        $data=$this->dAORefuge->select($option);
        return $data;
    }    

}

?>