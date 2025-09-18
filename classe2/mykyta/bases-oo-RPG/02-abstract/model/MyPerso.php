<?php

class MyPerso extends MyPersoAbstract{
    public function attaquer(){
        return "{$this->getName()} Attaque {$this->getName()}";
    }
}