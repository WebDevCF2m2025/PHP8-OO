<?php

class OrcPerso extends MyPerso{
    public ?string $name = "Nabil";
    protected ?string $surname = "LeOuf";
    private ?string $email = "emailClassOrc@gmail.com";
    public function getEmail(){
        return $this->email;
    }

    public function getSurname(){
        return $this -> surname;
    }

    public function setSurname($surname){
        $this->surname=$surname;
    }
     
    public function setEmail($email){
        $this->email=$email;
    }
}