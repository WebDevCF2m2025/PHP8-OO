<?php
class HumainVoleur extends HumainPerso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Bonus Voleur
        $this->setAgilite($this->getAgilite() + 20);
    }
}
