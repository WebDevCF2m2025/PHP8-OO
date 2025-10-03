<?php

namespace model;

use Exception;

class CategoryMapping extends AbstractMapping
{
    protected ?int $id = null;
    protected ?string $category_name = null;
    protected ?string $category_slug = null;
    protected ?string $category_desc = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if (is_null($id)) return;
        if ($id <= 0)
            throw new Exception("L'id doit être positif");
        $this->id = $id;
    }


    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(?string $name): void
    {
        if (is_null($name)) return;
        $nameClean = trim(htmlspecialchars(strip_tags($name)));
        if (empty($nameClean))
            throw new Exception("Le nom ne peut être vide !");

        if (strlen($nameClean) > 80)
            throw new Exception("Le nom est trop long !");

        $this->category_name = $nameClean;
    }
    public function getCategorySlug(): ?string
    {
        return $this->category_slug;
    }

    public function setCategorySlug(?string $slug): void
    {
        if (is_null($slug)) return;
        $slugClean = trim(htmlspecialchars(strip_tags($slug)));
        if (empty($slugClean))
            throw new Exception("Le slug ne peut être vide !");

        if (strlen($slugClean) > 84)
            throw new Exception("Le slug est trop long !");

        $this->category_slug = $slugClean;
    }

    public function getCategoryDesc(): ?string
    {
        return $this->category_desc;
    }

    public function setCategoryDesc(?string $desc): void
    {
        $descClean = trim(htmlspecialchars(strip_tags($desc)));

        if (strlen($descClean) > 300)
            throw new Exception("Le desc est trop long !");

        $this->category_desc = $descClean;
    }
}
