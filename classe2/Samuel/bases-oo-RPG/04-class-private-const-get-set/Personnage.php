<?php
// Le nom de la classe doit être le même que celui du fichier
// on, déclare une classe avec le mot clf "class{}".
// Une classe par fichier

class Personnage {

    // Properties (Propriétés - équivalentes de variables)
    // On va mettre la visibilité (obligatoire) à private (pas d'accès en dehors de la classe ni enfants)
    // Bonne pratique, snake_case

    private ?string $le_nom = null; // Visibilité obligatoire, typage conseillé null ou string, valeur par default: null
    private ?int $l_age = null; // // Attend un entier ou null
    private ?bool $est_vivant = null; // Attend un booléen ou null

    // Constantes (équivalentes des constantes).
    // Elles sont publiques par défault

    const LA_RACE = "Humain";
    private const LE_GENRE = "Masculin";

    // Méthodes (équivalentes des fonctions)

        // Setters

    /**
     * @param string $nom
     * @return void
     * @throws Exception
     */
        public function setLeNom(string $nom) : void {
            // On va vérifier que le nom respecte les critères imposés
            $thename = trim($nom);
            
            // Le nom de l'instance est représenté par $this
            if ($thename != "") {
                if (strlen($thename) > 5 && strlen($thename) <= 25) {
                    $this->le_nom = $thename;
                }
            } else {
                throw new Exception("Espaces vides non autorisé", E_USER_ERROR);
            }
        }
}