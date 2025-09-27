<?php
declare(strict_types=1);

require_once "../config.php";

// chargement des dépendances dans l'ordre généalogique
// parcequ'il n'y a pas encore d'autoload
include RACINE_PATH."/model/SlugifyTrait.php";
include RACINE_PATH."/model/AbstractMapping.php";// doit être chargé avant ArticleMapping (sinon erreur d'extends)
include RACINE_PATH."/model/ArticleMapping.php";
// Interface qui oblige les managers à utiliser PDO
// dans leur constructeur
include RACINE_PATH."/model/ManagerInterface.php";
// Interface obligatoire pour les CRUD
include RACINE_PATH."/model/CrudInterface.php";
// Le Manager s'occupe de faire les requêtes
include RACINE_PATH."/model/ArticleManager.php";

// chargement du router
require_once RACINE_PATH."/controller/routerController.php";

