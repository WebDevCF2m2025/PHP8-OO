<?php

class HumainPerso extends MyPersoAbstract
{




    protected function initialisePerso()
    {
        // gestion des points de vie de départ
        $vie = $this->getVie() + mt_rand(1,self::DES_DE_DOUZE) + mt_rand(1,self::DES_DE_SIX);
        $this->setVie($vie);
        // gestion de l'agilité de départ
        $agilite = $this->getAgilite() + mt_rand(1,self::DES_DE_DOUZE);
        $this->setAgilite($agilite);
        // gestion des blessures de départ
        $blesse = $this->getBlesse() + mt_rand(1,self::DES_DE_SIX);
        $this->setBlesse($blesse);
    }

    public function attaquer(MyPersoAbstract $other)
    {
        $degats = $this->getBlesse() + mt_rand(1, self::DES_DE_SIX);
        $other->setVie($other->getVie() - $degats);
        return "Humain attaque et inflige $degats points de dégâts !";
    }

    protected function blesser()
    {
        $this->setVie($this->getVie() - 10);
    }

}