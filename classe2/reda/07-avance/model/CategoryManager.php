<?php

namespace model;

use PDO;
use Exception;

class CategoryManager implements ManagerInterface, CrudInterface
{
    private PDO $db;

    use SlugifyTrait;

    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    public function create(AbstractMapping $data): bool
    {
        $slug = $this->slugify($data->getCategoryName());
        $sql = "INSERT INTO `category` (`category_name`, `category_slug`, `category_desc`) VALUES (?, ?, ?)";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([
                $data->getCategoryName(),
                $slug,
                $data->getCategoryDesc(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM `category` WHERE `id` = ?";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(1, $id, PDO::PARAM_INT);
        try {
            $prepare->execute();
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                return false;
            }
            return new CategoryMapping($result);
        } catch (Exception $e) {
            return false;
        }
    }

    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `category`";
        if ($orderDesc) {
            $sql .= " ORDER BY `id` DESC";
        }
        $query = $this->db->query($sql);
        $result = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new CategoryMapping($row);
        }
        return $result;
    }

    public function update(int $id, AbstractMapping $data): bool
    {
        $slug = $this->slugify($data->getCategoryName());
        $sql = "UPDATE `category` SET `category_name` = ?, `category_slug` = ?, `category_desc` = ? WHERE `id` = ?";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([
                $data->getCategoryName(),
                $slug,
                $data->getCategoryDesc(),
                $id,
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM `category` WHERE `id` = ?";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute([$id]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
