<?php

class ElfeVoleur extends MyPersoAbstract
{
  protected int $charisme = 40;

  protected function initialisePerso()
  {
    parent::initialisePerso();
    //gestion charisme
    $charisme =
      $this->mt_rand(1, self::DES_DE_DOUZE) + mt_rand(1, self::DES_DE_SIX);
    $this->setCharisme($charisme);
    // sortie texte
    $string = "<h3>Création du personnage Elfe Voleur nommé {$this->getName()}</h3>";
    $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Charisme {$this->getCharisme()}<br>
      Blesse {$this->getBlesse()}<br>XP {$this->getXp()}";
    echo $string;
  }

  public function attaquer(MyPersoAbstract $other)
  {
    $string = "<b>{$this->getName} Attaque {$other->getName}<b><br>";
    return $string;
  }

  public function blesse()
  {
    //
  }

  public function getCharisme(): int
  {
    return $this->charisme;
  }

  public function setCharisme(int $charisme): void
  {
    $this->charisme = $charisme;
  }
}
