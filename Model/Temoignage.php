<?php

class Temoignage {
    private $id;
    private $dateAdoption;
    private $photoAnimal;
    private $messageTemoignage;
    private $afficher;
    private $idUtilisateur;
    private $idAnimal;

    public static function buildTemoignage($array, $dateAdoption, $idUtilisateur) {
        $temoignage = new Temoignage();
        $temoignage->setDateAdoption($dateAdoption)
                   ->setMessageTemoignage($array["texte_temoignage"])
                   ->setAfficher(0)
                   ->setIdUtilisateur($idUtilisateur)
                   ->setIdAnimal($array["animal-adopte"]);
        return $temoignage;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of dateAdoption
     */ 
    public function getDateAdoption()
    {
        return $this->dateAdoption;
    }

    /**
     * Set the value of dateAdoption
     *
     * @return  self
     */ 
    public function setDateAdoption($dateAdoption)
    {
        $this->dateAdoption = $dateAdoption;

        return $this;
    }

    /**
     * Get the value of photoAnimal
     */ 
    public function getPhotoAnimal()
    {
        return $this->photoAnimal;
    }

    /**
     * Set the value of photoAnimal
     *
     * @return  self
     */ 
    public function setPhotoAnimal($photoAnimal)
    {
        $this->photoAnimal = $photoAnimal;

        return $this;
    }

    /**
     * Get the value of messageTemoignage
     */ 
    public function getMessageTemoignage()
    {
        return $this->messageTemoignage;
    }

    /**
     * Set the value of messageTemoignage
     *
     * @return  self
     */ 
    public function setMessageTemoignage($messageTemoignage)
    {
        $this->messageTemoignage = $messageTemoignage;

        return $this;
    }

    /**
     * Get the value of afficher
     */ 
    public function getAfficher()
    {
        return $this->afficher;
    }

    /**
     * Set the value of afficher
     *
     * @return  self
     */ 
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;

        return $this;
    }

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of idAnimal
     */ 
    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    /**
     * Set the value of idAnimal
     *
     * @return  self
     */ 
    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;

        return $this;
    }
}
    