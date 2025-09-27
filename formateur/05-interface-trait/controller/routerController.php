<?php
// echo __FILE__; // chemin et nom de fichier

# Connexion PDO
try {
    $connectPDO = new PDO(
        DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,
        DB_LOGIN,
        DB_PWD
    );
    // activation de l'affichage des erreurs
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // on va mettre nos résultats en FETCH_ASSOC
    $connectPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(Exception $e){
    die($e->getMessage());

}

/*
 * Page d'accueil
 * On souhaite y afficher tous nos articles qui sont visibles
 */
// Instanciation du Manager d'ArticleMapping
$ArticleManager = new ArticleManager($connectPDO);
// récupération des articles visibles
$nosArticle = $ArticleManager->readAllVisible();
// appel de la vue
include RACINE_PATH."/view/homepage.html.php";

// fermeture de connexion
$connectPDO = null;