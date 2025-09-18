<?php

class ElfeMagicienBlanc extends ElfePerso
{

    protected int $magie = 30;


    protected function initialisePerso()
    {
        parent::initialisePerso();
        // gestion de la magie de départ
        $magie = $this->getMagie() + mt_rand(1,self::DES_DE_DOUZE)+ mt_rand(1,self::DES_DE_DOUZE);
        $this->setMagie($magie);
        // sortie texte
        $string = "<h3>Création du personnage Humain Magicien Blanc nommé {$this->getName()}</h3>";
        $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Magie {$this->getMagie()}<br>Blesse {$this->getBlesse()}
        <br>XP {$this->getXp()}</p>";
        echo $string;

    }

    public function defendre()
    {
        // création de la défense
        $baseMagie = $this->getMagie()+$this->getAgilite();
        $des1 = mt_rand(1,self::DES_DE_DOUZE);
        $des2 = mt_rand(1,self::DES_DE_DOUZE);
        $totalMagie = $baseMagie + $des1 + $des2;
        return $totalMagie;
    }

    public function attaquer(MyPersoAbstract $other)
    {
        // création de l'attaque
        $baseMagie = $this->getMagie()+$this->getAgilite();
        $des1 = mt_rand(1,self::DES_DE_DOUZE);
        $des2 = mt_rand(1,self::DES_DE_DOUZE);
        $des3 = mt_rand(1,self::DES_DE_DOUZE);
        $totalAttaque = $baseMagie + $des1 + $des2 + $des3;
        $defense = $other->defendre();
        if($totalAttaque>$defense){

        }


        $string="<b>{$this->getName()} Attaque {$other->getName()}</b><br>";
        return $string;

    }
    public function gagner(MyPersoAbstract $other)
    {
        // TODO: Implement gagner() method.
    }

    protected function blesser()
    {
        // TODO: Implement blesser() method.
    }
    public function getMagie(): int
    {
        return $this->magie;
    }
    public function setMagie(int $magie): void
    {
        $this->magie = $magie;
    }



}