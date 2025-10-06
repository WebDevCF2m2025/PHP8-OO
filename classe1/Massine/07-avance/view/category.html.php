<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Catégories - Mon Blog</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation pour catégories avec thème success -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="./">
                <i class="bi bi-tags-fill me-2"></i>Administration Catégories
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
                            <i class="bi bi-file-text me-1"></i>Admin Articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./?c=admin">
                            <i class="bi bi-tags me-1"></i>Admin Catégories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=createCateg">
                            <i class="bi bi-plus-circle me-1"></i>Nouvelle Catégorie
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="bg-success text-white py-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="h2 mb-0">
                        <i class="bi bi-collection me-2"></i>Gestion des Catégories
                    </h1>
                    <p class="mb-0 opacity-75">Organisez et gérez toutes vos catégories</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="?c=createCateg" class="btn btn-light btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Créer une Catégorie
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <?php if(empty($ListeCategories)): ?>
        <!-- État vide -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-folder2-open display-1 text-success mb-4"></i>
                        <h3 class="text-success mb-3">Aucune catégorie créée</h3>
                        <p class="text-muted mb-4">Commencez par créer votre première catégorie pour organiser vos articles.</p>
                        <a href="?c=createCateg" class="btn btn-success btn-lg">
                            <i class="bi bi-plus-circle me-2"></i>Créer la première catégorie
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php else: 
            $nbCategory = count($ListeCategories);
            $pluriel = $nbCategory > 1? "s" : "";
        ?>
        
        <!-- Stats et actions -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-3 p-3 me-3">
                                <i class="bi bi-bookmarks fs-4"></i>
                            </div>
                            <div>
                                <h4 class="mb-1"><?=$nbCategory?> Catégorie<?=$pluriel?></h4>
                                <p class="text-muted mb-0">Total des catégories créées</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Actions Rapides</h5>
                        <a href="?c=createCateg" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-plus me-1"></i>Nouvelle
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des catégories -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0 text-success">
                    <i class="bi bi-table me-2"></i>Liste des Catégories
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-success">
                            <tr>
                                <th class="fw-semibold"># ID</th>
                                <th class="fw-semibold">Nom</th>
                                <th class="fw-semibold">Slug</th>
                                <th class="fw-semibold">Description</th>
                                <th class="fw-semibold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ListeCategories as $item): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-light text-success">#<?=$item->getId()?></span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-success">
                                        <i class="bi bi-tag me-1"></i>
                                        <?=html_entity_decode($item->getCategoryName())?>
                                    </div>
                                </td>
                                <td>
                                    <code class="text-muted"><?=$item->getCategorySlug()?></code>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 300px;">
                                        <?=html_entity_decode(substr($item->getCategoryDesc(),0,150))?>
                                        <?php if(strlen($item->getCategoryDesc()) > 150): ?>...<?php endif; ?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="?c=updateCateg&id=<?=$item->getId()?>" 
                                           class="btn btn-outline-success" 
                                           title="Modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                title="Supprimer"
                                                onclick="confirmerSuppression('<?=$item->getCategoryName()?>', <?=$item->getId()?>)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">
                        <i class="bi bi-exclamation-triangle me-2"></i>Confirmer la suppression
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer la catégorie <strong id="categoryName"></strong> ?</p>
                    <p class="text-muted small">Cette action est irréversible et peut affecter les articles associés.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Annuler
                    </button>
                    <a href="#" id="confirmDelete" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i>Supprimer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmerSuppression(name, id) {
            document.getElementById('categoryName').textContent = name;
            document.getElementById('confirmDelete').href = '?c=deleteCateg&id=' + id;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }
    </script>
</body>
</html>