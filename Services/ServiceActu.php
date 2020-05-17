<?php

class ServiceActu {
    private $dao;

    public function __construct() {
        $this->dao = new DataAccessActu();
    }

    public function getId() {
        $listId = $this->dao->getId();
        return $listId;
        
    }

    public function getFirstActu() {
        $listActu = $this->dao->getFirstActu();
        return $listActu;
    }

    public function getActus() {
        $listActu = $this->dao->getActus();
        return $listActu;
    }

}

?>