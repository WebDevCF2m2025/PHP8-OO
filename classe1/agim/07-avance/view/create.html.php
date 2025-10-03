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
    <?php if (isset($_GET['p'])): ?>
        <h1>Nouvel article</h1>
        <nav>
            <a href="./">Accueil</a> | <a href="./?p=admin">Administration</a>
        </nav>
        <h2>Création d'un nouvel article</h2>
        <?php
        if (isset($message)):
        ?>
            <p style="color:red; font-weight: bold;"><?= $message ?></p>
        <?php
        endif;
        ?>
        <form action="" method="post" name="name">
            <label for="article_title">Titre de l'article</label><br>
            <input type="text" name="article_title" id="article_title" required><br><br>

            <label for="article_text">Texte de l'article</label><br>
            <textarea name="article_text" id="article_text" cols="30" rows="10" required></textarea><br><br>

            <label for="article_visibility">Visibilité de l'article</label><br>
            <select name="article_visibility" id="article_visibility" required>
                <option value="1">Visible</option>
                <option value="0">Non visible</option>
            </select><br><br>

            <input type="submit" value="Créer l'article">

        </form>
    <?php else: ?>
        <h1>Nouvelle catégorie</h1>
        <nav>
            <a href="./">Accueil</a> | <a href="./?c=admin">Administration</a>
        </nav>
        <h2>Création d'une nouvelle catégorie</h2>
        <?php
        if (isset($message)):
        ?>
            <p style="color:red; font-weight: bold;"><?= $message ?></p>
        <?php
        endif;
        ?>
        <form action="" method="post" name="category_form">
            <label for="category_name">Nom de la catégorie</label><br>
            <input type="text" name="category_name" id="category_name" required><br><br>

            <label for="category_desc">Description de la catégorie</label><br>
            <textarea name="category_desc" id="category_desc" cols="30" rows="5" required></textarea><br><br>



            <input type="submit" value="Créer la catégorie">
        </form>
    <?php endif; ?>
    <?php var_dump($_POST);
    // si on a soumis le formulaire
    if (isset($newArticle)) var_dump($newArticle);
    if (isset($newCategory)) var_dump($newCategory);
    ?>
</body>

</html>