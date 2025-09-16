<?php
// on désactive le transtypage (typage strict).
declare(strict_types=1);

require_once "model/MyPersoAbstract.php";
require_once "model/MyPerso.php";
require_once "model/MyPersoMagicien.php";

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Héritage et classes abstraites</title>
</head>
<body>
<h1>Héritage et classes abstraites</h1>
<p>Les classes abstraites ne peuvent être instanciées, elles servent de modèles et de base communes à leurs descendants</p>
<?php
$perso1 = new MyPerso("Pierre");
$perso2 = new MyPersoMagicien("Mike");


echo MyPerso::DES_DE_DOUZE;
?><hr>
<h3>Les descendants</h3>
<p>Peuvent intéragir ensemble</p>
<?php
echo $perso1->attaquer($perso2);
echo $perso2->attaquer($perso1);

var_dump($perso1,$perso2);
?>
</body>
</html>