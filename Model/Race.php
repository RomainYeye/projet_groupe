<?php

class Race {
    private $idRace;
    private $nom;
    private $idEspece;

    public static function buildRace($array) {
        $race = new Race();
        $race->setIdRace($array[""])
             ->setNom($array[""])
             ->setIdEspece($array[""]);
        return $race;
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
     * Get the value of idEspece
     */ 
    public function getIdEspece()
    {
        return $this->idEspece;
    }

    /**
     * Set the value of idEspece
     *
     * @return  self
     */ 
    public function setIdEspece($idEspece)
    {
        $this->idEspece = $idEspece;

        return $this;
    }
}

?>