<?php

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'accueil</title>
</head>
<body>
    <h1>Page d'accueil</h1>
    <nav>
        <a href ="./">Accueil</a> | <a href ="./?p=admin">Administration</a>
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
        <?php
    // tant qu'on a des articles
        $i = 1;
        foreach ($nosArticle as $item):
        ?>
        <div id="article<?=$i?>" class="article">
            <h3><?=html_entity_decode($item->getArticleTitle())?></h3>
            <h4>Écrit le <?=$item->getArticleDate()?></h4>
            <p><?=nl2br(html_entity_decode($item->getArticleText()))?></p>
        </div>
    <?php
        $i++;
        endforeach;
    endif;
    ?>
<?php //var_dump($connectPDO,$ArticleManager,$nosArticle); ?>
</body>
</html>
