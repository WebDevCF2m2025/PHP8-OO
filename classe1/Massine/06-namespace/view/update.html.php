<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Éditer un article</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h1 class="mb-4">Éditer l'article</h1>

  <nav class="mb-4">
    <a href="./" class="btn btn-outline-primary btn-sm">Accueil</a>
    <a href="./?p=admin" class="btn btn-outline-secondary btn-sm">Administration</a>
  </nav>

  <form method="post" class="row g-3">
    <div class="col-md-6">
      <label for="article_title" class="form-label">Titre :</label>
      <input type="text" name="article_title" id="article_title" value="<?=$monArticle->getArticleTitle()?>" class="form-control" required>
    </div>

    <div class="col-12">
      <label for="article_text" class="form-label">Texte :</label>
      <textarea name="article_text" id="article_text" class="form-control"><?=html_entity_decode($monArticle->getArticleText())?></textarea>
    </div>

    <div class="col-md-6">
      <label for="article_date" class="form-label">Date :</label>
      <input type="datetime-local" name="article_date" id="article_date" value="<?=$monArticle->getArticleDate()?>" class="form-control">
    </div>

    <div class="col-md-6 form-check mt-4">
      <input type="checkbox" name="article_visibility" id="article_visibility" value="1" <?= $monArticle->getArticleVisibility()? "checked" : ""; ?> class="form-check-input">
      <label for="article_visibility" class="form-check-label">Visible</label>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-success">Mettre à jour</button>
    </div>
  </form>
</body>
</html>
