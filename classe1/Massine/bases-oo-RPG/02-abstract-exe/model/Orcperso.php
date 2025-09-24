<?php
class Orcperso extends MyPersoAbstract
{
    protected function initialisePerso()
    {
        // gestion des points de vie de départ
        $vie = $this->getVie() + mt_rand(1,self::DES_DE_DOUZE) + mt_rand(1,self::DES_DE_DOUZE);
        $this->setVie($vie);
        // gestion de l'agilité de départ
        $agilite = $this->getAgilite() + mt_rand(1,self::DES_DE_SIX);
        $this->setAgilite($agilite);
        // gestion des blessures de départ
        $blesse = $this->getBlesse() + mt_rand(1,self::DES_DE_DOUZE);
        $this->setBlesse($blesse);
    }

    public function attaquer(MyPersoAbstract $other)
    {
        // Exemple simple d'attaque : inflige des dégâts à l'autre personnage
        $degats = $this->getBlesse() + mt_rand(1, self::DES_DE_SIX);
        $other->setVie($other->getVie() - $degats);
        return "Orc attaque et inflige $degats points de dégâts !";
    }

    protected function blesser()
    {
        // Exemple simple de blessure : réduit la vie de l'Orc
        $this->setVie($this->getVie() - 10);
    }
}