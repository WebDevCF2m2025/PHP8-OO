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
var_dump($voiture1,$voiture2,$voiture3);
?>
</body>
</html>
