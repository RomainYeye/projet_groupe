<?php

include_once __DIR__."/../DAO/DataAccessFavori.php";
include_once __DIR__."/../Interfaces/InterfaceServiceFavori.php";
include_once __DIR__."/../Interfaces/InterfaceDAOFavori.php";

class ServiceFavori implements InterfaceServiceFavori{
    private $dAOFavori;

    public function __construct(InterfaceDAOFavori $dAO) {
        $this->dAOFavori=$dAO;
    }

    public function selectAll() : array {
        $data=$this->dAOFavori->selectAll();
        return $data;
    }

    public function add(Favori $favori) : void{
        $this->dAOFavori->add($favori);
    }

    public function isFav(int $idAnimal, int $idUtilisateur) : bool {
        $bool = $this->dAOFavori->isFav($idAnimal, $idUtilisateur);
        return $bool;
    }

    public function findFavsOfUser(int $idUtilisateur) : ?array {
        $data = $this->dAOFavori->findFavsOfUser($idUtilisateur);
        return $data;
    }
    
    public function remove(Favori $favori) : void  {
        $this->dAOFavori->remove($favori);
    }

}

?>
