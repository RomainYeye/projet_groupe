<?php

if(isset($_POST['contactBTN'])) {
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sujet = $_POST['sujet'];
    $ip = $_SERVER['REMOTE_ADDR'];
    //$host = $_SERVER['REMOTE_HOST'];
    $nav = $_SERVER['HTTP_USER_AGENT'];
    $message = $_POST['message'];
       
    if($nom==$prenom) {
        return "Nom et prenoms identique";
    } elseif(strpos($message,'http') || strpos($sujet,'http')) {
        return "liens interdit";
    }  elseif(!strpos($email,'@')) {
        return "email invalide";
    } elseif(empty($message) || empty($sujet) || empty($nom) || empty($prenom) || empty($email)) {
        return "formulaire vide";
    } else {
                                                   
        $sujet="Formulaire de contact $sujet";
        $mailDestinataire="dumber@live.fr";
    
        $from = "From: ".$nom . $prenom. "<".$email."> ";
        $header= $sujet;
        
        $messageMail = "
                Formulaire de contact :
                
                Nom :   ".$nom."
                Prenom :   ".$prenom."						
                Email :   ".$email."

                INFORMATIONS SECURITES : 
                ip :	".$ip."ouep 
                Nav :	".$nav."
                
                Objet :   ".$sujet."
                
                ----------- Message -----------
                ".Stripslashes($message)." 
                -------------------------------";
                
                mail($mailDestinataire, $sujet, $messageMail, $from);

    return;
    }
}