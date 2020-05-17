<?php

include_once __DIR__."/../DAO/DataAccessAssociation.php";
include_once __DIR__."/../Interfaces/InterfaceServiceAssociation.php";
include_once __DIR__."/../Interfaces/InterfaceDAOAssociation.php";

class ServiceAssociation implements InterfaceServiceAssociation {
    private $dAOAssociation;

    public function __construct(InterfaceDAOAssociation $dAO) {
        $this->dAOAssociation=$dAO;
    }

    public function getAll() : array {
        $data=$this->dAOAssociation->getAll();
        return $data;
    }

    public function editTitre(string $titre) : string {
        $updatedTitre = $this->dAOAssociation->editTitre($titre);
        return $updatedTitre;
    }

    public function editChapo(string $chapo) : string {
        $updatedChapo = $this->dAOAssociation->editChapo($chapo);
        return $updatedChapo;
    }

    public function editMission(string $mission) : string {
        $updatedMission = $this->dAOAssociation->editMission($mission);
        return $updatedMission;
    }

    public function editMail(string $mail) : string {
        $updatedMail = $this->dAOAssociation->editMail($mail);
        return $updatedMail;
    }

    public function editFacebook(string $facebook) : string {
        $updatedFacebook = $this->dAOAssociation->editFacebook($facebook);
        return $updatedFacebook;
    }

    public function editTelephone(string $telephone) : string {
        $updatedTelephone = $this->dAOAssociation->editTelephone($telephone);
        return $updatedTelephone;
    }

    public function editAdresse(string $adresse) : string {
        $updatedAdresse = $this->dAOAssociation->editAdresse($adresse);
        return $updatedAdresse;
    }

    public function editJours(string $jours) : string {
        $updatedJours = $this->dAOAssociation->editJours($jours);
        return $updatedJours;
    }

    public function editAm(string $am) : string {
        $updatedAm = $this->dAOAssociation->editAm($am);
        return $updatedAm;
    }

    public function editPm(string $pm) : string {
        $updatedPm = $this->dAOAssociation->editPm($pm);
        return $updatedPm;
    }

}

?>