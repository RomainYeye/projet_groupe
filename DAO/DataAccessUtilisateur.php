<?php

include_once __DIR__."/../Interfaces/InterfaceDAOUtilisateur.php";
include_once __DIR__."/../DAO/ConectSql.php";

class DataAccessUtilisateur extends ConectSql implements InterfaceDAOUtilisateur {

    public function selectAll() : array {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select * from utilisateur");
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function selectAllWhereMailIs(string $mail) : ?array {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select * from utilisateur where mail=?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        return $data;
    }

    public function findIdByEmail(string $email) : int {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select id_utilisateur from utilisateur where mail=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $bdd->close();
        return $data["id_utilisateur"];
    }

    public function checkIfMailAlreadyUsed(string $mail) : bool {
        $check=false;
        $data=$this->selectAllWhereMailIs($mail);
        if($data!=null) {
            $check=true;
        }
        return $check;
    }
    
    public function add(Utilisateur $utilisateur) : void {
        $bdd = $this->bddCo();
        $nomF=$utilisateur->getNom()?$utilisateur->getNom():null;
        $prenomF=$utilisateur->getPrenom()?$utilisateur->getPrenom():null;
        $mailF=$utilisateur->getMail()?$utilisateur->getMail():null;
        $passwordF=$utilisateur->getPassword()?$utilisateur->getPassword():null;
        $crypPass=password_hash($passwordF, PASSWORD_DEFAULT);
        $numeroF=$utilisateur->getNumero()?$utilisateur->getNumero():'null';
        $voieF=$utilisateur->getVoie()?$utilisateur->getVoie():null;
        $villeF=$utilisateur->getVille()?$utilisateur->getVille():null;
        $codePostalF=$utilisateur->getcodePostal()?$utilisateur->getcodePostal():'null';
        $telephoneF=$utilisateur->getTelephone()?$utilisateur->getTelephone():'null';
        $gradeF=$utilisateur->getGrade();
        $stmt=$bdd->prepare("insert into utilisateur values (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '')");
        $stmt->bind_param("ssssississ", $nomF, $prenomF, $mailF, $crypPass, $numeroF, $voieF, $villeF, $codePostalF, $telephoneF, $gradeF);
        $stmt->execute();
        $bdd->close();
    }

    public function selectPassFromMail(string $mail) : ?string {
        $bdd = $this->bddCo();
        $data=$this->selectAllWhereMailIs($mail);
        if($data!=null) {
            $stmt=$bdd->prepare("select password from utilisateur where mail=?");
            $stmt->bind_param("s", $mail);
            $stmt->execute();
            $rs=$stmt->get_result();
            $data=$rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $bdd->close();
        return $data["password"];
        } else return null;
    }

    public function passVerify(string $mail, string $pass) : bool {
        $check=false;
        $realPass=$this->selectPassFromMail($mail);
        if (password_verify($pass, $realPass)==true) {
            $check=true;
        }
        return $check;
    }

    public function selectTelOf(string $mail) : string {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select telephone from utilisateur where mail = ?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $bdd->close();
        return $data["telephone"];
    }

    public function selectGradeOf(string $mail) : string {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select grade from utilisateur where mail = ?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $bdd->close();
        return $data["grade"];
    }

    public function selectAdresseOf(string $mail) : array {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("select numero, rue, ville, codePostal from utilisateur where mail = ?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_array(MYSQLI_ASSOC);
        $bdd->close();
        return array("numero" => $data["numero"], "rue" => $data["rue"], "ville" => $data["ville"], "codePostal" => $data["codePostal"]);
    }

    public function editTelephone(string $telephone, string $mail) : string {
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("update utilisateur set telephone = ? where mail = ?");
        $stmt->bind_param("ss", $telephone, $mail);
        $stmt->execute();
        $bdd->close();
        return $telephone;
    }

    public function editAdresse(array $array, string $mail) : array {
        $bdd = $this->bddCo();
        $numero = $array["numero"];
        $rue = $array["rue"];
        $ville = $array["ville"];
        $codePostal = $array["codePostal"];
        $stmt = $bdd->prepare("update utilisateur set numero = ?, rue = ?, ville = ?, codePostal = ? where mail = ?");
        $stmt->bind_param("sssss", $numero, $rue, $ville, $codePostal, $mail);
        $stmt->execute();
        $bdd->close();
        return array("numero" => $numero, "rue" => $rue, "ville" => $ville, "codePostal" => $codePostal);
    }

    public function editMail(string $newMail, string $currentMail) : string {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update utilisateur set mail = ? where mail = ?");
        $stmt->bind_param("ss", $newMail, $currentMail);
        $stmt->execute();
        $bdd->close();
        return $newMail;
    }

    public function editPassword(string $newPassword, string $mail) : void {
        $bdd = $this->bddCo();
        $stmt = $bdd->prepare("update utilisateur set password = ? where mail = ?");
        $crypPass = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $crypPass, $mail);
        $stmt->execute();
        $bdd->close();
    }
    
    public function edit(string $mail, array $array) : void {
        $request="";
        $type="";
        $counter=0;
        $tabLength=count(array_filter($array))-1;
        foreach($array as $key=> $value) {
            switch ($key) {
                case "newMailConfirm" :
                    if($counter<$tabLength-2) {
                        $request.="mail = ?, ";
                    } else {
                        $request.= "mail = ?";
                    }
                    $type.="s";
                    $counter++;
                    $arrayOfValues[$counter-1] = $value;
                    break;
                case "new-pass-confirmed" :
                    if($counter<$tabLength-2) {
                        $request.="password = ?, ";
                    } else {
                        $request.= "password = ?";
                    } 
                    $type.="s";
                    $counter++;
                    $value=password_hash($value, PASSWORD_DEFAULT);
                    $arrayOfValues[$counter-1] = $value;
                    break;
                case "numero" :
                    if($counter<$tabLength-1) {
                        $request.="numero = ?, ";
                    } else {
                        $request.= "numero = ?";
                    }
                    $type.="s";
                    $counter++;
                    $arrayOfValues[$counter-1] = $value;
                    break;
                case "rue" :
                    if($counter<$tabLength-1) {
                        $request.="rue = ?, ";
                    } else {
                        $request.= "rue = ?";
                    }
                    $type.="s";
                    $counter++;
                    $arrayOfValues[$counter-1] = $value;
                    break;
                case "ville" :
                    if($counter<$tabLength-1) {
                        $request.="ville = ?, ";
                    } else {
                        $request.= "ville = ?";
                    }
                    $type.="s";
                    $counter++;
                    $arrayOfValues[$counter-1] = $value;
                    break;
                case "telephone" :
                    if($counter<$tabLength-1) {
                        $request.="telephone = ?, ";
                    } else {
                        $request.= "telephone = ?";
                    }
                    $type.="s";
                    $counter++;
                    $arrayOfValues[$counter-1] = $value;
                break;
                case "codePostal" :
                    if($counter<$tabLength-1) {
                        $request.="codePostal = ?, ";
                    } else {
                        $request.= "codePostal = ?";
                    }
                    $type.="s";
                    $counter++;
                    $arrayOfValues[$counter-1] = $value;
                break;
                }
        }
        $type.="s";
        $arrayOfValues[$counter] = $mail;
        $bdd = $this->bddCo();
        $stmt=$bdd->prepare("update utilisateur set $request where mail=?");
        $stmt->bind_param($type, ...$arrayOfValues);
        $stmt->execute();
        $bdd->close();
    }


    public function getBySearch( string $offset) : array {
        $offsetP = $offset;
        $bdd = $this->bddCo();
        $result = $bdd->prepare("SELECT * FROM utilisateur where nom like ? or prenom like ? order by id_utilisateur desc");
        $result->bind_param("ss", $offset, $offsetP);
        $result->execute();
        $rs = $result->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $bdd->close();
        //var_dump($data);
    return $data;
    }

    public function majUsers(string $post, string $val,int $id) {
        $bdd = $this->bddCo();
        $result = $bdd->prepare("UPDATE utilisateur set $post= ? where id_utilisateur=?");
        $result->bind_param("si", $val, $id);
        $result->execute();
        $bdd->close();
        return;
    }

}

?>