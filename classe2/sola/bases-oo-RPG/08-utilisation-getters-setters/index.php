<?php
declare(strict_types=1);
include "LaVoiture.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice Constructeur, getters et setters</title>
</head>
<body>
<h1>Exercice Constructeur, getters et setters</h1>
<h2>Notice grâce ar trigger_error() par défaut</h2>
<pre><code>$voiture1 = new LaVoiture('Fiat',2024,600,'DOBLÒ VAN L1');
$voiture2 = new LaVoiture('Renault',2028,600,' ');
$voiture3 = new LaVoiture(' ddd',2024,20,'kjhjhk');
var_dump($voiture1,$voiture2,$voiture3);    </code></pre>
<?php
$voiture1 = new LaVoiture('Fiat',2024,600,'DOBLÒ VAN L1');
$voiture2 = new LaVoiture('Renault',2028,600,' ');
$voiture3 = new LaVoiture(' ddd',2024,20,'kjhjhk');
// possible, mais dévalué, à éviter
$voiture1->lulu = "rien";
?>
<h2>Les getters et setters sont publiques</h2>
<p>On peut donc les afficher depuis l'extérieur de l'instance</p>
<?php
echo '<p>$voiture1 :<br>';
echo 'Caractéristiques $voiture1->getMarque() : '.$voiture1->getMarque();
echo '<br>Caractéristiques $voiture1->getModel() : '."{$voiture1->getModel()}<br>";
echo 'Caractéristiques $voiture1->getAnneeSortie() : '."{$voiture1->getAnneeSortie()}<br>";
echo 'Caractéristiques $voiture1->getChevaux() : '."{$voiture1->getChevaux()}<br></p>";
echo '<p>$voiture2 :<br>';
echo 'Caractéristiques $voiture2->getMarque() : '.$voiture2->getMarque();
echo '<br>Caractéristiques $voiture2->getModel() : '."{$voiture2->getModel()}<br>";
echo 'Caractéristiques $voiture2->getAnneeSortie() : '."{$voiture2->getAnneeSortie()}<br>";
echo 'Caractéristiques $voiture2->getChevaux() : '."{$voiture2->getChevaux()}<br></p>";
?>
<p>On peut donc les modifier depuis l'extérieur de l'instance</p>
<pre><code>$voiture2->setMarque("Volvo");
$voiture2->setModel("MX833");
$voiture2->setAnneeSortie(2022);
$voiture2->setChevaux(800);</code></pre>
<?php
echo '<p>modification de $voiture2 :<br>';
$voiture2->setMarque("Volvo");
$voiture2->setModel("MX833");
$voiture2->setAnneeSortie(2022);
$voiture2->setChevaux(800);
echo '<p>$voiture2 :<br>';
echo 'Caractéristiques $voiture2->getMarque() : '.$voiture2->getMarque();
echo '<br>Caractéristiques $voiture2->getModel() : '."{$voiture2->getModel()}<br>";
echo 'Caractéristiques $voiture2->getAnneeSortie() : '."{$voiture2->getAnneeSortie()}<br>";
echo 'Caractéristiques $voiture2->getChevaux() : '."{$voiture2->getChevaux()}<br></p>";
?>
<?php
var_dump($voiture1,$voiture2,$voiture3);
?>
</body>
</html>
