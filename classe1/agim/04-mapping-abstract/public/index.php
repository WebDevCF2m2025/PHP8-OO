<?php

declare(strict_types=1);

require_once "../config.php";

// utilisation de la racine pour construire nos include, require etc.
require_once RACINE_PATH . "/model/AbstractMapping.php";
require_once RACINE_PATH . "/model/ArticleMapping.php";

# Connexion PDO
try {
    $connectPDO = new PDO(
        DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,
        DB_LOGIN,
        DB_PWD
    );
    // activation de l'affichage des erreurs
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // on va mettre nos résultats en FETCH_ASSOC
    $connectPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die($e->getMessage());
}

// si le formulaire a été envoyé
if (!empty($_POST)) {
    // on va tenter d'hydrater notre ArticleMapping
    try {
        // on coche la case, la clef "article_visibility" existe dans $_POST
        // si on ne la coche pas, la clef n'existe pas
        // on va donc la créer avec une valeur de 0
        if (!isset($_POST['article_visibility'])) {
            $_POST['article_visibility'] = false;
        }
        // création d'un article depuis le formulaire
        $articleInsert = new ArticleMapping($_POST);
        echo "<pre>";
        var_dump($articleInsert);
        echo "</pre>";
        // comme le titre n'est pas transformé en slug,
        // on récupère le titre $articleInsert->getArticleTitle(),
        // on le décode de l'html (pour récupérer le ' et " etc...)
        // avec html_entity_decode()
        // on le slugifie avec la méthode publique venant de
        // la classe abstraite $articleInsert->slugify();
        $slug = $articleInsert->slugify(html_entity_decode($articleInsert->getArticleTitle()));
        // mise à jour de l'objet avant son insertion dans la DB
        $articleInsert->setArticleSlug($slug);
        // exercice 1 Insérez l'article dans la table article

        // ICI
        $sql = "INSERT INTO article (article_title, article_text, article_slug, article_visibility, article_date)
        VALUES (:title, :text, :slug, :visibility, NOW())";

        $stmt = $connectPDO->prepare($sql);
        $stmt->execute([
            ':title' => $articleInsert->getArticleTitle(),
            ':text' => $articleInsert->getArticleText(),
            ':slug' => $articleInsert->getArticleSlug(),
            ':visibility' => $articleInsert->getArticleVisibility()
        ]);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    // formulaire non envoyé Exercice 2
}
// récupérez tous les articles dont article_visibility vaut 1 par article_date DESC
// faites-en des objets de type ArticleMapping
try {
    $sql = "SELECT * FROM article WHERE article_visibility = 1 ORDER BY article_date DESC";
    $stmt = $connectPDO->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    $articleGetAll = [];
    foreach ($results as $row) {
        $articleGetAll[] = new ArticleMapping($row);
    }
} catch (Exception $e) {
    echo "<p>Erreur : " . $e->getMessage() . "</p>";
}
?>

<h2>Articles publiés</h2>
<ul>
    <?php if (!empty($articleGetAll)) : ?>
        <?php foreach ($articleGetAll as $i => $value) : ?>
            <li>
                <?= $value->getArticleTitle(); ?>  créé le <?= $value->getArticleDate(); ?>
            </li>
        <?php endforeach; ?>
    <?php else : ?>
        <li>Aucun article publié pour le moment.</li>
    <?php endif; ?>
</ul>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'hydratation via la classe abstraite</title>
</head>

<body>
    <h1>L'hydratation via la classe abstraite</h1>
    <h2>Nous allons créer l'hydratation et le constructeur dans la classe abstraite</h2>
    <p>Exemple de fonctionnement</p>
    <?php
    $article1 = new ArticleMapping([
        "id" => 7,
        "plouc" => "lala",
        "article_title" => "hjgjyfyjutuyt",
        "article_slug" => "DKEFFFFguyty-sdgffeg-zertreyt",
    ]);
    var_dump($article1);
    ?>
    <h2>Nos articles</h2>
    <p>Affichage de nos articles en utilisant les getters des objets de type ArticleMapping</p>

    <p>Créez un article via ce formulaire</p>


    <form action="" method="post">
        <div>
            <label for="article_title">Title:</label>
            <input type="text" id="article_title" name="article_title" value="Mon titre d'article">
        </div>
        <div>
            <label for="article_text">Text:</label>
            <textarea id="article_text" name="article_text">Ceci est le texte de mon article, il est assez long pour être valide.</textarea>
        </div>
        <div>
            <label for="article_date">Date:</label>
            <input type="datetime-local" id="article_date" name="article_date" value="<?= date('Y-m-d\TH:i') ?>">
        </div>
        <div>
            <label for="article_visibility">Visible:</label>
            <input type="checkbox" id="article_visibility" name="article_visibility" value="1" checked>
        </div>
        <div>
            <input type="hidden" name="verifyID" value="csfr4567345758757">
            <button type="submit">Créer l'article</button>
        </div>
    </form>
    <?php

    if (isset($articleInsert)) var_dump($articleInsert);
    var_dump($_POST);
    ?>
</body>

</html>