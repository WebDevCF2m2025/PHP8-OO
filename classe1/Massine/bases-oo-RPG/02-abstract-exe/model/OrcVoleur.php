<?php
class OrcVoleur extends Orcperso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Bonus Voleur
        $this->setAgilite($this->getAgilite() + 20);
    }
}
