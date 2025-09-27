<?php
class ElfeVoleur extends ElfePerso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Bonus Voleur
        $this->setAgilite($this->getAgilite() + 20);
    }
}
