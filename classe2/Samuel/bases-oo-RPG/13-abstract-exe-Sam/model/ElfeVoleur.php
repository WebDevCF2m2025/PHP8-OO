<?php

class ElfeVoleur extends ElfePerso
{

    protected int $intelligence = 30;


    protected function initialisePerso()
    {
        parent::initialisePerso();
        // gestion de la magie de départ
        $intelligence = $this->getIntelligence() + mt_rand(1,self::DES_DE_SIX) + mt_rand(1,self::DES_DE_SIX);
        $this->setIntelligence($intelligence);
        // sortie texte
        $string = "<h3>Création du personnage Elfe Voleur nommé {$this->getName()}</h3>";
        $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Intelligence {$this->getIntelligence()}<br>Blesse {$this->getBlesse()}
        <br>XP {$this->getXp()}</p>";
        echo $string;

    }

    public function attaquer(MyPersoAbstract $other)
    {
        $string="<b>{$this->getName()} Attaque {$other->getName()}</b><br>";
        return $string;

    }
    protected function blesser(MyPersoAbstract $other, int $blesse)
    {
        // TODO: Implement blesser() method.
        $other->setVie($other->getVie() - $blesse);
        $string="<b>{$this->getName()} a infligé {$blesse} de dégats à {$other->getName()}</b><br>";
        return $string;
    }
    public function getIntelligence(): int
    {
        return $this->intelligence;
    }
    public function setIntelligence(int $intelligence): void
    {
        $this->intelligence = $intelligence;
    }



}