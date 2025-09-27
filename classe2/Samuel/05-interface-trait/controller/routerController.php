<?php
// echo __FILE__; // Chemin et nom du fichier

# Connexion PDO
try {
    $connectPDO = new PDO(
        DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,
        DB_LOGIN,
        DB_PWD
    );
    // activation de l'affichage des erreurs
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // On va mettre nos résultats en fetch associatif
    $connectPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
}catch(Exception $e){
    die($e->getMessage());
}

// Page d'accueil
include RACINE_PATH. "/view/homepage.html.php";

// Bonne pratique
$connectPDO = null;