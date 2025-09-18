<?php

abstract class OrcPerso extends MyPersoAbstract
{
  public function __construct(string $nom, string $espece, string $style)
  {
    parent::__construct($nom, $espece, $style);
    $this->initialisePerso();
  }

  protected function initialisePerso()
  {
    // gestion vie
    $vie =
      $this->getVie() -
      mt_rand(1, self::DES_DE_DOUZE) -
      mt_rand(1, self::DES_DE_SIX);
    $this->setVie($vie);
    // gestion mouvement
    $agilite =
      $this->getAgilite() +
      mt_rand(1, self::DES_DE_DOUZE) +
      mt_rand(1, self::DES_DE_SIX);
    $this->setAgilite($agilite);
    // gestion blessure
    $blesse = $this->getBlesse() - mt_rand(1, self::DES_DE_SIX);
    $this->setBlesse($blesse);
  }
}
