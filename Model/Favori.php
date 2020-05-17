<?php

class Favori {
    private $idAnimal;
    private $idUtilisateur;

    public static function buildFavori($array) {
        $favori = new Favori();
        $favori->setIdAnimal($array["id_animal"])
               ->setIdUtilisateur($array["id_utilisateur"]);
        return $favori;
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
    }