<?php
 declare(strict_types=1);
 include "Perso.php";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le constructeur</title>
 </head>
 <body>
    <h1>le constructeur</h1> 
    <p>Le constructeur est une méthode publique magique, elle est appelée lorsqu'on instencie une classe (new)</p>
<form action="" method="post" name="creer">
   <input type="text" name="name" placeholder="votre nom">
<select name="race">
      <option value="">choisissez une race</option>
      <?php
         foreach (Perso::getRaces() as $item):
            ?>
               <option value="<?= $item ?>"><?= $item ?></option>
            <?php
         endforeach;
      ?>
</select>
<input type="submit" value="Créer le personnage">
</form>
   <?php 
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (empty($_POST['name']) || empty($_POST['race'])) {
         echo "<span style='color:red'>Erreur : Veuillez saisir un nom et choisir une race !</span><br>";
      } else {
         $perso = new Perso($_POST['name'], $_POST['race']);
         echo "<hr>";
         echo '$perso::BEGIN_HEALTH => '.Perso::BEGIN_HEALTH. "<br>";
         echo ' <h4>readonly </h4> ';
         echo "on peut le lire depuis l'exterieur, mais pas le modifier";
         echo $perso->spec;
         echo '<br> ne fonction pas (attribution) $perso1->spec=25<br> N\'est pas encor une bonne pratique, à garder en memoir pour l\'avenir)';
         var_dump($perso);
      }
   }
   ?>
 </body>
 </html>