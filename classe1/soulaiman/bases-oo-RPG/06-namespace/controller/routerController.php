<?php
// echo __FILE__; // chemin et nom de fichier

// chemin vers la classe
use model\ArticleManager;
use model\ArticleMapping;

# Connexion PDO
try {
    $connectPDO = new PDO(
        DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,
        DB_LOGIN,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (Exception $e) {
    die($e->getMessage());
}

// Instanciation du Manager d'ArticleMapping
$ArticleManager = new ArticleManager($connectPDO);

/*
 * Page d'accueil
 * On souhaite y afficher tous nos articles qui sont visibles
 */
if (isset($_GET['p'])) {

    switch ($_GET['p']) {
        case 'admin':
            $nosArticle = $ArticleManager->readAll();

            if (isset($_GET['update']) && is_numeric($_GET['update'])) {
                $id = (int) $_GET['update'];
                $articleToUpdate = $ArticleManager->readById($id);

                if (!$articleToUpdate) {
                    header('Location:?p=admin');
                    exit();
                }

                if (!empty($_POST)) {
                    $article = new ArticleMapping($_POST);
                    $article->setId($id);
                    $updateArticle = $ArticleManager->update($id, $article);

                    if ($updateArticle === true) {
                        header('Location:?p=admin');
                        exit();
                    }
                }
            }

            include RACINE_PATH . "/view/admin.html.php";
            break;

        case 'create':
            if (!empty($_POST)) {
                // Le formulaire a été soumis
                $article = new ArticleMapping($_POST);
                $createArticle = $ArticleManager->create($article);

                if ($createArticle === true) {
                    // Succès de la création
                    header('Location:?p=admin');
                    exit();
                }
            }
            // Afficher le formulaire (que ce soit GET ou POST avec erreur)
            include RACINE_PATH . "/view/admin.insert.html.php";
            break;
    }
} elseif (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $deleteArticleById = $ArticleManager->delete($id);
    header('Location:?p=admin');
    exit();
} else {
    // récupération des articles visibles

    $nosArticle = $ArticleManager->readAllVisible();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";
}

// fermeture de connexion
$connectPDO = null;