<?php
declare(strict_types=1);

require_once "model/MyPersoAbstract.php";
require_once "model/HumainPerso.php";
require_once "model/HumainMagicienBlanc.php";
require_once "model/HumainGuerrier.php";
require_once "model/HumainVoleur.php";
require_once "model/ElfePerso.php";
require_once "model/ElfeMagicienBlanc.php";
require_once "model/ElfeGuerrier.php";
require_once "model/ElfeVoleur.php";
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
    <?php




    if (
        isset($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"])

    ) {
        if ($_POST["espece_perso"] === "Orc") {
            if ($_POST["style_perso"] === "Guerrier") {
                $perso1 = new OrcGuerrier($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new HumainGuerrier("Alaric", "Humain", "Guerrier");
            }
            if ($_POST["style_perso"] === "Voleur") {
                $perso1 = new OrcVoleur($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new OrcGuerrier("Grak", "Orc", "Guerrier");
            }
            if ($_POST["style_perso"] === "Magicien") {
                $perso1 = new OrcMagicienBlanc($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new OrcVoleur("Thruk", "Orc", "Voleur");
            }
        }
        if ($_POST["espece_perso"] === "Elfe") {
            if ($_POST["style_perso"] === "Guerrier") {
                $perso1 = new ElfeGuerrier($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new OrcMagicienBlanc("Muzgak", "Orc", "Magicien");
            }
            if ($_POST["style_perso"] === "Voleur") {
                $perso1 = new ElfeVoleur($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new ElfeGuerrier("Elandor", "Elfe", "Guerrier");
            }
            if ($_POST["style_perso"] === "Magicien") {
                $perso1 = new ElfeMagicienBlanc($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new ElfeVoleur("Thalir", "Elfe", "Voleur");
            }
        }
        if ($_POST["espece_perso"] === "Humain") {
            if ($_POST["style_perso"] === "Guerrier") {
                $perso1 = new HumainGuerrier($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new ElfeMagicienBlanc("Lyrielle", "Elfe", "Magicien");
            }
            if ($_POST["style_perso"] === "Voleur") {
                $perso1 = new HumainVoleur($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new HumainVoleur("Joren", "Humain", "Voleur");
            }
            if ($_POST["style_perso"] === "Magicien") {
                $perso1 = new HumainMagicienBlanc($_POST["nom"], $_POST["espece_perso"], $_POST["style_perso"]);
                $perso2 = new HumainMagicienBlanc("Seraphine", "Humain", "Magicien");
            }
        }
    }



    ?>

    <hr>
    <h3>Les descendants</h3>
    <p>Peuvent intéragir ensemble</p>
    <?php
    $tour = 1;
    $tourActif = 'perso1';

    while ($perso1->getVie() > 0 && $perso2->getVie() > 0) {
        echo "<h3>Tour $tour</h3>";

        if ($tourActif === 'perso1') {
            echo $perso1->attaquer($perso2);

            if ($perso2->getVie() <= 0) {
                break;
            }

            $tourActif = 'perso2';
        } else {
            echo $perso2->attaquer($perso1);

            if ($perso1->getVie() <= 0) {
                break;
            }

            $tourActif = 'perso1';
        }

        echo "<hr>";
        $tour++;
    }

    echo "<br><strong>Le combat est terminé.</strong><br>";

    if ($perso1->getVie() > 0) {
        echo "<strong>{$perso1->getName()} remporte le combat !</strong>";
    } elseif ($perso2->getVie() > 0) {
        echo "<strong>{$perso2->getName()} remporte le combat !</strong>";
    }


    ?>
</body>

</html>
