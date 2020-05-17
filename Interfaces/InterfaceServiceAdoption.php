<?php

interface InterfaceServiceAdoption {

    public function selectAll() : ?array;

    public function adoptedByUtilisateur(int $idUtilisateur) : ?array;

    public function adoptedByUtilisateur2(int $idUtilisateur) : ?array;

    public function findDateOfAdoption(int $idUtilisateur, int $idAnimal) : string;

    public function addAdoption($array);

}

?>