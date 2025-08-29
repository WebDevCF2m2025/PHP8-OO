<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Création et importation d'une classe</title>
</head>
<body>

<h1>Création et importation d'une classe</h1>
<h2>Importation:</h2>
<p>Chaque classe devra se trouver dans un fichier unique, qui portera le même nom que la classe (autoload).</p>
<p>Nous allons le charger ci-dessous, (se fait en principe avant le doctype).</p>
<code>include "Personnage.php";</code>
<?php
include "Personnage.php";
?>
<h2>Instanciation d'objet de type Personnage:</h2>
<p>En OO, on instancie (création d'un objet) la classe avec le mot clef `new`.</p>
<pre  ><code>// création de 2 instances de type Personnage
$perso1 = new Personnage();
$perso2 = new Personnage();

// affichage des Personnages
var_dump($perso1, $perso2);</code></pre>

<?php
// création de 2 instances de type Personnage
// dnas des alias vers la mémoire :ù sont stockées les instances
$perso1 = new Personnage();
$perso2 = new Personnage();

// personnage 3  n'est qu'un lien symbolique vers le personnage 1
// il faudra utilise le clonage pour faire une copie
// avec un nouvel espace mémoire
$perso3 = $perso1;

// affichage des Personnages
var_dump($perso1, $perso2);

?>


</body>
</html>