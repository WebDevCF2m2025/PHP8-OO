<?php
declare(strict_types=1);

require_once "../config.php";

// Autoload fonctionnel avec les namespaces "maison"
// ne fonctionne qu'en OO
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    //echo RACINE_PATH.'/' .$class . '.php<br>';
    require RACINE_PATH.'/' .$class . '.php';
});

// Débogage
echo '<div class="container"><hr><h3>Barre de débogage</h3><hr>';
echo '<h4>session_id() ou SID</h4>';
var_dump(session_id());
echo '<h4>$_GET</h4>';
var_dump($_GET);
echo '<h4>$_SESSION</h4>';
// var_dump($_SESSION);
echo '<h3>$_POST</h3>';
var_dump($_POST);
echo '</div>';




// chargement du router
require_once RACINE_PATH."/controller/routerController.php";

