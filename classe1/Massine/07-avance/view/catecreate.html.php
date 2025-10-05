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
    <title>Nouvel article</title>
</head>
<body>
    <h1>Catégories</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a> | <a href ="./?c=admin">Administration Category</a>
    </nav>
    <h2>Création d'une nouvelle catégorie</h2>

    <form action="" method="post">
        <label for="category_name">Nom de Categorie : </label><br>
        <input type="text" name="category_name" id="article_title" required><br><br>

        <label for="category_desc">Texte de Categorie : </label><br>
        <textarea name="category_desc" id="category_desc" cols="30" rows="10" required></textarea><br><br>

        <input type="submit" value="Créer la catégorie">
        
    </form>
<?php var_dump($_POST);
// si on a soumis le formulaire
if(isset($newArticle)) var_dump($newArticle);
?>
</body>
</html>
