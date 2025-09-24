<?php
class ElfeGuerrier extends ElfePerso
{
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // Bonus Guerrier
        $this->setVie($this->getVie() + 20);
        $this->setBlesse($this->getBlesse() + 10);
    }
}
