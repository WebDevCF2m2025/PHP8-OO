<?php
// on désactive le transtypage (typage strict).
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// PersoAbstract
require_once "model/MyPersoAbstract.php";

// Humain
require_once "model/HumainPerso.php";
require_once "model/HumainMagicienBlanc.php";
require_once "model/HumainGuerrier.php";
require_once "model/HumainVoleur.php";

// Elfe
require_once "model/ElfePerso.php";
require_once "model/ElfeMagicienBlanc.php";
require_once "model/ElfeGuerrier.php";
require_once "model/ElfeVoleur.php";

// Orc
require_once "model/OrcPerso.php";
require_once "model/OrcMagicienBlanc.php";
require_once "model/OrcGuerrier.php";
require_once "model/OrcVoleur.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Héritage et classes abstraites</title>
</head>
<body>
<h1>Jeux - Exercices</h1>
<p>Créez les classes suivantes :</p>
<ul>
    <li>MyPersoAbstract</li>
    <li>OrcPerso</li>
    <li>OrcMagicienBlanc</li>
    <li>ElfeGuerrier</li>
    <li>HumainGuerrier</li>
    <li>OrcGuerrier</li>
    <li>ElfeVoleur</li>
    <li>HumainVoleur</li>
    <li>OrcVoleur</li>
</ul>
<h2>Permettre de faire des combats entre deux personnages</h2>
<p>Ces combats devront avoir une fin (quand la vie arrive à 0)</p>
<p>Le combat durera tant qu'un des deux personnages n'est pas mort</p>
<h2>Choisissez votre personnage</h2>
<form action="" method="post" name="perso">
    <fieldset>
        <legend>Nom de votre personnage</legend>
        <input type="text" id="nom" name="nom" placeholder="Nom" required>
        <label for="nom">Commence par une lettre, pas de caractères spéciaux ni d'espace et 4 à 20 caractères</label>
        <hr>
        <legend>Choix de l'espèce</legend>
        <select name="espece_perso" id="espece">
            <option value="">Choix de l'espèce</option>
            <?php
            foreach (MyPersoAbstract::CHOIX_ESPECE as $item):
                ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <label for="espece">Chacun a ses avantages/inconvénients (choix personnels)</label>
        <hr>
        <legend>Choix du style</legend>
        <select name="style_perso" id="style">
            <option value="">Choix du style</option>
            <?php
            foreach (MyPersoAbstract::CHOIX_STYLE as $item):
                ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <label for="style">Chacun a ses avantages/inconvénients</label>
        <hr>
        <input type="submit" value="Créer l'utilisateur">
    </fieldset>
</form>
<pre>
    <?php
    // Initialisation des différents Perso
    // Humain
    $perso1_Magicien = new HumainMagicienBlanc("mickey","Humain","Magicien");
    $perso1_Guerrier = new HumainGuerrier("mickey","Humain","Guerrier");
    $perso1_Voleur = new HumainVoleur("mickey","Humain","Voleur");

    // Elfe
    $perso2_Magicien = new ElfeMagicienBlanc("Magib","Elfe","Magicien");
    $perso2_Guerrier = new ElfeGuerrier("Magib","Elfe","Guerrier");
    $perso2_Voleur = new ElfeVoleur("Magib","Elfe","Voleur");

    // Orc
    $perso3_Magicien = new OrcMagicienBlanc("Michel","Orc","Magicien");
    $perso3_Guerrier = new OrcGuerrier("Michel","Orc","Guerrier");
    $perso3_Voleur = new OrcVoleur("Michel","Orc","Voleur");



    echo "{$perso1_Magicien->attaquer($perso2_Voleur)}";

    var_dump($perso1_Magicien,$perso2_Voleur);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom    = isset($_POST['nom']) ? trim($_POST['nom']) : '';
        $espece = isset($_POST['espece_perso']) ? trim($_POST['espece_perso']) : '';
        $style  = isset($_POST['style_perso']) ? trim($_POST['style_perso']) : '';

        $perso = MyPersoAbstract::creerPerso($nom, $espece, $style);

        if ($perso === null) {
            echo "Erreur dans la création du personnage.";
        } else {
            $perso = MyPersoAbstract::creerPerso($nom,$espece,$style);
        }
    }


    ?>
</pre>
<hr>
<h3>Les descendants</h3>
<p>Peuvent intéragir ensemble</p>
<?php
/*
echo $perso1->attaquer($perso2);
echo $perso2->attaquer($perso1);

var_dump($perso1,$perso2);*/
?>
</body>
</html>