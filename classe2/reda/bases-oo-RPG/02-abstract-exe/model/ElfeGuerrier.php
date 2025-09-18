<?php

class ElfeGuerrier extends MyPersoAbstract
{
  protected int $attaque = 50;

  protected function initialisePerso()
  {
    parent::initialisePerso();

    // gestion attaque
    $attaque =
      $this->getAttaque() +
      mt_rand(1, self::DES_DE_DOUZE) +
      mt_rand(1, self::DES_DE_SIX);
    $this->setAttaque($attaque);
    // sortie texte
    $string = "<h3>Création du personnage Elfe Guerrier nommé {$this->getName()}</h3>";
    $string .= "<p>Points de vie {$this->getVie()}<br>Agilité{$this->getAgilite()}<br>Attaque{$this->getAttaque()}<br>
      blesse {$this->getBlesse()}<br>XP {$this->getXp()}</p>";
    echo $string;
  }

  public function attaquer(MyPersoAbstract $other)
  {
    $string = "<b>{$this->getName()} Attaque {$other->getName()}</b><br>";
    return $string;
  }

  protected function blesser()
  {
    //
  }

  public function setAttaque(int $attaque): void
  {
    $this->attaque = $attaque;
  }
}
