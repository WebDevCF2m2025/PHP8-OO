<?php

class MyPerso
{
    // propriétés
    // publiques
    public ?string $name = "Mike";
    // protégées
    protected ?string $surname = "Mikhawa";
    // privées
    private ?string $email = "mike@cf2m.be";
    private ?int $endurance = 100;



    // méthodes publiques
    public function getEndurance()
    {
        return (string) $this->endurance;
    }

}
