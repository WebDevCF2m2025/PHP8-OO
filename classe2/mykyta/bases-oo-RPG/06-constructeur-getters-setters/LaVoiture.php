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
    public const NOS_MARQUES =
        [
            'Mercedes',
            'Volvo',
            'BMW',
            'Fiat'
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
        $this->setAnneSortie($year);
        $this->setChevaux($chevaux);
        $this->setModel($model);
    }


    // GETTERS ////////////////////////

    public function getMarque(): ?string
    {
        return $this->marque;
    }
    
    public function getAnneeSortie(): ?int
    {
        return $this->annee_sortie;
    }

    public function getChevaux()
    {
        return $this->chevaux;
    }    
        
    public function getModel()
    {
        return $this->model;
    }
    
         // SETTERS 

    // ne peut être vide, protection trim()- strip_tags
    // htmlspecialchars
    // EXE : ne peut être plus petit que 3
    // EXE : ne peut être plus grand que 20
    public function setMarque(?string $laMarque){
        $traiteMarque = htmlspecialchars(strip_tags(trim($laMarque)));
        if($traiteMarque===""){
            trigger_error("Le champs ne peut être vide");
        }elseif(in_array($laMarque,self::NOS_MARQUES)){
            $this->marque=$traiteMarque;
        }else{
             // on remplit la propriété
            trigger_error("La marque n'est pas accepté !\n");
        }
    }
    
    public function setAnneSortie(?int $annee_sortie){
        if ($annee_sortie < 1800 || $annee_sortie  > date('Y')){
            trigger_error("Error Anné !\n");
        } else{
           $this->annee_sortie = $annee_sortie; 
        }
    }

    public function setChevaux(?int $chevaux){
        if ($chevaux < 50 || $chevaux  > 1000){
            trigger_error("Error Chevaux !\n");
        }else{
            $this->chevaux = $chevaux; 
        }
    }

    public function setModel(?string $model){
        htmlspecialchars(strip_tags(trim($model)));
        if  
        (in_array( $model, self::NOS_MARQUES) ){
            trigger_error("n'est pas accepté !\n");
        }else{
            $this->model = $model; 
        }
    }
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