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
    <p>Cette classe ne contient qu'un attribut, on peut tout de meme l'instancier</p>
    <pre><code>$user1 = new Personnage()

    var_dump($user1,$user2);</code> </pre>

    <?php
    echo "<pre>";
    $user1 = new Personnage();
    $user2 = new Personnage();
    // ne foncction pas, c'est un lien symbolyque vers l'objet et nom une attribution de valeur
    $user3 = $user1;
    var_dump($user1, $user2, $user3);
    echo "</pre>";


    ?>
    <p>Une valeur vide pour une propriété <b>(null)</b></p>
    <h3>Les propritétés public</h3>
    <p>Elles peuvent être lues et réecrites depuis n'importe où (danls la classe, dans ses héritiers, depuis l'exterieur de la classe)</p>
    <h4>Ecriture externe</h4>

    <pre><code>
    // public $the_name existe, et il n'a pas de typage

    $user1->the_name = 80; // Applique à l'instance 1 ($user1 et $user3)

    // $lulu n'xiste pas, les anciennes version le crée, à éviter
    // car dangereux, cela ne sera plus permis (sauf avec __set(), mais reste rare)
    // sera obsolette en PHP 9.0
    //  $user1->lulu = 5;

    var_dump($user1, $user2, $user3);
    </code></pre>


    <?php
    // public $the_name existe, et il n'a pas de typage
    $user1->the_name = 80; // Applique à l'instance 1 ($user1 et $user3)
    // $lulu n'xiste pas, les anciennes version le crée, à éviter
    // car dangereux, cela ne sera plus permis (sauf avec __set(), mais reste rare)
    // sera obsolette en PHP 9.0
    //  $user1->lulu = 5;

    // Modification (écriture) de $user2->the_name
    $user2->the_name = "Agim";

    echo "<pre>";

    var_dump($user1, $user2, $user3);

    echo "</pre>";
    ?>
    <h4>Ecriture externe de l'attribut publique</h4>
    <p>Sans typage, aucune sécurité (sauf a partir de PHP 8.1 avec readonly)</p>
    <?php
    // Modification (écriture) de $user2->the_name
    $user2->the_name = "Agim";


    ?>
</body>

</html>