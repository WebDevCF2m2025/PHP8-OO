<?php
// view/create.category.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouvelle Catégorie</title>
</head>
<body>
<h1>Nouvelle Catégorie</h1>
<nav>
    <a href ="./">Accueil</a> | <a href ="./?c=admin">Administration Catégorie</a>
</nav>
<h2>Création d'une nouvelle catégorie</h2>
<?php
if(isset($message)):
    ?>
    <p style="color:red; font-weight: bold;"><?=$message?></p>
<?php
endif;
?>
<form action="" method="post" name="name">
    <label for="category_name">Nom de la catégorie</label><br>
    <input type="text" name="category_name" id="category_name" required><br><br>

    <label for="category_desc">Description de la catégorie</label><br>
    <textarea name="category_desc" id="category_desc" cols="30" rows="10" required></textarea><br><br>

    <input type="submit" value="Créer la catégorie">
</form>
<?php var_dump($_POST);
// si on a soumis le formulaire
if(isset($newCategory)) var_dump($newCategory);
?>
</body>
</html>
