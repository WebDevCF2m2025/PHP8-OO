<?php
// création du namespace
namespace model;

use PDO;

class ArticleManager implements ManagerInterface, CrudInterface
{
    private PDO $db;

    // implémenté à cause de MangerInterface
    public function __construct(PDO $connect){
        $this->db = $connect;
    }

    /*
     * méthodes implémentées à cause de CrudInterface
     */
    public function create(AbstractMapping $data)
    {
    $sql = "INSERT INTO article (article_title, article_slug, article_text, article_date, article_visibility)
            VALUES (?,?,?,?,?);";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        $data->getArticleTitle(),
        $data->slugify($data->getArticleTitle()),
        $data->getArticleText(),
        $data->getArticleDate(),
        $data->getArticleVisibility()
    ]);
    }

    public function readById(int $id): bool|AbstractMapping
    {
        $sql = "SELECT * FROM `article` WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        if($result){
            $datas = new ArticleMapping($result);
            return $datas;
        }
        return false;
    }

    // récupération de tous nos articles
    public function readAll(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }

    public function update(int $id, AbstractMapping $data)
    {
        $sql = "UPDATE `article` SET article_title = ?, article_slug = ?, article_text = ?, article_date = ?, article_visibility=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data->getArticleTitle(),
            $data->slugify($data->getArticleTitle()),
            $data->getArticleText(),
            $data->getArticleDate(),
            $data->getArticleVisibility(),
            $id
        ]);
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM `article` WHERE id=?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    /*
     * Nos méthodes n'existant pas dans l'interface
     */

    // on souhaite ne récupérer que les articles visibles
    public function readAllVisible(bool $orderDesc = true): array
    {
        $sql = "SELECT * FROM `article` WHERE `article_visibility`=1 ";
        if($orderDesc===true)
            $sql .= "ORDER BY `article_date` DESC";
        $query = $this->db->query($sql);
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($stmt as $item){
            // réutilisation des setters
            $result[] = new ArticleMapping($item);
        }
        $query->closeCursor();
        return $result;
    }
}