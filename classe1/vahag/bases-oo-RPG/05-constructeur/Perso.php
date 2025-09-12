<?php

class Perso{
    // Retourne la liste des races disponibles
    public static function getRaces(): array
    {
        return self::RACE;
    }

    // propriétés

    private ?int $id=null;

    private ?string $nickname=null;

    private ?string $race=null;

    private ?int $health=null;

    // depuis PHP 8.1, on peut utilliser readonly, évitez pour le momeent

    public readonly string $spec;

    // constantes

    public const int BEGIN_HEALTH = 100;

    private const array RACE = ["Humain", "Elf", "Orque"];

    // Méthodes

        // constructeur : méthode magique appelée lors de l'instanciation.

        public function __construct(string $nick,string $larace)
        {
            echo "J'ai construis un utilisateur<br>";
            $this->nickname = $nick;
            if (in_array($larace, self::RACE)) {
                $this->race = $larace;
            } else {
                $this->race = null;
                echo "<span style='color:red'>Race non valide !</span><br>";
            }
            // on modifie notre propriété en readonly
            $this->spec = "Aucune";
            echo "J'ai directement affecté les valeurs aux propriétés (mauvaise pratique):<br>";
            echo '$this->nickname = $nick => ' . $this->nickname . '<br>';
            echo '$this->race = $larace => ' . $this->race . '<br>';
            // affichage des constantes depuis la classe : self
            echo "santé: " . self::BEGIN_HEALTH;
            // affichage d'une constante privée (que dans la classe)
            // var_dump(value:) supprimé, erreur de syntaxexWecdec-09X

        }
}