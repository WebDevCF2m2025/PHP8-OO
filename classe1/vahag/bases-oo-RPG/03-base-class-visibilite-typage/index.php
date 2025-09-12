<?php
// déclaration stricte
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'une classe</title>
</head>
<body>
<h1>Création d'une classe</h1>
<p>Il faut d'abord importer le fichier contenant la classe</p>
<p><strong>1 fichier par classe !</strong></p>
<p>Le nom du fichier doit correspondre au nom de la classe (autoload)</p>
<h3>Chargement de la classe</h3>
<p>Cela se fait avant le doctype</p>
<code>include "Personnage.php";</code>
<?php
include "Personnage.php";
?>
<hr>
<h3>Instanciation de la classe</h3>
<p>Cette classe ne contient qu'une propriété <code>public $the_name</code>, on peut tout de même l'instancier en utilisant le mot clef <strong>new</strong>, c'est-à-dire créer une instance de la classe (donc un objet)</p>
<pre><code>$user1 = new Personnage();
$user2 = new Personnage();

var_dump($user1,$user2);</code></pre>
<?php
$user1 = new Personnage();
$user2 = new Personnage();

var_dump($user1,$user2);

?>
<h2>Modification des propriétés publiques</h2>
<p>Attention, on peut modifier depuis l'extérieur de la classe les propriétés public (le typage sécurise, mais pas suffisamment)</p>
<?php

// modification des propriétés publiques
$user1->the_name = "Pierre";
$user1->the_surname = null;
$user1->the_walking_dead = "<script> alert('hi'); </script>";


var_dump($user1,$user2);
?>
<h2>Affichage des propriétés public</h2>
<p>On peut immédiatement afficher les propriétés publiques, attaques xss etc possibles</p>
<?php
echo "<p>Nom: $user1->the_name</p>";
echo "<p>the_walking_dead: $user1->the_walking_dead</p>";
?>

</body>
</html>
