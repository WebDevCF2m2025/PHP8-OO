<?php
class LaVoiture
{
    // propriétés
    private ?string $marque = null;
    private ?int $annee_sortie = null;
    private ?int $chevaux = null;
    private ?string $model = null;

    // constantes ! typage autorisé depuis 8.3
    public const bool VOITURE_NEUVE = true; // par défaut public
    private const string MOTORISATION = "Essence";
    // Méthodes
    public const NOS_MARQUES =
        [
            'Mercedes',
            'Volvo',
            'BMW',
            'Fiat',
        ];

    /* Le constructeur est une méthode publique
    magique qui est appelée lors de l'instanciation
    de la classe dans laquelle il se trouve (new)
    */
    public function __construct(string $laMarque, int $year, int $chevaux, string $model)
    {
        // utilisation des setters pour protéger
        // les entrées lors de la création de l'instance
        $this->setMarque($laMarque);

    }

    // getter

    // getMarque pour récupérer la marque
    public function getMarque(): ?string
    {
        return $this->marque;
    }

    // setters setMarque pour modifier la marque
    // ne peut être vide, protection trim()- strip_tags
    // htmlspecialchars
    // EXE : ne peut être plus petit que 3
    // EXE : ne peut être plus grand que 20
    public function setMarque(?string $laMarque): void
    {
        $traiteMarque = htmlspecialchars(strip_tags(trim($laMarque)));
        if($traiteMarque===""){
            trigger_error("Instance numéro : ".spl_object_id($this)." Le champs ne peut être vide");
        }else{
            // on remplit la propriété
            $this->marque = $traiteMarque;
        }

    }

    // getter getAnneeSortie()
    public function getAnneeSortie()
    {

    }

    // setter setAnneeSortie()
    // entier positif
    // EXE supérieur 1800
    // EXE inférieur à l'année actuelle

    // EXE idem pour les $chevaux
    // EXE minimum 50 maximum 1000

    // EXE model idem que pour la marque

    // BONUS EXE
    // CHANGER le setter de LaMarque pour qu'il n'accepte
    // que les marques dans le tableau self::NOS_MARQUES

}