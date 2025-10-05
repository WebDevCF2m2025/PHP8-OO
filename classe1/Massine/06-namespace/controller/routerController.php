<?php
// echo __FILE__; // chemin et nom de fichier

// chemin vers la classe
use model\ArticleManager;
use model\ArticleMapping;
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
        case 'create':
            if(isset($_POST)&&!empty($_POST)){
                $article = new ArticleMapping($_POST);
                $ArticleManager->create($article);
                header('Location: ./');
                exit;
            }
            include RACINE_PATH . "/view/create.html.php";
    }
}elseif (isset($_GET['delete'])&&is_numeric($_GET['delete'])) {
    $ArticleManager->delete((int)$_GET['delete']);
    header('Location: ?p=admin');
    exit;
}elseif (isset($_GET['update'])&&is_numeric($_GET['update'])) {
    $monArticle = $ArticleManager->readById((int)$_GET['update']);
    
    if(isset($_POST)&&!empty($_POST)){

    $article = new ArticleMapping($_POST);



    $ArticleManager->update((int)$_GET['update'],$article);
    header('Location: ?p=admin');
    exit;
    }

    include RACINE_PATH . "/view/update.html.php";
}else {
    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";
}


// fermeture de connexion
$connectPDO = null;