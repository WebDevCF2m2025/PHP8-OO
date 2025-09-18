<?php

class OrcGuerrier extends OrcPerso
{

    protected int $magie = 30;
    protected function initialisePerso()
    {
        parent::initialisePerso();
        // gestion de la magie de départ
        $magie = $this->getMagie() + mt_rand(1, self::DES_DE_DOUZE);
        $this->setMagie($magie);
        // sortie text
        $string = "<h3>Création du personnage Orc Guerrier nommé {$this->getName()}</h3>";
        $string .= "<p>Points de vie {$this->getVie()}<br>Agilité {$this->getAgilite()}<br>Magie {$this->getMagie()}<br>Blesse {$this->getBlesse()}
        <br>XP {$this->getXp()}</p>";
        echo $string;
    }
    public function attaquer(MyPersoAbstract $other): string
    {

        // Inflige les dégâts à la cible via la méthode blesser()
        $vieRestante = $this->blesser();
        if ($vieRestante <= 0) {
            $vieRestante = 0;
        }
        // Message d’attaque
        $string = "<b>{$this->getName()} inflige {$this->getBlesse()} points d'attaque à {$other->getName()}</b><br>
        <b>il lui reste donc {$vieRestante} points de vie.</b><br>";
        return $string;
    }

    protected function blesser(): int
    {
        $degats = $this->getBlesse();

        $vieRestante = MyPersoAbstract::getVie() - $degats;

        MyPersoAbstract::setVie($vieRestante);

        return $vieRestante;
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
