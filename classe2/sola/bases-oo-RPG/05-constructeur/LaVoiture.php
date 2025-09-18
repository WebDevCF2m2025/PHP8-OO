<?php
class LaVoiture{
    // propriétés
    private ?string $marque=null;
    private ?int $annee_sortie=null;
    private ?int $chevaux = null;
    private ?string $model = null;

    // constantes ! typage autorisé depuis 8.3
    public const bool VOITURE_NEUVE = true; // par défaut public
    private const string MOTORISATION = "Essence";
    // Méthodes

    /* Le constructeur est une méthode publique
    magique qui est appelée lors de l'instanciation
    de la classe dans laquelle il se trouve (new)
    */
    public function __construct(string $laMarque,int $year, int $chevaux, string $model){
        // application immédiate de la valeur
        // aux propriétés, courant, mais à éviter
        // pour des raisons de sécurités
        $this->marque = $laMarque;
        $this->annee_sortie = $year;
        $this->model = $model;
        $this->chevaux = $chevaux;
    }

}