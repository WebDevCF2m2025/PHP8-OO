<?php


abstract class AbstractMapping
{


    // création d'un constructeur pour tous les enfants
    public function __construct(array $datas)
    {
        // Appel de l'hydratation
        $this->hydrate($datas);

    }

    /* création d'une méthode d'hydratation, c'est-à-dire de
    mettre des valeurs aux propriétés en utilisant les setters
    existants
    */
    protected function hydrate(array $datas)
    {
        // tant qu'on a des données
        foreach ($datas as $setter=>$value){

            // création du nom du setter
            $setterName = "set".str_replace("_","",ucwords($setter, '_'));

            if(method_exists($this, $setterName)) {
                // Utilisation d'un setter existant dans l'enfant
                $this->$setterName($value);
            } else {
                echo "$setterName => $value n'existe pas<br>";
            }
        }
    }
}