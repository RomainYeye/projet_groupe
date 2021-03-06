<?php

interface InterfaceDAOUtilisateur {

    public function selectAll() : array;

    public function selectAllWhereMailIs(string $mail) : ?array;
    
    public function findIdByEmail(string $email) : int;

    public function checkIfMailAlreadyUsed(string $mail) : bool;

    public function add(Utilisateur $utilisateur) : void;

    public function selectPassFromMail(string $mail) : ?string;

    public function passVerify(string $mail, string $pass) : bool;

    public function selectTelOf(string $mail) : string;

    public function selectGradeOf(string $mail) : string;

    public function selectAdresseOf(string $mail) : array;

    public function editTelephone(string $telephone, string $mail) : string;

    public function editAdresse(array $array, string $mail) : array;

    public function editMail(string $newMail, string $currentMail) : string;

    public function editPassword(string $newPassword, string $mail) : void;

    public function edit(string $mail, array $array) : void;

    public function getBySearch(string $offset) : array;
    
    public function majUsers(string $post, string $val, int $id);

}

?>