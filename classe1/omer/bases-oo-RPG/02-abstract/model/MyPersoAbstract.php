<?php

abstract class MyPersoAbstract{
    // properties
    protected ?string $name=null;

    protected ?int $vie = 1000;

    // constantes
    public const DES_DE_SIX = 6;
    public const DES_DE_DOUZE = 12;

    // constructeur commun
    public function __construct(string $nom){
        $this->setName($nom);
    }

    // methodes abstraites
    abstract public function attaquer(MyPersoAbstract $other);
    abstract protected function initialisePerso();


    // getters and setters
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getVie(): ?int
    {
        return $this->vie;
    }

    public function setVie(?int $vie): void
    {
        $this->vie = $vie;
    }



}