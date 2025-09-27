<?php
declare(strict_types=1);

require_once "../config.php";

//echo RACINE_PATH; // racine du site
//echo __DIR__; // partie public

// utilisation de la racine pour construire nos include, require etc.
require_once RACINE_PATH."/model/AbstractMapping.php";
require_once RACINE_PATH."/model/ArticleMapping.php";

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

// si le formulaire a été envoyé
if(!empty($_POST)) {
    // on va tenter d'hydrater notre ArticleMapping
    try {
        // on coche la case, la clef "article_visibility" existe dans $_POST
        // si on ne la coche pas, la clef n'existe pas,
        // on va donc la créer avec une valeur de 0
        if (!isset($_POST['article_visibility'])) {
            $_POST['article_visibility'] = 0;
        }
        // création d'un article depuis le formulaire
        $articleInsert = new ArticleMapping($_POST);
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
        $stmt = $connectPDO->prepare("
            INSERT INTO `article` (`article_title`,
                                 `article_slug`,
                                 `article_text`,
                                 `article_date`,
                                 `article_visibility`
                                 ) VALUES 
                                       (:title,:slug,:text,:date,:visibility);
        ");
        $stmt->bindValue("title", $articleInsert->getArticleTitle());
        $stmt->bindValue("slug", $articleInsert->getArticleSlug());
        $stmt->bindValue("text", $articleInsert->getArticleText());
        $stmt->bindValue("date", $articleInsert->getArticleDate());
        $stmt->bindValue("visibility", $articleInsert->getArticleVisibility(),PDO::PARAM_INT);

        $stmt->execute();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
// Exercice 2
// récupérez tous les articles dont
// article_visibility vaut 1 par article_date DESC
// faites-en des objets de type ArticleMapping
try{
    $select = $connectPDO->query("
        SELECT * FROM `article` 
                 WHERE `article_visibility`=1
        ORDER BY `article_date` DESC;
    ");
    $recup = $select->fetchAll();
    // bonne pratique
    $select->closeCursor();
    // on va créer des objets de type ArticleMapping
    foreach ($recup as $valeur){
        // double boucle
        $resultats[]= new ArticleMapping($valeur);
    }
    //var_dump($resultats);
}catch (Exception $e){
    echo $e->getMessage();
}

$connectPDO = null;

?>
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
<h2>Nos articles</h2>
<p>Affichage de nos articles en utilisant les getters des objets de type ArticleMapping</p>
<?php
$nbArticle = count($resultats);
if($nbArticle<1):
?>
<h3>Pas encore d'article</h3>
<?php
endif;
$pluriel = $nbArticle > 1 ? "s" : "";
?>
<h3>Il y a <?=$nbArticle?> article<?=$pluriel?></h3>
<?php
foreach($resultats as $item):
?>
    <h4><a href="./?article=<?=$item->getArticleSlug()?>"><?=html_entity_decode($item->getArticleTitle())?></a></h4>
<h5>Ecrit le <?=$item->getArticleDate()?></h5>
<p><?=nl2br(html_entity_decode($item->getArticleText()))?></p>
<?php
endforeach;
?>
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

if(isset($articleInsert)) var_dump($articleInsert);
var_dump($_POST);
?>
</body>
</html>
