<?php
class OrcMagicienBlanc extends Orcperso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Spécificités du Magicien Blanc pour un Orc
        $this->setVie($this->getVie() + 10);
        $this->setAgilite($this->getAgilite() + 5);
    }
}
