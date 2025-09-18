<?php

class   ArticleMapping
{
    protected ?int $id = null;
    protected ?string $article_title = null;
    protected ?string $article_slug = null;
    protected ?string $article_text = null;
    protected ?string $article_date = null;
    protected ?string $article_visibility = null;


    public function __construct(){
        echo __CLASS__. "instancié";
    }


        public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // getter setter ArticleTitle
    public function getArticleTitle(){
        return $this->article_title;
    }

    public function setArticleTitle(?string $title){
        if(is_null($this)) return;
        $titretrime = trim(htmlspecialchars(strip_tags($title)));
        if(empty($titretrime)){
            throw new Exception(" c'est vide");
        }
        if()
    }


    // getter setter article_slug

    public function getArticleSlug(){   
        return $this->article_slug;
    }

    public function setArticleSlug(?string $slug){

    }

}
