<?php

class NotrePerso{

    // propriété
    private ?int $id=null;
    private ?string $name=null;
    private ?string $espece_perso=null;

    // constantes
    public const CHOIX_ESPECE = [
        "Humain",
        "Elfe",
        "Nain",
        "Orc",
        "Hobbit",
        "Gobelin",
    ];

    // méthodes

    // constructeur appelé lors de l'instanciation (new) ! Ajout de la race
    public function __construct(?int $lid,?string $lename){
        // utilisation des setters pour protéger les champs
        $this->setName($lename);
        $this->setId($lid);
        // utilisation du setter de espece_perso
    }

    // getter

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    // envoi null ou l'espèce choisie
    public function getEspecePerso(){

    }

    // setter

    public function setId(?int $id): void
    {
        if(!is_null($id)) {
            if($id<=0){
                throw new Exception("L'id ne peut être que positif");
            }
            // on modifie la propriété id qui se trouve dans l'instance ($this)
            $this->id = $id;
        }
    }
    public function setName(?string $name):void
    {
        if(!is_null($name))
            $this->name = htmlspecialchars(strip_tags(trim($name)));
    }
    // on ne peut choisir qu'une espèce se trouvant dans self::CHOIX_ESPECE
    public function setEspecePerso(?string $race):void
    {

    }
}