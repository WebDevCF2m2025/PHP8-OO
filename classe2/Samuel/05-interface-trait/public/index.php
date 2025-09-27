<?php
declare(strict_types=1);

require_once "../config.php";

// Chargement des dépendances dans l'ordre généalogique
include RACINE_PATH . "/model/SlugifyTrait.php";
include RACINE_PATH . "/model/AbstractMapping.php"; // Doit être chargé avant ArticleMapping (sinon erreur d'extends)
include RACINE_PATH . "/model/ArticleMapping.php";

// Interface qui oblige les managers à utiliser PDO dans leur constructeur
include RACINE_PATH . "/model/ManagerInterface.php";
// Interface obligatoire pour les CRUD
include RACINE_PATH . "/model/CrudInterface.php";
// Le manager s'occupe de faire les requêtes
include RACINE_PATH . "/model/ArticleManager.php";

// Chargement du routeur
require_once RACINE_PATH . "/controller/routerController.php";