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
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration des articles</a> | <a href="?p=create">Création d'un nouvel article</a> | <a href ="./?c=admin">Administration des catégories</a> | <a href="?c=create">Création d'une nouvelle catégorie</a>
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
                <td><a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer l\'article <?=$item->getArticleSlug()?>'); if(a){ document.location ='?p=delete&id=<?=$item->getId()?>';}">delete</a></td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </table>

    <h2>Catégories de notre site</h2>
    <?php
    if(isset($nosCategory) && !empty($nosCategory)):
        $nbCategory = count($nosCategory);
        $pluriel = $nbCategory > 1? "s" : "";
    ?>
    <h3>Il y a <?=$nbCategory?> catégorie<?=$pluriel?></h3>

        <table>
            <thead>
                <th>id</th>
                <th>category_name</th>
                <th>category_slug</th>
                <th>category_desc</th>
                <th>update</th>
                <th>delete</th>
            </thead>
            <?php
                foreach ($nosCategory as $item):
            ?>
            <tr>
                <td><?=$item->getId()?></td>
                <td><?=$item->getCategoryName()?></td>
                <td><?=$item->getCategorySlug()?></td>
                <td><?=$item->getCategoryDesc()?></td>
                <td><a href="?c=update&id=<?=$item->getId()?>">update</a></td>
                <td><a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer la catégorie <?=$item->getCategoryName()?>'); if(a){ document.location ='?c=delete&id=<?=$item->getId()?>';}">delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>
    <?php
    else:
    ?>
    <h3>Pas encore de catégories sur notre site</h3>
    <?php
    endif;
    ?>


<?php //var_dump($connectPDO,$ArticleManager,$nosArticle); ?>
</body>
</html>
