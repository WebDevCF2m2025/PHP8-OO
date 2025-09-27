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
        // on va mettre nos résultats en FETCH_ASSOC
        $connectPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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
            $_POST['article_visibility'] = false;
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
        var_dump($articleInsert);
        // ICI
        $stmt = $connectPDO->prepare("INSERT INTO article (article_title, article_slug, article_text,article_date, article_visibility)
         VALUES (?,?,?,?,?)");

         $stmt->execute([
            $articleInsert->getArticleTitle(),
            $articleInsert->getArticleSlug(),
            $articleInsert->getArticleText(),
            $articleInsert->getArticleDate(),
            $articleInsert->getArticleVisibility()
        ]);

    }catch(Exception $e){
        echo $e->getMessage();
    }
// formulaire non envoyé Exercice 2
}

$select = $connectPDO->query("SELECT * FROM article ORDER BY article_date");
$article = $select->fetchAll();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'hydratation via la classe abstraite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <!-- Header -->
                <div class="card mb-4 border-primary shadow-sm rounded-3">
                    <div class="card-body">
                        <h1 class="card-title text-primary">L'hydratation via la classe abstraite</h1>
                        <h2 class="h5 text-muted">Nous allons créer l'hydratation et le constructeur dans la classe abstraite</h2>
                        <p class="mb-0">Exemple de fonctionnement</p>
                    </div>
                </div>

                <!-- Exemple d'hydratation -->
                <div class="card mb-4 border-secondary shadow-sm rounded-3">

                <!-- Formulaire -->
                <div class="card mb-4 border-success shadow-sm rounded-3">
                    <div class="card-header bg-success text-white">
                        <h3 class="h6 mb-0">Créez un article via ce formulaire</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="article_title" class="form-label">Titre :</label>
                                <input type="text" class="form-control form-control-lg" id="article_title" name="article_title" 
                                       value="Mon titre d'article" required>
                                <div class="invalid-feedback">Veuillez saisir un titre.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="article_text" class="form-label">Texte :</label>
                                <textarea class="form-control form-control-lg" id="article_text" name="article_text" rows="5" required>Ceci est le texte de mon article, il est assez long pour être valide.</textarea>
                                <div class="invalid-feedback">Veuillez saisir un texte.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="article_date" class="form-label">Date :</label>
                                <input type="datetime-local" class="form-control form-control-lg" id="article_date" name="article_date" 
                                       value="<?= date('Y-m-d\TH:i') ?>" required>
                                <div class="invalid-feedback">Veuillez sélectionner une date.</div>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="article_visibility" name="article_visibility" value="1" checked>
                                <label class="form-check-label" for="article_visibility">Article visible</label>
                            </div>
                            
                            <div class="mb-3">
                                <input type="hidden" name="verifyID" value="csfr4567345758757">
                                <button type="submit" class="btn btn-primary btn-lg">Créer l'article</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Liste des articles -->
                <div class="card mb-4 border-info shadow-sm rounded-3">
                    <div class="card-header bg-info text-white">
                        <h3 class="h6 mb-0">Nos articles</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Affichage de nos articles en utilisant les getters des objets de type ArticleMapping</p>
                        
                        <?php if(isset($articles) && !empty($articles)): ?>
                            <div class="row">
                                <?php foreach ($articles as $article): ?>
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 shadow-sm rounded-3">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary"><?= htmlspecialchars($article['article_title']) ?></h5>
                                            <p class="card-text text-truncate"><?= nl2br(htmlspecialchars(substr($article['article_text'], 0, 150))) ?>...</p>
                                            <p class="text-muted small">
                                                <strong>Date :</strong> <?= $article['article_date'] ?><br>
                                                <strong>Visible :</strong> <?= $article['article_visibility'] ? 'Oui' : 'Non' ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning rounded-3">
                                Aucun article à afficher pour le moment.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Debug information -->
                <?php if(isset($articleInsert)): ?>
                <div class="card mb-4 border-warning shadow-sm rounded-3">
                    <div class="card-header bg-warning text-dark">
                        <h3 class="h6 mb-0">Debug - Article créé</h3>
                    </div>
                    <div class="card-body">
                        <pre class="bg-dark text-white p-3 rounded text-break"><?php var_dump($articleInsert); ?></pre>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Données POST -->
                <?php if(!empty($_POST)): ?>
                <div class="card border-dark shadow-sm rounded-3">
                    <div class="card-header bg-dark text-white">
                        <h3 class="h6 mb-0">Données POST reçues</h3>
                    </div>
                    <div class="card-body">
                        <pre class="bg-light p-3 rounded text-break"><?php var_dump($_POST); ?></pre>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

