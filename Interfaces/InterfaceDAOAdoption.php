<?php

interface InterfaceDAOAdoption {

    public function selectAll() : ?array;

    public function adoptedByUtilisateur(int $idUtilisateur) : ?array;

    public function adoptedByUtilisateur2(int $idUtilisateur) : ?array;

    public function findDateOfAdoption(int $idUtilisateur, int $idAnimal) : string;

    public function addAdoption(int $id_utilisateur, int $id_animal, string $date_adoption);

}

?>