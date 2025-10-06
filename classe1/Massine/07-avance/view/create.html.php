<?php
// view/create.html.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un Article - Mon Blog</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation pour articles avec thème primary -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="./">
                <i class="bi bi-plus-circle-dotted me-2"></i>Créer un Article
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
                        <i class="bi bi-file-earmark-plus me-2"></i>Créer un Nouvel Article
                    </h1>
                    <p class="mb-0 opacity-75">Rédigez et publiez votre contenu</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if(isset($message)): ?>
                <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div><?=$message?></div>
                </div>
                <?php endif; ?>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Formulaire de Création
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <!-- Titre de l'article -->
                            <div class="mb-4">
                                <label for="article_title" class="form-label fw-semibold">
                                    <i class="bi bi-fonts me-1 text-primary"></i>Titre de l'article
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       id="article_title" 
                                       name="article_title" 
                                       placeholder="Saisissez le titre de votre article..."
                                       required>
                                <div class="invalid-feedback">
                                    Veuillez saisir un titre pour votre article.
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-info-circle me-1"></i>Le slug sera généré automatiquement
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
                                          placeholder="Rédigez le contenu de votre article ici..."
                                          required></textarea>
                                <div class="invalid-feedback">
                                    Veuillez saisir le contenu de votre article.
                                </div>
                                <div class="form-text">
                                    <i class="bi bi-markdown me-1"></i>Vous pouvez utiliser du HTML dans votre contenu
                                </div>
                            </div>

                            <!-- Visibilité -->
                            <div class="mb-4">
                                <label for="article_visibility" class="form-label fw-semibold">
                                    <i class="bi bi-eye me-1 text-primary"></i>Statut de publication
                                </label>
                                <select class="form-select" id="article_visibility" name="article_visibility" required>
                                    <option value="">Choisir le statut...</option>
                                    <option value="1">
                                        <i class="bi bi-eye"></i> Publier immédiatement
                                    </option>
                                    <option value="0">
                                        <i class="bi bi-eye-slash"></i> Enregistrer comme brouillon
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    Veuillez choisir un statut de publication.
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex gap-3 pt-3 border-top">
                                <button type="submit" class="btn btn-primary btn-lg flex-fill">
                                    <i class="bi bi-check-circle me-2"></i>Créer l'Article
                                </button>
                                <a href="./?p=admin" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i>Retour
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Aperçu des informations -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="bi bi-lightbulb text-warning fs-1 mb-2"></i>
                                <h6 class="text-muted">Conseil</h6>
                                <small class="text-muted">
                                    Un bon titre est accrocheur et descriptif
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="bi bi-clock text-info fs-1 mb-2"></i>
                                <h6 class="text-muted">Sauvegarde</h6>
                                <small class="text-muted">
                                    La date sera automatiquement définie
                                </small>
                            </div>
                        </div>
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
