<?php
// view/update.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier l'Article - Mon Blog</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation pour articles avec thème primary -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="./">
                <i class="bi bi-pencil-square me-2"></i>Modifier l'Article
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./">
                            <i class="bi bi-house-door me-1"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?p=admin">
                            <i class="bi bi-gear me-1"></i>Administration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=create">
                            <i class="bi bi-plus-circle me-1"></i>Nouvel Article
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="bg-primary text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="h2 mb-0">
                        <i class="bi bi-file-earmark-text me-2"></i>Modifier l'Article
                    </h1>
                    <p class="mb-0 opacity-75">Modifiez et mettez à jour votre contenu</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-light text-primary fs-6">
                        ID: #<?= $article->getId() ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Formulaire de Modification
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <input type="hidden" name="id" value="<?= $article->getId() ?>">
                            
                            <!-- Titre de l'article -->
                            <div class="mb-4">
                                <label for="article_title" class="form-label fw-semibold">
                                    <i class="bi bi-fonts me-1 text-primary"></i>Titre de l'article
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       id="article_title" 
                                       name="article_title" 
                                       value="<?= html_entity_decode($article->getArticleTitle()) ?>"
                                       required>
                                <div class="invalid-feedback">
                                    Veuillez saisir un titre pour votre article.
                                </div>
                            </div>

                            <!-- Contenu de l'article -->
                            <div class="mb-4">
                                <label for="article_text" class="form-label fw-semibold">
                                    <i class="bi bi-textarea-t me-1 text-primary"></i>Contenu de l'article
                                </label>
                                <textarea class="form-control" 
                                          id="article_text" 
                                          name="article_text" 
                                          rows="12" 
                                          required><?= html_entity_decode($article->getArticleText()) ?></textarea>
                                <div class="invalid-feedback">
                                    Veuillez saisir le contenu de votre article.
                                </div>
                            </div>

                            <!-- Date de l'article -->
                            <div class="mb-4">
                                <label for="article_date" class="form-label fw-semibold">
                                    <i class="bi bi-calendar me-1 text-primary"></i>Date de publication
                                </label>
                                <input type="datetime-local" 
                                       class="form-control" 
                                       id="article_date" 
                                       name="article_date" 
                                       value="<?= $article->getArticleDate() ?>" 
                                       required>
                                <div class="invalid-feedback">
                                    Veuillez saisir une date de publication.
                                </div>
                            </div>

                            <!-- Visibilité -->
                            <div class="mb-4">
                                <label for="article_visibility" class="form-label fw-semibold">
                                    <i class="bi bi-eye me-1 text-primary"></i>Statut de publication
                                </label>
                                <select class="form-select" id="article_visibility" name="article_visibility" required>
                                    <option value="1" <?= $article->getArticleVisibility() ? 'selected' : '' ?>>
                                        <i class="bi bi-eye"></i> Publié
                                    </option>
                                    <option value="0" <?= !$article->getArticleVisibility() ? 'selected' : '' ?>>
                                        <i class="bi bi-eye-slash"></i> Brouillon
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    Veuillez choisir un statut de publication.
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex gap-3 pt-3 border-top">
                                <button type="submit" class="btn btn-primary btn-lg flex-fill">
                                    <i class="bi bi-check-circle me-2"></i>Mettre à Jour
                                </button>
                                <a href="./?p=admin" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i>Retour
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validation Bootstrap
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
