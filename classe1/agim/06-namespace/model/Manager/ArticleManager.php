<?php
// création du namespace
namespace model\Manager;

use model\Traits\SlugifyTrait;
use PDO;
use model\Interfaces\ManagerInterface;
use model\Interfaces\ArticleCrudInterface;
use model\Mapping\AbstractMapping;
use model\Mapping\ArticleMapping;


class ArticleManager implements ManagerInterface, ArticleCrudInterface
{
    use SlugifyTrait;
    private PDO $db;

    // implémenté à cause de MangerInterface
    public function __construct(PDO $connect)
    {
        $this->db = $connect;
    }

    /*
     * méthodes implémentées à cause de CrudInterface
     */
    public function create(AbstractMapping $data)
    {

        try {

            $sql = "INSERT INTO article (article_title, article_slug, article_text, article_date, article_visibility)
            VALUES (:title, :slug, :text, :date, :visibility)";

            $slug = $this->slugify($data->getArticleTitle());
            $date = $data->getArticleDate();

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":title" => $data->getArticleTitle(),
                ":slug" => $slug,
                ":text" => $data->getArticleText(),
                ":date" => $date,
                ":visibility" => $data->getArticleVisibility()
            ]);
            $stmt->closeCursor();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        if ($result) {
            return new ArticleMapping($result);
        }

        return false;
    }


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
        try {
            $slug = $this->slugify($data->getArticleTitle());
            $sql = "UPDATE article SET 
                article_title = :title,
                article_slug = :slug,
                article_text = :text,
                article_visibility = :visibility
            WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ":title" => $data->getArticleTitle(),
                ":slug" => $slug,
                ":text" => $data->getArticleText(),
                ":visibility" => $data->getArticleVisibility(),
                ":id" => $id
            ]);
            $stmt->closeCursor();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete(int $id)
    {

        try {
            $sql = "DELETE FROM article WHERE id = ?";
            $prepare = $this->db->prepare($sql);
            $prepare->execute([$id]);
            $prepare->closeCursor();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
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
