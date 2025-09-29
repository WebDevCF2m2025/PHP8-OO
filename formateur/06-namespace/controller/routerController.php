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
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $payload = [
                    'article_title' => $_POST['article_title'] ?? null,
                    'article_text' => $_POST['article_text'] ?? null,
                    'article_date' => $_POST['article_date'] ?? date('Y-m-d H:i:s'),
                    'article_visibility' => isset($_POST['article_visibility']) ? (int)$_POST['article_visibility'] : 0,
                ];
                $article = new ArticleMapping($payload);
                $ArticleManager->create($article);
                header('Location: ./?p=admin');
                exit;
            }
            // afficher le formulaire de création
            $article = null; // pas de données existantes
            include RACINE_PATH . "/view/article_form.html.php";
            break;

        case 'edit':
            $id = isset($_GET['id'])? (int) $_GET['id'] : 0;
            if($id<=0){
                header('Location: ./?p=admin');
                exit;
            }
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $payload = [
                    'article_title' => $_POST['article_title'] ?? null,
                    'article_text' => $_POST['article_text'] ?? null,
                    'article_date' => $_POST['article_date'] ?? date('Y-m-d H:i:s'),
                    'article_visibility' => isset($_POST['article_visibility']) ? (int)$_POST['article_visibility'] : 0,
                ];
                $articleData = new ArticleMapping($payload);
                $ArticleManager->update($id, $articleData);
                header('Location: ./?p=admin');
                exit;
            }
            $article = $ArticleManager->readById($id);
            if($article===false){
                header('Location: ./?p=admin');
                exit;
            }
            include RACINE_PATH . "/view/article_form.html.php";
            break;

        case 'delete':
            $id = isset($_GET['id'])? (int) $_GET['id'] : 0;
            if($id>0){
                $ArticleManager->delete($id);
            }
            header('Location: ./?p=admin');
            exit;
    }

}else {
    // récupération des articles visibles
    $nosArticle = $ArticleManager->readAllVisible();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";
}

// fermeture de connexion
$connectPDO = null;