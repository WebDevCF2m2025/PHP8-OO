<?php
// view/update.category.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise à jour de la catégorie</title>
</head>
<body>
<h1>Mise à jour de la catégorie</h1>
<nav>
    <a href ="./">Accueil</a> | <a href ="./?c=admin">Administration Catégorie</a> | <a href="?c=createCateg">Création d'un nouvel article</a>
</nav>
<h2>Catégories de notre site</h2>
<form action="" method="post" name="name">
    <input type="hidden" name="id" value="<?= $category->getId() ?>">
    <label for="category_name">Nom de la catégorie</label><br>
    <input type="text" name="category_name" id="category_name" value="<?= html_entity_decode($category->getCategoryName()) ?>" required><br><br>

    <label for="category_desc">Description de la catégorie</label><br>
    <textarea name="category_desc" id="category_desc" cols="30" rows="10" required><?= html_entity_decode($category->getCategoryDesc()) ?></textarea><br><br>


    <input type="submit" value="Mettre à jour la catégorie">

</form>

<pre>
    <?php var_dump($_POST);
    // si on a soumis le formulaire
    if(isset($category)) var_dump($category);
    if(isset($updateCategory)) var_dump($updateCategory);
    ?>
</pre>

</body>
</html>
