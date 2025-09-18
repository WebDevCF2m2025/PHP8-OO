<?php

class   ArticleMapping
{
    // propriétés = champs de la table
    protected ?int $id=null; // entier positif
    protected ?string $article_title=null; // string de 120 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_slug=null; // string de 125 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_text=null; // minimum 20 caractères, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $article_date=null; // doit être une date valide si remplie sinon erreur
    protected null|bool|int $article_visibility=null; // si int convertir en bool, si bool, attribuer la valeur


    public function __construct(?int $id , ?string $title){
      
            $this->setId($id);
        
        
            $this->setArticleTitle($title);
        
    }


        public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if(is_null($id)){
            $this->id = null;
            return;
        }
        if($id <= 0){
            throw new Exception("id doit être un entier positif");
        }
        $this->id = $id;
    }

    // getter setter ArticleTitle


    public function getArticleTitle(): ?string {
        return $this->article_title;
    }

    public function setArticleTitle(?string $title): void
    {
        if (is_null($title)) {
            $this->article_title = null;
            return;
        }
    
        $titretrime = trim(htmlspecialchars(strip_tags($title)));
    
        if (empty($titretrime)) {
            throw new Exception("Le titre est vide");
        }
    
        if (strlen($titretrime) < 6 || strlen($titretrime) > 120) {
            throw new Exception("Le titre doit contenir entre 6 et 120 caractères");
        }
    
        $this->article_title = $titretrime;
    }
    


    // getter setter article_slug

    public function getArticleSlug(){   
        return $this->article_slug;
    }

    public function setArticleSlug(?string $slug){

    }


 
    

}
