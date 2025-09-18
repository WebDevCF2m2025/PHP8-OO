<?php

// Déclaration du mode strict
declare(strict_types=1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "model/MyPerso.php";
include "model/OrcPerso.php";
?>

<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Extends</title>
</head>
<body>
<pre>
    <?php
    $perso = new MyPerso();
    $persoOrc = new OrcPerso();
    var_dump($perso, $persoOrc);
    echo "<p>Anciens noms : <br>- {$perso->name}<br>- {$persoOrc->name}</p>";
    ?>
</pre>
    <pre><code>
    // Impossible depuis l'extérieur des classes : protected et private
    // echo "Anciens surnoms (protected) : {$perso->surname} {$persoOrc->surname}";
    // echo "Anciens emails (private) : {$perso->email} {$persoOrc->email}";
        </code></pre>
<pre>
    <?php
    echo "<hr>";
    $perso->name = "Pierre";
    $persoOrc->name = "Charlie";
    var_dump($perso, $persoOrc);
    echo "<p>Nouveaux noms : <br>- {$perso->name}<br>- {$persoOrc->name}</p>";

    echo $persoOrc->getSurname();
    $persoOrc->setSurname("Mikawa");
    echo "<br>{$persoOrc->getSurname()} <br>";
    var_dump($perso,$persoOrc);;
    ?>
</pre>
</body>
</html>