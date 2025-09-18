<?php
class LaVoiture
{
    // propriétés
    private ?string $marque = null;
    private ?int $annee_sortie = null;
    private ?int $chevaux = null;
    private ?string $model = null;

    // constantes ! typage autorisé depuis 8.3
    public const VOITURE_NEUVE = true; // par défaut public
    private const MOTORISATION = "Essence";
    // Méthodes
    public const NOS_MARQUES = ["Mercedes", "Volvo", "BMW", "Fiat"];

    /* Le constructeur est une méthode publique
    magique qui est appelée lors de l'instanciation
    de la classe dans laquelle il se trouve (new)
    */
    public function __construct(
        string $laMarque,
        int $year,
        int $chevaux,
        string $model,
    ) {
        // utilisation des setters pour protéger
        // les entrées lors de la création de l'instance
        $this->setMarque($laMarque);
        $this->setAnneeSortie($year);
        $this->setChevaux($chevaux);
        $this->setModel($model);
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

        // BONUS EXE : CHANGER le setter de LaMarque pour qu'il n'accepte
        // que les marques dans le tableau self::NOS_MARQUES
        if (!in_array($traiteMarque, self::NOS_MARQUES)) {
            trigger_error(
                "La marque '{$traiteMarque}' n'est pas une marque valide.",
                E_USER_WARNING,
            );
        } else {
            $this->marque = $traiteMarque;
        }
    }

    // getter getAnneeSortie()
    public function getAnneeSortie(): ?int
    {
        return $this->annee_sortie;
    }

    // setter setAnneeSortie()
    // entier positif
    // EXE supérieur 1800
    // EXE inférieur à l'année actuelle
    public function setAnneeSortie(?int $year): void
    {
        if ($year > 1800 && $year <= date("Y")) {
            $this->annee_sortie = $year;
        } else {
            trigger_error(
                "L'année doit être supérieure à 1800 et inférieure ou égale à l'année en cours.",
                E_USER_WARNING,
            );
        }
    }

    // EXE idem pour les $chevaux
    // EXE minimum 50 maximum 1000
    public function getChevaux(): ?int
    {
        return $this->chevaux;
    }

    public function setChevaux(?int $power): void
    {
        if ($power >= 50 && $power <= 1000) {
            $this->chevaux = $power;
        } else {
            trigger_error(
                "Les chevaux doivent être compris entre 50 et 1000.",
                E_USER_WARNING,
            );
        }
    }

    // EXE model idem que pour la marque
    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): void
    {
        $traiteModel = htmlspecialchars(strip_tags(trim($model)));
        if (strlen($traiteModel) >= 3 && strlen($traiteModel) <= 20) {
            $this->model = $traiteModel;
        } else {
            trigger_error(
                "Le modèle doit contenir entre 3 et 20 caractères.",
                E_USER_WARNING,
            );
        }
    }
}
