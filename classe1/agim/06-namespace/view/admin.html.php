<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-blue-700">Administration</h1>

        <nav class="mb-6 space-x-4 text-sm text-blue-600">
            <a href="./" class="hover:underline">Accueil</a>
            <a href="./?p=admin" class="hover:underline">Administration</a>
            <a href="?p=create" class="hover:underline">Création d'un nouvel article</a>
        </nav>

        <?php if (isset($_GET['p']) && $_GET['p'] === 'create'): ?>
            <form  method="post" class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md space-y-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Créer / Modifier un article</h2>

                <!-- Titre -->
                <div>
                    <label for="article_title" class="block text-sm font-medium text-gray-700">Titre de l'article</label>
                    <input type="text" name="article_title" id="article_title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Slug -->
                <div>
                    <label for="article_slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="article_slug" id="article_slug"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Texte -->
                <div>
                    <label for="article_text" class="block text-sm font-medium text-gray-700">Texte complet</label>
                    <textarea name="article_text" id="article_text" rows="6" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Date -->
                <div>
                    <label for="article_date" class="block text-sm font-medium text-gray-700">Date de publication</label>
                    <input type="date" name="article_date" id="article_date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Visibilité -->
                <div>
                    <label for="article_visibility" class="block text-sm font-medium text-gray-700">Visibilité</label>
                    <select name="article_visibility" id="article_visibility"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="1">Visible</option>
                        <option value="0">Invisible</option>
                    </select>
                </div>

                <!-- Bouton -->
                <div class="pt-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Enregistrer</button>
                </div>
            </form>
        <?php elseif (isset($_GET['p']) && $_GET['p'] === 'update' && isset($_GET['id']) && is_numeric($_GET['id'])): ?>
            <?php
            $id = (int) $_GET['id'];
            $articleToUpdate = $ArticleManager->findById($id); // Assure-toi que cette méthode existe
            ?>

            <?php if ($articleToUpdate): ?>
                <h1 class="text-3xl font-bold mb-4 text-blue-700">Modifier l'article</h1>

                <nav class="mb-6 space-x-4 text-sm text-blue-600">
                    <a href="./" class="hover:underline">Accueil</a>
                    <a href="./?p=admin" class="hover:underline">Administration</a>
                    <a href="?p=create" class="hover:underline">Création d'un nouvel article</a>
                </nav>

                <form  method="post" class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md space-y-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Modifier l'article #<?= $articleToUpdate->getId() ?></h2>

                    <!-- Titre -->
                    <div>
                        <label for="article_title" class="block text-sm font-medium text-gray-700">Titre de l'article</label>
                        <input type="text" name="article_title" id="article_title" required
                            value="<?= htmlspecialchars($articleToUpdate->getArticleTitle()) ?>"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="article_slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="article_slug" id="article_slug"
                            value="<?= htmlspecialchars($articleToUpdate->getArticleSlug()) ?>"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Texte -->
                    <div>
                        <label for="article_text" class="block text-sm font-medium text-gray-700">Texte complet</label>
                        <textarea name="article_text" id="article_text" rows="6" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"><?= htmlspecialchars($articleToUpdate->getArticleText()) ?></textarea>
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="article_date" class="block text-sm font-medium text-gray-700">Date de publication</label>
                        <input type="date" name="article_date" id="article_date"
                            value="<?= $articleToUpdate->getArticleDate() ?>"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Visibilité -->
                    <div>
                        <label for="article_visibility" class="block text-sm font-medium text-gray-700">Visibilité</label>
                        <select name="article_visibility" id="article_visibility"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" <?= $articleToUpdate->getArticleVisibility() == 1 ? 'selected' : '' ?>>Visible</option>
                            <option value="0" <?= $articleToUpdate->getArticleVisibility() == 0 ? 'selected' : '' ?>>Invisible</option>
                        </select>
                    </div>

                    <!-- Bouton -->
                    <div class="pt-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Mettre à jour</button>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-red-500 font-medium">Article introuvable.</p>
            <?php endif; ?>
        <?php else: ?>
            <h2 class="text-xl font-semibold mb-4">Articles de notre site</h2>

            <?php if (empty($nosArticle)): ?>
                <h3 class="text-red-500 font-medium">Pas encore d'articles sur notre site</h3>
            <?php else:
                $nbArticle = count($nosArticle);
                $pluriel = $nbArticle > 1 ? "s" : "";
            ?>
                <h3 class="mb-4">Il y a <?= $nbArticle ?> article<?= $pluriel ?></h3>

                <table class="table-auto w-full bg-white shadow-md rounded-md overflow-hidden mb-6">
                    <thead class="bg-gray-200 text-left">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Titre</th>
                            <th class="px-4 py-2">Slug</th>
                            <th class="px-4 py-2">Texte</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Visibilité</th>
                            <th class="px-4 py-2">Modifier</th>
                            <th class="px-4 py-2">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nosArticle as $item): ?>
                            <tr class="border-t">
                                <td class="px-4 py-2"><?= $item->getId() ?></td>
                                <td class="px-4 py-2"><?= html_entity_decode($item->getArticleTitle()) ?></td>
                                <td class="px-4 py-2"><?= $item->getArticleSlug() ?></td>
                                <td class="px-4 py-2"><?= html_entity_decode(substr($item->getArticleText(), 0, 150)) ?></td>
                                <td class="px-4 py-2"><?= $item->getArticleDate() ?></td>
                                <td class="px-4 py-2"><?= $item->getArticleVisibility() ?></td>
                                <td class="px-4 py-2">
                                    <a href="?update=<?= $item->getId() ?>" class="text-blue-500 hover:underline">Modifier</a>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="?delete=<?= $item->getId() ?>" class="text-red-500 hover:underline">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold"><?= html_entity_decode($item->getArticleTitle()) ?></h3>
                    <h4 class="text-sm text-gray-600 mb-2">Écrit le <?= $item->getArticleDate() ?></h4>
                    <p class="text-gray-700"><?= nl2br(html_entity_decode($item->getArticleText())) ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>