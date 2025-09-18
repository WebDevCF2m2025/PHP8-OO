<?php

class OrcGuerrier extends MyPersoAbstract
{
  protected int $attaquer = 30;

  protected function initialisePerso()
  {
    parent::initialisePerso();
    // gestion attaquer$attaquer départ
    $attaquer =
      $this->getAttaque() +
      mt_rand(1, self::DES_DE_DOUZE) +
      mt_rand(1, self::DES_DE_SIX);
    $this->setMagie($attaquer);
    // sortie texte
    $string = "<h3>Création du personnage Orc Guerrier nommé {$this->getName()}</h3>";
    $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Attaque {$this->getAttaque()}<br>Blesse {$this->getBlesse()}
   <br>XP {$this->getXp()}</p> ";
    echo $string;
  }

  public function attaquer(MyPersoAbstract $other)
  {
    $string = "<b> {$this->getName()} Attaque {$other->getName()}</b><br>";
    return $string;
  }

  protected function blesser()
  {
    //
  }

  public function getAttaque(): int
  {
    return $this->attaquer;
  }

  public function setMagie(int $attaquer): void
  {
    $this->attaquer = $attaquer;
  }
}
