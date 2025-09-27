<?php
declare(strict_types=1);

require_once "../config.php";

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
}catch(Exception $e){
    die($e->getMessage());

}

// si le formulaire a été envoyé
if(!empty($_POST)){
    // on va tenter d'hydrater notre ArticleMapping
    try{
        // on coche la case, la clef "article_visibility" existe dans $_POST
        // si on ne la coche pas, la clef n'existe pas
        // on va donc la créer avec une valeur de 0
        if(!isset($_POST['article_visibility'])){
            $_POST['article_visibility'] = 0;
        }
        $articleInsert = new ArticleMapping($_POST);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
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
<p>Exemple de fonctionnement</p>
<pre>
    <?php
    $article1 = new ArticleMapping([
        "id" => 7,
        "plouc" => "lala",
        "article_title"=> "hjgjyfyjutuyt",
        "article_slug"=> "DKEFFFFguyty-sdgffeg-zertreyt",
    ]);
    echo "<br>";
    var_dump($article1);
    ?>
</pre>
<p>Créez un article via ce formulaire</p>


<form action="" method="post">
    <div>
        <label for="article_title">Title:</label>
        <input type="text" id="article_title" name="article_title" value="Mon titre d'article">
    </div>
    <div>
        <label for="article_slug">Slug:</label>
        <input type="text" id="article_slug" name="article_slug" value="mon-titre-d-article">
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
        <button type="submit">Créer l'article</button>
    </div>
</form>
<?php

if(isset($articleInsert)) var_dump($articleInsert);

?>
</body>
</html>
