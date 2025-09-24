<?php
class HumainGuerrier extends HumainPerso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Bonus Guerrier
        $this->setVie($this->getVie() + 20);
        $this->setBlesse($this->getBlesse() + 10);
    }
}
