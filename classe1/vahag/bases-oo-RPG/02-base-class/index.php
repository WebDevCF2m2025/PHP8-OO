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

// ne fonctionne pas, c'est un lien symbolique vers l'objet et non une attribution de valeur (Alias)
$user3 = $user1;

var_dump($user1,$user2,$user3);</code></pre>
<?php
$user1 = new Personnage();
$user2 = new Personnage();
// ne fonctionne pas, c'est un lien symbolique vers l'objet et non une attribution de valeur
$user3 = $user1;
var_dump($user1,$user2,$user3);

?>
<p>Une valeur vide pour une propriété non typée donne <b>null</b></p>
<h3>Les propriétés publiques</h3>
<p>Elles peuvent être lues et réécrites depuis n'importe où (dans la classe, dans ses héritiers, depuis l'extérieur de la classe) </p>
<h4>Écriture externe de l'attribut publique</h4>
<pre><code>// public $the_name existe, et il n'a pas de typage

$user1->the_name = 80; // applique à l'instance 1 ($user1 ET $user3)

// $lulu n'existe pas, les anciennes versions le crée, à éviter
// car dangereux cela ne sera plus permis (sauf avec __set(), mais reste rare)
// sera obsolète en PHP 9.0
// $user1->lulu = 5;

// modification (écriture) de $user2->the_name

$user2->the_name = "Agim";

var_dump($user1,$user2,$user3);</code></pre>
<?php
// public $the_name existe, et il n'a pas de typage
$user1->the_name = 80; // applique à l'instance 1 ($user1 ET $user3)
// $lulu n'existe pas, les anciennes versions le crée, à éviter
// car dangereux cela ne sera plus permis (sauf avec __set(), mais reste rare)
// sera obsolète en PHP 9.0
// $user1->lulu = 5;

// modification (écriture) de $user2->the_name
$user2->the_name = "Agim";

var_dump($user1,$user2,$user3);
?>
<h4>Lecture externe de l'attribut publique</h4>
<p>Sans typage, aucune sécurité (sauf à partir de PHP 8.1 avec readonly)</p>
<pre><code>// on veut afficher le nom de $user1
echo $user1->the_name;

// on veut afficher le nom de $user2
echo $user2->the_name;

var_dump($user1,$user2,$user3);</code></pre>
<?php
// on veut afficher le nom de $user1
echo $user1->the_name."<br>";

// on veut afficher le nom de $user2
echo $user2->the_name;

var_dump($user1,$user2,$user3);
?>
</body>
</html>
