<?php
$bdd_host = "localhost";
$bdd_user = "adopteunanimal";
$bdd_pass = "1234";
$bdd_base = "adopteunanimal";


$bdd = new mysqli($bdd_host,$bdd_user, $bdd_pass, $bdd_base);

if ($bdd->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $bdd->connect_errno . ") " . $bdd->connect_error;

}

try
{
$db = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_base.'', $bdd_user, $bdd_pass);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


//require_once('fonctions.php');
?>
