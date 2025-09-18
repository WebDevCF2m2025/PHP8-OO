<?php

class OrcPerso extends MyPerso {
    // Propriétes

    // Publiques
    public ?string $name = "Nabil";

    public function getSurname(): ?string {
        return $this->surname;
    }

    public function setSurname(string $surname): void {
        $this->surname = $surname;
    }
}