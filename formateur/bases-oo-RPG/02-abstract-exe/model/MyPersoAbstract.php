<?php

abstract class MyPersoAbstract{
    // properties
    private ?int $id=null;
    protected ?string $name=null;
    protected ?string $espece_perso=null;
    protected ?string $style_perso=null;

    protected int $vie = 1000;
    protected int $agilite = 30;
    protected int $blesse = 40;
    protected int $xp = 0; // augmentation de 10 en cas de victoire

    // constantes
    public const int DES_DE_SIX = 6;
    public const int DES_DE_DOUZE = 12;

    public const array CHOIX_ESPECE = [
        "Humain",
        "Elfe",
        "Orc",
    ];
    public const array CHOIX_STYLE = [
        "Guerrier",
        "Voleur",
        "Magicien",
    ];

    // constructeur commun
    public function __construct(string $nom, string $espece, string $style){
        $this->setName($nom);
        $this->setEspecePerso($espece);
        $this->setStylePerso($style);
    }

    // méthodes abstraites
    abstract public function attaquer(MyPersoAbstract $other);
    abstract protected function initialisePerso();
    abstract protected function blesser();


    // getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        if(is_null($name)) return;
        $name = htmlspecialchars(strip_tags(trim($name)));
        if(empty($name))
            throw new Exception("Nom vide !");
        // on vérifie que le nom commence par une lettre, qu'il n'y a pas de caractères spéciaux ni d'espace et
        // qu'il fait 4 caractères au minimum et 20 au maximum
        if(!preg_match("/^[a-zA-Z][a-zA-Z0-9]{3,19}$/",$name))
            throw new Exception("Nom invalide !");


        // on met le nom avec une majuscule suivi de minuscule
        $name = ucfirst(strtolower($name));
        $this->name = $name;
    }


    public function getEspecePerso(): ?string
    {
        return $this->espece_perso;
    }

    public function setEspecePerso(?string $espece_perso): void
    {
        if(!in_array($espece_perso,self::CHOIX_ESPECE))
            throw new Exception("Cette espèce n'est pas encore disponible!");

        $this->espece_perso = $espece_perso;
    }

    public function getStylePerso(): ?string
    {
        return $this->style_perso;
    }


    public function setStylePerso(?string $style_perso): void
    {
        if(!in_array($style_perso,self::CHOIX_STYLE))
            throw new Exception("Ce style n'est pas encore disponible!");

        $this->style_perso = $style_perso;
    }

    public function getVie(): int
    {
        return $this->vie;
    }

    public function setVie(int $vie): void
    {
        $this->vie = $vie;
    }

    public function getAgilite(): int
    {
        return $this->agilite;
    }

    public function setAgilite(int $agilite): void
    {
        $this->agilite = $agilite;
    }
    public function getBlesse(): int
    {
        return $this->blesse;
    }
    public function setBlesse(int $blesse): void
    {
        $this->blesse = $blesse;
    }

    public function getXp(): int
    {
        return $this->xp;
    }

    public function setXp(int $xp): void
    {
        $this->xp = $xp;
    }





}