<?php
// view/homepage.html.php
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Page d'accueil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h1 class="mb-4">Page d'accueil</h1>

  <nav class="mb-4">
    <a href="./" class="btn btn-outline-primary btn-sm">Accueil</a>
    <a href="./?p=admin" class="btn btn-outline-secondary btn-sm">Administration</a>
  </nav>

  <h2 class="mb-3">Articles de notre site</h2>

  <?php if(empty($nosArticle)): ?>
    <div class="alert alert-warning">Pas encore d'articles sur notre site</div>
  <?php else:
    $nbArticle = count($nosArticle);
    $pluriel = $nbArticle > 1 ? "s" : "";
  ?>
    <h3 class="mb-3">Il y a <?=$nbArticle?> article<?=$pluriel?></h3>

    <?php $i=1; foreach ($nosArticle as $item): ?>
      <div id="article<?=$i?>" class="card mb-3">
        <div class="card-body">
          <h3 class="card-title"><?=html_entity_decode($item->getArticleTitle())?></h3>
          <h6 class="card-subtitle mb-2 text-muted">Écrit le <?=$item->getArticleDate()?></h6>
          <p class="card-text"><?=nl2br(html_entity_decode($item->getArticleText()))?></p>
        </div>
      </div>
    <?php $i++; endforeach; ?>
  <?php endif; ?>
</body>
</html>
