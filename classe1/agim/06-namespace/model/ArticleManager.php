<?php
// création du namespace
namespace model;

use PDO;
use Exception;

class ArticleManager implements ManagerInterface, CrudInterface
{
    private PDO $db;

    // implémenté à cause de MangerInterface
    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    /*
     * méthodes implémentées à cause de CrudInterface
     */
    public function create(AbstractMapping $data): bool {

        $sql = "INSERT INTO article (article_title, article_slug, article_text, article_date, article_visibility)
                VALUES (:title, :slug, :text, :date, :visibility)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':title', $data->getArticleTitle());
        $stmt->bindValue(':slug', $data->getArticleSlug());
        $stmt->bindValue(':text', $data->getArticleText());
        $stmt->bindValue(':date', $data->getArticleDate());
        $stmt->bindValue(':visibility', $data->getArticleVisibility(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function readById(int $id): bool|AbstractMapping
    {
        // TODO: Implement readById() method.
        return $id;
    }

    // récupération de tous nos articles
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` ";
        if ($orderDesc === true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item) {
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }

    public function update(int $id, AbstractMapping $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {

        try {
            $sql = "DELETE FROM article WHERE id = ?";
            $prepare = $this->db->prepare($sql);
            $prepare->execute([$id]);
            $prepare->closeCursor();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    /*
     * Nos méthodes n'existant pas dans l'interface
     */

    // on souhaite ne récupérer que les articles visibles
    public function readAllVisible(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` WHERE `article_visibility`=1 ";
        if ($orderDesc === true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item) {
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }
}
