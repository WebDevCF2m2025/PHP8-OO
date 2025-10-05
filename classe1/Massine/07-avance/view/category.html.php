<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Catégories</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a> | <a href="?c=createCateg">Création d'une nouvelle catégorie</a>
    </nav>
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
            foreach ($ListeCategories as $item) {
            ?>
            <tr>
                <td><?=$item->getId()?></td>
                <td><?=html_entity_decode($item->getCategoryName())?></td>
                <td><?=$item->getCategorySlug()?></td>
                <td><?=html_entity_decode(substr($item->getCategoryDesc(),0,150))?></td>
                <td><a href="?p=update&id=<?=$item->getId()?>">update</a></td>
                <td><a href="#" onclick="let a=confirm('Voulez-vous vraiment supprimer la catégorie <?=$item->getCategorySlug()?>'); if(a){ document.location ='?p=delete&id=<?=$item->getId()?>';}">delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
</body>
</html>