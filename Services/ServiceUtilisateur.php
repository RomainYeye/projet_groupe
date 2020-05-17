<?php

include_once __DIR__."/../DAO/DataAccessUtilisateur.php";
include_once __DIR__."/../Interfaces/InterfaceServiceUtilisateur.php";
include_once __DIR__."/../Interfaces/InterfaceDAOUtilisateur.php";

class ServiceUtilisateur implements InterfaceServiceUtilisateur {
    private $dAOUtilisateur;

    public function __construct(InterfaceDAOUtilisateur $dAO) {
        $this->dAOUtilisateur=$dAO;
    }

    public function selectAll() : array {
        $data=$this->dAOUtilisateur->selectAll();
        return $data;
    }

    public function selectAllWhereMailIs(string $mail) : ?array {
        $data=$this->dAOUtilisateur->selectAllWhereMailIs($mail);
        return $data;
    }

    public function findIdByEmail(string $email): int {
        $data = $this->dAOUtilisateur->findIdByEmail($email);
        return $data;
    }

    public function checkIfMailAlreadyUsed(string $mail) : bool {
        $bool=$this->dAOUtilisateur->checkIfMailAlreadyUsed($mail);
        return $bool;
    }

    public function add(Utilisateur $utilisateur) : void {
        $this->dAOUtilisateur->add($utilisateur);
    }

    public function selectPassFromMail(string $mail) : ?string {
        $data=$this->dAOUtilisateur->selectPassFromMail($mail);
        return $data;
    }

    public function passVerify(string $mail, string $pass) : bool {
        $bool=$this->dAOUtilisateur->passVerify($mail, $pass);
        return $bool;
    }

    public function selectTelOf(string $mail) : string {
        $data=$this->dAOUtilisateur->selectTelOf($mail);
        return $data;
    }
    
    public function selectGradeOf(string $mail) : string {
        $data=$this->dAOUtilisateur->selectGradeOf($mail);
        return $data;
    }

    public function selectAdresseOf(string $mail) : array {
        $array=$this->dAOUtilisateur->selectAdresseOf($mail);
        return $array;
    }
    
    public function editTelephone(string $telephone, string $mail) : string {
        $telephone=$this->dAOUtilisateur->editTelephone($telephone, $mail);
        return $telephone;
    }

    public function editAdresse(array $array, string $mail) : array {
        $array=$this->dAOUtilisateur->editAdresse($array, $mail);
        return $array;
    }

    public function editMail(string $newMail, string $currentMail) : string {
        $newMail=$this->dAOUtilisateur->editMail($newMail, $currentMail);
        return $newMail;
    }

    public function editPassword(string $newPassword, string $mail) : void {
        $this->dAOUtilisateur->editPassword($newPassword, $mail);
    }

    public function edit(string $mail, array $array) : void {
        $this->dAOUtilisateur->edit($mail, $array);

    }

    public function generateRandomString(int $length)  : string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function majUsers($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="majUsers") {
                    $id = $val;
                }
             }	
         }
         $users = $this->dAOUtilisateur->majUsers($post, $val, $id);
         return $users;
     }

    public function getBySearch($offset) {
        $adminUsersBySearch = $this->dAOUtilisateur->getBySearch("%$offset%");
        return $adminUsersBySearch;
    }

}

?>