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
        body,
        * {
            background-color: black !important;
            color: white !important;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="container mx-auto px-4 py-8">
        <?php if (isset($_GET['p']) && $_GET['p'] === "connexion"): ?>

            <form method="POST" class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
                <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>

                <label for="user_email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="user_email" id="user_email" required
                    class="w-full px-4 py-2 mb-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

                <label for="user_password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="user_password" id="user_password" required
                    class="w-full px-4 py-2 mb-6 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Se connecter</button>
                    <a href="./" class="hover:underline">Retour Accueil</a>

            </form>
        <?php elseif (isset($_GET['p']) && $_GET['p'] === "inscription"): ?>

            <form method="POST" class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
                <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>

                <label for="user_name" class="block mb-2 text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                <input type="text" name="user_name" id="user_name" required
                    class="w-full px-4 py-2 mb-4 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">

                <label for="user_email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="user_email" id="user_email" required
                    class="w-full px-4 py-2 mb-4 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">

                <label for="user_password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="user_password" id="user_password" required
                    class="w-full px-4 py-2 mb-6 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">S'inscrire</button>
                    <a href="./" class="hover:underline">Retour Accueil</a>

            </form>

        <?php else: ?>
            <h1 class="text-3xl font-bold mb-4 text-blue-700">Page d'accueil</h1>

            <nav class="mb-6 space-x-4 text-sm text-blue-600">

                <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                    <a href="./" class="hover:underline">Accueil</a>
                    <a href="./?p=admin" class="hover:underline">Administration</a>
                    <a href="?p=deconnexion">Deconnexion</a>

                <?php else: ?>
                    <a href="./" class="hover:underline">Accueil</a>

                    <a href="./?p=connexion">Connexion</a>
                    <a href="./?p=inscription">Insciption</a>
                <?php endif; ?>
            </nav>

            <h2 class="text-xl font-semibold mb-4">Articles de notre site</h2>

            <?php if (empty($nosArticle)): ?>
                <h3 class="text-red-500 font-medium">Pas encore d'articles sur notre site</h3>
            <?php else:
                $nbArticle = count($nosArticle);
                $pluriel = $nbArticle > 1 ? "s" : "";
            ?>
                <h3 class="mb-4">Il y a <?= $nbArticle ?> article<?= $pluriel ?></h3>

                <?php $i = 1;
                foreach ($nosArticle as $item): ?>
                    <div id="article<?= $i ?>" class="bg-white p-4 mb-6 rounded shadow">
                        <h3 class="text-lg font-bold text-gray-900"><?= html_entity_decode($item->getArticleTitle()) ?></h3>
                        <h4 class="text-sm text-gray-600 mb-2">Écrit le <?= $item->getArticleDate() ?></h4>
                        <p class="text-gray-700 leading-relaxed"><?= nl2br(html_entity_decode($item->getArticleText())) ?></p>
                    </div>
                <?php $i++;
                endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>