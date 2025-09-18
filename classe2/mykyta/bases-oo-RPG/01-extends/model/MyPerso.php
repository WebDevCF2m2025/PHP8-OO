<?php

class MyPerso {
    public ?string $name = null;
    protected ?string $surname = null;
    private ?string $email = null;
    public ?int $endurance = 100;

    public function getEndurance(){
        return $this->endurance;
    }

    
}