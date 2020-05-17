<?php

interface InterfaceDAOAssociation {

    public function getAll() : array;

    public function editTitre(string $titre) : string;

    public function editChapo(string $chapo) : string;

    public function editMission(string $mission) : string;

    public function editMail(string $mail) : string;

    public function editFacebook(string $facebook) : string;

    public function editTelephone(string $telephone) : string;

    public function editAdresse(string $adresse) : string;

    public function editJours(string $jours) : string;

    public function editAm(string $am) : string;

    public function editPm(string $pm) : string;

}

?>