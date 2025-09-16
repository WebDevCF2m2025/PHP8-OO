<?php

abstract class HumainPerso extends MyPersoAbstract
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

}