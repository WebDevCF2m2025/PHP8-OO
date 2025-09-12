<?php
declare(strict_types=1);
include "NotrePerso.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'un personnage</title>
</head>
<body>
<h1>Création d'un personnage</h1>
<p>Nous allons créer une instance de NotrePerso()</p>

<?php
try {
    $perso1 = new NotrePerso(null, "<script>Pierre");
}catch (Exception $e){
    die($e->getMessage());
}

echo "<p>{$perso1->getId()}</p><p>{$perso1->getName()}</p>";

/*
echo $perso1->getId();
$perso1->setId(65);
echo $perso1->getId();
echo "<hr>{$perso1->getName()}";
$perso1->setName(" <script> alert('jghjg'); </script>    ");
echo "<hr>{$perso1->getName()}";
*/
var_dump($perso1);

?>
</body>
</html>
