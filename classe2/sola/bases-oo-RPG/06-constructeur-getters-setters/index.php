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
    <title>Constructeur</title>
</head>
<body>
<h1>Constructeur</h1>
<p>La méthode public __construct() est méthode magique permettant de passer des arguments lors de l'instanciation d'une classe.</p>

<?php
if(LaVoiture::VOITURE_NEUVE===true){
    echo "<h2>Voitures neuves</h2>";
}

$car1 = new LaVoiture("   Mercedes2 <br>",2024,333,"EQS");
$car2 = new LaVoiture("<script> alert('XSS'); </script>",2015,428, "EX30");
$car3 = new LaVoiture("    ",2008,150,"");

// constante privée
//echo LaVoiture::MOTORISATION;
var_dump($car1,$car2,$car3,LaVoiture::NOS_MARQUES);
?>
<h2>Les getters et setters</h2>
<p>Méthodes publiques qui permettent de récupérer / modifier des propriétés (private, protected et plus tard public readonly)</p>
<h3>getter</h3>
<p>Permettent de récupérer la valeur</p>
<?php
echo 'La marque de notre $car1 ($car1->getMarque()) : '."{$car1->getMarque()}<br>";
echo 'La marque de notre $car2 (htmlspecialchars($car2->getMarque())) contient une attaque XSS, si vous ne savez pas d\'où viennent les données, protégées les à l\'affichage : '.htmlspecialchars($car2->getMarque())."<br>";
?>
<h3>Les setters</h3>
<p>Ou mutator, permet de modifier une propriétée tout en vérifiant la sécurité voulue pour celle-ci</p>
</body>
</html>
