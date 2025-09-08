<?php
// Doit avoir le même nom que le fichier
// On déclare une classe avec le mot clef class{}
// Une classe par fichier
class Personnage 

{
    // Propriétés (équivalents de variables)
    // On va mettre la visibilité à private (obligatoire) à private 
    // (pas d'accès en dehors de la classe ni enfants) 
    // bonne pratique, snake_case
    private ?string $_le_nom = null; // visibilité obligatoire,
    // typage null ou string
    // valeur par défaut: null 

    private ?int $_l_age = null; // Attend un entier ou nul 

    private ?bool $_est_vivant = null; // Attend un booléen ou null
    
    // Constantes (équivalents de constantes)
    // Elles sont publique par défaut
    const LA_RACE = "Humain"; 
    private const LE_GENRE = "Masculin";
    // Méthodes (équivalents de fonctions)
}
