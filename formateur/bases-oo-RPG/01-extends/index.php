<?php
// on désactive le transtypage (typage strict).
declare(strict_types=1);

include "model/MyPerso.php";
include "model/OrcPerso.php";
include "config.php";
include "model/MyPDO.php";

$perso = new MyPerso();
$persoOrc = new OrcPerso();


# Connexion PDO
try {
    $connectPDO = new MyPDO(
        DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,
        DB_LOGIN,
        DB_PWD
    );
    // sur certains serveurs, l'affichage d'erreur est désactivé par défaut pour le driver (extension) PDO, ici on va choisir l'activation si on est en mode dev ou test, mais pas en prod (production voir config.php)
    if(ENV=="dev"||ENV=="test"){
        // activation de l'affichage des erreurs
        $connectPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

}catch(Exception $e){
    die($e->getMessage());

}

try {
    $stmt = $connectPDO->query("SELECT * FROM category");
    var_dump($stmt->fetchAll());
}catch (Exception $e){
    echo $e->getMessage();
}



var_dump($perso,$persoOrc,$connectPDO);

echo "<p>Anciens noms: {$perso->name} et {$persoOrc->name}</p>";
// impossible depuis l'extérieur des classes : protected et private
//echo "<p>Anciens surnoms: {$perso->surname} et {$persoOrc->surname}</p>";
// echo "<p>Anciens email: {$perso->email} et {$persoOrc->email}</p>";

$perso->name = "Pierre";
//$perso->getSurname(); // impossible, n'existe pas
$persoOrc->name = "Charlie";


echo "<p>Nouveaux noms: {$perso->name} et {$persoOrc->name}</p>";
// impossible depuis l'extérieur des classes : protected et private
//echo "<p>Anciens surnoms: {$perso->surname} et {$persoOrc->surname}</p>";
// echo "<p>Anciens email: {$perso->email} et {$persoOrc->email}</p>";
echo $persoOrc->getSurname();
$persoOrc->setSurname("LeGrand");
echo $persoOrc->getSurname();
echo gettype($persoOrc->getEndurance());
echo $persoOrc->getEndurance();

echo strtoupper($persoOrc->getSurname());

var_dump($perso,$persoOrc);

