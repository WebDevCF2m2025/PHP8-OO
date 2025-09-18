<?php

abstract class MyPersoAbstract{
    protected ?string $name=null;


    //const

    public const DES_DE_SIX = 6;
    public const DES_DE_DOUSE = 12;
    //methodes

    public function __construct(string $name){
        $this->setName($name);
    }
    abstract public function attaquer();


    //get et set
    function getName(): ?string{
        return $this -> name;
    }
}