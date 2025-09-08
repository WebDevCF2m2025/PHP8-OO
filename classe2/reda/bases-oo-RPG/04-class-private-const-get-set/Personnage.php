<?php


// Le nom de la classe doit être le même que celui du fichier
class Personnage
{
 // Propriété (équivalentes de variables)
 // On va mettre la visibilité à private (obligatoire)
 // (pas d'accès en dehors de la classe ni enfants)
 // Bonne pratique, snake_case
 private ?string $le_nom = null; // visibilité obligatoire, typage null ou string.(valeur par defaut null).
 private ?int $l_age = null; // attend un entier
 private ?bool $est_vivant = null; // attend un booléen. 

 // Constantes (équivalentes de constantes)
 // Elles sont publique par défaut 
 const LA_RACE = "Humain"; 
 private const LE_GENRE = "Masculin";
 // Méthodes (équivalentes de fonctions)
  
  // setters

  /**
   * Permet de modifier le nom du personnage
   * @param string $nom Le nom du personnage
   * @return void
   * @throws Exception
   */
  public function setLeNom(string $nom):void {
    // on va verifier que le nom respecte certain
    // critères imposés
    // le nom de l'instance est représenté par $this
    $thename = trim($nom);
    if($thename!=="") {
      if(strlen($thename) >5 && strlen($thename) < 25 ) {
      $this->le_nom = $thename;
      }else {
        throw new Exception("Le nom doit faire entre 5 et 25 caractères", E_USER_ERROR);
      }
    }else {
      throw new Exception("Espace vide non autorisé", E_USER_ERROR);
    }

  }
}
