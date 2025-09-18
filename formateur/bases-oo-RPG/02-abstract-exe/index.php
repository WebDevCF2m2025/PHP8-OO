<?php
// on désactive le transtypage (typage strict).
declare(strict_types=1);

require_once "model/MyPersoAbstract.php";
require_once "model/HumainPerso.php";
require_once "model/HumainMagicienBlanc.php";
require_once "model/ElfePerso.php";
require_once "model/ElfeMagicienBlanc.php";



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
<h1>Jeux - Exercices</h1>
<p>Créez les classes suivantes :</p>
<ul>
    <li>OrcPerso : classe abstraite qui définit les propriétés de l'orc</li>
    <li>OrcMagicienBlanc enfant de OrcPerso qui gère la magie</li>
    <li>ElfeGuerrier enfant de ElfePerso qui gère le combat</li>
    <li>HumainGuerrier enfant de HumainPerso qui gère le combat</li>
    <li>OrcGuerrier enfant de OrcPerso qui gère le combat</li>
    <li>ElfeVoleur enfant de ElfePerso qui gère l'esquive</li>
    <li>HumainVoleur enfant de HumainPerso qui gère l'esquive</li>
    <li>OrcVoleur enfant de OrcPerso qui gère l'esquive</li>
</ul>
<h2>Permettre de faire des combats entre deux personnages</h2>
<p>Ces combats devront avoir une fin (quand la vie arrive à 0)</p>
<p>Le combat durera tant qu'un des deux personnages n'est pas mort</p>
<!--
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
-->
<?php
/*
$perso1 = new HumainMagicienBlanc("mickey","Humain","Magicien");

$perso2 = new ElfeMagicienBlanc("Magib","Elfe","Magicien");
/*
if(isset($_POST['nom'],$_POST['espece_perso'],$_POST['style_perso']))  {
    $persoPost = new ElfeMagicienBlanc($_POST['nom'],$_POST['espece_perso'],$_POST['style_perso']);
    var_dump($persoPost);
}


echo "{$perso1->attaquer($perso2)}";

var_dump($perso1,$perso2,$_POST);
*/
?>
<hr>
<h3>Les espèces</h3>
<p>Ce sont 3 classes abstraites enfants de la classe MyPersoAbstract</p>
<hr>
<p>Il y a 3 espèces: les humains, les orcs et les elfes</p>
<h4>Ces points restent stables pour le personnage</h4>
<h4>Les humains</h4>
<p><strong>Vie</strong> leur vie vaut 1000 + 1 lancé de dé de 12 + 1 lancé de dé de six</p>
<p><strong>Agilité</strong> leur agilité vaut 30 + 1 lancé de dé de 12</p>
<p><strong>Blessure</strong> ils blessent de 40 + 1 lancé de dé de 6</p>
<h4>Les elfes</h4>
<p><strong>Vie</strong> leur vie vaut 1000 - 1 lancé de dé de 12 - 1 lancé de dé de six</p>
<p><strong>Agilité</strong> leur agilité vaut 30 + 2 lancés de dé de 12 + 1 lancé de dé de 6</p>
<p><strong>Blessure</strong> ils blessent de 40 - 1 lancé de dé de 6</p>
<h4>Les orcs</h4>
<p><strong>Vie</strong> leur vie vaut 1000 + 3 lancés de dé de 12</p>
<p><strong>Agilité</strong> leur agilité vaut 30 - 2 lancés de dé de 6</p>
<p><strong>Blessure</strong> ils blessent de 40 + 3 lancé de dé de 6</p>
<hr>

<hr>
<h3>Les styles</h3>
<p>Ce sont les classes finales qui vont être instanciées</p>
<p>Elles héritent toutes de ElfePerso, OrcPerso ou HumainPerso</p>
<h4>Ces points changent à chaque attaque !</h4>
<hr>
<h4>Les Magiciens</h4>
<p>Une attaque est formée de leur magie + agilité + 3 lancés de dés de 12</p>
<p>Une défense est formée de leur magie + agilité + 2 lancés de dés de 12</p>
<h5>Hors attaques les valeurs de magie sont fixes</h5>
<p><strong>Magiciens elfes</strong> ils ont une magie de 30 + 2 lancés de dé de 12</p>
<p><strong>Magiciens humains</strong> ils ont une magie de 30 + 1 lancés de dé de 12</p>
<p><strong>Magiciens Orcs</strong> ils ont une magie de 30 + 1 lancés de dé de 6</p>
<h4>Les Guerriers</h4>
<p>Une attaque est formée de leur force + agilité + 3 lancés de dés de 12</p>
<p>Une défense est formée de leur force + agilité + 2 lancés de dés de 12</p>
<h5>Hors attaques les valeurs de force sont fixes</h5>
<p><strong>Guerriers elfes</strong> ils ont une force de 30 + 1 lancés de dé de 6</p>
<p><strong>Guerriers humains</strong> ils ont une force de 30 + 1 lancés de dé de 12</p>
<p><strong>Guerriers Orcs</strong> ils ont une force de 30 + 2 lancés de dé de 12</p>
<h4>Les Voleurs</h4>
<p>Une attaque est formée de leur intelligence + agilité + 3 lancés de dés de 12</p>
<p>Une défense est formée de leur intelligence + agilité + 2 lancés de dés de 12</p>
<h5>Hors attaques les valeurs d'intelligence sont fixes</h5>
<p><strong>Voleurs elfes</strong> ils ont une intelligence de 30 + 2 lancés de dé de 12</p>
<p><strong>Voleurs humains</strong> ils ont une intelligence de 30 + 1 lancés de dé de 12</p>
<p><strong>Voleurs Orcs</strong> ils ont une intelligence de 30 + 1 lancé de dé de 6</p>
<?php
$prems = new ElfeMagicienBlanc("Jeff","Elfe","Magicien");
$deums = new HumainMagicienBlanc("Bezos","Humain","Magicien");

var_dump($prems,$deums);
/*
echo $perso1->attaquer($perso2);
echo $perso2->attaquer($perso1);

var_dump($perso1,$perso2);*/
?>
</body>
</html>