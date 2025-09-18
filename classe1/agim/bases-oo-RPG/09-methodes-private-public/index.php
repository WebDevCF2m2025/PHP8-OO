<?php
declare(strict_types=1);
include "Persoo.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les méthodes</title>
</head>
<body>
<h1>Les méthodes</h1>
<p>Ce sont des fonctions internes à la classe, elles peuvent avoir plusieurs visibilités</p>
<h2>Getter et Setter</h2>
<p>Ce sont toujours des fonctions publiques liées aux propriétés, on peut donc les utiliser en dehors de la classe (dans une instance de celle-ci).</p>
<h2>Méthodes personnalisées</h2>
<p>On peut les utiliser pour permettre à notre classe d'effectuer des actions</p>
<h3>Créons un personnage en utilisant la constante publique Persoo::ESPECE_PERSO</h3>
<form method="post" name="create">
    <input type="text" name="name" placeholder="Votre nom" required><br>
    <select name="espece">
        <option value="">Choix</option>
        <?php
        // utilisation d'une constante de la classe Persoo
        foreach (Persoo::ESPECE_PERSO as $item):
        ?>
            <option value="<?=$item?>"><?=$item?></option>
        <?php
        endforeach;
        ?>
    </select><br>
    <input type="submit" value="Créer">
</form>
<h4>Création du personnage</h4>
<?php
$perso2 = new Persoo("Marc","Orc");
if(isset($_POST['name'],$_POST['espece'])){
    $perso1 = new Persoo($_POST['name'],$_POST['espece']);

    echo $perso1->attaqueEnnemi($perso2);
}
?>
<?php
var_dump($_POST,$perso1,$perso2);
?>
</body>
</html>
