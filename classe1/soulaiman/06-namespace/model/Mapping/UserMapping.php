<?php

namespace model\Mapping;


use Exception;

class UserMapping extends AbstractMapping
{
    protected ?int $id = null;
    protected ?string $user_name = null;
    protected ?string $user_email = null;
    protected ?string $user_password = null;

    // Getter & Setter pour ID
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if (is_null($id)) return;
        if ($id <= 0) throw new Exception("L'id doit être positif");
        $this->id = $id;
    }

    // Getter & Setter pour user_name
    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(?string $name): void
    {
        if (is_null($name)) return;
        $nameClean = trim(htmlspecialchars(strip_tags($name)));
        if (empty($nameClean)) throw new Exception("Le nom ne peut être vide !");
        if (strlen($nameClean) < 6) throw new Exception("Le nom est trop court !");
        if (strlen($nameClean) > 120) throw new Exception("Le nom est trop long !");
        $this->user_name = $nameClean;
    }

    // Getter & Setter pour user_email
    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(?string $email): void
    {
        if (is_null($email)) return;
        $emailClean = trim(htmlspecialchars(strip_tags($email)));
        if (empty($emailClean)) throw new Exception("L'email ne peut être vide !");
        if (strlen($emailClean) < 6) throw new Exception("L'email est trop court !");
        if (strlen($emailClean) > 125) throw new Exception("L'email est trop long !");
        $this->user_email = $emailClean;
    }

    // Getter & Setter pour user_password
    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(?string $password): void
    {
        if (is_null($password)) return;
        $passwordClean = trim(htmlspecialchars(strip_tags($password)));
        if (empty($passwordClean)) throw new Exception("Le mot de passe ne peut être vide !");
        if (strlen($passwordClean) < 4) throw new Exception("Le mot de passe est trop court !");
        $this->user_password = $passwordClean;
    }
}
