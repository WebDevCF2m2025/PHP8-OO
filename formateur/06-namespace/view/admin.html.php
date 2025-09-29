<?php
// view/homepage.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
    <style>
        body{font-family: Arial, sans-serif; line-height:1.5; margin:20px}
        table{border-collapse: collapse; width:100%; margin-top:12px}
        th, td{border:1px solid #ddd; padding:8px; text-align:left}
        thead th{background:#f5f5f5}
        .actions{display:flex; gap:8px}
        .btn{padding:6px 10px; text-decoration:none; border:1px solid #999; border-radius:4px; background:#f5f5f5; color:#333}
        .btn:hover{background:#e9e9e9}
        .btn-edit{background:#1976d2; color:#fff; border-color:#1976d2}
        .btn-edit:hover{background:#125a9c}
        .btn-delete{background:#d32f2f; color:#fff; border-color:#d32f2f}
        .btn-delete:hover{background:#a52424}
        .topbar{margin:8px 0}
    </style>
</head>
<body>
    <h1>Administration</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a>
    </nav>
    <div class="topbar">
        <a class="btn btn-edit" href="?p=create&redirect=admin">+ Nouvel article</a>
    </div>
    <h2>Articles de notre site</h2>
    <?php
    if(empty($nosArticle)):
    ?>
    <h3>Pas encore d'articles sur notre site</h3>
    <?php
    else:
        $nbArticle = count($nosArticle);
        $pluriel = $nbArticle > 1? "s" : "";
    ?>
    <h3>Il y a <?php echo $nbArticle; ?> article<?php echo $pluriel; ?> </h3>

        <table>
            <thead>
                <th>id</th>
                <th>article_title</th>
                <th>article_slug</th>
                <th>article_text</th>
                <th>article_date</th>
                <th>article_visibility</th>
                <th>Actions</th>
            </thead>
            <?php
                foreach ($nosArticle as $item):
            ?>
            <tr>
                <td><?php echo $item->getId(); ?></td>
                <td><?php echo html_entity_decode($item->getArticleTitle()); ?></td>
                <td><?php echo $item->getArticleSlug(); ?></td>
                <td><?php echo html_entity_decode(substr($item->getArticleText(),0,150)); ?></td>
                <td><?php echo $item->getArticleDate(); ?></td>
                <td><?php echo $item->getArticleVisibility(); ?></td>
                <td>
                    <div class="actions">
                        <a class="btn btn-edit" href="?p=edit&amp;id=<?php echo $item->getId(); ?>&amp;redirect=admin">Modifier</a>
                        <a class="btn btn-delete" href="?p=delete&amp;id=<?php echo $item->getId(); ?>&amp;redirect=admin" onclick="return confirm('Supprimer définitivement cet article ?');">Supprimer</a>
                    </div>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>
        <?php endif; ?>
        

<?php //var_dump($connectPDO,$ArticleManager,$nosArticle); ?>
</body>
</html>
