<?php
// echo __FILE__; // chemin et nom de fichier

// chemin vers la classe
use model\ArticleManager;

# Connexion PDO
try {
    $connectPDO = new PDO(
        DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        ]
    );
}catch(Exception $e){
    die($e->getMessage());
}

// Instanciation du Manager d'ArticleMapping
$ArticleManager = new ArticleManager($connectPDO);

/*
 * Page d'accueil
 * On souhaite y afficher tous nos articles qui sont visibles
 */
if(isset($_GET['p'])){

    switch($_GET['p']){
        case 'admin':
            $nosArticle = $ArticleManager->readAll();
            include RACINE_PATH . "/view/admin.html.php";
            break;
    }

}else {
    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";
}

// fermeture de connexion
$connectPDO = null;