<?php

class ArticleMapping{
    protected ?int $id = null; //entier positif
    protected ?string $article_title = null;    // string de 120 max et 6 minimum, sans tags, sans espaces au début et à la fin
    protected ?string $article_slug = null;     // string de 125 max et 
    protected ?string $article_text = null;      //string (texte long)
    protected ?string $article_date = null;     //doit etre une date valide si remplie sinon erreur
    protected null|bool|int $article_visibility = null; //bool ou 0/1

    public function __construct(?int $id = null, ?string $article_title = null, ?string $articleSlug = null, ?string $article_text = null, ?string $article_date = null, null|bool|int $article_visibility = null){
        // echo __CLASS__." instanciée";
        $this -> setId($id);
        $this -> setArticleTitle($article_title);
        $this -> setArticleSlug($articleSlug);
        $this -> setArticleText($article_text);
        $this -> setArticleDate($article_date);
        $this -> setArticleVisibility($article_visibility);

    }
        //GETTERS

    public function getId(): ?int {
        return $this->id;
    }

    public function getArticleTitle(): ?string {
        return $this->article_title;
    }

    public function getArticleSlug(): ?string {
        return $this->article_slug;
    }

    public function getArticleText(): ?string {
        return $this->article_text;
    }

    public function getArticleDate(): ?string {
        return $this->article_date;
    }

    public function getArticleVisibility(): null|bool|int {
        return $this->article_visibility;
    }


    //SETTERS

    public function setId(?int $id): void {
        if (is_null($id)) return;
        if ($id <= 0) {
            throw new Exception("L'id doit être un entier positif");
        }
        $this->id = $id;   
    }

    public function setArticleTitle(?string $title): void {
        if (is_null($title)) return;
        if (strlen($title) < 6 || strlen($title) > 120) {
            throw new Exception("Le titre doit faire entre 6 et 120 caractères");
        }
        $this->article_title = $title;
    }    

    public function setArticleSlug(?string $title): void {
        if (is_null($title)) return;
        if (strlen($title) < 6 || strlen($title) > 125) {
            throw new Exception("Le slug doit faire entre 6 et 125 caractères");
        }
        $this->article_slug = $title;
    }        

    public function setArticleText(?string $text): void {
        if (is_null($text)) return;
        $this->article_text = $text;
    }

    public function setArticleDate(?string $date): void {
        if (is_null($date)) return;
        if (strtotime($date) === false) {
            throw new Exception("La date n'est pas valide");
        }        
        $this->article_date = $date;
    }

    public function setArticleVisibility(null|bool|int $visibility): void {
        if (is_null($visibility)) return;
        if (!is_bool($visibility) && $visibility !== 0 && $visibility !== 1) {
            throw new Exception("La visibilité doit être un booléen ou 0/1");
        }
        $this->article_visibility = $visibility;
    }
}