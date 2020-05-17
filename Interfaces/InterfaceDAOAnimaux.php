<?php

interface InterfaceDAOAnimaux {

    public function getAll();

    public function getFrom(string $colonne, string $table) : array;

    public function getFirstArrivant($offset);

    public function add($object) : void;

    public function delete(int $id) : void;

    public function editNom(string $nom, int $id) : string;

    public function editSexe(string $sexe, int $id) : string;

    public function editHandicap(int $handicap, int $id) : int;

    public function editUrgence(int $urgence, int $id) : int;

    public function editDateNaissance(string $dateNaissance, int $id) : string;

    public function editDateEntree(string $dateEntree, int $id) : string;

    public function editAge(int $age, int $id) : int;

    public function editDescription(string $description, int $id) : string;

    public function editPhoto(string $photo, int $id) : string;

    public function editRefuge(int $idRefuge, int $id) : int;

    public function editRace(int $idRace, int $id) : int;

    public function getBySearch($cond, $type, $values);

}

?>