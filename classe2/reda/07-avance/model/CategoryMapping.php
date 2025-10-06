<?php

namespace model;

class CategoryMapping extends AbstractMapping
{
    // Properties
    protected int $id;
    protected string $category_name;
    protected ?string $category_slug;
    protected ?string $category_desc;

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    public function getCategorySlug(): ?string
    {
        return $this->category_slug;
    }

    public function getCategoryDesc(): ?string
    {
        return $this->category_desc;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCategoryName(string $category_name): void
    {
        $this->category_name = $category_name;
    }

    public function setCategorySlug(?string $category_slug): void
    {
        $this->category_slug = $category_slug;
    }

    public function setCategoryDesc(?string $category_desc): void
    {
        $this->category_desc = $category_desc;
    }
}
