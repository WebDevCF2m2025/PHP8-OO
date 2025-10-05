<?php
// view/homepage.html.php
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h1 class="mb-4">Administration</h1>

  <nav class="mb-4">
    <a href="./" class="btn btn-outline-primary btn-sm">Accueil</a>
    <a href="./?p=admin" class="btn btn-outline-secondary btn-sm">Administration</a>
    <a href="?p=create" class="btn btn-outline-success btn-sm">Nouvel article</a>
  </nav>

  <h2 class="mb-3">Articles de notre site</h2>

  <?php if(empty($nosArticle)): ?>
    <div class="alert alert-warning">Pas encore d'articles sur notre site</div>
  <?php else:
    $nbArticle = count($nosArticle);
    $pluriel = $nbArticle > 1 ? "s" : "";
  ?>
    <h3 class="mb-3">Il y a <?=$nbArticle?> article<?=$pluriel?></h3>

    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Slug</th>
          <th>Texte</th>
          <th>Date</th>
          <th>Visibilité</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($nosArticle as $item): ?>
        <tr>
          <td><?=$item->getId()?></td>
          <td><?=html_entity_decode($item->getArticleTitle())?></td>
          <td><?=$item->getArticleSlug()?></td>
          <td><?=html_entity_decode(substr($item->getArticleText(),0,150))?></td>
          <td><?=$item->getArticleDate()?></td>
          <td><?= $item->getArticleVisibility()? 1 : 0; ?></td>
          <td><a href="?update=<?=$item->getId()?>" class="btn btn-sm btn-warning">Update</a></td>
          <td><a onclick="if(confirm('Confirmer la suppression ?')){ window.location.href = './?delete=<?=$item->getId()?>'; }"  class="btn btn-sm btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>
