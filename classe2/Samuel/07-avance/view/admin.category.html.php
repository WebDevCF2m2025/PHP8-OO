<?php
// view/admin.category.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration Catégory</title>
</head>
<body>
<h1>Administration Catégories</h1>
<nav>
    <a href ="./">Accueil</a> | <a href ="./?c=admin">Administration Catégories</a> | <a href="?c=createCateg">Création d'une nouvelle catégorie</a>
</nav>
<h2>Catégories de notre site</h2>
    <?php
        if(empty($nosCategory)):
    ?>
        <h3>Pas encore d'articles sur notre site</h3>
    <?php
        else:
            $nbCategory = count($nosCategory);
            $pluriel = $nbCategory > 1? "s" : "";
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
            foreach ($nosCategory as $item):
        ?>
        <tr>
            <td><?= $item->getId() ?></td>
            <td><?= html_entity_decode($item->getCategoryName()) ?></td>
            <td><?= $item->getCategorySlug() ?></td>
            <td><?= html_entity_decode(substr($item->getCategoryDesc(), 0, 150)) ?></td>
            <td><a href="?c=updateCateg&id=<?=$item->getId()?>">update</a></td>
            <td><a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer la catégorie <?=$item->getCategorySlug()?>'); if(a){ document.location ='?c=deleteCateg&id=<?=$item->getId()?>';}">delete</a></td>
        </tr>
        <?php
            endforeach;
        endif;
        ?>
    </table>

<pre>
    <?php
        echo "<br>";
        var_dump($connectPDO,$CategoryManager,$nosCategory);
    ?>
</pre>
</body>
</html>