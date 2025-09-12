<?php
// on veut un typage fort (bonne pratique)
// sécurité + JIT (just in time activate) + cache mémoire
declare(strict_types=1);

include "Stagiaire.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classe</title>
</head>
<body>
<h1>Classe avec propriétés privées</h1>
<h2>Pas d'affichage ni de modification en dehors de la classe</h2>
<pre><code>/* interdits !
$stag1->le_nom = "Pierre";
echo $stag2->le_nom;
*/</code></pre>
<?php
$stag1 = new Stagiaire();
$stag2 = new Stagiaire();
$stag3 = new Stagiaire();
/*
$stag1->le_nom = "Pierre";
echo $stag2->le_nom;
*/

var_dump($stag1,$stag2);
?>
<h2>Nous devons créer de setters et getters</h2>
<h3>setters (mutators)</h3>
<p>Ce sont des méthodes publiques qui permettent de modifier les proprétés private (ou protected)</p>
<?php
$stag1->setLeNom("PierrePierre");

$stag2->setLeNom("<script> alert('yep'); </script> ");

$stag3->setLeNom("  25 ");

var_dump($stag1,$stag2,$stag3);

// constante public en partant de la classe
echo Stagiaire::EST_VIVANT;
echo
Stagiaire::getUp()
?>
</body>
</html>
