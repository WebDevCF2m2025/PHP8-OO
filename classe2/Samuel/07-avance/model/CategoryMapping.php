<?php

// Création de namespace
namespace model;

use Exception;

class CategoryMapping extends AbstractMapping {

    // Propriétés = champs de la table
    protected ?int $id = null; // entier positif
    protected ?string $category_name = null; // string de 80 maximum, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $category_slug = null; // string de 84 max, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    protected ?string $category_desc = null; // string de 300 max minimum 20 caractères, sans tags, sans espace devant et derrière, caractères spéciaux encodés

    // Méthodes

    // Constructeur et hydratation dans AbstractMapping

    // getters et setters

    // ID
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id):void {
        if (is_null($id)) return;
        if ($id<0)
            throw new Exception("L'id doit être positif");
        $this->id = $id;
    }

    // category_name
    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    // string de 80 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    public function setCategoryName(?string $categoryName): void
    {
        if(is_null($categoryName)) return;
        $categoryNameClean = trim(htmlspecialchars(strip_tags($categoryName)));
        if(empty($categoryNameClean))
            throw new Exception("Le titre ne peut être vide !");
        if(strlen($categoryNameClean)>80)
            throw new Exception("Le titre est trop long !");

        $this->category_name = $categoryNameClean;
    }

    // category_slug
    public function getCategorySlug(): ?string
    {
        return $this->category_slug;
    }

    // string de 84 max et 6 minimum sans tags, sans espace devant et derrière, caractères spéciaux encodés
    public function setCategorySlug(?string $categorySlug): void
    {
        if(is_null($categorySlug)) return;
        $categorySlugClean = trim(htmlspecialchars(strip_tags($categorySlug)));
        if(empty($categorySlugClean))
            throw new Exception("Le slug ne peut être vide !");
        if(strlen($categorySlugClean)>84)
            throw new Exception("Le slug est trop long !");

        $this->category_slug = $categorySlugClean;
    }

    // category_desc
    public function getCategoryDesc(): ?string
    {
        return $this->category_desc;
    }

    // string de 300 max minimum 20 caractères, sans tags, sans espace devant et derrière, caractères spéciaux encodés
    public function setCategoryDesc(?string $categoryDesc): void
    {
        if(is_null($categoryDesc)) return;
        $categoryDescClean = trim(htmlspecialchars(strip_tags($categoryDesc)));
        if(empty($categoryDescClean))
            throw new Exception("La description ne peut être vide !");
        if(strlen($categoryDescClean)<20)
            throw new Exception("La description est trop courte !");
        if(strlen($categoryDescClean)>300)
            throw new Exception("La description est trop longue !");

        $this->category_desc = $categoryDescClean;
    }
}