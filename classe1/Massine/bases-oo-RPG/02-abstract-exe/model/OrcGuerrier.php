<?php
class OrcGuerrier extends Orcperso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Bonus Guerrier
        $this->setVie($this->getVie() + 25);
        $this->setBlesse($this->getBlesse() + 15);
    }
}
