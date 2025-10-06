<?php
namespace model;

use Exception;

class CategoryMapping
{
  protected $id = null;
  protected $category_name = null;
  protected $category_slug = null;
  protected $category_desc = null;

  // getter setter
  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(?int $id): void
  {
    if (is_null($id)) {
      return;
    }
    if ($id <= 0) {
      throw new Exception("Id doit être positif.");
    }

    $this->id = $id;
  }

  public function getCategoryName(): ?string
  {
    return $this->category_name;
  }

  public function setCategoryName(?string $name): void
  {
    $cleanName = trim(htmlspecialchars(strip_tags($name)));

    if (empty($cleanName)) {
      throw new Exception("Le Nom ne peut être vide.");
    }
    if (strlen($cleanName) < 6) {
      throw new Exception("Le Nom est trop court.");
    }
    if (strlen($cleanName) > 80) {
      throw new Exception("Le nom est trop long.");
    }
  }
  public function getCategorySlug(): ?string
  {
    return $this->category_slug;
  }

  public function setCategorySlug(?string $slug): void
  {
    $cleanSlug = trim(htmlspecialchars(strip_tags($slug)));

    if (empty($cleanSlug)) {
      throw new Exception("Le Slug ne peut être vide.");
    }
    if (strlen($cleanSlug) < 6) {
      throw new Exception("Le Slug est trop court.");
    }
    if (strlen($cleanSlug) > 80) {
      throw new Exception("Le Slug est trop long.");
    }
  }
}
