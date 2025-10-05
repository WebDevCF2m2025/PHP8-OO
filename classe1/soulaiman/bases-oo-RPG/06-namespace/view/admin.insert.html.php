<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       
    <title>Administration</title>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-blue-700">Administration</h1>

        <nav class="mb-6 space-x-4 text-sm text-blue-600">
            <a href="./" class="hover:underline">Accueil</a>
            <a href="?p=admin" class="hover:underline">Administration</a>
            <a href="?p=create" class="hover:underline">Création d'un nouvel article</a>
        </nav>


            <form method="post" class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md space-y-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Créer un article</h2>

                <div>
                    <label for="article_title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="article_title" id="article_title" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="article_text" class="block text-sm font-medium text-gray-700">Texte</label>
                    <textarea name="article_text" id="article_text" rows="6" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div>
                    <label for="article_date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="datetime-local" name="article_date" id="article_date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="article_visibility" class="block text-sm font-medium text-gray-700">Visibilité</label>
                    <select name="article_visibility" id="article_visibility"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="1">Visible</option>
                        <option value="0">Invisible</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Enregistrer</button>
                </div>
            </form>
            </body>
</html>