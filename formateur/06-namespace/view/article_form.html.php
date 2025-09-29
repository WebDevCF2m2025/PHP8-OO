<?php
// view/article_form.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($article) && $article ? 'Modifier' : 'Créer' ?> un article</title>
    <style>
        body{font-family: Arial, sans-serif; line-height:1.5; margin:20px}
        form{max-width:800px}
        label{display:block; margin:10px 0 4px}
        input[type="text"], input[type="datetime-local"], textarea{width:100%; padding:8px; box-sizing:border-box}
        textarea{min-height:160px}
        .actions{margin-top:16px; display:flex; gap:8px}
        .btn{padding:8px 12px; text-decoration:none; border:1px solid #999; border-radius:4px; background:#f5f5f5; color:#333; cursor:pointer}
        .btn:hover{background:#e9e9e9}
        .btn-primary{background:#1976d2; color:#fff; border-color:#1976d2}
        .btn-primary:hover{background:#125a9c}
    </style>
</head>
<body>
<h1><?= isset($article) && $article ? 'Modifier' : 'Créer' ?> un article</h1>
<nav>
    <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a>
    <?php if(isset($article) && $article): ?> | <span>Édition #<?= $article->getId() ?></span><?php endif; ?>
    </nav>

<?php
// Préparer les valeurs par défaut pour le formulaire
$valueTitle = isset($article) && $article ? html_entity_decode($article->getArticleTitle()) : '';
$valueText = isset($article) && $article ? html_entity_decode($article->getArticleText()) : '';
$valueDate = isset($article) && $article && $article->getArticleDate() ? date('Y-m-d\TH:i', strtotime($article->getArticleDate())) : date('Y-m-d\TH:i');
$valueVisibility = isset($article) && $article ? (int)$article->getArticleVisibility() : 0;

// Déterminer l'action (create ou edit)
$isEdit = isset($article) && $article;
$action = $isEdit ? './?p=edit&id='.$article->getId() : './?p=create';
?>

<form method="post" action="<?= $action ?>">
    <label for="article_title">Titre</label>
    <input type="text" id="article_title" name="article_title" value="<?= $valueTitle ?>" required>

    <label for="article_text">Contenu</label>
    <textarea id="article_text" name="article_text" required><?= $valueText ?></textarea>

    <label for="article_date">Date</label>
    <input type="datetime-local" id="article_date" name="article_date" value="<?= $valueDate ?>" required>

    <label>
        <input type="checkbox" name="article_visibility" value="1" <?= $valueVisibility ? 'checked' : '' ?>> Visible
    </label>

    <div class="actions">
        <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Mettre à jour' : 'Créer' ?></button>
        <a class="btn" href="./?p=admin">Annuler</a>
    </div>
</form>

</body>
</html>


