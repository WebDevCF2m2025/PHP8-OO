<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation d'une classe</title>
</head>

<body>
    <h1>creation d'une classe</h1>
    <p>Il faut d'abord importer le fichier contenant la classe</p>
    <p><strong>1 fichier par class !!!!</strong></p>
    <p>Le nom du fichier doit correspondre au nom de la classe (autoload)</p>
    <h3>Chargment de la classe </h3>
    <p>Se fait avant le doctype</p>
    <code>include("Personnage.php")</code>
    <?php
    include "Personnage.php";
    ?>

    <hr>
    <h3>instantion de la classe</h3>
    <p>Cette classe est vide, on peut tout de meme l'instancier</p>
    <pre><code>$user1 = new Personnage()

    var_dump($user1,$user2);</code> </pre>

    <?php

    $user1 = new Personnage();
    $user2 = new Personnage();
    // ne foncction pas, c'est un lien symbolyque vers l'objet et nom une attribution de valeur
    $user3 = $user1;
    var_dump($user1, $user2, $user3);
    ?>

</body>

</html>