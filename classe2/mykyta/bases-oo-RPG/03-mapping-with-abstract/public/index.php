<?php


require_once "../config.php";

// utilisation de la racine pour construire nos include, require etc.
require_once RACINE_PATH."/model/AbstractMapping.php";
require_once RACINE_PATH."/model/ArticleMapping.php";

echo "<p>Les constantes magiques : <a href='https://www.php.net/manual/en/language.constants.magic.php' target='_blank'>constantes magiques</a> </p>";
echo "<p>RACINE_PATH chemin fixe vers la racine de notre site : ".RACINE_PATH."</p>";
echo "<hr><p>Utilisation provisoire d'une méthode statique (echo AbstractMapping::slugify(".'$titre'.");)</p>";
$titre = "Un titre l'école et l'hôpital";
echo AbstractMapping::slugify($titre);

echo "<hr><h3>Mapping de la table article</h3>
<p>On va instancier la classe ArticleMapping</p>";

$article1 = new ArticleMapping(1, "Mon premier article", "mon-premier-slug", "Le texte de mon premier article", "2024-6-10", true);

var_dump($article1);