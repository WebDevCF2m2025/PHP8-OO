<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'accueil</title>
    <style>
       
    </style>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-blue-700">Page d'accueil</h1>

        <nav class="mb-6 space-x-4 text-sm text-blue-600">
            <a href="./" class="hover:underline">Accueil</a>
            <a href="./?p=admin" class="hover:underline">Administration</a>
        </nav>

        <h2 class="text-xl font-semibold mb-4">Articles de notre site</h2>

        <?php if (empty($nosArticle)): ?>
            <h3 class="text-red-500 font-medium">Pas encore d'articles sur notre site</h3>
        <?php else:
            $nbArticle = count($nosArticle);
            $pluriel = $nbArticle > 1 ? "s" : "";
        ?>
            <h3 class="mb-4">Il y a <?= $nbArticle ?> article<?= $pluriel ?></h3>

            <?php $i = 1; foreach ($nosArticle as $item): ?>
                <div id="article<?= $i ?>" class="bg-white p-4 mb-6 rounded shadow">
                    <h3 class="text-lg font-bold text-gray-900"><?= html_entity_decode($item->getArticleTitle()) ?></h3>
                    <h4 class="text-sm text-gray-600 mb-2">Écrit le <?= $item->getArticleDate() ?></h4>
                    <p class="text-gray-700 leading-relaxed"><?= nl2br(html_entity_decode($item->getArticleText())) ?></p>
                </div>
            <?php $i++; endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>