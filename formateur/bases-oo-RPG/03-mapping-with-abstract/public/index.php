<?php


require_once "../config.php";
require_once "../model/AbstractMapping.php";

echo RACINE_PATH;
echo "<hr>";
$titre = "Un titre l'école et l'hôpital";
echo AbstractMapping::slugify($titre);