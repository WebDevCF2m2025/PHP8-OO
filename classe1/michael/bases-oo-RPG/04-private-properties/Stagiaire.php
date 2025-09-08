<?php

class Stagiaire{

    // propriétés private
    private ?string $le_nom=null;
    private ?string $le_prenom=null;

    // constantes

    // par défaut une constante est public

    const string EST_VIVANT= "oui";


    // méthodes

        // setters (permettent de modifier les propriétés en
        // mettant des règles plus strictes)

        public function setLeNom(string $nom): void
        {

            // pas d'espaces vides devant et derrière
            $nom = trim($nom);
            // pas de tags dans le nom
            $nom = strip_tags($nom);

            // si chaîne vide
            if($nom==="") {
                trigger_error("Pas de nom vide !");

            // si la chaîne est plus petite que 3 caractères
            }elseif(strlen($nom)<=3){

                trigger_error("Nom trop petit <3");

            }elseif(strlen($nom)>20) {

                trigger_error("Nom trop long >20");

            }else {
                // $this représente l'instance de la classe (objet)
                $this->le_nom = $nom;
            }
        }


        // méthode statique, peut être appelée sans instanciation ::
        public static function getUp():string{
            return "aurevoir";
        }

}