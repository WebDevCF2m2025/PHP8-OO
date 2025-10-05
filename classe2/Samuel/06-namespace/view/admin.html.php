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
</head>
<body>
    <h1>Administration</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a> | <a href="?p=create">Création d'un nouvel article</a>
    </nav>
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
    <h3>Il y a <?=$nbArticle?> article<?=$pluriel?> </h3>

        <table>
            <thead>
                <th>id</th>
                <th>article_title</th>
                <th>article_slug</th>
                <th>article_text</th>
                <th>article_date</th>
                <th>article_visibility</th>
                <th>update</th>
                <th>delete</th>
            </thead>
            <?php
                foreach ($nosArticle as $item):
            ?>
            <tr>
                <td><?=$item->getId()?></td>
                <td><?=html_entity_decode($item->getArticleTitle())?></td>
                <td><?=$item->getArticleSlug()?></td>
                <td><?=html_entity_decode(substr($item->getArticleText(),0,150))?></td>
                <td><?=$item->getArticleDate()?></td>
                <td><?=$item->getArticleVisibility()?></td>
                <td><a href="?p=update&id=<?=$item->getId()?>">update</a></td>
                <td><a href="?p=delete&id=<?=$item->getId()?>">delete</a></td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </table>


<?php //var_dump($connectPDO,$ArticleManager,$nosArticle); ?>
</body>
</html>
