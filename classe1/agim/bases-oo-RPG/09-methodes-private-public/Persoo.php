<?php

class Persoo{
    // propriétés
    private ?string $name = null;
    private ?string $espece = null;
    private ?int $endurance = null;

    // constantes
    public const array ESPECE_PERSO = [
        "Humain",
        "Elfe",
        "Nain",
        "Orc",
        "Hobbit",
        "Gobelin",
    ];
    private const int PETIT_DES = 6;
    private const int GRAND_DES = 12;

    // constructeur
    public function __construct(string $name, string $espece)
    {
        // appel des setters
        $this->setEspece($espece);
        $this->setName($name);
        // appel d'une méthode privée
        $this->initializePersoo();

    }

    public function attaqueEnnemi(Persoo $other):string
    {
        return "$this->name attaque {$other->getName()}";
    }

    private function initializePersoo():void
    {
        $this->endurance = (self::GRAND_DES*(rand(1,2)))+(self::PETIT_DES*(rand(3,5)));
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $name = trim($name);
        if (!preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/u', $name)) {
            throw new Exception("Le nom doit commencer par une lettre, ne pas contenir d'espaces et ne peut contenir que des lettres et des chiffres.");
        }
        $this->name = $name;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(string $espece): void
    {
        if(!in_array($espece,self::ESPECE_PERSO)){
            throw new Exception("Cette espece n'est pas acceptée dans le jeux");
        }
        $this->espece = $espece;
    }


}