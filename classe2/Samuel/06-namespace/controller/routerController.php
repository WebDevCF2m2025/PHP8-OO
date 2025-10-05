<?php
// echo __FILE__; // chemin et nom de fichier

// Chemin vers la classe Manager d'article
use model\ArticleManager;
// Chemin vers le mapping d'article
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
            // Si le formulaire est envoyé
            if(isset($_POST['article_title'], $_POST['article_text'], $_POST['article_visibility'])) {
                try {
                    // utilisation des setters
                    $newArticle = new ArticleMapping($_POST);
                    // pas de faute création du slug
                    // qui est importé par 'use SlugifyTrait' dans ArticleManager
                    $slug = $ArticleManager->slugify($newArticle->getArticleTitle());

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
            include RACINE_PATH . "/view/create.html.php";
            break;
        case 'update':
                if(!empty($_GET['id'])  && ctype_digit($_GET['id'])):
                    include RACINE_PATH."/view/update.html.php";
                else:
                    $message = "Touche pas à mon code !";
                    include RACINE_PATH."/view/404.html.php";
                endif;
            break;
        case 'delete':
            if(!empty($_GET['id'])  && ctype_digit($_GET['id'])):

            else:
                $message = "Touche pas à mon code !";
                include RACINE_PATH."/view/404.html.php";
            endif;
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