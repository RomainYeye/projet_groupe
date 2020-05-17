<?php

include_once __DIR__."/../Interfaces/InterfaceDAOAssociation.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessAssociation extends ConectSql implements InterfaceDAOAssociation {
    private $table = 'association';

    public function getAll() : array {
        $bdd = $this->bddCo();
        $result = $bdd->query("SELECT * from $this->table");
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $result->free();
        $bdd->close();
        return $data; 
    }

    public function editTitre(string $titre) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set titre = ? where id = 1");
        $stmt->bind_param("s", $titre);
        $stmt->execute();
        $bdd->close();
        return $titre;
    }

    public function editChapo(string $chapo) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set chapo = ? where id = 1");
        $stmt->bind_param("s", $chapo);
        $stmt->execute();
        $bdd->close();
        return $chapo;
    }

    public function editMission(string $mission) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set mission = ? where id = 1");
        $stmt->bind_param("s", $mission);
        $stmt->execute();
        $bdd->close();
        return $mission;
    }

    public function editMail(string $mail) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set mail = ? where id = 1");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $bdd->close();
        return $mail;
    }

    public function editFacebook(string $facebook) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set facebook = ? where id = 1");
        $stmt->bind_param("s", $facebook);
        $stmt->execute();
        $bdd->close();
        return $facebook;
    }

    public function editTelephone(string $telephone) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set telephone = ? where id = 1");
        $stmt->bind_param("s", $telephone);
        $stmt->execute();
        $bdd->close();
        return $telephone;
    }

    public function editAdresse(string $adresse) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set adresse = ? where id = 1");
        $stmt->bind_param("s", $adresse);
        $stmt->execute();
        $bdd->close();
        return $adresse;
    }

    public function editJours(string $jours) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set jours_ouverts = ? where id = 1");
        $stmt->bind_param("s", $jours);
        $stmt->execute();
        $bdd->close();
        return $jours;
    }

    public function editAm(string $am) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set horaires_am = ? where id = 1");
        $stmt->bind_param("s", $am);
        $stmt->execute();
        $bdd->close();
        return $am;
    }

    public function editPm(string $pm) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update association set horaires_pm = ? where id = 1");
        $stmt->bind_param("s", $pm);
        $stmt->execute();
        $bdd->close();
        return $pm;
    }

   }