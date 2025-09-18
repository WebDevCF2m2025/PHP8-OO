<?php

class ElfeGuerrier extends ElfePerso
{

    protected int $attaque_spe = 30;


    protected function initialisePerso()
    {
        parent::initialisePerso();
        // gestion de la magie de départ
        $attaque_spe = $this->getAttaqueSpe() + mt_rand(1,self::DES_DE_DOUZE) + mt_rand(1,self::DES_DE_SIX);
        $this->setAttaqueSpe($attaque_spe);
        // sortie texte
        $string = "<h3>Création du personnage Elfe Guerrier nommé {$this->getName()}</h3>";
        $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Attaque-Spéciale {$this->getAttaqueSpe()}<br>Blesse {$this->getBlesse()}
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
    public function getAttaqueSpe(): int
    {
        return $this->attaque_spe;
    }
    public function setAttaqueSpe(int $attaque_spe): void
    {
        $this->attaque_spe = $attaque_spe;
    }



}