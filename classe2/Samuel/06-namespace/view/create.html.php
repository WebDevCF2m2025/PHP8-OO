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
    <title>Page d'accueil</title>
    <style>
        form label,
        form input[type="text"],
        form textarea,
        form select,
        form input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 12px;
        }
        form {
            max-width: 500px;
        }
    </style>

</head>
<body>
    <h1>Nouvel article</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a>
    </nav>
    <h2>Création d'un article</h2>
    <form action="" method="post">
        <!-- Titre -->
        <label for="article_title">Titre</label>
        <input type="text" name="article_title" id="article_title" placeholder="Titre de l'article">
        <!-- Texte -->
        <label for="article_text">Texte</label>
        <textarea name="article_text" id="article_text" cols="30" rows="10" placeholder="Texte de l'article"></textarea>
        <!-- Visibilité -->
        <label for="article_visibility">Visible ?</label>
        <select name="article_visibility" id="article_visibility">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <!-- Bouton submit -->
        <input type="submit" value="Créer l'article">
    </form>
<?php var_dump($_POST); ?>
</body>
</html>
