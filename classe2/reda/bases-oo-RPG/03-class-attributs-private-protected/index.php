<?php

// Déclaration du mode strict
declare(strict_types=1);

include "Personnage.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Les attributs protected et private dans une classe</title>
</head>
<body>

<h1>Les attributs protected et private dans une classe</h1>
<h2>Ce sont les "variables" interne des classes, non modifiable de l'extérieur. </h2>

<h2>Instanciation d'objet de type Personnage :</h2>
<p>En OO, on instancie (création d'un objet) la classe avec le mot clef `new`.</p>
<pre  ><code>// création de 2 instances de type Personnage
    $perso1 = new Personnage();
    $perso2 = new Personnage();
    $perso3 = new Personnage();

// affichage des Personnages
var_dump($perso1, $perso2);</code></pre>

<?php
// création de 2 instances de type Personnage
// dans des alias vers la mémoire :ù sont stockées les instances
$perso1 = new Personnage();
$perso2 = new Personnage();
$perso3 = new Personnage();

// affichage des Personnages
var_dump($perso1, $perso2, $perso3);

?>

<h2>La visibilité privée et protégée des attributs :</h2>
<p>Ces attributs ne peuvent être écrites ni lues en dehors de la classe. Pour cela, nous devons utiliser des 'getters' et 'setters', qui sont des méthodes (fonctions `public` de la classe).</p>
<h3>La différence entre l'attribut private et protected est que le private ne peut modifier que DANS la classe actuelle, la protected peut être modifié dans les enfants (extends voir tards).</h3>





<h3>Modification d'un attributs public :</h3>
<p>Avec le signe fleche instance→attributs = valeurs</p>
<p>Il faut respecter le type </p>

<h3>Affichage :</h3>
<h4>Ces attributs sont modifiables depuis l'extérieur de la classe</h4>
<p>avec le signe echo instance-> attribut</p>
<pre><code>
    echo '$perso1 : '. "Genre :{$perso1->genre} | Age :{$perso1->age} ans | Mois :{$perso1->mois}";
    echo '$perso2 : '. "Genre :{$perso2->genre} | Age :{$perso2->age} ans | Mois :{$perso2->mois}";
    echo '$perso1 : '. "Genre :{$perso3->genre} | Age :{$perso3->age} ans | Mois :{$perso3->mois}";

  </code></pre>



<h3>On doit utiliser des méthodes publiques pour modifier ces attributs</h3>
<p>méthodes publiques bateau : initializePersonnage()</p>
<pre><code>
  $perso1->initializePersonnage();
  var_dump($perso1);
  </code></pre>

<?php
$perso1->initializePersonnage();
var_dump($perso1);
?>


<p>Méthodes publiques bateau 2 : initializeLazyPersonnage():void <br>Cette fonction ne vérifie que le type</p>
<pre><code>
  $perso1->initializePersonnage();
  var_dump($perso1);
  </code></pre>

<?php
$perso2->initializeLazyPersonnage("Féminin", 30, "Mars");
var_dump($perso2);
?>

</body>
</html>