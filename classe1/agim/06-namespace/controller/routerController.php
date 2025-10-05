<?php
// echo __FILE__; // chemin et nom de fichier
use model\Manager\ArticleManager;
use model\Manager\UserManager;
use model\Mapping\ArticleMapping;
use model\Mapping\UserMapping;


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
$UserManager = new UserManager($connectPDO);




if (
    isset($_SESSION['admin']) && $_SESSION['admin']
) {

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
                        $ArticleManager->update($id, $article);
                        header('Location:?p=admin');
                        exit();
                    }
                }

                include RACINE_PATH . "/view/admin.html.php";
                break;

            case 'create':
                if (!empty($_POST)) {
                    // Le formulaire a été soumis
                    $article = new ArticleMapping($_POST);
                    $ArticleManager->create($article);
                    header('Location:?p=admin');
                    exit();
                }
                // Afficher le formulaire (que ce soit GET ou POST avec erreur)
                include RACINE_PATH . "/view/admin.html.php";
                break;
            case  'deconnexion':

                $UserManager->logout();
                header('Location:./');
                exit();
        }
    } elseif (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        $id = (int) $_GET['delete'];
        $ArticleManager->delete($id);
        header('Location:?p=admin');
        exit();
    } else {

        // récupération des articles visibles

        $nosArticle = $ArticleManager->readAllVisible();
        // appel de la vue
        include RACINE_PATH . "/view/homepage.html.php";
    }
} else {

    if (isset($_GET['p']) && $_GET['p'] === "connexion") {
        if (!empty($_POST)) {
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];

            if ($UserManager->login($email, $password)) {
                $_SESSION['admin'] = 'admin';

                header('Location:?p=admin');
                exit();
            }
        }
    } elseif (isset($_GET['p']) && $_GET['p'] === "inscription") {
        if (!empty($_POST)) {
            try {
                $newUser = new UserMapping($_POST);
                $createdUser = $UserManager->create($newUser);
                if ($createdUser) {
                    $_SESSION['admin'] = 'admin';
                    session_regenerate_id(true);
                    header('Location:./');
                    exit();
                }
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }

    // récupération des articles visibles

    $nosArticle = $ArticleManager->readAllVisible();
    // appel de la vue
    include RACINE_PATH . "/view/homepage.html.php";
}




/*
 * Page d'accueil
 * On souhaite y afficher tous nos articles qui sont visibles
 */

// fermeture de connexion
$connectPDO = null;
