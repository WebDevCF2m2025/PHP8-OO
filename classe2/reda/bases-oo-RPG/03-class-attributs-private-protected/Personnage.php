<?php

// Le nom de la classe doit être le même que celui du fichier
// on, déclare une classe avec le mot clf "class{}".

class Personnage
{
  // Attributs
  private string $genre; // attribut private sans valeur
  private int $age = 25; // attribut private avec valeur
  protected null|int|string $mois; // 3 types possibles
  // Constantes
  // Méthodes


  public function initializePersonnage():void
  {
    // On utilise le mot clef $this, celui-ci
    // représente l'instance de type personnage.
    $this->genre = "Masculin";
    $this->mois = "Septembre";
    $this->age = 35;

  }


  public function initializeLazyPersonnage(string $genre, int $age, null|string|int $mois):void
  {
    // On utilise le mot clef $this, celui-ci
    // représente l'instance de type personnage.
    $this->genre = $genre;
    $this->age = $age;
    $this->mois = $mois;

  }


}