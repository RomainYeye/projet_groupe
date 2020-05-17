<?php

class Animal {
    private $idAnimal;
    private $nom;
    private $photo;
    private $dateNaissance;
    private $age;
    private $sexe;
    private $description;
    private $handicap;
    private $urgence;
    private $dateEntree;
    private $idRefuge;
    private $idRace;

    public static function buildAnimal($array) {
        $animal=new Animal();
        $animal->setNom($array["nom"])
               ->setDateNaissance($array["date-naissance"])
               ->setSexe($array["sexe"])
               ->setDescription($array["description"]);
        if(isset($array["handicap"])) {
            $animal->setHandicap($array["handicap"]);
        }
        if(isset($array["urgence"])) {
            $animal->setUrgence($array["urgence"]);
        }
        $animal->setDateEntree($array["date-entree"])
               ->setIdRefuge($array["id-refuge"])
               ->setAge($array["age"])
               ->setIdRace($array["id-race"]);

        return $animal;
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of handicap
     */ 
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set the value of handicap
     *
     * @return  self
     */ 
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get the value of urgence
     */ 
    public function getUrgence()
    {
        return $this->urgence;
    }

    /**
     * Set the value of urgence
     *
     * @return  self
     */ 
    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;

        return $this;
    }

    /**
     * Get the value of dateEntree
     */ 
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set the value of dateEntree
     *
     * @return  self
     */ 
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get the value of idRefuge
     */ 
    public function getIdRefuge()
    {
        return $this->idRefuge;
    }

    /**
     * Set the value of idRefuge
     *
     * @return  self
     */ 
    public function setIdRefuge($idRefuge)
    {
        $this->idRefuge = $idRefuge;

        return $this;
    }

    /**
     * Get the value of idRace
     */ 
    public function getIdRace()
    {
        return $this->idRace;
    }

    /**
     * Set the value of idRace
     *
     * @return  self
     */ 
    public function setIdRace($idRace)
    {
        $this->idRace = $idRace;

        return $this;
    }
}