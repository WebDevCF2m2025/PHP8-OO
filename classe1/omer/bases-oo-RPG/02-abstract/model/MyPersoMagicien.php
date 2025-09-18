<?php

class MyPersoMagicien extends MyPersoAbstract
{

    // surcharger le constructeur
    public function __construct(string $nom)
    {
        $this->initialisePerso();
        parent::__construct($nom);
    }

// méthode private pour un personnage sans magie
    protected function initialisePerso(){
        $malusVie = $this->getVie() - (mt_rand(10,20))* self::DES_DE_SIX;
        $this->setVie($malusVie);
    }
    public function attaquer(MyPersoAbstract $other)
    {
        return "{$this->getName()} Attaque {$other->getName()}<br>";
    }
}