<?php

class OrcPerso extends MyPerso
{
    public ?string $name = "Nabil";

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }
    /*
     * impossible, endurance est privé dans le parent
     public function getEndurance(){
        return $this->endurance;
    }
    */
}