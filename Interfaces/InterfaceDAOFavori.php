<?php

interface InterfaceDAOFavori {

    public function selectAll() : array;

    public function add(Favori $favori) : void;

    public function remove(Favori $favori) : void ;

    public function isFav(int $idAnimal, int $idUtilisateur) : bool;

    public function findFavsOfUser(int $idUtilisateur) : ?array;

}

?>