<?php


abstract class AbstractMapping
{

    // création d'un constructeur pour tous les enfants
    public function __construct(array $datas)
    {
        // appel de l'hydratation
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
            //echo "$setterName => $value <br>";
            // on vérifie l'existence du setter
            // grâce à method_exists()
            if(method_exists($this,$setterName)){
                //echo "$setterName => $value existe<br>";
                // utilisation d'un setter existant dans la classe enfant
                $this->$setterName($value);
            }/*else{
                echo "$setterName => $value n'existe pas <br>";
            }
            */
        }
    }


    // transforme un titre en slug, sera hérité
    public function slugify(string $text, string $separator = '-'): string
    {
        // 1. Remplacer les caractères non-alphanumériques par le séparateur
        // \p{L} correspond à n'importe quelle lettre dans n'importe quelle langue
        // \p{N} correspond à n'importe quel chiffre
        // Le 'u' à la fin est pour le support de l'UTF-8
        $text = preg_replace('~[^\pL\d]+~u', $separator, $text);

        // 2. Translittérer les caractères accentués en ASCII
        // Par exemple : 'é' devient 'e'
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // 3. Supprimer les caractères qui ne sont ni des tirets, ni alphanumériques
        $text = preg_replace('~[^-\w]+~', '', $text);

        // 4. Supprimer les séparateurs en début et fin de chaîne
        $text = trim($text, $separator);

        // 5. Supprimer les séparateurs en double
        $text = preg_replace('~-+~', $separator, $text);

        // 6. Mettre toute la chaîne en minuscules
        $text = strtolower($text);

        if (empty($text)) {
            throw new Exception("Slugify failed");
        }

        // 7. On va rajouter des caractères hexadécimaux
        // au début de la chaîne au hasard, pour éviter
        // les doublons
        $text = bin2hex(random_bytes(2))."-".$text;

        // 8. On retourne la chaîne
        return $text;
    }
}