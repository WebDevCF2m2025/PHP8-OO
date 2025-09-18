<?php

class MyPerso extends MyPersoAbstract
{


    // surcharger le constructeur
    public function __construct(string $nom)
    {
        $this->initialisePerso();
        parent::__construct($nom);
    }

    // méthode private pour un personnage sans magie
    protected function initialisePerso(){
        $bonusVie = $this->getVie() + (mt_rand(10,20))* self::DES_DE_DOUZE;
        $this->setVie($bonusVie);
    }


    // méthode abstraite, doit être rééinitialisée
    public function attaquer(MyPersoAbstract $other)
    {
        return "{$this->getName()} Attaque {$other->getName()}<br>";
    }
}