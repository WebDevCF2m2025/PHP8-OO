<?php

declare(strict_types=1);
session_start();

require_once "../config.php";

// Autoload fonctionnel avec les namespaces "maison"
// ne fonctionne qu'en OO
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', '/', $class);
    $file = RACINE_PATH . '/' . $classPath . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new \Exception("Impossible de charger la classe : $class");
    }
});


// Débogage
echo '<div class="container"><hr><h3>Barre de débogage</h3><hr>';
echo '<h4>session_id() ou SID</h4>';
var_dump(session_id());
echo '<h4>$_GET</h4>';
// var_dump($_GET);
echo '<h4>$_SESSION</h4>';
var_dump($_SESSION);
echo '<h3>$_POST</h3>';
// var_dump($_POST);
echo '</div>';




// chargement du router
require_once RACINE_PATH."/controller/routerController.php";

