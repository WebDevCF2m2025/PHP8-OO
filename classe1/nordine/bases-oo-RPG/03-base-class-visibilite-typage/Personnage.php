<?php



// La classe est une usine qui va permettre de créer des objets
// de son type via une instanciation
// La classe DOIT avoir le même nom que le fichier

class Personnage{
    // Propriétés (Attributs)
    // ce sont des variables propres à la classe.
    // Elles ont 3 visibilités : public, private ou protected
    public ?string $the_name; // publique, typage en string
    public ?string $the_surname="unknown"; // publique, string ou null (?string) avec valeur par défaut string
    public ?string $the_walking_dead=null; // publique, string ou null (?string) avec valeur par défaut null

    // Constantes
    // Méthodes
}