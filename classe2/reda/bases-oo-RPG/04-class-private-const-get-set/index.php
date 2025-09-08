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
  <title>Classe avec getters et setters</title>
</head>
<body style="background-color: whitesmoke">
<h1>Classe avec getters et setters</h1>
<h2>Affichage de la classe</h2>
<?php
// création d'une instance de type Personnage
$perso1 = new Personnage();
?>
<h3>Constante publique</h3>
<p>Les constantes sont par défaut public (mais on peut les
rendre private ou protected) elles sont en MAJUSCULES et
en SNAKE_CASE, elle doivent être initialisées avec une valeur
par défaut.</p>
<pre style="background-color: #1a1e21; color: #20c997"><code>
// Mauvaise pratique, on part de l'instance
echo $perso1::LA_RACE . " ";

// Bonne pratique, on part de la classe
echo Personnage::LA_RACE . " ";

  </code> </pre>

<?php
// Mauvaise pratique, on part de l'instance
echo $perso1::LA_RACE . " ";

// Bonne pratique, on part de la classe
echo Personnage::LA_RACE . "<br> ";
// la bonne pratique mais ne fonctionne pas car privée
// echo Personnage::LE_GENRE . "<br> ";

?>


<?php
var_dump( $perso1 );
?>


<h2>private</h2>
<p>On ne peut les lire ou les modifier depuis l'extérieur
  de la class (ni depuis les enfants voir
  les protected — héritage).</p>
<p>Valable pour les 3 grands types:</p>
<ul>
  <li>Propriété</li>
  <li>Constante</li>
  <li>Méthode</li>
</ul>
<pre style="background-color: #1a1e21; color: #20c997"><code>
$perso1->le_nom = "Jean"; // Erreur
echo $perso1->l_age; // Erreur

  </code>
</pre>
<h2>Setters</h2>
<h3>ou mutators, méthodes publiques</h3>
<p>Ils permettent de modifier les propiétés private ou
protected (ou public en readonly).</p>

<?php
$perso1->setLeNom("Pierre");
var_dump( $perso1 );
?>
</body>
</html>
