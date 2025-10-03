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
        <?php if (isset($_GET['c'])) : ?>
            <a href="./">Accueil</a> | <a href="./?c=admin">Administration</a> | <a href="?c=createCateg">Création d'une nouvelle catégorie</a>
        <?php else : ?>
            <a href="./">Accueil</a> | <a href="./?p=admin">Administration</a> | <a href="?p=create">Création d'un nouvel article</a>
        <?php endif; ?>
    </nav>
    <?php
    if (isset($_GET['p'])):
    ?>
        <h2>Articles de notre site</h2>
        <?php
        if (empty($nosArticle)):
        ?>
            <h3>Pas encore d'articles sur notre site</h3>
        <?php
        else:
            $nbArticle = count($nosArticle);
            $pluriel = $nbArticle > 1 ? "s" : "";
        ?>
            <h3>Il y a <?= $nbArticle ?> article<?= $pluriel ?> </h3>

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
                <?php foreach ($nosArticle as $item): ?>
                    <tr>
                        <td><?= $item->getId() ?></td>
                        <td><?= html_entity_decode($item->getArticleTitle()) ?></td>
                        <td><?= $item->getArticleSlug() ?></td>
                        <td><?= html_entity_decode(substr($item->getArticleText(), 0, 150)) ?></td>
                        <td><?= $item->getArticleDate() ?></td>
                        <td><?= $item->getArticleVisibility() ?></td>
                        <td><a href="?p=update&id=<?= $item->getId() ?>">update</a></td>
                        <td><a href="" onclick="let a=confirm('Voulez-vous vraiment supprimer l\'article <?= $item->getArticleSlug() ?>'); if(a){ document.location ='?p=delete&id=<?= $item->getId() ?>';}">delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
    <?php
        endif;
    endif;
    ?>

    <?php
    if (isset($_GET['c'])):
    ?>
        <h2>Catégories de notre site</h2>
        <?php
        if (empty($nosCategory)):
        ?>
            <h3>Pas encore de catégories sur notre site</h3>
        <?php
        else:
            $nbCategory = count($nosCategory);
            $pluriel = $nbCategory > 1 ? "s" : "";
        ?>
            <h3>Il y a <?= $nbCategory ?> catégorie<?= $pluriel ?> </h3>

            <table>
                <thead>
                    <th>id</th>
                    <th>category_name</th>
                    <th>category_slug</th>
                    <th>category_desc</th>
                    <th>category_visibility</th>
                    <th>update</th>
                    <th>delete</th>
                </thead>
                <?php foreach ($nosCategory as $cat): ?>
                    <tr>
                        <td><?= $cat->getId() ?></td>
                        <td><?= html_entity_decode($cat->getCategoryName()) ?></td>
                        <td><?= $cat->getCategorySlug() ?></td>
                        <td><?= html_entity_decode(substr($cat->getCategoryDesc(), 0, 150)) ?></td>
                        <td><a href="?c=updateCateg&id=<?= $cat->getId() ?>">update</a></td>
                        <td><a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer la catégorie <?= $cat->getCategorySlug() ?>'); if(a){ document.location ='?c=deleteCateg&id=<?= $cat->getId() ?>';}">delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
    <?php
        endif;
    endif;
    ?>


    <?php //var_dump($connectPDO,$ArticleManager,$nosArticle); 
    ?>
</body>

</html>